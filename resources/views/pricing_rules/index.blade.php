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
                <th>Ad Type</th>
                <th>Rule Type</th>
                <th>Rule</th>
                <th>Options</th>
            </tr>
            </thead>

            <tbody>
            @if (count($pricingRules) > 0)
                @foreach ($pricingRules as $pricingRule)
                    <tr class="gradeA">
                        <td>{{ $pricingRule->id }}</td>
                        <td>{{ $pricingRule->customer->name }}</td>
                        <td>{{ $pricingRule->adType->name }}</td>
                        <td>{{ $pricingRule->rule_type }}</td>
                        <td>{{ $pricingRule->rule }}</td>
                        <td class="center" width='20%'>
                            <a href="{{ url('pricing-rules', array($pricingRule->id, 'edit')) }}" class="btn btn-primary btn-sm">Edit</a>
                            <form action="{{ url('pricing-rules/'.$pricingRule->id) }}" method="POST" style="display: inline;">
                                {!! csrf_field() !!}
                                {!! method_field('DELETE') !!}

                                <button type="submit" id="delete-task-{{ $pricingRule->id }}" class="btn btn-danger btn-sm">
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