<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        {{-- // Page _token --}}
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Responsive Admin Dashboard Template">
        <meta name="keywords" content="admin,dashboard">
        <meta name="author" content="stacks">
        <!-- The above 6 meta tags *must* come first in the head; any other head content must come *after* these tags -->

        <!-- Title -->
        <title>Space - Responsive Admin Dashboard Template</title>

        <!-- Styles -->
        <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
        <link href="{{ URL::asset('admin') }}/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="{{ URL::asset('admin') }}/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <link href="{{ URL::asset('admin') }}/plugins/icomoon/style.css" rel="stylesheet">
        <link href="{{ URL::asset('admin') }}/plugins/uniform/css/default.css" rel="stylesheet"/>
        <link href="{{ URL::asset('admin') }}/plugins/switchery/switchery.min.css" rel="stylesheet"/>

        <link href="{{ URL::asset('admin') }}/plugins/datatables/css/jquery.datatables.min.css" rel="stylesheet"/>
        <link href="{{ URL::asset('admin') }}/plugins/datatables/css/jquery.datatables_themeroller.css" rel="stylesheet"/>
        <link href="{{ URL::asset('admin') }}/plugins/bootstrap-datepicker/css/datepicker3.css" rel="stylesheet"/>

        <link href="{{ URL::asset('admin') }}/plugins/x-editable/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet">
        <link href="{{ URL::asset('admin') }}/plugins/x-editable/inputs-ext/typeaheadjs/lib/typeahead.js-bootstrap.css" rel="stylesheet">
        <link href="{{ URL::asset('admin') }}/plugins/x-editable/inputs-ext/address/address.css" rel="stylesheet">

        <link href="{{ URL::asset('admin') }}/plugins/dropzone/dropzone.min.css" rel="stylesheet">
        <link href="{{ URL::asset('admin') }}/plugins/plupload/js/jquery.plupload.queue/css/jquery.plupload.queue.css" rel="stylesheet" type="text/css">

        <link href="{{ URL::asset('admin') }}/plugins/nvd3/nv.d3.min.css" rel="stylesheet">

        <!-- Theme Styles -->
        <link href="{{ Url::asset('admin') }}/css/custom.css" rel="stylesheet">
        <link href="{{ Url::asset('admin') }}/css/space.css" rel="stylesheet">
        {{-- <link href="{{ Url::asset('admin') }}/css/space.min.css" rel="stylesheet"> --}}
        {{--  <link href="../../assets/css/custom.css" rel="stylesheet">  --}}

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn t work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <style>
            .row {
                background: url({{ asset("fashe") }}/background/1.jpg) #fff;
            }
        </style>

    </head>

    <body>
        <div class="page-container">
            @yield('content')
        </div>


        <!-- Javascripts -->
        <script src="{{ URL::asset('admin') }}/plugins/jquery/jquery-3.1.0.min.js"></script>
        <script src="{{ URL::asset('admin') }}/plugins/bootstrap/js/bootstrap.min.js"></script>
        <script src="{{ URL::asset('admin') }}/plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
        <script src="{{ URL::asset('admin') }}/plugins/uniform/js/jquery.uniform.standalone.js"></script>
        <script src="{{ URL::asset('admin') }}/plugins/switchery/switchery.min.js"></script>
        <script src="{{ URL::asset('admin') }}/plugins/d3/d3.min.js"></script>
        <script src="{{ URL::asset('admin') }}/plugins/nvd3/nv.d3.min.js"></script>
        <script src="{{ URL::asset('admin') }}/plugins/flot/jquery.flot.min.js"></script>
        <script src="{{ URL::asset('admin') }}/plugins/flot/jquery.flot.time.min.js"></script>
        <script src="{{ URL::asset('admin') }}/plugins/flot/jquery.flot.symbol.min.js"></script>
        <script src="{{ URL::asset('admin') }}/plugins/flot/jquery.flot.resize.min.js"></script>
        <script src="{{ URL::asset('admin') }}/plugins/flot/jquery.flot.tooltip.min.js"></script>
        <script src="{{ URL::asset('admin') }}/plugins/flot/jquery.flot.pie.min.js"></script>
        <script src="{{ URL::asset('admin') }}/plugins/chartjs/chart.min.js"></script>
        <script src="{{ URL::asset('admin') }}/plugins/datatables/js/jquery.datatables.min.js"></script>
        <script src="{{ URL::asset('admin') }}/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>

        {{--  <script src="{{ URL::asset('admin') }}/js/pages/dashboard.js"></script>  --}}

        <script src="{{ URL::asset('admin') }}/plugins/jquery-mockjax-master/jquery.mockjax.js"></script>
        <script src="{{ URL::asset('admin') }}/plugins/moment/moment.js"></script>
        <script src="{{ URL::asset('admin') }}/plugins/x-editable/bootstrap3-editable/js/bootstrap-editable.min.js"></script>
        <script src="{{ URL::asset('admin') }}/plugins/x-editable/inputs-ext/typeaheadjs/lib/typeahead.js"></script>
        <script src="{{ URL::asset('admin') }}/plugins/x-editable/inputs-ext/typeaheadjs/typeaheadjs.js"></script>
        <script src="{{ URL::asset('admin') }}/plugins/x-editable/inputs-ext/address/address.js"></script>
        <script src="{{ URL::asset('admin') }}/js/pages/form-x-editable.js"></script>

        <script src="{{ URL::asset('admin') }}/js/ajax/users.js"></script>
        <script src="{{ URL::asset('admin') }}/js/ajax/products.js"></script>

        <script src="{{ URL::asset('admin') }}/js/pages/table-data.js"></script>
        <script src="{{ URL::asset('admin') }}/js/space.js"></script>

        <script src="{{ URL::asset('admin') }}/plugins/elevatezoom/jquery.elevatezoom-3.0.8.min.js"></script>
        <script src="{{ URL::asset('admin') }}/plugins/elevatezoom/jquery.elevatezoom-3.0.8.min.js"></script>
        <script src="{{ URL::asset('admin') }}/js/pages/form-image-zoom.js"></script>

        <script src="{{ URL::asset('admin') }}/plugins/dropzone/dropzone.js"></script>
        <script src="{{ URL::asset('admin') }}/plugins/plupload/js/plupload.full.min.js"></script>
        <script src="{{ URL::asset('admin') }}/plugins/plupload/js/jquery.plupload.queue/jquery.plupload.queue.min.js"></script>
        <script src="{{ URL::asset('admin') }}/js/pages/form-file-upload.js"></script>


        <script type="application/javascript" src="{{ asset('js') }}/admin_users_server.js"></script>


    </body>
</html>
