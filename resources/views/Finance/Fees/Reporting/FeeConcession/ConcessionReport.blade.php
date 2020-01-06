<!DOCTYPE html>
<html>
<head>
    <title>Fee Concession</title>
    <style>
        .table {
            border-collapse: collapse;
            width: 950px;
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
</head>
<body>
<?php
$input = array($fullFee);
$full = $fullFee[0];
$Fee  = $full->TOTAL_FEE;
$input = array($studentData);
$new = $studentData[0];
$branch_name = $new->BRANCH_NAME;
$discount = $new->FEE_DISCOUNT;
$net = $Fee-$discount;
?>
<h2 style="text-align: center"><b>Presbyterian Education Board</b></h2>
<h3 style="text-align: center"><b>Monthly Fee Concession Statement</b></h3>
<h3 style="text-align: center"><b>{{$branch_name}}</b></h3>

<h3 style="text-align: center"><b>{{$month}}-{{$year}}</b></h3>
<div class="dataTable_wrapper TABLE">
    <table class="table" id="dataTables-example" align="center">
        <thead>
        <tr align="center" class="row">
            <th>Sr No</th>
            <th>Roll No</th>
            <th>Student Name</th>
            <th>Class</th>
            <th>Amount Of Full Fee</th>
            <th>Concession Granted</th>
            <th>Net Fee Received</th>
            <th>Recommended By</th>
        </tr>
        </thead>
        <tbody>
        @foreach($studentData as $data)
        <tr class="tr1">
            <td></td>
            <td>{{$data->ROLL_NO}}</td>
            <td>{{$data->STUDENT_NAME}}</td>
            <td>{{$data->CLASS}}</td>
            <td>{{$Fee}}</td>
            <td>{{$data->FEE_DISCOUNT}}</td>
            <td>{{$net}}</td>
            <td></td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>
</body>
</html>