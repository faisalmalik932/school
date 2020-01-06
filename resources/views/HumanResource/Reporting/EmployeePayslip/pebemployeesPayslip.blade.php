<!DOCTYPE html>
<html>
<head>
    <title>Peb Emp Payslips</title>
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
            font-size: 12px;
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
<h2 style="text-align: center"><b>Presbyterian Education Board</b></h2>
<h3 style="text-align: center"><b>Payroll</b></h3>
<div class="dataTable_wrapper TABLE">
    <table class="table" id="dataTables-example" align="center">
        <thead>
        <tr align="center" class="firsttable row">
            <th colspan="4"></th>
            <th colspan="5">Allowances</th>
            <th colspan="1"></th>
        </tr>
        <tr align="center" class="row">
            <th><b>Month</b></th>
            <th><b>Employee Name</b></th>
            <th><b>Joining Date</b></th>
            <th><b>DOB</b></th>
            @foreach($payslipCategories as $categories)
                <th>{{$categories->CATEGORY_NAME}}</th>
            @endforeach
            <th>Total</th>
            <th>Total Deduction</th>
            <th>Net Salary</th>
        </tr>
        </thead>
        <tbody>
        @foreach($payslip as $payslips)
            <tr>
                <td>{{$payslips->MONTH}}-{{$payslips->YEAR}}</td>
                <td>{{$payslips->FULL_NAME}}</td>
                <td>{{$payslips->JOINING_DATE}}</td>
                <td>{{$payslips->DOB}}</td>
                @foreach($payslipDetail as $detail)
                    @if($payslips->FULL_NAME ==$detail->FULL_NAME &&$payslips->MONTH==$detail->MONTH)
                        <td>{{$detail->AMOUNT}}</td>
                    @endif
                @endforeach
                <td>{{$payslips->SUM_SALARY}}</td>
                <td>{{$payslips->DEDUCTION_AMOUNT}}</td>
                @php
                    $netSalary = $payslips->SUM_SALARY-$payslips->DEDUCTION_AMOUNT;
                @endphp
                <td>{{$netSalary}}</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
</body>
</html>