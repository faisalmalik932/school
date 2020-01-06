@extends('Template.master')
@section('menu-head', 'Finance')
@section('title', 'Fee Structure')
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
    <div class="panel-body">
        <div class="tabbable">
            <ul class="nav nav-tabs nav-tabs-bottom bottom-divided nav-justified">
                <li class="active"><a href="#form" data-toggle="tab"><i class="zmdi zmdi-plus mr-20"></i> Create Fee Structure</a></li>
                <li><a href="#list" data-toggle="tab"><i class="zmdi zmdi-view-day mr-20"></i>Fee Structure</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="form">
                    <form method="POST" action="{{ url('/finance/fees/add-fee-structure') }}" id="DATAFORM" class="form-horizontal" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        @include('Template.Components.messages')
                        @if (Session::has('feestructure'))
                        <div class="alert alert-success" id="success-alert">
                            <button type="button" class="close" data-dismiss="alert">x</button>
                            <strong>{{ Session::get('feestructure') }}</strong>
                        </div>
                        @endif
                        <input id="primaryid" name="primary" type="hidden"/>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="content-group-lg">
                                    <label>Branch</label>
                                    <select  id="branch" class="form-control  validate[required] DROPDOWN BRANCH"  name="branch" data-dropdown="BRANCH">
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="content-group-lg">
                                    <label> Class</label>
                                    <select  class="form-control select CLASS" id="classname"  name="classname[]"  multiple="multiple">
                                        <option disabled selected>Select Class</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="content-group-lg">
                                    <label>Fiscal Year</label>
                                    <select  id="fiscalYear" class="form-control  validate[required]"  name="fiscalYear">
                                        <option disabled selected>Select Year</option>
                                        @foreach($fiscalYear as $year)
                                        <option value="{{ $year['year'] }}" >{{ $year['START_DATE'] }} {{ $year['END_DATE'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary ADD" data-toggle="modal" data-target="#modal_form_vertical" style="height: 33px; float: right">Add Categories</button>
                        <input id="tabledata" name="tabledata" type="hidden" value="" />
                        <table class="table" id="datatables">
                            <thead>
                            <tr>
                                <th>Fee Category type</th>
                                <th>Fee Category</th>
                                <th>Fee SubCategory</th>
                                <th>Amount</th>
                                <th>Fee Period</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                        <div class="panel-body">
                            <div class="row position-right" style="text-align: end; margin: 6px">
                                <button type="button" class="btn btn-primary {{__('button.reset-reset')}} {{__('button.reset-tableReset')}}"><i class="{{__('button.reset-icon')}} {{__('button.reset-class')}} "></i>{{__('button.reset-text')}}</button>
                                <button type="button" class="btn btn-primary SAVE"><i class="icon-floppy-disk position-left"></i> Save/Update</button>
                                <button type="button" class="btn btn-danger DELETE"><i class="icon-cross3 position-left"></i> Delete</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div id="modal_form_vertical" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModal" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h5 class="modal-title">Fee Structure</h5>
                            </div>
                            <form action="#" method="GET">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label>Fee Category Type</label>
                                                <select class="form-control FEEHEADER  validate[required] SEED" data-seed="FEE_CATEGORY_TYPE"  id="feeheader"  name="feeheader">
                                                    <option disabled selected>Select Fee Header</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-6">
                                                <label>Fee Category</label>
                                                <select class="form-control FEECATEGORY  validate[required]"  id="feecategory"  name="feecategory">
                                                    <option disabled selected>Select Fee Category</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label>Sub Category</label>
                                                <select class="form-control SUBCATEGORY  validate[required]"  id="feesubcategory"  name="feesubcategory">
                                                </select>
                                            </div>
                                            <div class="col-sm-6">
                                                <label>Amount</label>
                                                <input type="number" id="amount"   name="amount" class="form-control"   placeholder="Amount" >
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label>Fee Period</label>
                                                <select  id="feetype" class="form-control  validate[required] SEED"  name="feetype" data-seed="FEE_PERIOD">
                                                    <option disabled selected value>Select Fee Period</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                                    <button type="button" id="dataform" class="btn btn-primary">Add</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="list">
                    <table id="datatable" class="table" data-code="feestructure"></table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- <div id="modal_form_vertical" class="modal fade" role="dialog" aria-labelledby="myModal" aria-hidden="true">
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
</div> -->
@endsection

@section('jsheader')
<script  type="text/javascript" src="{{ asset('js/fees/feestructure.js') }}">
</script>
@endsection