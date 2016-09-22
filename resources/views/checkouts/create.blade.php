@extends('master')

@section('content')

    <form action="{{ url('checkout') }}" method="post" >

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


        <div class="text-right bottom">
            <a class="btn btn-success" id="btnAddProduct" role="button" href="javascript:addProduct();">Add Product</a>
        </div>

        <div id="products">
            <div class="form-group">
                <label for="ad_type">Items</label>
                <div class="row">

                    <div class="col-md-8">
                        <select class="form-control" name="items[]" id="ad_type" required>
                            <option value="">Select</option>
                            @foreach ($adTypes as $adType)
                                <option value="{{ $adType->id }}">{{$adType->name}} - ({{$adType->code}})</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-1 ">
                        <input class="form-control" name="qty[]" placeholder="Qty" value="1" required>
                    </div>

                </div>
            </div>

        </div>

        <button type="submit" class="btn btn-default">Submit</button>
    </form>

@endsection

@section('javascript')
    <script>

        var templateProduct = '<div class="form-group"> <div class="row"> <div class="col-md-8"> <select class="form-control" name="items[]" id="ad_type" required> <option value="">Select</option>@foreach ($adTypes as $adType)<option value="{{ $adType->id }}">{{$adType->name}} - ({{$adType->code}})</option>@endforeach</select> </div> <div class="col-md-1 "> <input class="form-control" name="qty[]" placeholder="Qty" value="1" required> </div> <div class="col-md-1 "> <a class="btn btn-danger" class="removeProduct" role="button" onClick="removeProduct(this.parentNode.parentNode)">Remove Product</a> </div> </div> </div>';
        var productsDiv = document.getElementById("products");

        function addProduct() {
            var container = document.createElement("div");
            container.innerHTML = templateProduct;
            productsDiv.appendChild(container);
        }

        function removeProduct(element) {
            element.parentNode.removeChild(element);
        }

    </script>
@endsection