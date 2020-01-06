<!DOCTYPE html>
<html>
@foreach($html as $result)
<div style="page-break-after: always; width: 100%; height: 500px;text-align: center">
    <title>Chart Of Accounts</title>
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
            font-size: 17px;
            text-align: center;
        }
        tr.row{
            background-color: darkcyan;
            color: white;
        }
        .table tr:nth-child(){background-color: #f2f2f2;}
        .table tr.tr1:hover {background-color: aliceblue;}
        tbody tr:nth-child(odd){
            background-color:  #ddd;
        }
        #logo{
            text-align: center;
        }
    </style>



<body>
<?php
?>
<div style="background-color: black; color: white;"> 
<h2 style="text-align: center;"><b>Presbyterian Education Board</b></h2>
<h3 style="text-align: center"><b>Chart Of Accounts - PEB Whole For The Year {{$year}}</b></h3>
<h3 style="text-align: center"><b>00923211111111</b></h3>
<h3 style="text-align: center"><b>prosigns@prosigns.com</b></h3>
</div>
<h3 style="text-align: center"><b> EMPLOYEE SALARY SLIP ( {{$month}}-{{$year}} )</b></h3>
<hr width="200" align="left">
<hr width="200" align="left">

{!! $result !!}

</body>

<br>
</div>
@endforeach
</html>