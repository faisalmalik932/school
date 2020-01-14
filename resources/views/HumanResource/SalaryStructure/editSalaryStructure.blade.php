@extends('Template.master')
@section('menu-head', 'HRM')
@section('title', 'Edit Salary Structure')
@section('content')
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title">@yield('title')</h5>
            <div class="heading-elements">
                <ul class="icons-list">
                    <li><a data-action="reload" title="Reset Form"></a></li>
                </ul>
            </div>
        </div>
        <?php
        $input = array($salaryStrucure);
        $new = $salaryStrucure[0];
        $salaryStrucure_id = $new->PAYSLIP_STRUCURE_ID;
        $branch = $new->BRANCH_NAME;
        $department = $new->DEPARTMENT_NAME;
        $title = $new->TITLE_NAME;
        $employee = $new->FULL_NAME;
        $id = $new->EMPLOYEE_ID;
        ?>
        <div class="panel-body">
            <div class="tabbable">
                <div class="tab-content">
                    <div class="tab-pane active" id="form">
                        <form method="POST" action="{{ url('/hr/settings/editsalarystructure') }}" id="DATAFORM" class="form-horizontal">
                            {{ csrf_field() }}
                            @include('Template.Components.messages')
                            @if (Session::has('salary'))
                                <div class="alert alert-success" id="success-alert">
                                    <button type="button" class="close" data-dismiss="alert">x</button>
                                    <strong>{{ Session::get('salary') }}</strong>
                                </div>
                            @endif
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="content-group-lg">
                                                <label>Fiscal Year</label>
                                                <input type="text" class="form-control" value="2018" name="FISCAL_YEAR" id="" placeholder="" readonly/>
                                                <input type="hidden" class="form-control" value="{{$salaryStrucure_id}}" name="STRUCTURE_ID" id="" placeholder="" readonly/>
                                            </div>
                                            <div class="content-group-lg">
                                                <label>Branch</label>
                                                <input type="text" class="form-control" value="{{$branch}}" name="BRANCH_NAME" id="" placeholder="" readonly/>
                                            </div>
                                            <div class="content-group-lg">
                                                <label>Department Name</label>
                                                <input type="text" class="form-control" value="{{$department}}" name="DEPARTMENT_NAME" id="" placeholder="" readonly/>
                                            </div>
                                            <div class="content-group-lg">
                                                <label>Title Name</label>
                                                <input type="text" class="form-control" value="{{$title}}" name="TITLE_NAME" id="" placeholder="" readonly/>
                                            </div>
                                            <div class="content-group-lg">
                                                <label>Employee Name</label>
                                                <input type="text" class="form-control" value="{{$employee}}" name="EMPLOYEE_NAME" id="" placeholder="" readonly/>
                                            </div>
                                            <input type="hidden" name="id" value="{{$id}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    @foreach($salaryStrucure  as $structure)
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="content-group-lg">
                                                    <label> Type</label>
                                                    <input type="hidden" class="form-control" value="{{$structure->SALARY_CATEGORY_ID}}" name="categories[]"/>
                                                    <input type="text" class="form-control" value="{{$structure->CATEGORY_NAME}}" disabled="disabled"/>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="content-group-lg">
                                                    <label>Amount</label>
                                                    <input type="text" class="form-control AMOUNT" value="{{$structure->AMOUNT}}" name="amount[]" placeholder="Amount"/>
                                                </div>
                                            </div>
                                            <input type="hidden" name="paySlip[]" value="{{$structure->PAYSLIP_STRUCURE_ID}}">
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="panel-body">
                                <div class="row position-right" style="text-align: end; margin: 6px">
                                    <button type="button" class="btn btn-primary SAVE"><i class="icon-floppy-disk position-left"></i>Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('jsheader')
    <script type="text/javascript" src="{{ asset('assets/js/Fees/editChallan.js') }}">
    </script>
@endsection