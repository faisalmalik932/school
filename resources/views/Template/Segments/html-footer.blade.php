<div class="spin" data-spin />
<script type="text/javascript" src="{{ asset('js/footer-scripts.js') }}"></script>
<div id="modal_form_vertical" class="modal fade" tabindex="-1" role="dialog"
     aria-labelledby="myModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h5 class="modal-title">Change Password</h5>
            </div>
            <form method="get"  action="#" id="password_form"   id="" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-6">
                                <label>Current Password</label>
                                <input class="form-control" type="password" placeholder="Current Password" id="currentpassword" name="old">
                            </div>
                            <div class="col-sm-6">
                                <label>New Password</label>
                                <input class="form-control" type="password" placeholder="New Password" id="newpassword" name="newpassword">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                    <button  class="btn btn-primary" id="change_password">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
</body></html>