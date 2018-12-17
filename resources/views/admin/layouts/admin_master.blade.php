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

        <link href="{{ URL::asset('admin') }}/plugins/summernote-master/summernote.css" rel="stylesheet" type="text/css"/>
        {{-- <link href="{{ URL::asset('admin') }}/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.css" rel="stylesheet" type="text/css"/> --}}
        <link href="{{ URL::asset('admin') }}/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet" type="text/css"/>
        <link href="{{ URL::asset('admin') }}/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css"/>

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
    </head>

    <body>
        <!-- Page Container -->
        <div class="page-container">

            <!-- Page Sidebar -->
            @include('admin.includes._sidebar')

            <!-- Page Content -->
            <div class="page-content">

                <!-- Page Header -->
                @include("admin.includes.header")


                <!-- Page Inner -->
                <div class="page-inner">
                    {{-- Output Session --}}
                    @include("includes.session")

                    <div class="page-title">
                        <h3 class="breadcrumb-header">{{ $title }}</h3>
                    </div>

                        {{-- // Сонтент страниц --}}
                        @yield('content')


                    <div class="page-footer">
                        <p>Made with <i class="fa fa-heart"></i> by stacks</p>
                    </div>
                </div>
                <!-- /Page Inner -->

                <div class="page-right-sidebar" id="main-right-sidebar">
                    <div class="page-right-sidebar-inner">
                        <div class="right-sidebar-top">
                            <div class="right-sidebar-tabs">
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation" class="active" id="chat-tab"><a href="#chat" aria-controls="chat" role="tab" data-toggle="tab">chat</a></li>
                                    <li role="presentation" id="settings-tab"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">settings</a></li>
                                </ul>
                            </div>
                            <a href="javascript:void(0)" class="right-sidebar-toggle right-sidebar-close" data-sidebar-id="main-right-sidebar"><i class="icon-close"></i></a>
                        </div>

                        <div class="right-sidebar-content">
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="chat">
                                    <div class="chat-list">
                                        <span class="chat-title">Recent</span>
                                        <a href="javascript:void(0);" class="right-sidebar-toggle chat-item unread" data-sidebar-id="chat-right-sidebar">
                                            <div class="user-avatar">
                                                <img src="http://via.placeholder.com/40x40" alt="">
                                            </div>
                                            <div class="chat-info">
                                                <span class="chat-author">David</span>
                                                <span class="chat-text">where u at?</span>
                                                <span class="chat-time">08:50</span>
                                            </div>
                                        </a>

                                        <a href="javascript:void(0);" class="right-sidebar-toggle chat-item unread active-user" data-sidebar-id="chat-right-sidebar">
                                            <div class="user-avatar">
                                                <img src="http://via.placeholder.com/40x40" alt="">
                                            </div>
                                            <div class="chat-info">
                                                <span class="chat-author">Daisy</span>
                                                <span class="chat-text">Daisy sent a photo.</span>
                                                <span class="chat-time">11:34</span>
                                            </div>
                                        </a>
                                    </div>

                                    <div class="chat-list">
                                        <span class="chat-title">Older</span>
                                        <a href="javascript:void(0);" class="right-sidebar-toggle chat-item" data-sidebar-id="chat-right-sidebar">
                                            <div class="user-avatar">
                                                <img src="http://via.placeholder.com/40x40" alt="">
                                            </div>
                                            <div class="chat-info">
                                                <span class="chat-author">Tom</span>
                                                <span class="chat-text">You: ok</span>
                                                <span class="chat-time">2d</span>
                                            </div>
                                        </a>

                                        <a href="javascript:void(0);" class="right-sidebar-toggle chat-item active-user" data-sidebar-id="chat-right-sidebar">
                                            <div class="user-avatar">
                                                <img src="http://via.placeholder.com/40x40" alt="">
                                            </div>
                                            <div class="chat-info">
                                                <span class="chat-author">Anna</span>
                                                <span class="chat-text">asdasdasd</span>
                                                <span class="chat-time">4d</span>
                                            </div>
                                        </a>

                                        <a href="javascript:void(0);" class="right-sidebar-toggle chat-item active-user" data-sidebar-id="chat-right-sidebar">
                                            <div class="user-avatar">
                                                <img src="http://via.placeholder.com/40x40" alt="">
                                            </div>
                                            <div class="chat-info">
                                                <span class="chat-author">Liza</span>
                                                <span class="chat-text">asdasdasd</span>
                                                <span class="chat-time">&nbsp;</span>
                                            </div>
                                        </a>
                                        <a href="javascript:void(0);" class="load-more-messages"  data-toggle="tooltip" data-placement="bottom" title="Load More">&bull;&bull;&bull;</a>
                                    </div>
                                </div>

                                <div role="tabpanel" class="tab-pane" id="settings">
                                    <div class="right-sidebar-settings">
                                        <span class="settings-title">General Settings</span>
                                        <ul class="sidebar-setting-list list-unstyled">
                                            <li>
                                                <span class="settings-option">Notifications</span><input type="checkbox" class="js-switch" checked />
                                            </li>
                                            <li>
                                                <span class="settings-option">Activity log</span><input type="checkbox" class="js-switch" checked />
                                            </li>
                                            <li>
                                                <span class="settings-option">Automatic updates</span><input type="checkbox" class="js-switch" />
                                            </li>
                                            <li>
                                                <span class="settings-option">Allow backups</span><input type="checkbox" class="js-switch" />
                                            </li>
                                        </ul>
                                        <span class="settings-title">Account Settings</span>
                                        <ul class="sidebar-setting-list list-unstyled">
                                            <li>
                                                <span class="settings-option">Chat</span><input type="checkbox" class="js-switch" checked />
                                            </li>
                                            <li>
                                                <span class="settings-option">Incognito mode</span><input type="checkbox" class="js-switch" />
                                            </li>
                                            <li>
                                                <span class="settings-option">Public profile</span><input type="checkbox" class="js-switch" />
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="page-right-sidebar" id="chat-right-sidebar">
                    <div class="page-right-sidebar-inner">
                        <div class="right-sidebar-top">
                            <div class="chat-top-info">
                                <span class="chat-name">Noah</span>
                                <span class="chat-state">2h ago</span>
                            </div>
                            <a href="javascript:void(0)" class="right-sidebar-toggle chat-sidebar-close pull-right" data-sidebar-id="chat-right-sidebar"><i class="icon-keyboard_arrow_right"></i></a>
                        </div>

                        <div class="right-sidebar-content">
                            <div class="right-sidebar-chat slimscroll">
                                <div class="chat-bubbles">
                                <div class="chat-start-date">02/06/2017 5:58PM</div>
                                    <div class="chat-bubble them">
                                        <div class="chat-bubble-img-container">
                                            <img src="http://via.placeholder.com/38x38" alt="">
                                        </div>
                                        <div class="chat-bubble-text-container">
                                            <span class="chat-bubble-text">Hello</span>
                                        </div>
                                    </div>

                                    <div class="chat-bubble me">
                                        <div class="chat-bubble-text-container">
                                            <span class="chat-bubble-text">Hello!</span>
                                        </div>
                                    </div>
                                <div class="chat-start-date">03/06/2017 4:22AM</div>
                                    <div class="chat-bubble me">
                                        <div class="chat-bubble-text-container">
                                            <span class="chat-bubble-text">lorem</span>
                                        </div>
                                    </div>
                                    <div class="chat-bubble them">
                                        <div class="chat-bubble-img-container">
                                            <img src="http://via.placeholder.com/38x38" alt="">
                                        </div>
                                        <div class="chat-bubble-text-container">
                                            <span class="chat-bubble-text">ipsum dolor sit amet</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="chat-write">
                                <form class="form-horizontal" action="javascript:void(0);">
                                    <input type="text" class="form-control" placeholder="Say something">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /Page Content -->
        </div><!-- /Page Container -->


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

         <script src="{{ URL::asset('admin') }}/js/pages/dashboard.js"></script> 
        <script src="{{ URL::asset('admin') }}/plugins/summernote-master/summernote.min.js"></script>
        <script src="{{ URL::asset('admin') }}/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
        <script src="{{ URL::asset('admin') }}/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js"></script>
        <script src="{{ URL::asset('admin') }}/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>

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

        <script src="{{ URL::asset('admin') }}/js/space.min.js"></script>
        <script src="{{ URL::asset('admin') }}/js/pages/form-elements.js"></script>


    </body>
</html>
