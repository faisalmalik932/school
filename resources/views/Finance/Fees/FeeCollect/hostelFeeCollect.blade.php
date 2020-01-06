@extends('Template.master')
@section('menu-head', 'Finance')
@section('title', 'Collect Hostel Fee')
@section('content')
<div class="panel panel-flat">
    <div class="panel-heading">
        <h5 class="panel-title">@yield('title')</h5>
        <div class="heading-elements">
            <ul class="icons-list">
                <li><a data-action="reload"></a></li>
            </ul>
        </div>
    </div>
    <div class="panel-body">
        <div class="tabbable">
            <ul class="nav nav-tabs nav-tabs-bottom bottom-divided nav-justified">
                <li><a  href="#list" data-toggle="tab">Collect Hostel Fee</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane" id="list">
                    <table class="table" id="datatables">
                        <thead>
                        <tr>
                            <th><input name="select_all" value="1" type="checkbox"></th>
                            <th>ID</th>
                            <th>Challan No</th>
                            <th>Fee Status</th>
                            <th>Details</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                    <form method="POST"  action="{{ url('finance/fees/collect-hostel-fee') }}"  name="myForm" id="DATAFORM" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input id="primaryid" name="primary[]" type="hidden"/>
                        <div class="panel-body">
                            <div class="row position-right" style="text-align: end; margin: 6px">
                                <button type="button" id="button" class="btn btn-primary SAVE"><i class="icon-floppy-disk position-left"></i> Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="modal_form_vertical" class="modal fade" role="dialog" aria-labelledby="myModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h5 class="modal-title">Fee Structure</h5>
            </div>
            <form action="#" method="GET">
                <div class="modal-body DATA">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row STRUCTURE" >
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection

@section('jsheader')
<script type="text/javascript" src="{{ asset('js/fees/hostelfeecollect.js') }}">
</script>
@endsection