@extends('master')

@section('content')

    <form action="{{ url('customers', array($customer->id)) }}" method="post" >

        {!! csrf_field() !!}

        {!! method_field('PUT') !!}

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Unilever" value="{{$customer->name}}">
        </div>

        <button type="submit" class="btn btn-default">Submit</button>
    </form>

@endsection