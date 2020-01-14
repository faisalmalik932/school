@extends('Template.master')
@section('menu-head', 'Finance')
@section('title', 'Add Donor Funds')
@section('content')

<div class="panel panel-flat">
    <div class="panel-heading">
        <h5 class="panel-title">@yield('title')</h5>
        <div class="heading-elements">
            <ul class="icons-list">
                <li><a data-action="collapse"></a></li>
                <li><a data-action="reload"></a></li>
                <li><a data-action="close"></a></li>
            </ul>
        </div>
    </div>
    <div class="panel-body">
        <div class="tabbable">
            <ul class="nav nav-tabs nav-tabs-bottom bottom-divided nav-justified">
                <li class="active"><a href="#form" data-toggle="tab">Add Funds</a></li>
                <li><a href="#list" data-toggle="tab">Donor Funds</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="form">
                    <form method="POST" action="{{ url('/finance/donors/add-funds') }}" name="myForm" id="DATAFORM" enctype="multipart/form-data" >
                        {{ csrf_field() }}
                        @include('Template.Components.messages')
                        @if (Session::has('donorfund'))
                        <div class="alert alert-success" id="success-alert">
                            <button type="button" class="close" data-dismiss="alert">x</button>
                            <strong>{{ Session::get('donorfund') }}</strong>
                        </div>
                        @endif
                        <input id="primaryid" name="primary" type="hidden"/>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label> Donor Name</label>
                                    <select  id="donorname" class="form-control  validate[required]"  name="donorname">
                                        <option disabled selected>Select Donor</option>
                                        @foreach($donor as $donors)
                                        <option value="{{$donors->DONOR_ID}}">{{$donors->DONOR_NAME}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Description</label>
                                    <input type="text" name="description" id="description" class="form-control" placeholder="Description"/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Transaction Date</label>
                                    <input name="transactiondate" id="transactiondate" class="form-control validate[required]" placeholder="Transaction Date" value="<?php echo date("Y-m-d"); ?>"  type="date"/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Amount</label>
                                    <input name="amount" id="amount" placeholder="Amount" class="form-control validate[required]" type="text">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Funds Category</label>
                                    <select name="fundcategory" id="fundcategory" class="form-control validate[required] SEED" data-seed="FUND_CATEGORY">
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="row position-right" style="text-align: end; margin: 6px">
                                <button type="button" class="btn btn-primary {{__('button.reset-reset')}}"><i class="{{__('button.reset-icon')}} {{__('button.reset-class')}} "></i>{{__('button.reset-text')}}</button>
                                <button type="button" class="btn btn-primary SAVE"><i class="icon-floppy-disk position-left"></i> Save/Update</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="tab-pane" id="list">
                    <table id="datatable" class="table" data-code="donorfunds"></table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('jsheader')
<script  type="text/javascript" src="{{ asset('assets/js/Donors/donors.js') }}"></script>
<!--<script>
    $(document).ready(function() {
        /*$(".SHOW").click(function (e) {
            e.preventDefault();
            $(".SIBLINGS").show();
        });*/

        var max_fields      = 4; //maximum input boxes allowed
        var wrapper         = $(".siblings"); //Fields wrapper
        var add_button      = $(".SHOW"); //Add button ID

        var x = 1; //initlal text box count
        $(add_button).click(function(e){ //on add input button click
            e.preventDefault();
            if(x < max_fields){ //max input box allowed
                x++; //text box increment
                $(wrapper).append('  <label> Sibling Name</label><input type="text"  class="form-control " pattern="^[A-Za-z -]+$" name="siblingname" placeholder="Add Siblings" >'); //add input box
            }
        });

        $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
            e.preventDefault(); $(this).parent('div').remove(); x--;
        })
    });
</script>-->

@endsection