@extends('master')

@section('content')
    <div class="text-right bottom">
        <a class="btn btn-default" href="{{url('ad-types/create')}}" role="button">Create</a>
    </div>

    <div class="table-responsive">
        <table class="table">
            <thead>
            <tr>
                <th>Id</th>
                <th>Code</th>
                <th>Name</th>
                <th>Price</th>
                <th>Options</th>
            </tr>
            </thead>

            <tbody>
            @if (count($adTypes) > 0)
                @foreach ($adTypes as $adType)
                    <tr class="gradeA">
                        <td>{{ $adType->id }}</td>
                        <td>{{ $adType->code }}</td>
                        <td>{{ $adType->name }}</td>
                        <td>{{ $adType->price }}</td>
                        <td class="center" width='20%'>
                            <a href="{{ url('ad-types', array($adType->id, 'edit')) }}" class="btn btn-primary btn-sm">Edit</a>
                            <form action="{{ url('ad-types/'.$adType->id) }}" method="POST" style="display: inline;">
                                {!! csrf_field() !!}
                                {!! method_field('DELETE') !!}

                                <button type="submit" id="delete-task-{{ $adType->id }}" class="btn btn-danger btn-sm">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>

@endsection