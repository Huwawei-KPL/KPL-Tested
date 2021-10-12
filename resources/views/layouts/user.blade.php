<!-- 
=========================================================
 Light Bootstrap Dashboard - v2.0.1
=========================================================

 Product Page: https://www.creative-tim.com/product/light-bootstrap-dashboard
 Copyright 2019 Creative Tim (https://www.creative-tim.com) & Updivision (https://www.updivision.com)
 Licensed under MIT (https://github.com/creativetimofficial/light-bootstrap-dashboard/blob/master/LICENSE)

 Coded by Creative Tim & Updivision

=========================================================

 The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.  -->
<!DOCTYPE html>

<html lang="en">

<meta charset="utf-8" />
<title>{{$title}}</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1" name="viewport" />
<meta content="" name="description" />
<meta content="" name="author" />
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
<link href="{{asset('usermetronic/assets/global/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('usermetronic/assets/global/plugins/simple-line-icons/simple-line-icons.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('usermetronic/assets/global/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('usermetronic/assets/global/plugins/uniform/css/uniform.default.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('usermetronic/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css')}}" rel="stylesheet" type="text/css" />
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL PLUGIN STYLES -->
<link href="{{asset('light-bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />
<link href="{{asset('usermetronic/assets/global/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('usermetronic/assets/global/plugins/fullcalendar/fullcalendar.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('usermetronic/assets/global/plugins/jqvmap/jqvmap/jqvmap.css')}}" rel="stylesheet" type="text/css" />
<!-- END PAGE LEVEL PLUGIN STYLES -->
<!-- BEGIN PAGE STYLES -->
<link href="{{asset('usermetronic/assets/admin/pages/css/tasks.css')}}" rel="stylesheet" type="text/css" />

<link rel="stylesheet" type="text/css" href="{{asset('usermetronic/assets/global/plugins/clockface/css/clockface.css')}} " />
<link rel=" stylesheet" type="text/css" href="{{asset('usermetronic/assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')}}" />
<link rel=" stylesheet" type="text/css" href="{{asset('usermetronic/assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css')}} " />
<link rel=" stylesheet" type="text/css" href="{{asset('usermetronic/assets/global/plugins/bootstrap-colorpicker/css/colorpicker.css')}} " />
<link rel=" stylesheet" type="text/css" href="{{asset('usermetronic/assets/global/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css')}}" />
<link rel=" stylesheet" type="text/css" href="{{asset('usermetronic/assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css')}} " />
<!-- END PAGE STYLES -->
<!-- BEGIN THEME STYLES -->
<link href=" {{asset('usermetronic/assets/global/css/components.css')}}" id="style_components" rel="stylesheet" type="text/css" />
<link href="{{asset('usermetronic/assets/global/css/plugins.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('usermetronic/assets/admin/layout/css/layout.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('usermetronic/assets/admin/layout/css/themes/darkblue.css')}}" rel="stylesheet" type="text/css" id="style_color" />
<link href="{{asset('usermetronic/assets/admin/layout/css/custom.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('usermetronic/assets/global/plugins/icheck/skins/all.css')}}" rel="stylesheet" type="text/css" />
<!-- END THEME STYLES -->

<link rel="stylesheet" type="text/css" href="{{asset('usermetronic/assets/global/plugins/bootstrap-select/bootstrap-select.min.css')}}" />
<link rel="stylesheet" type="text/css" href="{{asset('usermetronic/assets/global/plugins/select2/select2.css')}}" />
<link rel="stylesheet" type="text/css" href="{{asset('usermetronic/assets/global/plugins/jquery-multi-select/css/multi-select.css')}}" />
<link rel="shortcut icon" href="favicon.ico" />
<style>
    .popover {
        max-width: 400px;
    }

    .popover-title {
        font-size: 14px;
    }

    /* Popover Body */
    .popover-content {
        font-size: 13px;
    }

    .btn-primary-outline {
        background-color: transparent;

    }
</style>
</head>

<body class=" @yield('classbody')">






    @include('layouts.navbars.usersidebar')
    @yield('content')
    @include('layouts.footer.user')








    <script src="{{asset('usermetronic/assets/global/plugins/jquery-ui/jquery-ui.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('usermetronic/assets/global/plugins/jquery.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('usermetronic/assets/global/plugins/jquery-migrate.min.js')}}" type="text/javascript"></script>
    <!-- IMPORTANT! Load jquery-ui.min.js')}} before bootstrap.min.js')}} to fix bootstrap tooltip conflict with jquery ui tooltip -->
    <script src="{{asset('usermetronic/assets/global/plugins/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('usermetronic/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('usermetronic/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('usermetronic/assets/global/plugins/jquery.blockui.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('usermetronic/assets/global/plugins/jquery.cokie.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('usermetronic/assets/global/plugins/uniform/jquery.uniform.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('usermetronic/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}" type="text/javascript"></script>
    <!-- END CORE PLUGINS -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script src="{{asset('usermetronic/assets/global/plugins/jqvmap/jqvmap/jquery.vmap.js')}}" type="text/javascript"></script>
    <script src="{{asset('usermetronic/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.russia.js')}}" type="text/javascript"></script>
    <script src="{{asset('usermetronic/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.world.js')}}" type="text/javascript"></script>
    <script src="{{asset('usermetronic/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.europe.js')}}" type="text/javascript"></script>
    <script src="{{asset('usermetronic/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.germany.js')}}" type="text/javascript"></script>
    <script src="{{asset('usermetronic/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.usa.js')}}" type="text/javascript"></script>
    <script src="{{asset('usermetronic/assets/global/plugins/jqvmap/jqvmap/data/jquery.vmap.sampledata.js')}}" type="text/javascript"></script>
    <script src="{{asset('usermetronic/assets/global/plugins/flot/jquery.flot.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('usermetronic/assets/global/plugins/flot/jquery.flot.resize.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('usermetronic/assets/global/plugins/flot/jquery.flot.categories.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('usermetronic/assets/global/plugins/jquery.pulsate.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('usermetronic/assets/global/plugins/bootstrap-daterangepicker/moment.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('usermetronic/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.js')}}" type="text/javascript"></script>
    <!-- IMPORTANT! fullcalendar depends on jquery-ui.min.js')}} for drag & drop support -->
    <script src="{{asset('usermetronic/assets/global/plugins/fullcalendar/fullcalendar.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('usermetronic/assets/global/plugins/jquery-easypiechart/jquery.easypiechart.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('usermetronic/assets/global/plugins/jquery.sparkline.min.js')}}" type="text/javascript"></script>
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="{{asset('usermetronic/assets/global/scripts/metronic.js')}}" type="text/javascript"></script>
    <script src="{{asset('usermetronic/assets/admin/layout/scripts/layout.js')}}" type="text/javascript"></script>
    <script src="{{asset('usermetronic/assets/admin/layout/scripts/quick-sidebar.js')}}" type="text/javascript"></script>
    <script src="{{asset('usermetronic/assets/admin/layout/scripts/demo.js')}}" type="text/javascript"></script>
    <script src="{{asset('usermetronic/assets/admin/pages/scripts/index.js')}}" type="text/javascript"></script>
    <script src="{{asset('usermetronic/assets/admin/pages/scripts/tasks.js')}}" type="text/javascript"></script>
    <script src="{{asset('usermetronic/assets/global/plugins/icheck/icheck.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('usermetronic/assets/global/plugins/bootstrap-confirmation/bootstrap-confirmation.min.js')}}" type="text/javascript"></script>
    <script type="text/javascript" src="{{asset('usermetronic/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('usermetronic/assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('usermetronic/assets/global/plugins/clockface/js/clockface.js')}}"></script>
    <script type="text/javascript" src="{{asset('usermetronic/assets/global/plugins/bootstrap-daterangepicker/moment.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('usermetronic/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
    <script type="text/javascript" src="{{asset('usermetronic/assets/global/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js')}}"></script>
    <script type="text/javascript" src="{{asset('usermetronic/assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js')}}"></script>
    <!-- END PAGE LEVEL SCRIPTS -->

    <!-- BEGIN PAGE LEVEL SCRIPTS -->


    <script src="{{asset('usermetronic/assets/admin/layout/scripts/quick-sidebar.js')}}" type="text/javascript"></script>

    <script src="{{asset('usermetronic/assets/admin/pages/scripts/components-dropdowns.js')}}"></script>
    <!-- END PAGE LEVEL SCRIPTS -->
    <script>
        jQuery(document).ready(function() {

            $('#filterroom').change(function() {
                var gedung = $(this).val();
                $("#filterroomform").attr('action', '/daftarruangan/' + gedung);
                document.getElementById('filterroomform').submit();


            });
            $('.popover-dismiss').popover({
                trigger: 'focus'
            })

            $('[data-toggle="popover"]').popover({
                container: 'body'
            });
            $('.showfoto').hide();
            $('#showMakanan').hide();
            $('#showMinuman').hide();
            $('.total').hide();
            $(".pesankonsumsi").change(function() {
                if ($('.pesankonsumsi').val() == 'ya') {

                    $('#showMakanan').show('fast', 'linear');
                    $('#showMinuman').show('fast', 'linear');
                    $('.total').show('fast', 'linear');

                } else {
                    $('#showMakanan').hide('fast', 'linear');
                    $('#showMinuman').hide('fast', 'linear');
                    $('.total').hide('fast', 'linear');
                }
            });

            $(".pesenan").on("input", function() {
                var sum = 0.0;
                $(".pesenan").each(function() {
                    var jumlah = $(this).val();
                    var harga = $(this).attr('id');
                    var total = harga * jumlah;
                    sum += total;

                });

                $("#total").val(sum);


            })
            $('.modalkonsumsi').click(function() {
                var harga = $(this).attr('data-harga');
                var h = 'Rp. ' + number_format(harga, 0, 0, ',');
                var pesanan = $(this).attr('data-pesanan');
                var idruang = $(this).attr('data-idruang');
                var tanggal = $(this).attr('data-tanggal');
                var waktu = $(this).attr('data-waktu');
                var jadwal = $(this).attr('data-jadwal');

                $('#hargakonsumsi').html(h);
                $('#pesanankonsumsi').html(pesanan);
                $('#ubahkonsumsi').attr('href', '/ubahpesanankonsumsi/' + idruang + '/' + tanggal + '/' + waktu + '/' + jadwal);


            });


            $('.batal-pinjam').click(function() {
                var id = $(this).attr('data-id');


                $("#batalkan-form").attr('action', '/batalpinjam/' + id);



            });



            Metronic.init(); // init metronic core componets
            Layout.init(); // init layout
            QuickSidebar.init(); // init quick sidebar
            Demo.init(); // init demo features
            Index.init();
            Index.initDashboardDaterange();
            Index.initJQVMAP(); // init index page's custom scripts
            Index.initCalendar(); // init index page's custom scripts
            Index.initCharts(); // init index page's custom scripts
            Index.initChat();
            Index.initMiniCharts();
            Tasks.initDashboardWidget();
        });
    </script>
    <!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->

</html>