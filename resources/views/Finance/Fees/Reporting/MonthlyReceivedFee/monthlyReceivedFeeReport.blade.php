<!DOCTYPE html>
<html>
    <title>Monthly Received Fee</title>
    <style>
        .table {
            border-collapse: collapse;
            width: 900px;
        }
        body
        {
            counter-reset: Serial;           /* Set the Serial counter to 0 */
        }
        tr td:first-child:before
        {
            counter-increment: Serial;      /* Increment the Serial counter */
            content:  counter(Serial); /* Display the counter */
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
    </style>
<body>
<?php
$branch_name = $month[0]->BRANCH_NAME;
$months = $month[0]->MONTH;
$year = $month[0]->YEAR;
?>

<h2 style="text-align: center"><b>Presbyterian Education Board</b></h2>
<!--<div id="logo" style="text-align: center"><img src="{{ asset('images/peb-logo.png') }}"/></div>-->
<h3 style="text-align: center"><b>{{$branch_name}}</b></h3>
<h3 style="text-align: center"><b>Monthly Received Fee</b></h3>
<h3 style="text-align: center"><b>{{$months}}-{{$year}}</b></h3>
<div class="dataTable_wrapper TABLE">
    <table class="table" id="dataTables-example" align="center">
        <thead>
        <tr align="center" class="row">
            <th></th>
            <th>Class</th>
            <th>Fee Category</th>
            <th>Fee Amount</th>
            <th>Total Received Fee (Class)</th>
        </tr>
        </thead>
        <tbody>
        <?php $i=0; ?>
        @foreach($detail as $details)
        <tr class="tr1">
            <td></td>
            <td>{{$details->CLASS}}</td>
            <td>{{$details->PARTICULAR_NAME}}</td>
            <td>{{$details->Particular_fee}}</td>
            <td>{{$details->PARTICULAR_TOTAL_AMOUNT}}</td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>
</body>
</html>