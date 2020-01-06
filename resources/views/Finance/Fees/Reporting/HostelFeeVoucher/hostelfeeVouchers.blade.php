<!DOCTYPE html>
<html>
    <title>Analysis of Hostel Fee Vouchers</title>
    <style>
        .table {
            border-collapse: collapse;
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
<h2 style="text-align: center"><b>Presbyterian Education Board</b></h2>
<h3 style="text-align: center"><b>Analysis of Hostel Fee Vouchers</b></h3>
<h3 style="text-align: center"><b>{{$year}}</b></h3>
<div class="dataTable_wrapper TABLE">
    <table class="table" id="dataTables-example" align="center">
        <thead>
        <tr align="center" class="firsttable row">
            <th colspan="3"></th>
            <th colspan="3">Fee</th>
            <th colspan="3"><b>Bills</b></th>
        </tr>
        <tr align="center" class="row">
            <th>SR#</th>
            <th>Hostel</th>
            <th><b>Month</b></th>
            <th><b>Generated</b></th>
            <th>Collected</th>
            <th>Pending</th>
            <th><b>Generated</b></th>
            <th>Collected</th>
            <th>Pending</th>
        </tr>
        </thead>
        <tbody>
        @foreach($challanDetail as $details)
        <tr>
            <td></td>
            <td>{{$details->HOSTEL_NAME}}</td>
            <td>{{$details->MONTH}}</td>
            <td>{{$details->FEE_GENERATED}}</td>
            <td>{{$details->HOSTEL_TOTAL_COLLECTED}}</td>
            <?php
            $pendingfees = $details->FEE_GENERATED-$details->HOSTEL_TOTAL_COLLECTED;
            ?>
            <td>{{$pendingfees}}</td>
            <td>{{$details->BILL_GENERATED}}</td>
            <td>{{$details->BILL_COLLECTED}}</td>
            <?php
            $pendingbills = $details->BILL_GENERATED-$details->BILL_COLLECTED;
            ?>
            <td>{{$pendingbills}}</td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>
</body>
</html>