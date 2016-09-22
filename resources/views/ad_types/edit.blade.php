@extends('master')

@section('content')

    <form action="{{ url('ad-types', array($adType->id)) }}" method="post" >

        {!! csrf_field() !!}

        {!! method_field('PUT') !!}

        <div class="form-group">
            <label for="code">Code</label>
            <input type="text" class="form-control" id="code" name="code" placeholder="classic" value="{{$adType->code}}" required>
        </div>

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Classic Ad" value="{{$adType->name}}" required>
        </div>

        <div class="form-group">
            <label for="price">Price</label>
            <input type="text" class="form-control" id="price" name="price" placeholder="269.99" value="{{$adType->price}}" required>
        </div>

        <button type="submit" class="btn btn-default">Submit</button>
    </form>

@endsection