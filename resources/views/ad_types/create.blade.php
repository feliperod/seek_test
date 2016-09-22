@extends('master')

@section('content')

    <form action="{{ url('ad-types') }}" method="post" >

        {!! csrf_field() !!}

        <div class="form-group">
            <label for="code">Code</label>
            <input type="text" class="form-control" id="code" name="code" placeholder="classic" required>
        </div>

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Classic Ad" required>
        </div>

        <div class="form-group">
            <label for="price">Price</label>
            <input type="text" class="form-control" id="price" name="price" placeholder="269.99" required>
        </div>

        <button type="submit" class="btn btn-default">Submit</button>
    </form>

@endsection