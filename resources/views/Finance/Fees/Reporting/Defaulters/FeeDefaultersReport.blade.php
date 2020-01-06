<!DOCTYPE html>
<html>
<head>
    <title>Fee Defaulters</title>
    <style>
        .table {
            border-collapse: collapse;
            table-layout: fixed;
            width: 720px;
        }
        .TABLE{
            margin-top: 40px;
        }
        table, th, td {
            border: 1px solid #ddd;
            vertical-align: top;
            padding: 2px;
            font-size: 15px;
            text-align: center;
        }
        .table tr:nth-child(even){background-color: #f2f2f2;}
        .table tr.tr1:hover {background-color: aliceblue;}

        tr.row{
            background-color: darkcyan;
            color: white;
        }
        #logo{
            text-align: center;
        }
    </style>
</head>
<body>
<?php
$input = array($defaulters);
$new = $defaulters[0];
$branch_name = $new->BRANCH_NAME;
$month =  $new->MONTH;
$year = $new->YEAR;
?>
<h2 style="text-align: center"><b>Presbyterian Education Board</b></h2>
<h3 style="text-align: center"><b>Monthly Fee Defaulters Statement</b></h3>
<h3 style="text-align: center"><b>{{$branch_name}}</b></h3>
<h3 style="text-align: center"><b>{{$month}}-{{$year}}</b></h3>
<div class="dataTable_wrapper TABLE">
    <table class="table" id="dataTables-example" align="center">
        <thead>
        <tr class="row" align="center">
            <th>Student Name</th>
            <th>Class</th>
            <th>Amount Previous Months</th>
            <th>Amount Current Months</th>
            <th>Total Amount</th>
            <th colspan="3">Reason</th>
        </tr>
        </thead>
        <tbody>
        @foreach($defaulters as $defaulter)
        <tr class="tr1">
            <td>{{$defaulter->STUDENT_NAME}}</td>
            <td>{{$defaulter->CLASS}}</td>
            <td>10000</td>
            <td>{!!$feesum!!}</td>
            <td>{!!$feesum!!}</td>
            <td colspan="3"></td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>
</body>
</html>