<!DOCTYPE html>
<html>
<head>
    <title>Employee Profile</title>
    <style>
        .table {
            width: 100%;
           /* border: 2px solid rgba(0, 0, 0, 0.81);
            border-radius: 5px;*/
            padding: 0.5em;
        }

        .table td {
            vertical-align: top;
            padding: 10px;
        }
        #peb{
            font-size: 20px;
            text-align: center;
        }
        #branch{
            font-size: 15px;
            width: 6em;
        }
        #logo{
            text-align: center;
        }
    </style>
</head>
<body>
<div class="dataTable_wrapper">
    <div id="logo"><img src="{{ asset('assets/images/peb-logo.png') }}"/></div>
    <h1 id="peb"><b>Presbyterian Education Board</b></h1>
    <h1 id="peb"><b>{{$employee->BRANCH_NAME}}</b></h1>
    <table class="table">
        <tbody>
        @if(!empty($employee))
       <tr>
            <td></td>
            <td width="1em"></td>
            <td><img src="http://localhost:8080/schoolplus/uploads/employees/<?php  
            if($employee->EMP_PICTURE)
            echo  $employee->EMP_PICTURE;
            ?>" width="100px;"></td>
        </tr>

        <tr>
            <td>Employee Name</td>
            <td width="1em"></td>
            <td> @if($employee->FULL_NAME) {{$employee->FULL_NAME}} @endif</td>
        </tr>
        <tr>
            <td>Father Name</td>
            <td width="1em"></td>
            <td> @if($employee->FATHER_NAME) {{$employee->FATHER_NAME}} @endif</td>
        </tr>
        
        <tr>
            <td>Dob</td>
            <td width="1em"></td>
            <td>@if($employee->DOB) {{$employee->DOB}} @endif</td>
        </tr>
        <tr>
            <td>Cnic</td>
            <td width="1em"></td>
            <td>@if($employee->CNIC) {{$employee->CNIC}} @endif</td>
        </tr>
        <tr>
            <td>Mobile No</td>
            <td width="1em"></td>
            <td>@if($employee->MOBILE_NUMBER) {{$employee->MOBILE_NUMBER}} @endif</td>
        </tr>
        <tr>
            <td>LandLine No</td>
            <td width="1em"></td>
            <td>@if($employee->HOME_NUMBER) {{$employee->HOME_NUMBER}} @endif</td>
        </tr>
        <tr>
            <td>Personal Email</td>
            <td width="1em"></td>
            <td>@if($employee->PERSONAL_EMAIL) {{$employee->PERSONAL_EMAIL}} @endif</td>
        </tr>
        <tr>
            <td>Address</td>
            <td width="1em"></td>
            <td>@if($employee->CURRENT_ADDRESS) {{$employee->CURRENT_ADDRESS}} @endif</td>
        </tr>
        <tr>
           
            <td>Official Email</td>
            <td width="1em"></td>
            <td>@if($employee->OFFICIAL_EMAIL) {{$employee->OFFICIAL_EMAIL}} @endif</td>
        </tr>
        <tr>
            <td>Department</td>
            <td width="1em"></td>
            <td>@if($employee->DEPARTMENT_NAME) {{$employee->DEPARTMENT_NAME}} @endif</td>
        </tr>
        <tr>
            <td>Designation</td>
            <td width="1em"></td>
            <td>@if($employee->TITLE_NAME) {{$employee->TITLE_NAME}} @endif</td>
        </tr>
        <tr>
            <td>Joining Date</td>
            <td width="1em"></td>
            <td>@if($employee->JOINING_DATE) {{$employee->JOINING_DATE}} @endif</td>
        </tr>
        @endif
        </tbody>
    </table>
</div>
</body>
</html>