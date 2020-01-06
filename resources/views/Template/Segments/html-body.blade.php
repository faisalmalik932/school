@include('Template.Segments.includes.topbar')
<!-- Page container -->
<div class="page-container">

    <!-- Page content -->
    <div class="page-content">

        <!-- Main sidebar -->
        <div class="sidebar sidebar-main sidebar-default sidebar-fixed" style="width: 300px;">
            <div class="sidebar-content" style="width: 300px;">
                @include('Template.Segments.includes.usermenu')
                @include('Template.Segments.includes.navigation')
            </div>
        </div>
        <!-- /main sidebar -->

        <!-- Main content -->
        <div class="content-wrapper">

            <!-- Page header -->
            @include('Template.Segments.includes.header')

            <!-- /page header -->

            <!-- Content Area Start-->
            <div class="content">
                @yield('content')
                @yield('datatable')

                <!-- Footer Start-->
                @include('Template.Segments.includes.footer')
                <!-- Footer End-->
            </div>
            <!-- /Content Area End-->
        </div>
        <!-- /main content -->
    </div>
    <!-- /page content -->
</div>
<!-- /page container -->
