<!DOCTYPE html>
<html>
    <title>Branch Wise Donors Report</title>
    <style>
        .table {
            border-collapse: collapse;

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
        .table tr:nth-child(even){background-color: #f2f2f2;}

        .table tr.tr1:hover {background-color: aliceblue;}


    </style>
<body>
<h2 style="text-align: center"><b>Presbyterian Education Board</b></h2>
<h3 style="text-align: center"><b>Donor Report(Branch Wise)</b></h3>
<div id="logo"><img src="{{ asset('images/peb-logo.png') }}"/></div>
<div class="donor">

</div>
<div class="dataTable_wrapper TABLE">
    <table class="table" id="dataTables-example" align="center">
        <thead>
        <tr align="center" class="row">
            <th><b>Branch Name</b></th>
            <th><b>Donor Name</b></th>
            <th><b>Class</b></th>
            <th><b>Student</b></th>
            <th>Scholarship Period</th>
        </tr>
        </thead>
        <tbody>
        @foreach($detail as $donor)
        <tr>
            <td>{{$donor->BRANCH_NAME}}</td>
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
            <td>{!!$funds!!}</td>
        </tr>
        </tbody>
    </table>
</div>
</body>
</html>