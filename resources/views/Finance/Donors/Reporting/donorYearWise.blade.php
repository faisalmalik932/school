<!DOCTYPE html>
<html>
<head>
    <title>Donors Year Wise Report</title>
    <style>
        .table {
            border-collapse: collapse;
        }
        .TABLE{
            margin-top: 40px;
        }
        table, th, td {
            border: 1px solid black;
            vertical-align: top;
            padding: 2px;
            font-size: 20px;
            text-align: center;
        }

        .donor{
            height: 1px;
        }


    </style>
</head>
<body>
<h2 style="text-align: center"><b>Presbyterian Education Board</b></h2>
<h3 style="text-align: center"><b>Donor Report(Year Wise)</b></h3>
<div class="donor">
    @foreach($donorList as $donor)
    <h3 style="height: 1px"><b>Year 2017</b></h3>
</div>
<div class="dataTable_wrapper TABLE">
    <table class="table" id="dataTables-example" align="center">
        <thead>
        <tr align="center">
            <th><b>Donor Name</b></th>
            <th><b>Branch Name</b></th>
            <th><b>Total Adopted Students</b></th>
            <th><b>Amount</b></th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>{{$donor->DONOR_NAME}}</td>
            <td>{{$donor->BRANCH_NAME}}</td>
            <td>{!!$totalAdopted!!}</td>
            <td></td>
        </tr>
        </tbody>
    </table>
</div>
@endforeach
</body>
</html>