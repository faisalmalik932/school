<!DOCTYPE html>
<html>
    <title>Summary Fee Bills</title>
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
$input = array($month);
$new = $month[0];
$months =  $new->MONTH;
$year = $new->YEAR;
$brch = $branch[0];
$branch_name = $brch->BRANCH_NAME;
?>
<h2 style="text-align: center"><b>Presbyterian Education Board</b></h2>
<h3 style="text-align: center"><b>Summary Of Fee Bills Issued</b></h3>
<h3 style="text-align: center"><b>{{$branch_name}}</b></h3>
<h3 style="text-align: center"><b>{{$months}}-{{$year}}</b></h3>
<div class="dataTable_wrapper TABLE">
    <table class="table" id="dataTables-example" align="center">
        <thead>
        <tr align="center" class="row">
            <th>Sr No</th>
            <th>Class</th>
            <th>No Of Students</th>
            <th>Paying Full</th>
            <th>Actual Total</th>
            <th>On Conc.</th>
            <th>Conc.Amount</th>
            <th>Net Amount</th>
            <th>Fee Receivable</th>
            <th>Received Amount</th>
        </tr>
        </thead>
        <tbody>
        @foreach($feedetailClassWise as $detail)
        <tr class="tr1">
            <td></td>
            <td>{{$detail->CLASS}}</td>
            <td>{{$detail->TOTAL_STUDENTS}}</td>
            <td>{{$detail->PAYING_FULL}}</td>
            <td>{{$detail->TOTAL_FEE}}</td>
            <?php
            $concession = $detail->TOTAL_STUDENTS-$detail->PAYING_FULL
            ?>
            <td>{{$concession}}</td>
            <td>{{$detail->FEE_DISCOUNT}}</td>
            <?php
            $netFee = $detail->TOTAL_FEE-$detail->FEE_DISCOUNT
            ?>
            <td>{{$netFee}}</td>
            <td>0</td>
            <td>{{$netFee}}</td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>
</body>
</html>