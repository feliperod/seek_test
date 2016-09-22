@extends('master')

@section('content')

    <div class="text-right bottom">
        <a class="btn btn-default" href="{{url('pricing-rules/create')}}" role="button">Create</a>
    </div>
    <div class="table-responsive">
        <table class="table">
            <thead>
            <tr>
                <th>Id</th>
                <th>Customer</th>
                <th>Total</th>
                <th>Discount</th>
                <th>Items</th>
                <th>Options</th>
            </tr>
            </thead>

            <tbody>
            @if (count($orders) > 0)
                @foreach ($orders as $order)
                    <tr class="gradeA">
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->customer->name }}</td>
                        <td>{{ $order->total }}</td>
                        <td>{{ $order->discount }}</td>
                        <td><ul>@foreach($order->items as $item) <li>{{$item->name}} x {{($item->pivot->quantity)}}</li>  @endforeach</ul></td>
                        <td class="center" width='20%'>
                            <form action="{{ url('orders/'.$order->id) }}" method="POST" style="display: inline;">
                                {!! csrf_field() !!}
                                {!! method_field('DELETE') !!}

                                <button type="submit" id="delete-task-{{ $order->id }}" class="btn btn-danger btn-sm">
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