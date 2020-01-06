
<!DOCTYPE html>
<html>
    <title>Donors Report</title>
    <style>
        body
        {
            counter-reset: Serial;           /* Set the Serial counter to 0 */
        }
        tr td:first-child:before
        {
            counter-increment: Serial;      /* Increment the Serial counter */
            content:  counter(Serial); /* Display the counter */
        }
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
            font-size: 20px;
            text-align: center;
        }

        .table tr:nth-child(even){background-color: #f2f2f2;}

        .table tr.tr1:hover {background-color: aliceblue;}

        .donor{
            height: 1px;
        }
        #logo{
            text-align: center;
        }

        tr.row{
            background-color: darkcyan;
            color: white;
        }
        .table {
            border-collapse: collapse;
        }



    </style>
<body>
<h2 style="text-align: center"><b>Presbyterian Education Board</b></h2>
<h3 style="text-align: center"><b>Donor Report(Branch Wise)</b></h3>
<div id="logo"><img src="{{ asset('images/peb-logo.png') }}"/></div>
<div class="donor">
    <?php
    $input = array($donorList);
    $new = $donorList[0];
    $branch_name = $new->BRANCH_NAME;
    $amount = $new->AMOUNT;
    ?>
    <h3 style="height: 1px"><b>{{$branch_name}}</b></h3>
</div>
<div class="dataTable_wrapper TABLE">
    <table class="table" id="dataTables-example" align="center">
        <thead>
        <tr class="row" align="center">
            <th>Sr No</th>
            <th><b>Donor Name</b></th>
            <th><b>Class</b></th>
            <th><b>Student</b></th>
            <th>Scholarship Period</th>
        </tr>
        </thead>
        <tbody>
        @foreach($donorList as $donor)
        <tr class="tr1">
            <td></td>
            <td>{{$donor->DONOR_NAME}}</td>
            <td>{{$donor->CLASS}}</td>
            <td>{{$donor->STUDENT_NAME}}</td>
            <td>{{$donor->FUND_CATEGORY}}</td>
        </tr>
        @endforeach
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td>Amount</td>
            <td>{{$amount}}</td>
        </tr>
        </tbody>
    </table>
</div>
</body>
</html>