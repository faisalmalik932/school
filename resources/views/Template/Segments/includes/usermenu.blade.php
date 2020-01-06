<!-- User menu -->
<div class="sidebar-user-material">
    <div class="category-content">
        <div class="sidebar-user-material-content">
            <h6>Good Day {{ request()->session()->get('EMPLOYEE_NAME') }}!</h6>
            <span class="text-size-small">Username: {{ request()->session()->get('USERNAME') }}</span>
        </div>

        <div class="sidebar-user-material-menu">
            <a href="#user-nav" data-toggle="collapse"><span>My account</span> <i class="caret"></i></a>
        </div>
    </div>
    <div class="navigation-wrapper collapse" id="user-nav">
        <ul class="navigation">
            <li><a  data-toggle="modal" data-target="#modal_form_vertical"><i class="icon-cog5"></i> <span>Change Password</span></a></li>
            <li><a href="{{ url('logoff') }}"><i class="icon-switch2"></i> <span>Logout</span></a></li>
        </ul>
    </div>
</div>
<!-- /user menu -->
