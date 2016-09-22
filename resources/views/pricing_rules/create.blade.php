@extends('master')

@section('content')

    <form action="{{ url('pricing-rules') }}" method="post" >

        {!! csrf_field() !!}

        <div class="form-group">
            <label for="customer">Customer</label>
            <select class="form-control" name="customer_id" id="customer" required>
                <option value="">Select</option>
                @foreach ($customers as $customer)
                    <option value="{{ $customer->id }}">{{$customer->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="ad_type">Ad Type</label>
            <select class="form-control" name="ad_type_id" id="ad_type" required>
                <option value="">Select</option>
                @foreach ($adTypes as $adType)
                    <option value="{{ $adType->id }}">{{$adType->name}} - ({{$adType->code}})</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="rule_type">Rule Type</label>
            <select class="form-control" name="rule_type" id="rule_type" required>
                <option value="">Select</option>
                <option value="discount">Discount</option>
                <option value="deal">Deal</option>
            </select>
        </div>


        <div class="form-group">
            <label for="rule">Rule</label>
            <input type="text" class="form-control" id="rule" name="rule" placeholder="RULE" required>
            <p class="help-block">Deal: X FOR Y</p>
            <p class="help-block">Discount: 199.00</p>
            <p class="help-block">Discount: 199.00 WHEN_THERE 3</p>
        </div>

        <button type="submit" class="btn btn-default">Submit</button>
    </form>

@endsection