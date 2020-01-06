<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <!-- <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">-->
    <!--<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">-->
    <title>Challan Form</title>
    <style>
        .table {
            width: 100%;
        }

        #tables {
            border: 2px solid rgba(0, 0, 0, 0.81);
            border-radius: 2px;
        }

        .datatable {
            padding-left: 40px;
            width: 100%;
        }

        .table td {
            vertical-align: top;
            padding: 1px;
        }

        .branchname {
            text-align: center;
            border-bottom: 1pt solid black;
            border-top: 1pt solid black;
        }

        tr.LOGO td {
            border-bottom: 1pt solid black;
            height: 10px;
        }

        tr.copy td {
            border-bottom: 1pt solid black;
        }

        tr.particulars td {
            border-bottom: 1pt solid black;
            border-top: 1pt solid black;
            font-size: 14px;
        }

        tr.total td {
            border-bottom: 1pt solid black;
            border-top: 1pt solid black;
            font-size: 14px;
        }

        td.bank {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
<?php
$input = $students[0];
$count = 0;
?>
<div class="datatable">
    @for($i = 0 ; $i < count($students); $i++)
        <div style="margin-top: 100px;">
            <div class="dataTable_wrapper" id="tables" style="display:inline-block; width:300px;font-size:12px;">
                <h4 style="text-align: center;">Bank Copy<br></h4>
                <h3 class="branchname">{!!$branch->BRANCH_NAME!!}</h3>
                <table class="table" cellpadding="5" cellspacing="5">
                    <tbody>
                    <tr class="LOGO">
                        <td><img src="{{ URL::to('/uploads/branches')}}/{!!$branch->BRANCH_LOGO!!}"
                                 style="width: 80px; height: 60px"/></td>
                        <td class="bank"><b>{!!$bank->BANK_NAME!!}</b><br>{!!$bank->BANK_ADDRESS!!}<br><b>Current A/C
                                NO.</b> <br>{!!$bank->BANK_ACCOUNT_NO!!}</td>
                    </tr>
                    <tr>
                        <td><b>Bill NO: </b>{{$students[$i]['INFO']->CHALLAN_NO}}</td>
                        <td><b>Student ID:</b>{{$students[$i]['INFO']->STUDENT_CODE}}</td>
                    </tr>
                    <tr>
                        <td colspan="2"><b>Name: </b>{{$students[$i]['INFO']->STUDENT_NAME}}</td>
                    </tr>
                    <tr>
                        <td colspan="2"><b>Father: </b>{{$students[$i]['INFO']->FATHER_NAME}}</td>
                    </tr>
                    <tr>
                        <td><b>Roll No: </b>{{$students[$i]['INFO']->ROLL_NO}}</td>
                        <td><b>Class: </b>{{$students[$i]['INFO']->CLASS}}</td>
                    </tr>
                    <tr>
                        <td><b>Fee For: </b>{{$students[$i]['INFO']->FEE_FOR}}</td>
                        <td><b>Due Date: </b>{{$students[$i]['INFO']->DUE_DATE}}</td>
                    </tr>
                    <tr class="particulars">
                        <td><b>Particulars</b></td>
                        <td><b>Amount(Rs.)</b></td>
                    </tr>
                    @foreach($students[$i]['FEE_STRUCTURE'] as $fee)
                    <tr>
                        <td><b>{{$fee->PARTICULAR_NAME}}</b></td>
                        <td><b>{{$fee->AMOUNT}}</b></td>
                    </tr>
                    @endforeach
                    <tr class="particulars">
                        <td><b>Total Payable Fee: </b></td>
                        <td><b>{{$students[$i]['TOTAL_PAYABLE']}}</b></td>
                    </tr>
                    <tr>
                        <td><b>Actual Fee</b></td>
                        <td><b>{{$students[$i]['TOTAL_FEE']}}</b></td>
                    </tr>
                    <tr>
                        <td><b>Financial Aid By PEB</b></td>
                        <td><b>{{($students[$i]['TOTAL_FEE'] - $students[$i]['TOTAL_PAYABLE']) < 0 ? 0 : ($students[$i]['TOTAL_FEE'] - $students[$i]['TOTAL_PAYABLE'])}}</b></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <hr>
                        </td>
                    </tr>
                    <tr>
                        <td><b>Parents Contribution: </b></td>
                        <td><b>{{$students[$i]['TOTAL_PAYABLE']}}</b></td>
                    </tr>
                    <tr>
                        <td>Before Due Date:</td>
                        <td><b>{{$students[$i]['TOTAL_PAYABLE']}}</b></td>
                    </tr>
                    <tr>
                        <td><b>After Due Date: </b></td>
                        <td><b>{{$students[$i]['TOTAL_PAYABLE'] + $branch->LATE_FEE_FINE}}</b></td>
                    </tr>
                    <tr>
                        <td style="padding-top: 70px">Print Date <?php echo date('d-m-Y')?></td>
                        <td style="padding-top: 70px; font-weight: 600"><u>Bank(Signature Stamp)</u></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <b>This bill is not valid after 20th of every month<br>{!!$branch->ADDRESS!!} | Tel:&nbsp;&nbsp;{!!$branch->LANDLINE_NUMBER!!}
                            </b>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="dataTable_wrapper" id="tables" style="display:inline-block; width:300px;font-size:12px;margin-left: 16px">
                <h4 style="text-align: center;">PEB Office Copy<br></h4>
                <h3 class="branchname">{!!$branch->BRANCH_NAME!!}</h3>
                <table class="table" cellpadding="5" cellspacing="5">
                    <tbody>
                    <tr class="LOGO">
                        <td><img src="{{ URL::to('/uploads/branches')}}/{!!$branch->BRANCH_LOGO!!}"
                                 style="width: 80px; height: 60px"/></td>
                        <td class="bank"><b>{!!$bank->BANK_NAME!!}</b><br>{!!$bank->BANK_ADDRESS!!}<br><b>Current A/C
                                NO.</b> <br>{!!$bank->BANK_ACCOUNT_NO!!}</td>
                    </tr>
                    <tr>
                        <td><b>Bill NO: </b>{{$students[$i]['INFO']->CHALLAN_NO}}</td>
                        <td><b>Student ID:</b>{{$students[$i]['INFO']->STUDENT_CODE}}</td>
                    </tr>
                    <tr>
                        <td colspan="2"><b>Name: </b>{{$students[$i]['INFO']->STUDENT_NAME}}</td>
                    </tr>
                    <tr>
                        <td colspan="2"><b>Father: </b>{{$students[$i]['INFO']->FATHER_NAME}}</td>
                    </tr>
                    <tr>
                        <td><b>Roll No: </b>{{$students[$i]['INFO']->ROLL_NO}}</td>
                        <td><b>Class: </b>{{$students[$i]['INFO']->CLASS}}</td>
                    </tr>
                    <tr>
                        <td><b>Fee For: </b>{{$students[$i]['INFO']->FEE_FOR}}</td>
                        <td><b>Due Date: </b>{{$students[$i]['INFO']->DUE_DATE}}</td>
                    </tr>
                    <tr class="particulars">
                        <td><b>Particulars</b></td>
                        <td><b>Amount(Rs.)</b></td>
                    </tr>
                    @foreach($students[$i]['FEE_STRUCTURE'] as $fee)
                    <tr>
                        <td><b>{{$fee->PARTICULAR_NAME}}</b></td>
                        <td><b>{{$fee->AMOUNT}}</b></td>
                    </tr>
                    @endforeach
                    <tr class="particulars">
                        <td><b>Total Payable Fee: </b></td>
                        <td><b>{{$students[$i]['TOTAL_PAYABLE']}}</b></td>
                    </tr>
                    <tr>
                        <td><b>Actual Fee</b></td>
                        <td><b>{{$students[$i]['TOTAL_FEE']}}</b></td>
                    </tr>
                    <tr>
                        <td><b>Financial Aid By PEB</b></td>
                        <td><b>{{($students[$i]['TOTAL_FEE'] - $students[$i]['TOTAL_PAYABLE']) < 0 ? 0 : ($students[$i]['TOTAL_FEE'] - $students[$i]['TOTAL_PAYABLE'])}}</b></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <hr>
                        </td>
                    </tr>
                    <tr>
                        <td><b>Parents Contribution: </b></td>
                        <td><b>{{$students[$i]['TOTAL_PAYABLE']}}</b></td>
                    </tr>
                    <tr>
                        <td>Before Due Date:</td>
                        <td><b>{{$students[$i]['TOTAL_PAYABLE']}}</b></td>
                    </tr>
                    <tr>
                        <td><b>After Due Date: </b></td>
                        <td><b>{{$students[$i]['TOTAL_PAYABLE'] + $branch->LATE_FEE_FINE}}</b></td>
                    </tr>
                    
                    <tr>
                        <td style="padding-top: 70px">Print Date <?php echo date('d-m-Y')?></td>
                        <td style="padding-top: 70px; font-weight: 600"><u>Bank(Signature Stamp)</u></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <b>This bill is not valid after 20th of every month<br>{!!$branch->ADDRESS!!} | Tel:&nbsp;&nbsp;{!!$branch->LANDLINE_NUMBER!!}
                            </b>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="dataTable_wrapper" id="tables" style="display:inline-block; width:300px;font-size:12px;margin-left: 16px">
                <h4 style="text-align: center;">Parents Copy<br></h4>
                <h3 class="branchname">{!!$branch->BRANCH_NAME!!}</h3>
                <table class="table" cellpadding="5" cellspacing="5">
                    <tbody>
                    <tr class="LOGO">
                        <td><img src="{{ URL::to('/uploads/branches')}}/{!!$branch->BRANCH_LOGO!!}"
                                 style="width: 80px; height: 60px"/></td>
                        <td class="bank"><b>{!!$bank->BANK_NAME!!}</b><br>{!!$bank->BANK_ADDRESS!!}<br><b>Current A/C
                                NO.</b> <br>{!!$bank->BANK_ACCOUNT_NO!!}</td>
                    </tr>
                    <tr>
                        <td><b>Bill NO: </b>{{$students[$i]['INFO']->CHALLAN_NO}}</td>
                        <td><b>Student ID:</b>{{$students[$i]['INFO']->STUDENT_CODE}}</td>
                    </tr>
                    <tr>
                        <td colspan="2"><b>Name: </b>{{$students[$i]['INFO']->STUDENT_NAME}}</td>
                    </tr>
                    <tr>
                        <td colspan="2"><b>Father: </b>{{$students[$i]['INFO']->FATHER_NAME}}</td>
                    </tr>
                    <tr>
                        <td><b>Roll No: </b>{{$students[$i]['INFO']->ROLL_NO}}</td>
                        <td><b>Class: </b>{{$students[$i]['INFO']->CLASS}}</td>
                    </tr>
                    <tr>
                        <td><b>Fee For: </b>{{$students[$i]['INFO']->FEE_FOR}}</td>
                        <td><b>Due Date: </b>{{$students[$i]['INFO']->DUE_DATE}}</td>
                    </tr>
                    <tr class="particulars">
                        <td><b>Particulars</b></td>
                        <td><b>Amount(Rs.)</b></td>
                    </tr>
                    @foreach($students[$i]['FEE_STRUCTURE'] as $fee)
                    <tr>
                        <td><b>{{$fee->PARTICULAR_NAME}}</b></td>
                        <td><b>{{$fee->AMOUNT}}</b></td>
                    </tr>
                    @endforeach
                    <tr class="particulars">
                        <td><b>Total Payable Fee: </b></td>
                        <td><b>{{$students[$i]['TOTAL_PAYABLE']}}</b></td>
                    </tr>
                    <tr>
                        <td><b>Actual Fee</b></td>
                        <td><b>{{$students[$i]['TOTAL_FEE']}}</b></td>
                    </tr>
                    <tr>
                        <td><b>Financial Aid By PEB</b></td>
                        <td><b>{{($students[$i]['TOTAL_FEE'] - $students[$i]['TOTAL_PAYABLE']) < 0 ? 0 : ($students[$i]['TOTAL_FEE'] - $students[$i]['TOTAL_PAYABLE'])}}</b></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <hr>
                        </td>
                    </tr>
                    <tr>
                        <td><b>Parents Contribution: </b></td>
                        <td><b>{{$students[$i]['TOTAL_PAYABLE']}}</b></td>
                    </tr>
                    <tr>
                        <td>Before Due Date:</td>
                        <td><b>{{$students[$i]['TOTAL_PAYABLE']}}</b></td>
                    </tr>
                    <tr>
                        <td><b>After Due Date: </b></td>
                        <td><b>{{$students[$i]['TOTAL_PAYABLE'] + $branch->LATE_FEE_FINE}}</b></td>
                    </tr>
                    
                    <tr>
                        <td style="padding-top: 70px">Print Date <?php echo date('d-m-Y')?></td>
                        <td style="padding-top: 70px; font-weight: 600"><u>Bank(Signature Stamp)</u></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <b>This bill is not valid after 20th of every month<br>{!!$branch->ADDRESS!!} | Tel:&nbsp;&nbsp;{!!$branch->LANDLINE_NUMBER!!}
                            </b>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    @endfor
</div>
</body>
</html>
