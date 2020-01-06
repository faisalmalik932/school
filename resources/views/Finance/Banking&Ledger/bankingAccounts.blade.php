@extends('Template.master')
@section('menu-head', 'Finance')
@section('title', 'Banking Accounts')
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
                <li class="active"><a href="#form" data-toggle="tab">Add Bank Accounts</a></li>
                <li><a href="#list" data-toggle="tab">Bank Accounts</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="form">
                    <form method="POST" action="{{ url('/finance/bank-accounts/add-bank-account') }}" id="DATAFORM" class="form-horizontal" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        @include('Template.Components.messages')
                        @if (Session::has('bankaccount'))
                        <div class="alert alert-success" id="success-alert">
                            <button type="button" class="close" data-dismiss="alert">x</button>
                            <strong>{{ Session::get('bankaccount') }}</strong>
                        </div>
                        @endif
                        <input id="primaryid" name="primary" type="hidden"/>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="content-group-lg">
                                    <label>Bank Account Title</label>
                                    <input type="text" id="accounttitle" class="form-control  validate[required]" maxlength="50"  name="accounttitle" placeholder="Bank Account Title" >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="content-group-lg">
                                    <label>Bank Account Number</label>
                                    <input type="text" id="accountnumber"  class="form-control  validate[required]" maxlength="50"  name="accountnumber" placeholder="Bank Account Number" >
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="content-group-l">
                                    <label>Bank Name</label>
                                    <input type="text" id="bankname"  name="bankname" class="form-control"   placeholder="Bank Name"/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="content-group-lg">
                                    <label>Bank Address</label>
                                    <input type="text" id="bankaddress"   name="bankaddress" class="form-control"   placeholder="Bank Address" >
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="content-group-lg">
                                    <label>Account Type</label>
                                    <select  id="accounttype" class="form-control  validate[required]"   name="accounttype">
                                        <option>Saving Account</option>
                                        <option>Chequing Account</option>
                                        <option>Credit Account</option>
                                        <option>Cash Account</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="content-group-lg">
                                    <label>Bank Account Currency</label>
                                    <select  id="accountcurrency" class="form-control"  name="accountcurrency">
                                        <option disabled selected>Select Currency</option>
                                        <option>PKR</option>

                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="content-group-lg">
                                    <label>Bank Account GL Code</label>
                                    <select  id="accountcode" class="form-control select-clear ACCOUNT"  name="accountcode">
                                        <option disabled selected>Select Account</option>
                                        <option>{!! $accountheads !!}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="content-group-lg">
                                    <label>Bank Charges Account</label>
                                    <select  id="chargesaccount"   name="chargesaccount" class="form-control select-clear ACCOUNT">
                                        <option disabled selected>Select Account</option>
                                        <option>{!! $accountheads !!}</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="row position-right" style="text-align: end; margin: 6px">
                                <button type="button" class="btn btn-primary {{__('button.reset-reset')}}"><i class="{{__('button.reset-icon')}} {{__('button.reset-class')}} "></i>{{__('button.reset-text')}}</button>
                                <button type="button" class="btn btn-primary SAVE"><i class="icon-floppy-disk position-left"></i> Save/Update</button>
                                <button type="button" class="btn btn-danger DELETE"><i class="icon-cross3 position-left"></i> Delete</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="tab-pane" id="list">
                    <table id="datatable" class="table" data-code="bankaccount"></table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('jsheader')
<script  type="text/javascript" src="{{ asset('js/finance/bankAccount.js') }}">
</script>
@endsection