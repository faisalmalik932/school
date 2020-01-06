<!DOCTYPE html>
<html>
<head>
    <title>Trial Balance</title>
    <style>
        .table {
            border-collapse: collapse;
            width: 650px;
        }
        .TABLE{
            margin-top: 40px;
        }
       /* body
        {
            counter-reset: Serial;           !* Set the Serial counter to 0 *!
        }
        tr td:first-child:before
        {
            counter-increment: Serial;      !* Increment the Serial counter *!
            content:  counter(Serial); !* Display the counter *!
        }*/
        table, th, td {
            border: 1px solid #ddd;
            vertical-align: top;
            padding: 2px;
            font-size: 17px;
            text-align: center;
        }
        tr.row{
            background-color: darkcyan;
            color: white;
        }
        .table tr:nth-child(){background-color: #f2f2f2;}
        .table tr.tr1:hover {background-color: aliceblue;}
        tbody tr:nth-child(odd){
            background-color:  #ddd;
        }
        #logo{
            text-align: center;
        }
    </style>
</head>
<body>
<?php
?>
<h2 style="text-align: center"><b>Presbyterian Education Board</b></h2>
<h3 style="text-align: center"><b>Trial Balance</b></h3>
<h3 style="text-align: center"><b>As at {{$enddate}}</b></h3>
<div class="dataTable_wrapper TABLE">
    <table class="table" id="dataTables-example" align="center">
        <thead>
        <tr align="center" class="row">
            <th >Account Code</th>
            <th >Account Description</th>
            <th >Debit</th>
            <th>Credit</th>
        </tr>
        </thead>
        <tbody>
        @foreach($trialBalanceInfo as $trialbalanceinfo)
            @php
                $trialbalanaceData = $trialbalanceinfo->CLASS_TYPE;
            @endphp
        <tr>
            <td colspan="4" style="text-align: left">{{$trialbalanaceData}} </td>
        </tr>
        @foreach($trialBalancedetial as $detail)
            @if($trialbalanaceData==$detail->CLASS_TYPE)
        <tr class="tr1">
            <td>{{$detail->TRANSACTION_CODE}}</td>
            <td>{{$detail->LEDGER_ACCOUNT_NAME}}</td>
            <td>{{$detail->SUM_DEBIT_AMOUNT}}</td>
            <td>{{$detail->SUM_CREDIT_AMOUNT}}</td>
        </tr>
        @endif
        @endforeach
        @endforeach
        @foreach($total as $totalbalance)
        <tr>
            <td></td>
            <td style="text-align: right">Total</td>
            <td style="text-align: right">{{$totalbalance->DEBIT_SUM}}</td>
            <td style="text-align: right">{{$totalbalance->CREDIT_SUM}}</td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>
</body>
</html>