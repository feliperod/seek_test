
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Starter Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ URL::asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="{{ URL::asset('css/ie10-viewport-bug-workaround.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ URL::asset('css/template.css') }}" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Seek-test</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li><a href="{{url('checkout')}}">Checkout</a></li>
                <li><a href="{{url('ad-types')}}">Ad Types</a></li>
                <li><a href="{{url('customers')}}">Customers</a></li>
                <li><a href="{{url('pricing-rules')}}">Pricing Rules</a></li>
                <li><a href="{{url('orders')}}">Orders</a></li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>

<div class="container">

    <div class="row starter-template">
        <div class="col-lg-12">

            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Estabelecimento</th>
                        <th>Nome</th>
                        <th>Opções</th>
                    </tr>
                    </thead>

                    <tbody>
                    @if (count($ticketTypes) > 0)
                        @foreach ($ticketTypes as $ticketType)
                            <tr class="gradeA">
                                <td>{{ $ticketType->id }}</td>
                                <td>{{ $ticketType->company->name }}</td>
                                <td>{{ $ticketType->name }}</td>
                                <td class="center" width='20%'>
                                    <a href="{{ url('admin/tipos-de-ticket', array($ticketType->id, 'edit')) }}" class="btn btn-primary btn-sm tk"><i class="fa fa-pencil"></i> Edit</a>
                                    <form action="{{ url('admin/tipos-de-ticket/'.$ticketType->id) }}" method="POST" style="display: inline;">
                                        {!! csrf_field() !!}
                                        {!! method_field('DELETE') !!}

                                        <button type="submit" id="delete-task-{{ $ticketType->id }}" class="btn btn-danger btn-sm">
                                            <i class="fa fa-btn fa-trash"></i>Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div><!-- /.container -->


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
<script src="../../dist/js/bootstrap.min.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>
