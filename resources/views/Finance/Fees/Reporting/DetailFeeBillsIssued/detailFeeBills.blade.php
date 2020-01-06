<!DOCTYPE html>
<html>
    <title>Detail Summary Fee Bills</title>
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
            border: 1px solid  #ddd;
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

$branch = array($studentData);
$branch_name = $studentData[0]->BRANCH_NAME;
$class = $studentData[0]->CLASS;
$input = array($fullFee);
?>

<h2 style="text-align: center"><b>Presbyterian Education Board</b></h2>
<!--<div id="logo" style="text-align: center"><img src="{{ asset('images/peb-logo.png') }}"/></div>-->
<h3 style="text-align: center"><b>Detail Of Fee Bills Issued</b></h3>
<h3 style="text-align: center"><b>{{$branch_name}}</b></h3>
<h3 style="text-align: center"><b>{{$class}}</b></h3>
<div class="dataTable_wrapper TABLE">
    <table class="table" id="dataTables-example" align="center">
        <thead>
        <tr align="center" class="row">
            <th>Sr No</th>
            <th>Month</th>
            <th>Roll No</th>
            <th>Student Name</th>
            <th>Challan No</th>
            <th>Actual fee</th>
            <th>Conc.Amount</th>
            <th>Tuition Fee</th>
            <th>Stationary</th>
            <th>Computer</th>
            <th>Dev Fee</th>
            <th>Utility</th>
            <th>Other Fee</th>
            <th>Total</th>
        </tr>
        </thead>
        <tbody>
        @foreach($studentData as $data)
        <tr class="tr1">
            <td></td>
            <td style="font-size: 19px;font-style: italic">{{$data->MONTH}}</td>
            <td>{{$data->ROLL_NO}}</td>
            <td>{{$data->STUDENT_NAME}}</td>
            <td>{{$data->CHALLAN_NO}}</td>
            <td>{{$data->TOTAL_AMOUNT}}</td>
            <td>{{$data->FEE_DISCOUNT}}</td>
            @php
            $admissionfee  =$data->TOTAL_AMOUNT-($tuitionFee+$examFee+$stationaryFee+$computerFee+$utilityFee);
            @endphp
            <td>{!!$tuitionFee!!}</td>
            <td>{!!$stationaryFee!!}</td>
            <td>{!!$computerFee!!}</td>
            <td>{!!$devFee!!}</td>
            <td>{!!$utilityFee!!}</td>
            <td>{!!$admissionfee!!}</td>
            <?php
            $fee = $data->TOTAL_AMOUNT- $data->FEE_DISCOUNT;
            ?>
            <td>{{$fee}}</td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>
</body>
</html>