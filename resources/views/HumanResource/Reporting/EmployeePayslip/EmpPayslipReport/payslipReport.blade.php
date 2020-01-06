<!DOCTYPE html>
<html>
<head>
    <title>Generate Payslip</title>
    <style>
        .table {
            width: 100%;

        }
        .datatable{
            /*margin-top: 55px;*/
            font-weight: bold;
            /*padding-left: 40px;*/
        }

        .table td {
            vertical-align: top;
            padding: 1px;
        }
        .headings{
            text-align: center;
        }
        tr.grosspay td {
            padding-left: 21px;
            font-size: 15px;
            font-family: "Arial Black", arial-black;
        }
        tr.netsalary td{
            padding-left: 21px;
            font-size: 15px;
           /* background-color: black;
            color: white;*/
            font-family: "Arial Black", arial-black;
        }
        tr.line td{
            padding-top: 20px;
        }
        tr.signature td {
            padding-left: 21px;
        }
        td.td2{
            text-align: right;
            padding-right:  40px;
        }
    </style>
</head>
<body>
@foreach($payslip as $empPaySlip)
<div class="datatable">
    <div class="dataTable_wrapper" id="tables" style="display:inline-block;
    width:450px;font-size:15px; border-right: 1px dashed #333; -webkit-border-horizontal-spacing: 40px;margin-left: 10px ">
        <h3 class="headings">{{$empPaySlip[0]->BRANCH_NAME}}</h3>
        <h3 class="headings">{{$empPaySlip[0]->CITY_NAME}}</h3>
        <h3 class="headings">Salary Slip</h3>
        <h3 class="headings">{{$empPaySlip[0]->MONTH}}{{$empPaySlip[0]->YEAR}}</h3>
        <table class="table">
            <tbody>
            <tr>
                <td><b>PaySlip No</b></td>
                <td class="td2" ><b>{{$empPaySlip[0]->PAYSLIP_NO}}</b></td>
            </tr>
            <tr>
                <td><b>Employee Name</b></td>
                <td class="td2" ><b>{{$empPaySlip[0]->FULL_NAME}}</b></td>
            </tr>
            <tr>
                <td><b>Designation</b></td>
                <td class="td2"><b>{{$empPaySlip[0]->TITLE_NAME}}</b></td>
            </tr>
            <tr>
                <td><b>Month</b></td>
                <td class="td2"><b>{{$empPaySlip[0]->MONTH}}</b></td>
            </tr>
            <tr class="grosspay">
                <td style ="border:2pt solid black;" ><b>Total Earnings</b></td>
            </tr>
            @php
            $sum = 0;
            @endphp
            @foreach($empPaySlip as $pays)
            <tr class="salary">
                <td ><b>{{$pays->CATEGORY_NAME}}</b></td>
                <td class="td2"><b>{{$pays->AMOUNT}}</b></td>
            </tr>
            <?php
            $sum = $sum+$pays->AMOUNT;
            $netsalary = $sum-$empPaySlip[0]->DEDUCTION_AMOUNT;
            ?>
            @endforeach
            <tr class="grosspay">
                <td style ="border:2pt solid black;"><b>Gross Pay</b></td>
                <td class="td2" >{{$sum}}</td>
            </tr>
            <tr>
                <td><b>Deductions</b></td>
            </tr>
            <tr>
                <td><b>{{$empPaySlip[0]->SALARY_DEDUCTIONS}} Deductions</b></td>
                <td class="td2">{{$empPaySlip[0]->DEDUCTION_AMOUNT}}</td>
            </tr>
            <tr>
                <td><b>Income Tax</b></td>
                <td class="td2">0</td>
            </tr>
            <tr>
                <td style="font-style: italic"><b>Total Deductions</b></td>
                <td class="td2">{{$empPaySlip[0]->DEDUCTION_AMOUNT}}</td>
            </tr>
            <tr class="netsalary">
                <td style ="border:2pt solid black;"><b>Net Salary</b></td>
                <td class="td2">{{$netsalary}}</td>

            </tr>
            <tr class="line">
                <td><b><hr width="100%"></b></td>
                <td></td>
            </tr>
            <tr class="signature">
                <td><b> Receiving Signature</b></td>
                <td class="td2"></td>
            </tr>
            </tbody>
        </table>
    </div>

    <div class="dataTable_wrapper" id="tables" style="display:inline-block; width:450px;font-size:15px;margin-left: 30px">
        <h3 class="headings">{{$empPaySlip[0]->BRANCH_NAME}}</h3>
        <h3 class="headings">{{$empPaySlip[0]->CITY_NAME}}</h3>
        <h3 class="headings">Salary Slip</h3>
        <h3 class="headings">{{$empPaySlip[0]->MONTH}}{{$empPaySlip[0]->YEAR}}</h3>
        <table class="table">
            <tbody>
            <tr>
                <td><b>PaySlip No</b></td>
                <td class="td2" ><b>{{$empPaySlip[0]->PAYSLIP_NO}}</b></td>
            </tr>
            <tr>
                <td><b>Employee Name</b></td>
                <td class="td2"><b>{{$empPaySlip[0]->FULL_NAME}} </b></td>
            </tr>
            <tr>
                <td><b>Designation</b></td>
                <td class="td2"><b>{{$empPaySlip[0]->TITLE_NAME}}</b></td>
            </tr>
            <tr>
                <td><b>Month</b></td>
                <td class="td2"><b>{{$empPaySlip[0]->MONTH}}</b></td>
            <tr class="grosspay" >
                <td style ="border:2pt solid black;" ><b>Total Earnings</b></td>
            </tr>
            @php
            $sum = 0;
            @endphp
            @foreach($empPaySlip as $pays)
            <tr class="salary">
                <td ><b>{{$pays->CATEGORY_NAME}}</b></td>
                <td class="td2"><b>{{$pays->AMOUNT}}</b></td>
            </tr>
            <?php
            $sum = $sum+$pays->AMOUNT;
            $netsalary = $sum-$empPaySlip[0]->DEDUCTION_AMOUNT;
            ?>
            @endforeach
            <tr class="grosspay">
                <td style ="border:2pt solid black;" ><b>Gross Pay</b></td>
                <td class="td2">{{$sum}}</td>
            </tr>
            <tr>
                <td><b>Deductions</b></td>
            </tr>
            <tr>
                <td><b>{{$empPaySlip[0]->SALARY_DEDUCTIONS}} Deductions</b></td>
                <td class="td2">{{$empPaySlip[0]->DEDUCTION_AMOUNT}}</td>
            </tr>
            <tr>
                <td><b>Income Tax</b></td>
                <td class="td2">0</td>
            </tr>
            <tr>
                <td style="font-style: italic"><b>Total Deductions</b></td>
                <td class="td2">{{$empPaySlip[0]->DEDUCTION_AMOUNT}}</td>
            </tr>
            <tr class="netsalary">
                <td style ="border:2pt solid black;"><b>Net Salary</b></td>
                <td class="td2">{{$netsalary}}</td>

            </tr>
            <tr class="line">
                <td><b><hr width="100%"></b></td>
                <td></td>
            </tr>
            <tr class="signature">
                <td><b> Receiving Signature</b></td>
                <td class="td2"></td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
@endforeach
</body>
</html>