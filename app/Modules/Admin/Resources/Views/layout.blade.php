<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Avinesh Shakya | CMS </title>

    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet"
          type="text/css">
    <link href="{{asset('admin-assets/global_assets/css/icons/icomoon/styles.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('admin-assets/global_assets/css/icons/fontawesome/styles.min.css')}}" rel="stylesheet" type="text/css">

    <link href=" {{asset('admin-assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <link href=" {{asset('admin-assets/css/bootstrap_limitless.min.css')}}" rel="stylesheet" type="text/css">
    <link href=" {{asset('admin-assets/css/layout.min.css')}}" rel="stylesheet" type="text/css">
    <link href=" {{asset('admin-assets/css/components.min.css')}}" rel="stylesheet" type="text/css">
    <link href=" {{asset('admin-assets/css/colors.min.css')}}" rel="stylesheet" type="text/css">
    <link href=" {{asset('admin-assets/css/custom-admin.css')}}" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->

    <link href="{{asset('lib/fancybox/source/jquery.fancybox.css')}}" rel="stylesheet" type="text/css">
    <!--HighSlide-->
    <link href="{{ asset('lib/highslide/highslide.css')}}" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->
    <link href="{{asset('admin-assets/css/pretty-checkbox.min.css')}}" rel="stylesheet" type="text/css">
    <!-- Core JS files -->
    {{--nepali date picker--}}
    <link href="{{asset('admin-assets/nepali-datepicker/nepali-date-picker.css')}}" rel="stylesheet" type="text/css">


    <script src="{{asset('admin-assets/global_assets/js/main/jquery.min.js')}}"></script>
    <script src="{{asset('admin-assets/js/jquery-sortable.js')}}"></script>
    <script src="{{asset('admin-assets/global_assets/js/main/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('admin-assets/global_assets/js/plugins/loaders/blockui.min.js')}}"></script>
    <!-- /core JS files -->


    <!-- /theme JS files -->

</head>

<body>

<!-- Main navbar -->
@include('admin::includes.sidebar_setting')
<!-- /main navbar -->


<!-- Page content -->
<div class="page-content">

    <!-- Main sidebar -->
@include('admin::includes.sidebar_menu')
<!-- /main sidebar -->


    <!-- Main content -->
    <div class="content-wrapper">

        <!-- Page header -->
    @include('admin::includes.header')
    <!-- /page header -->


        <!-- Content area -->
        <!-- Content area -->
        <div class="content">

            @yield('content')

        </div>
        <!-- /content area -->


        <!-- Footer -->
        <div class="navbar navbar-expand-lg navbar-light">
            <div class="text-center d-lg-none w-100">
                <button type="button" class="navbar-toggler dropdown-toggle" data-toggle="collapse"
                        data-target="#navbar-footer">
                    <i class="icon-unfold mr-2"></i>
                    Footer
                </button>
            </div>

            <div class="navbar-collapse collapse" id="navbar-footer">
					<span class="navbar-text">
						&copy; 2022. by <a
                                href="#" target="_blank">Avinesh Shakya</a>
					</span>
            </div>
        </div>
        <!-- /footer -->

    </div>
    <!-- /main content -->

</div>
<!-- /page content -->
<!-- Theme JS files -->
<script src="{{asset('admin-assets/global_assets/js/plugins/visualization/d3/d3.min.js')}}"></script>
<script src="{{asset('admin-assets/global_assets/js/plugins/visualization/d3/d3_tooltip.js')}}"></script>

<script src="{{asset('admin-assets/global_assets/js/plugins/forms/selects/bootstrap_multiselect.js')}}"></script>
<script src="{{asset('admin-assets/global_assets/js/plugins/ui/moment/moment.min.js')}}"></script>
<script src="{{asset('admin-assets/global_assets/js/plugins/pickers/daterangepicker.js')}}"></script>
<script src="{{asset('admin-assets/global_assets/js/plugins/forms/styling/uniform.min.js')}}"></script>

<script src="{{asset('admin-assets/global_assets/js/demo_pages/dashboard.js')}}"></script>

<script src="{{asset('admin-assets/js/app.js')}}"></script>
<script src="{{asset('admin-assets/global_assets/js/demo_pages/form_checkboxes_radios.js ')}}"></script>


<script src="{{asset('lib/fancybox/source/jquery.fancybox.js')}}"></script>
<script src="{{ asset('lib/highslide/highslide.js')}}"></script>
<script src="{{ asset('lib/highslide/highslide-with-gallery.min.js')}}"></script>
<script type="text/javascript">
    // override Highslide settings here
    // instead of editing the highslide.js file
    hs.graphicsDir = '/lib/highslide/graphics/';
</script>


<script src="{{asset('admin-assets/nepali-datepicker/nepali-date-picker.js')}}"></script>
<script type="text/javascript" src="{{asset('admin-assets/global_assets/js/plugins/notifications/sweet_alert.min.js')}}"></script>
<!--custom admin js -->

<script type="text/javascript" src="{{asset('admin-assets/js/check-all.js')}}"></script>
<script src="{{asset('admin-assets/global_assets/js/plugins/forms/selects/select2.min.js')}}"></script>
<script src="{{asset('admin-assets/global_assets/js/demo_pages/form_select2.js')}}"></script>
<script src="{{asset('admin-assets/global_assets/js/demo_pages/components_collapsible.js')}}"></script>

<script src="{{asset('admin-assets/global_assets/js/plugins/forms/inputs/duallistbox.min.js')}}"></script>


<script src="{{asset('admin-assets/global_assets/js/demo_pages/form_dual_listboxes.js')}}"></script>
<script src="{{asset('admin-assets/global_assets/js/plugins/tables/datatables/datatables.min.js')}}"></script>
<script src="{{asset('admin-assets/global_assets/js/demo_pages/datatables_basic.js')}}"></script>

{{--@yield('page_wise_scripts')--}}

<script type="text/javascript" src="{{asset('admin-assets/js/custom.js')}}"></script>

<script type="text/javascript" src="{{asset('lib/tinymce/tinymce.min.js')}}"></script>
<script type="text/javascript" src="{{asset('admin-assets/js/tinymce-init.js')}}"></script>
<script>
    /* $(document).ready(function() {
        $("#tbl-sort").sortable({
            group: 'nested',
            update: function( event, ui ) {
                updateOrder();
            }
        });
    } );

    function updateOrder() {
        var item_order = new Array();
        $('ul#tbl-sort li').each(function() {
            item_order.push($(this).attr("id"));
        });
        var order_string =item_order;
        $.ajax({
            type: "POST",
            url: "route('banner.ajax.sort')",

            data: {
                "_token": "  csrf_token()  ",
                "order_string": order_string
            },
            cache: false,
            success: function(data){
            }
        });
    } *?
</script>
@yield('scripts')

</body>
</html>
