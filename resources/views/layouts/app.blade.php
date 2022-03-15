<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('admin-assets/images/DBA-logo.png') }}">
    <title>{{ config('app.name', 'JC Admin') }}</title>
    <!-- Bootstrap Core CSS -->

    <link href="{{ asset('admin-assets/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin-assets/bootstrap-extension/css/bootstrap-extension.css') }}" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin-assets/components/datatables/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin-assets/components/bootstrap-switch/bootstrap-switch.min.css') }}" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="{{ asset('admin-assets/components/html5-editor/bootstrap-wysihtml5.css') }}" />

    <link rel="stylesheet" href="{{ asset('admin-assets/bootstrap/dist/css/tagsinput.css') }}" />

    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">


    <!-- Menu CSS -->
    <link href="{{ asset('admin-assets/components/sidebar-nav/dist/sidebar-nav.min.css') }}" rel="stylesheet">
    <!-- animation CSS -->
    <link href="{{ asset('admin-assets/css/animate.css') }}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset('admin-assets/css/style.css') }}" rel="stylesheet">
    <!-- color CSS -->
    <link href="{{ asset('admin-assets/css/colors/blue.css') }}" id="theme" rel="stylesheet">

    <link href="{{ asset('admin-assets/css/custom.css') }}?{{time()}}" rel="stylesheet">

    <!-- DateTime Picker CSS -->
    <link href="{{ asset('admin-assets/css/bootstrap-datetimepicker.css') }}" id="theme" rel="stylesheet">

    <!-- jquery ui for autocomplete -->
    <link href="{{ asset('admin-assets/css/jquery-ui.min.css') }}" rel="stylesheet">

    <!-- BlockUI-->
    <style type="text/css">
        #LoadingImage {background: rgba(255,255,255,0.5); width: 100%; height: 100%; position: fixed; z-index: 99999999;}
        #LoadingImage img { left: 50%; margin-left: -16px; top: 50%; margin-top: -16px; position: absolute;}
    </style>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
    <script type="text/javascript">
        var _token = "{{ csrf_token() }}";
    </script>
    
    <!-- calender js & CSS-->
    <link href="{{ asset('admin-assets/css/styles.css') }}" rel="stylesheet">
</head>

<body>
    <?php
    $login_user = Auth::user();
?>
<!-- Preloader -->
<div class="preloader">
    <div class="cssload-speeding-wheel"></div>
</div>
<div id="LoadingImage" style="display: none;">
    <img src="{{ asset('admin-assets/images/message-loader.gif') }}" />
</div>
<div id="wrapper">
    <!-- Top Navigation -->
    <nav class="navbar navbar-default navbar-static-top m-b-0">
        <div class="navbar-header"> 

            <a class="navbar-toggle hidden-sm hidden-md hidden-lg " href="javascript:void(0)" data-toggle="collapse" data-target=".navbar-collapse"><i class="ti-menu"></i></a>

            <div class="top-left-part">
                <a class="logo" href="{{ route('home') }}">
                    <span class="hidden-xs">
                        {{-- <img src="{{ asset('admin-assets/images/DBA-logo.png') }}" alt="home" width="220" height="60"/> --}}
                    </span>
                </a>
            </div>

            <ul class="nav navbar-top-links navbar-right pull-right">

                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#"> {{-- <img src="{{ asset('images/persona.png') }}" alt="user-img" width="36" class="img-circle"> --}}<b class="hidden-xs">{{ $login_user->name }}</b> </a>
                    <ul class="dropdown-menu dropdown-user animated flipInY">
                        {{-- <li><a href=""><i class="ti-user"></i> My Profile</a></li>
                        <li><a href=""><i class="fa fa-key"></i> Change Password</a></li> --}}
                        <!-- <li role="separator" class="divider"></li> -->
                        <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-power-off"></i> Logout</a></li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>

            </ul>
        </div>
        <!-- /.navbar-header -->
        <!-- /.navbar-top-links -->
        <!-- /.navbar-static-side -->
    </nav>
    <!-- End Top Navigation -->
    <!-- Left navbar-header -->
    <div class="navbar-default sidebar" role="navigation">

        <div class="sidebar-nav navbar-collapse slimscrollsidebar">
            <ul class="nav" id="side-menu">

                <li> <a href="{{route('home')}}" class="waves-effect"><i data-icon="v" class="linea-icon linea-basic fa-fw"></i><span class="hide-menu" >Dashboard</span></a> </li>

                <li> <a href="{{route('blogs')}}" class="waves-effect"><i class="fa fa-file"></i> <span class="hide-menu" >Blogs</span></a> </li>

            </ul>
        </div>
    </div>
    <!-- Left navbar-header end -->
    <!-- Page Content -->
    @yield('content')
    <!-- /#page-wrapper -->
</div>
@yield('modal')
<!-- /#wrapper -->
<!-- jQuery -->
<script src="{{ asset('admin-assets/components/jquery/dist/jquery.min.js') }}"></script>    
<!-- Bootstrap Core JavaScript -->
<script src="{{ asset('admin-assets/bootstrap/dist/js/tether.min.js') }}"></script>
<script src="{{ asset('admin-assets/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('admin-assets/bootstrap-extension/js/bootstrap-extension.min.js') }}"></script>
<!-- Menu Plugin JavaScript -->
<script src="{{ asset('admin-assets/components/sidebar-nav/dist/sidebar-nav.min.js') }}"></script>
<script src="{{ asset('admin-assets/components/bootstrap-switch/bootstrap-switch.min.js') }}"></script>
<!--slimscroll JavaScript -->
<script src="{{ asset('admin-assets/js/jquery.slimscroll.js') }}"></script>
<!--Wave Effects -->
<script src="{{ asset('admin-assets/js/waves.js') }}"></script>

<script src="{{ asset('admin-assets/bootstrap/dist/js/tagsinput.js') }}"></script>
<!-- Include the Quill library -->
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script> 
<!--MultiSelect JavaScript -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script> -->
<!-- Custom Theme JavaScript -->
<script src="{{ asset('admin-assets/js/custom.min.js') }}"></script>

<script src="{{ asset('admin-assets/components/datatables/jquery.dataTables.min.js') }}"></script>
<!-- start - This is for export functionality only -->
<script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>

<script src="{{ asset('admin-assets/components/styleswitcher/jQuery.style.switcher.js') }}"></script>
<script src="{{ asset('admin-assets/components/toast-master/js/jquery.toast.js') }}"></script>

<script src="{{ asset('admin-assets/components/tinymce/tinymce.min.js') }}"></script>

<script src="{{ asset('admin-assets/js/jquery-ui.min.js') }}"></script>
<!-- require js for date-js  -->
<script src="{{ asset('admin-assets/js/require.js') }}"></script>

<!--DateTime Picker Js -->
<script src="{{ asset('admin-assets/js/bootstrap-datetimepicker.min.js') }}"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $("input").attr("autocomplete", "off");
        // $.toast({
        //     heading: 'Welcome to Elite admin',
        //     text: 'Use the predefined ones, or specify a custom position object.',
        //     position: 'top-right',
        //     loaderBg: '#ff6849',
        //     icon: 'info',
        //     hideAfter: 3500,
        //     stack: 6
        // })

        $('#top-clients').change(function(){
            var url = $("#top-clients option:selected").attr('data-url');
            window.location.href=url;
        });

        $('#clients-partner').change(function(){
            var url = $("#clients-partner option:selected").attr('data-url');
            window.location.href=url;
        });


        if ($("#mymce").length > 0) {
            tinymce.init({
                selector: "textarea#mymce",
                theme: "modern",
                height: 300,
                plugins: [
                "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker", "codesample", "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking", "save table contextmenu directionality emoticons template paste textcolor"
                ],
                toolbar: "codesample | insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",
            });
        }
    });

    function showFlash(element, msg, type) {
        if (type == 'error') {
            $(element).html('<p class="alert alert-danger">' + msg + '</p>');
        } else {
            $(element).html('<p class="alert alert-success">' + msg + '</p>');
        }
        setTimeout(function() {
            $(element).empty();
        }, 5000);
    }
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': _token
        }
    });
    

</script>
<!--Style Switcher -->
@yield('js')

<script type="text/javascript">

    $( document ).ajaxComplete(function() {
        if($(".bt-switch").length>0){
            $(".bt-switch").bootstrapSwitch();

        }
    });

    $(document).on('switchChange.bootstrapSwitch','.bt-switch',function(event) {  
            // alert('hi');
            $.ajax({
                url: updateStatusUrl+'/'+$(this).attr('data-id'),
                type: 'GET',
                dataType: 'json',
                success: function(result) {


                }
            });
        });
    </script>
</body>

</html>
