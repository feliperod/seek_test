<?php

namespace App\Services;


use App\Entities\AdType;
use App\Entities\Order;
use Illuminate\Database\Eloquent\Collection;

class CheckoutService
{
    private $_items;
    private $_itemsTypes;
    private $_totalByType;

    private $_subtotal;
    private $_discount;
    private $_total;

    private $_pricingRules;

    private $_order;

    public function __construct(Collection $pricingRules, $customerId)
    {
        $this->_pricingRules = $pricingRules;
        $this->_items = new Collection();
        $this->_itemsTypes = [];
        $this->_totalByType = [];


        $dataOrder = [
            'customer_id' => $customerId
        ];

        $this->_order = Order::create($dataOrder);

    }

    public function add($itemId, $qty)
    {
        if (!$this->_items->contains('id', $itemId))
        {
            $item = AdType::findOrFail($itemId);
            $this->_items->push($item);
        }

        if(!in_array($itemId, $this->_itemsTypes)){
            $this->_itemsTypes[] = $itemId;
            $this->_totalByType[$itemId] = $qty;
        }else{
            $this->_totalByType[$itemId] += $qty;
        }

        $this->_order->items()->save($item, ['quantity' => $this->_totalByType[$itemId]]);

    }

    public function total()
    {
        foreach ($this->_items as $item){
            //calculate subtotal
            $this->_subtotal += $item->price * $this->_totalByType[$item->id];

            //get rules by product
            $rulesItem = $this->getPricingRulesByItem($item);

            //if exists rules
            if(!$rulesItem->isEmpty()){
                foreach ($rulesItem as $ruleItem)
                {
                    //verify rule type
                    if($ruleItem->rule_type == 'discount'){
                        //verify condition for discount
                        if (strpos($ruleItem->rule, 'WHEN_THERE') !== false) {
                            $rule = str_replace(' ', '', $ruleItem->rule);
                            $ruleParts = explode('WHEN_THERE', $rule);

                            if($this->_totalByType[$item->id] >= $ruleParts[1]){
                                $newValue = $ruleParts[0];
                                $this->_total += $newValue * $this->_totalByType[$item->id];

                                $discount = $item->price - $newValue;
                                $this->_discount += $discount * $this->_totalByType[$item->id];
                            }

                        }else{
                            //apply discount
                            $newValue = trim($ruleItem->rule);
                            $this->_total += $newValue * $this->_totalByType[$item->id];

                            $discount = $item->price - $newValue;
                            $this->_discount += $discount * $this->_totalByType[$item->id];
                        }

                    }else{
                        $rule = str_replace(' ', '', $ruleItem->rule);
                        $ruleParts = explode('FOR', $rule);

                        $itemsWin = intdiv($this->_totalByType[$item->id], $ruleParts[0]);
                        $itemsToPay = $this->_totalByType[$item->id] - $itemsWin;

                        $this->_total += $itemsToPay * $item->price;
                        $this->_discount = $itemsWin * $item->price;

                    }
                }

            }else{
                //normal calculate
                $this->_total += $item->price * $this->_totalByType[$item->id];
                $this->_discount += 0;
            }
        }

        $this->_order->total = $this->_total;
        $this->_order->subtotal = $this->_subtotal;
        $this->_order->discount = $this->_discount;
        $this->_order->save();

        return $this->_order;

    }

    private function getPricingRulesByItem($item)
    {
        $filtered = $this->_pricingRules->where('ad_type_id', $item->id);
        $filtered->all();

        return $filtered;
    }
}