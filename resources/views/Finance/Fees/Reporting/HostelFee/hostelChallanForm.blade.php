<!DOCTYPE html>
<html>
<head>
    <title>Hostel Challan Form</title>
    <style>
        .table {
            width: 100%;


        }
        #tables{
            border: 2px solid rgba(0, 0, 0, 0.81);
            border-radius: 3px;

        }
        .datatable{
           /* margin-top: 68px;*/
            padding-left: 40px;
        }

        .table td {
            vertical-align: top;
            padding: 2px;
        }
        .branchname{
            text-align: center;
            border-bottom:1pt solid black;
            border-top: 1pt solid black;
        }
        tr.LOGO td {
            border-bottom:1pt solid black;
        }
        tr.copy td {
            border-bottom:1pt solid black;
        }
        tr.particulars td {
            border-bottom:1pt solid black;
            border-top: 1pt solid black;
            font-size: 14px;
        }
    </style>
</head>
<body>
<div class="datatable">
    <div class="dataTable_wrapper" id="tables" style="display:inline-block; width:300px;font-size:12px;">
        <h4 style="text-align: center">Bank Copy</h4>
        @foreach($student as $students)
        <h3 class="branchname">{{$students->HOSTEL_NAME}}</h3>
        @endforeach
        <table class="table">
            <tbody>
            @foreach($student as $students)
            <tr class="LOGO">
                <td></td>
                <td>Habib Bank Limited <br>Nicholson Road Branch Lahore <br>Current A/C NO. <br>15-18-79000323-03</td>
            </tr>
            <tr>
                <td><b>Bill NO:</b></td>
                <td>{{$students->CHALLAN_NO}}</td>
            </tr>
            <tr>
                <td><b>Student ID:</b></td>
                <td>{{$students->STUDENT_ID}}</td>
            </tr>
            <tr>
                <td><b>Name:</b></td>
                <td>{{$students->STUDENT_NAME}}</td>
            </tr>
            <tr>
                <td><b>Father:</b></td>
                <td>{{$students->FULL_NAME}}</td>
            </tr>
            <tr>
                <td><b>Class:</b></td>
                <td>{{$students->CLASS}}</td>
            </tr>
            <tr>
                <td><b>Fee For:</b></td>
                <td>{{$students->MONTH}}-{{$students->YEAR}}</td>
            </tr>
            <tr class="particulars">
                <td><b>Particulars</b></td>
                <td><b>Amount(Rs.)</b></td>
            </tr>
            @endforeach
            @foreach($studentFee as $studentfee)
            <tr>
                <td><b>{{$studentfee->PARTICULAR_NAME}}</b></td>
                <td><b>{{$studentfee->AMOUNT}}</b></td>
            </tr>
            @endforeach
            <tr class="particulars">
                <td><b>Actual Fee</b></td>
                <td><b>{!!$feesum!!}</b></td>
            </tr>
            <tr>
                <td><b>Financial Aid By PEB</b></td>
                <td><b>0</b></td>
            </tr>
            <tr>
                <td><b>Parents Contribution</b></td>
                <td><b>{!!$feesum!!}</b></td>
            </tr>
            <tr class="particulars">
                <td><b>Total</b></td>
                <td><b>{!!$feesum!!}</b></td>
            </tr>
            <tr>
               <!--  <td><b>After Due Date</b></td>
                <td style="padding-bottom: 30px"><b>{!!$feesum!!}</b></td> -->
            </tr>
            <tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
            <tr>
                <td>Print Date {!!$time!!}</td>
                <td style="border-top: 1px solid black;">Bank(Signature Stamp)</td>
            </tr>
            </tbody>
        </table>
        <h4>This bill is not valid after 20th of every month</h4>
        @foreach($student as $students)
        <b>{{$students->ADDRESS}}</b>
        &nbsp;&nbsp;
        Tel:&nbsp;&nbsp;{{$students->BRANCH_LANDLINE_NUMBER}}
        @endforeach
    </div>
    <div class="dataTable_wrapper" id="tables" style="display:inline-block; width:300px;font-size:12px;margin-left: 16px">
        <h4 style="text-align: center">PEB Office Copy</h4>
        @foreach($student as $students)
        <h3 class="branchname">{{$students->HOSTEL_NAME}}</h3>
        @endforeach
        <table class="table">
            <tbody>
            @foreach($student as $students)
            <tr class="LOGO">
                <td></td>
                <td>Habib Bank Limited<br>Nicholson Road Branch Lahore<br>Current A/C NO.<br> 15-18-79000323-03</td>
            </tr>
            <tr>
                <td><b>Bill NO:</b></td>
                <td>{{$students->CHALLAN_NO}}</td>
            </tr>
            <tr>
                <td><b>Student ID:</b></td>
                <td>{{$students->STUDENT_ID}}</td>
            </tr>
            <tr>
                <td><b>Name:</b></td>
                <td>{{$students->STUDENT_NAME}}</td>
            </tr>
            <tr>
                <td><b>Father:</b></td>
                <td>{{$students->FULL_NAME}}</td>
            </tr>
            <tr>
                <td><b>Class:</b></td>
                <td>{{$students->CLASS}}</td>
            </tr>
            <tr>
                <td><b>Fee For:</b></td>
                <td>{{$students->MONTH}}-{{$students->YEAR}}</td>
            </tr>
            <tr class="particulars">
                <td><b>Particulars</b></td>
                <td><b>Amount(Rs.)</b></td>
            </tr>
            @endforeach
            @foreach($studentFee as $studentfee)
            <tr>
                <td><b>{{$studentfee->PARTICULAR_NAME}}</b></td>
                <td><b>{{$studentfee->AMOUNT}}</b></td>
            </tr>
            @endforeach
            <tr class="particulars">
                <td><b>Actual Fee</b></td>
                <td><b>{!!$feesum!!}</b></td>
            </tr>
            <tr>
                <td><b>Financial Aid By PEB</b></td>
                <td><b>0</b></td>
            </tr>
            <tr>
                <td><b>Parents Contribution</b></td>
                <td><b>{!!$feesum!!}</b></td>
            </tr>
            <tr class="particulars">
                <td><b>Total</b></td>
                <td><b>{!!$feesum!!}</b></td>
            </tr>
            <tr>
                <!-- <td><b>After Due Date</b></td>
                <td style="padding-bottom: 30px"><b>{!!$feesum!!}</b></td> -->
            </tr>
            <tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
            <tr>
                <td>Print Date {!!$time!!}</td>
                <td style="border-top: 1px solid black;">Bank(Signature Stamp)</td>
            </tr>
            </tbody>
        </table>

        <h4>This bill is not valid after 20th of every month</h4>
        @foreach($student as $students)
        <b>{{$students->ADDRESS}}</b>
        &nbsp; &nbsp;
        Tel:&nbsp;&nbsp;{{$students->BRANCH_LANDLINE_NUMBER}}
        @endforeach
    </div>
    <div class="dataTable_wrapper" id="tables" style="display:inline-block; width:300px;font-size:12px;margin-left: 16px;">
        <h4 style="text-align: center">Parents Copy</h4>
        @foreach($student as $students)
        <h3 class="branchname">{{$students->HOSTEL_NAME}}</h3>
        @endforeach
        <table class="table">
            <tbody>
            @foreach($student as $students)
            <tr class="LOGO">
                <td></td>
                <td>Habib Bank Limited <br>Nicholson Road Branch Lahore <br>Current A/C NO.<br> 15-18-79000323-03</td>
            </tr>
            <tr>
                <td><b>Bill NO:</b></td>
                <td>{{$students->CHALLAN_NO}}</td>
            </tr>
            <tr>
                <td><b>Student ID:</b></td>
                <td>{{$students->STUDENT_ID}}</td>
            </tr>
            <tr>
                <td><b>Name</b></td>
                <td>{{$students->STUDENT_NAME}}</td>
            </tr>
            <tr>
                <td><b>Father:</b></td>
                <td>{{$students->FULL_NAME}}</td>
            </tr>
            <tr>
                <td><b>Class:</b></td>
                <td>{{$students->CLASS}}</td>
            </tr>
            <tr>
                <td><b>Fee For:</b></td>
                <td>{{$students->MONTH}}-{{$students->YEAR}}</td>
            </tr>
            <tr class="particulars">
                <td><b>Particulars</b></td>
                <td><b>Amount(Rs.)</b></td>
            </tr>
            @endforeach
            @foreach($studentFee as $studentfee)
            <tr>
                <td><b>{{$studentfee->PARTICULAR_NAME}}</b></td>
                <td><b>{{$studentfee->AMOUNT}}</b></td>
            </tr>
            @endforeach
            <tr class="particulars">
                <td><b>Actual Fee</b></td>
                <td><b>{!!$feesum!!}</b></td>
            </tr>
            <tr>
                <td><b>Financial Aid By PEB</b></td>
                <td><b>0</b></td>
            </tr>
            <tr>
                <td><b>Parents Contribution</b></td>
                <td><b>{!!$feesum!!}</b></td>
            </tr>
            <tr class="particulars">
                <td><b>Total</b></td>
                <td><b>{!!$feesum!!}</b></td>
            </tr>
            <tr>
               <!--  <td><b>After Due Date</b></td>
                <td style="padding-bottom: 30px"><b>{!!$feesum!!}</b></td> -->
            </tr>
            <tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
            <tr>
                <td>Print Date {!!$time!!}</td>
                <td style="border-top: 1px solid black;">Bank(Signature Stamp)</td>
            </tr>
            </tbody>
        </table>

        <h4>This bill is not valid after 20th of every month</h4>
        @foreach($student as $students)
        <b>{{$students->ADDRESS}}</b>
        &nbsp; &nbsp;
        Tel:&nbsp;&nbsp;{{$students->BRANCH_LANDLINE_NUMBER}}
        @endforeach
    </div>
</div>
</body>
</html>