@extends('Template.master')
@section('menu-head', 'Fee')
@section('title', 'Edit Fee Challan')
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
    $input = array($challanData);
    $new = $challanData[0];
    $challan_no = $new->CHALLAN_NO;
    $studentName = $new->STUDENT_NAME;
    $branch = $new->BRANCH_NAME;
    $class = $new->CLASS;
    $challanid = $new->CHALLAN_ID;
    ?>
    <div class="panel-body">
        <div class="tabbable">
            <div class="tab-content">
                <div class="tab-pane active" id="form">
                    <form method="POST" action="{{ url('/finance/fees/edit-fee-challan') }}" id="DATAFORM" class="form-horizontal">
                        {{ csrf_field() }}
                        @include('Template.Components.messages')
                        @if (Session::has('feechallan'))
                        <div class="alert alert-success" id="success-alert">
                            <button type="button" class="close" data-dismiss="alert">x</button>
                            <strong>{{ Session::get('feechallan') }}</strong>
                        </div>
                        @endif
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="content-group-lg">
                                            <label>Challan Number</label>
                                            <input type="hidden" class="form-control" value="{{$challanid}}" name="CHALLAN_ID" id="" placeholder="" readonly/>
                                            <input type="text" class="form-control" value="{{$challan_no}}" name="CHALLAN_NO" id="" placeholder="" readonly/>
                                        </div>
                                        <div class="content-group-lg">
                                            <label>Student Name</label>
                                            <input type="text" class="form-control" value="{{$studentName}}" name="STUDENT_NAME" id="" placeholder="" readonly/>
                                        </div>
                                        <div class="content-group-lg">
                                            <label>Class</label>
                                            <input type="text" class="form-control" value="{{$class}}" name="CLASS" id="" placeholder="" readonly/>
                                        </div>
                                        <div class="content-group-lg">
                                            <label>School Name</label>
                                            <input type="text" class="form-control" value="{{$branch}}" name="BRANCH_NAME" id="" placeholder="" readonly/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                @foreach($challanData  as $challan)
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="content-group-lg">
                                            <label>Fee Type</label>
                                            <input type="hidden" class="form-control" value="{{$challan->FEE_PARTICULAR_ID}}" name="particulars[]"/>
                                            <input type="text" class="form-control" value="{{$challan->PARTICULAR_NAME}}" disabled="disabled"/>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="content-group-lg">
                                            <label>Amount</label>
                                            <input type="text" class="form-control AMOUNT" value="{{$challan->AMOUNT}}" name="amount[]" placeholder="Amount"/>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="row position-right" style="text-align: end; margin: 6px">
                                <button type="button" class="btn btn-primary {{__('button.reset-reset')}}"><i class="{{__('button.reset-icon')}} {{__('button.reset-class')}} "></i>{{__('button.reset-text')}}</button>
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
<script type="text/javascript" src="{{ asset('assets/js/fees/editchallan.js') }}">
</script>
@endsection