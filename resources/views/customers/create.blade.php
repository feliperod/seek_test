@extends('master')

@section('content')

    <form action="{{ url('customers') }}" method="post" >

        {!! csrf_field() !!}

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Unilever">
        </div>

        <button type="submit" class="btn btn-default">Submit</button>
    </form>

@endsection