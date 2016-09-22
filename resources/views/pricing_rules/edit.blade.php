@extends('master')

@section('content')

    <form action="{{ url('pricing-rules', array($pricingRule->id)) }}" method="post" >

        {!! csrf_field() !!}

        {!! method_field('PUT') !!}

        <div class="form-group">
            <label for="customer">Customer</label>
            <select class="form-control" name="customer_id" id="customer" required>
                <option value="">Select</option>
                @foreach ($customers as $customer)
                    <option value="{{ $customer->id }}" @if ($pricingRule->customer_id == $customer->id) selected @endif>{{$customer->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="ad_type">Ad Type</label>
            <select class="form-control" name="ad_type_id" id="ad_type" required>
                <option value="">Select</option>
                @foreach ($adTypes as $adType)
                    <option value="{{ $adType->id }}" @if ($pricingRule->customer_id == $adType->id) selected @endif>{{$adType->name}} - ({{$adType->code}})</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="rule_type">Rule Type</label>
            <select class="form-control" name="rule_type" id="rule_type" required>
                <option value="">Select</option>
                <option value="discount" @if ($pricingRule->rule_type == 'discount') selected @endif>Discount</option>
                <option value="deal" @if ($pricingRule->rule_type == 'deal') selected @endif>Deal</option>
            </select>
        </div>


        <div class="form-group">
            <label for="rule">Rule</label>
            <input type="text" class="form-control" id="rule" name="rule" placeholder="RULE" value="{{$pricingRule->rule}}" required>
            <p class="help-block">Deal: X FOR Y</p>
            <p class="help-block">Discount: 199.00</p>
            <p class="help-block">Discount: 199.00 WHEN_THERE 3</p>
        </div>

        <button type="submit" class="btn btn-default">Submit</button>
    </form>

@endsection