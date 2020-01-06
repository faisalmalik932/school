<!DOCTYPE html>
<html>
    <title>Analysis of  Fee Vouchers</title>
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
<h3 style="text-align: center"><b>Analysis of  Fee Vouchers</b></h3>
<h3 style="text-align: center"><b>{{$year}}</b></h3>
<div class="dataTable_wrapper TABLE">
    <table class="table" id="dataTables-example" align="center">
        <thead>
        <tr align="center" class="firsttable row">
            <th colspan="3"></th>
            <th colspan="6">Fee</th>
            <th colspan="6"><b>Bills</b></th>
        </tr>
        <tr align="center" class="row">
            <th>SR#</th>
            <th>Branch</th>
            <th><b>Month</b></th>
            <th><b>Schools Fee Generated</b></th>
            <th>Schools Fee Collected</th>
            <th>Schools Fee Pending</th>
            <th><b>Monthly Fee Generated</b></th>
            <th>Monthly Fee Collected</th>
            <th>Monthly Fee Pending</th>
            <th><b>Schools Bill Generated</b></th>
            <th>Schools Bill Collected</th>
            <th>Schools Bill Pending</th>
            <th><b>Monthly Bill Generated</b></th>
            <th>Monthly Bill Collected</th>
            <th>Monthly Bill Pending</th>
         </tr>
        </thead>
        <tbody>
        @foreach($voucherDetail as $detail)
        <tr>
            <?php
            $FEE_TOTAL_PENDING = $detail->FEE_GENERATED-$detail->FEE_TOTAL_COLLECTED;
            $SCHOOL_TOTAL_PENDING = $detail->SCHOOL_TOTAL_FEE_GENERATED-$detail->SCHOOL_TOTAL_FEE_COLLECTED;
            $BILL_PENDING = $detail->BILL_GENERATED-$detail->BILL_COLLECTED;
            $SCHOOL_TOTAL_BILL_PENDING = $detail->SCHOOL_TOTAL_BILL_GENERATED-$detail->SCHOOL_TOTAL_BILL_COLLECTED;
            ?>
            <td></td>
            <td>{{$detail->BRANCH_NAME}}</td>
            <td>{{$detail->MONTH}}</td>
            <td>{{$detail->SCHOOL_TOTAL_FEE_GENERATED}}</td>
            <td>{{$detail->SCHOOL_TOTAL_FEE_COLLECTED}}</td>
            <td>{{$SCHOOL_TOTAL_PENDING}}</td>
            <td>{{$detail->FEE_GENERATED}}</td>
            <td>{{$detail->FEE_TOTAL_COLLECTED}}</td>
            <td>{{$FEE_TOTAL_PENDING}}</td>
            <td>{{$detail->SCHOOL_TOTAL_BILL_GENERATED}}</td>
            <td>{{$detail->SCHOOL_TOTAL_BILL_COLLECTED}}</td>
            <td>{{$SCHOOL_TOTAL_BILL_PENDING}}</td>
            <td>{{$detail->BILL_GENERATED}}</td>
            <td>{{$detail->BILL_COLLECTED}}</td>
            <td>{{$BILL_PENDING}}</td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>
</body>
</html>