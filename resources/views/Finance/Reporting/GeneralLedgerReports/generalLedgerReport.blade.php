<!DOCTYPE html>
<html>
<head>
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/images/favicon.icons') }}"/>
    <title>General Ledger</title>
    <style>
        .table {
            border-collapse: collapse;

        }

        .TABLE {
            margin-top: 40px;
        }

        table, th, td {
            font-family: "Arial Black", arial-black;
            border: 1px solid #ddd;
            vertical-align: top;
            padding: 2px;
            font-size: 14px;
            text-align: left;
        }

        table .debitamount td {
            text-align: right;
        }

        .table tr:nth-child() {
            background-color: #f0ad4e;
        }

        tbody tr:nth-child(odd) {
            background-color: #ddd;
        }

        /* .table tr.tr1:hover {background-color: aliceblue;}*/
        #logo {
            text-align: center;
        }

        tr.row {
            background-color: darkcyan;
            color: white;
        }
    </style>
</head>
<body>
<?php
//print_r($ledger);
?>
<h2 style="text-align: center"><b>Presbyterian Education Board</b></h2>
<h3 style="text-align: center"><b>General Ledger</b></h3>
<h3 style="text-align: center"><b>For the period</b></h3>
<h3 style="text-align: center"><b>{{$startdate}} To {{$enddate}}</b></h3>
<div class="dataTable_wrapper TABLE">
    <table class="table" id="dataTables-example" align="center">
        <thead>
        <tr align="center" class="row">
            <th><b>Transaction Date</b></th>
            <th><b>Reference</b></th>
            <th>Account Code</th>
            <th>Transaction Description</th>
            <th>Debit Amount</th>
            <th>Credit Amount</th>
            <th>Balance</th>
        </tr>
        </thead>
        <tbody>
            @if(!empty($ledgers))
        @foreach($ledgers as $ledger)
            <tr class="tr1">
                <td>{{$ledger->TRANSACTION_DATE}}</td>
                <!-- --><?php
                /*            $month = date('m', strtotime($ledgers->TRANSACTION_DATE));
                            echo ($month);
                            */?>
                <td>{{$ledger->TRANSACTION_CODE_PREFIX}}{{$ledger->TRANSACTION_CODE}}</td>
                <td>{{$ledger->LEDGER_ACCOUNT}}</td>
                <td>{{$ledger->CHEQUE_NO}}{{$ledger->LEDGER_ACCOUNT_NAME}}</td>
                <td style="text-align:right">{{$ledger->DEBIT_AMOUNT}}</td>
                <td style="text-align:right">{{$ledger->CREDIT_AMOUNT}}</td>
                <td></td>
            </tr>
        @endforeach
        @endif
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td>Current Period Cha</td>
            <td style="text-align: right"></td>
            <td style="text-align: right"></td>
            <td style="text-align: right"></td>
        </tr>
        </tbody>
    </table>
</div>
</body>
</html>