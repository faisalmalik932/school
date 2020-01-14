@extends('Template.master')
@section('menu-head', 'Platform')
@section('title', 'Purchase Item')
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
            <ul class="nav nav-tabs nav-justified nav-tabs-bottom bottom-divided">
                <li class="active"><a href="#form" data-toggle="tab">Purchase Item</a></li>
                <li><a href="#list" data-toggle="tab">Purchase Orders</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="form">
                    <form method="POST" action="{{ url('finance/purchase/add-purchase-order') }}" name="myForm" id="DATAFORM" enctype="multipart/form-data">
                        <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">
                        @include('Template.Components.messages')
                        <input id="primaryid" name="primary" type="hidden"/>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>PO Number</label>
                                    <input id="ponumber" name="ponumber" value="{{$ponumber}}" class="form-control validate[required]" placeholder="PO Number">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Supplier</label>
                                    <select id="supplier" name="supplier" class="form-control validate[required]" >
                                        <option disabled selected>Select Supplier</option>
                                        @foreach($supplier as $suppliers)
                                        <option value="{{$suppliers->SUPPLIER_ID}}">{{$suppliers->SUPPLIER_NAME}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Current Credit</label>
                                    <input id="credit" name="suppliercredit" class="form-control" placeholder="Current Credit"/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Supplier Currency</label>
                                    <select id="currency" name="currency" class="form-control">
                                        <option disabled selected>Select Currency</option>
                                        @foreach($currency as $currencies)
                                        <option >{{$currencies->CURRENCY_NAME}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Supplier Reference</label>
                                    <input id="supplierreference" name="supplierreference" class="form-control" placeholder="Supplier Reference"/>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Order Date</label>
                                    <input type="date" id="orderdate" name="orderdate" class="form-control validate[required]" placeholder="Order Date"/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Deliver to</label>
                                    <input id="deliveryperson" name="deliveryperson" class="form-control" placeholder="Deliver To"/>
                                </div>
                            </div>
                        </div>
                        <div>
                            <button type="button" class="btn btn-primary ADD" data-toggle="modal" data-target="#modal_form_vertical" style="height: 33px; float: right">Add Items</button>
                        </div>
                        <input id="tabledata" name="tabledata" type="hidden" value="" />
                        <table class="table" id="datatables">
                            <thead>
                            <tr>
                                <th>Items Description</th>
                                <th>Quantity</th>
                                <th>Required Delivery Date</th>
                                <th>Price</th>
                                <th>Total</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                        <div class="panel-body">
                             <div class="row position-right" style="text-align: end; margin: 6px">
                                 <button type="button" class="btn btn-primary SAVE"><i class="icon-cross3 position-left"></i> Place Order</button>
                             </div>
                         </div>
                    </form>
                </div>
                <div id="modal_form_vertical" class="modal fade" tabindex="-1" role="dialog"
                     aria-labelledby="myModal" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h5 class="modal-title">Purchase Items</h5>
                            </div>
                            <form action="#" method="GET">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label>Item</label>
                                                <input id="item" name="item" class="form-control ITEM" placeholder="item" />
                                            </div>
                                            <div class="col-sm-6">
                                                <label>Quantity</label>
                                                <input class="form-control ITEM" id="quantity" name="quantity" placeholder="Quantity"/>
                                            </div>
                                            <div class="col-sm-6">
                                                <label>Delivery Date</label>
                                                <input type="date" id="deliverydate" name="deliverdate" class="form-control ITEM" placeholder="Deliver Date"/>
                                            </div>
                                            <div class="col-sm-6">
                                                <label>Unit Price</label>
                                                <input class="form-control ITEM" id="price" name="price" placeholder="Price"/>
                                            </div>
                                            <div class="col-sm-6">
                                                <label>Total Price</label>
                                                <input class="form-control ITEM" name="totalprice" id="totalprice" placeholder="Total"/>
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
                    <table id="datatable" class="table" data-code="purchaseorder"></table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('jsheader')
<script type="text/javascript" src="{{ asset('assets/js/Finance/purchaseItem.js') }}">
</script>
@endsection