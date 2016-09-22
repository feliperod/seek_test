@extends('master')

@section('content')
    <div class="text-right bottom">
        <a class="btn btn-default" href="{{url('customers/create')}}" role="button">Create</a>
    </div>

    <div class="table-responsive">
        <table class="table">
            <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Options</th>
            </tr>
            </thead>

            <tbody>
            @if (count($customers) > 0)
                @foreach ($customers as $customer)
                    <tr class="gradeA">
                        <td>{{ $customer->id }}</td>
                        <td>{{ $customer->name }}</td>
                        <td class="center" width='20%'>
                            <a href="{{ url('customers', array($customer->id, 'edit')) }}" class="btn btn-primary btn-sm">Edit</a>
                            <form action="{{ url('customers/'.$customer->id) }}" method="POST" style="display: inline;">
                                {!! csrf_field() !!}
                                {!! method_field('DELETE') !!}

                                <button type="submit" id="delete-task-{{ $customer->id }}" class="btn btn-danger btn-sm">
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