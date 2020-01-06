@include('Template.session')
<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf_token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" type="image/png" href="{{ asset('images/favicon.ico') }}"/>

    <title>@yield('title') - Presbyterian Education Board</title>

    <!-- Global stylesheets -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" >
    <link rel="stylesheet" type="text/css" href="{{ asset('css/icons/icomoon/styles.css') }}" >
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/core.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/components.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/colors.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/plugins/confirmation/jquery-confirm.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/validationEngine.jquery.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/jquery-ui.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/jquery-ui.theme.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/common.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/buttons.datatables.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/datatable.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap-dropselect.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/common.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/datepicker.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('bootstrap-datepicker/dist/css/bootstrap-datepicker.css') }}">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/select/1.2.3/css/select.datatables.min.css">
    <link rel="stylesheet" type="text/css" href="https://editor.datatables.net/extensions/Editor/css/editor.datatables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs/jszip-2.5.0/pdfmake-0.1.18/dt-1.10.12/af-2.1.2/b-1.2.2/b-colvis-1.2.2/b-flash-1.2.2/b-html5-1.2.2/b-print-1.2.2/cr-1.3.2/fc-3.2.2/fh-3.1.2/kt-2.1.3/r-2.1.0/rr-1.1.2/sc-1.4.2/se-1.2.0/datatables.min.css"/>
    <!-- /global stylesheets -->

    @yield('cssheader')

    <!-- Core JS files -->
    <script type="text/javascript" src="{{ asset('js/plugins/loaders/pace.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/core/libraries/jquery-1.12.4.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/core/libraries/jquery-ui.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/core/libraries/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/plugins/loaders/blockui.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.validate.js') }}"></script>
    <script src="{{'https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js'}}"></script>
    <script src="{{'https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js'}}"></script>
    <!-- /core JS files -->

    <!-- Theme JS files -->
    <script type="text/javascript" src="{{ asset('js/plugins/visualization/d3/d3.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/plugins/visualization/d3/d3_tooltip.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/plugins/forms/styling/switchery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/plugins/forms/styling/uniform.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/plugins/forms/selects/bootstrap_multiselect.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/plugins/ui/moment/moment.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/plugins/pickers/daterangepicker.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/plugins/ui/nicescroll.min.js') }}"></script>

    <script type="text/javascript" src="{{ asset('js/core/libraries/jquery_ui/interactions.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/plugins/forms/selects/select2.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/plugins/ui/ripple.min.js') }}"></script>

    <script type="text/javascript" src="{{ asset('js/plugins/confirmation/jquery-confirm.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-Validation-Engine/2.6.2/languages/jquery.validationEngine-en.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-Validation-Engine/2.6.2/jquery.validationEngine.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.1.62/jquery.inputmask.bundle.js"></script>

    <script type="text/javascript" src="{{ asset('js/datatable/datatables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/datatable/datatables.buttons.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/datatable/datatables.select.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/datatable/datatables.editor.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/datatables.js') }}"></script>

    <script type="text/javascript" src="{{ asset('js/core/app.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/pages/layout_fixed_custom.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/saveupdate.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/delete.js') }}"></script>

    <script type="text/javascript" src="{{ asset('js/pages/form_multiselect.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/pages/form_select2.js') }}"></script>
   <script type="text/javascript" src="{{ asset('/js/pages/components_modals.js')}}"></script>
    <script type="text/javascript" src="{{asset('/js/plugins/pickers/pickadate/picker.js')}}"></script>
    <script type="text/javascript" src="{{asset('/js/plugins/pickers/pickadate/picker.date.js')}}"></script>
    <script type="text/javascript" src="{{asset('/js/plugins/pickers/pickadate/picker.time.js')}}"></script>
    <script type="text/javascript" src="{{asset('/js/plugins/pickers/pickadate/legacy.js')}}"></script>
    <script type="text/javascript" src="{{asset('/js/plugins/buttons.flash.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('/js/plugins/buttons.html5.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('/js/plugins/buttons.print.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('/js/plugins/jszip.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('/js/plugins/pdfmake.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('/js/plugins/vfs_fonts.js')}}"></script>
    <script type="text/javascript" src="{{asset('/js/pages/picker_date.js')}}"></script>
    <script type="text/javascript" src="{{asset('/js/plugins/forms/validation/validate.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('/js/pages/login_validation.js')}}"></script>
    <!-- <script type="text/javascript" src="{{asset('/js/sum().js')}}"></script> -->
    <script type="text/javascript" src="{{asset('/js/pages/picker_date.js')}}"></script>
    <script type="text/javascript" src="{{asset('/js/plugins/pickers/anytime.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('/js/bootstrap-datepicker.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
    <script type="text/javascript" src="{{asset('js/plugins/uploaders/fileinput/plugins/purify.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/plugins/uploaders/fileinput/plugins/sortable.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/plugins/uploaders/fileinput/fileinput.min.js')}}"></script>
    <script type="text/javascript" src="{{asset ('js/pages/uploader_bootstrap.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/plugins/tables/datatables/datatables.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/plugins/tables/datatables/extensions/responsive.min.js')}}"></script>
    <!-- <script type="text/javascript" src="{{asset('js/plugins/tables/datatables/datatables.cellEdit.js')}}"></script>
 -->
    <script type="text/javascript" src="{{asset('bootstrap-datepicker/dist/js/bootstrap-datepicker.js')}}"></script>
    <script type="text/javascript" src="{{ asset('js/common.js') }}"></script>
    <script type="text/javascript" src="{{asset('js/pages/datatables_responsive.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/moment.js')}}"></script>
    
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs/jszip-2.5.0/pdfmake-0.1.18/dt-1.10.12/af-2.1.2/b-1.2.2/b-colvis-1.2.2/b-flash-1.2.2/b-html5-1.2.2/b-print-1.2.2/cr-1.3.2/fc-3.2.2/fh-3.1.2/kt-2.1.3/r-2.1.0/rr-1.1.2/sc-1.4.2/se-1.2.0/datatables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/plug-ins/1.10.16/api/sum().js"></script>
    <!-- /theme JS files -->
    
    @yield('jsheader')
</head>
<body class="navbar-top">
