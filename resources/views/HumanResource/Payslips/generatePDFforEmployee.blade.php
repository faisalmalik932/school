<!DOCTYPE html>
<html>
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
$salary = [];
$deduction = [];
?>
<div style="background-color: black; color: white;"> 
<h2 style="text-align: center;"><b>Presbyterian Education Board</b></h2>
<h3 style="text-align: center"><b>Chart Of Accounts - PEB Whole For The Year {{$year}}</b></h3>
<h3 style="text-align: center"><b>00923211111111</b></h3>
<h3 style="text-align: center"><b>prosigns@prosigns.com</b></h3>
</div>
<h3 style="text-align: center"><b>EMPLOYEE SALARY SLIP ( {{$month}}-{{$year}} )</b></h3>
<hr width="200" align="left">
<hr width="200" align="left">

<table style="width:100%">
  <tr>
    <th>Employee Name:</th>
    <td>{{$data->first()->FULL_NAME}}</td>
    <th>Joining Date:</th>
    <td>{{$data->first()->JOINING_DATE}}</td>
  </tr>
  <tr>
    <th>Employee ID:</th>
    <td>{{$data->first()->EMPLOYEE_ID}}</td>
    <th>Employee Address:</th>
    <td>{{$data->first()->PERMANENT_ADDRESS}}</td>
  </tr>
</table>

<table style="width:100%">
  <tr style="background-color:black; color: white;">
    <th>EARNINGS</th>
    <td>AMOUNT</td>
    <th>DEDUCTIONS</th>
    <td>AMOUNT</td>
  </tr>
     <?php
        foreach($data as $inf){ 
        if($inf->TYPE == "Earning"){
            $salary[] = $inf;
        }
        else{
            $deduction[] = $inf;
        }
        }
        ?>

       <?php 
        $count = count($deduction) > count($salary) ? count($deduction) : count($salary);
      for($i = 0; $count>$i; $i++){
        
         echo '<tr class="tr1">';
         if(isset($salary[$i])){
         echo '<th>'.$salary[$i]->CATEGORY_NAME.'</th><td>'.$salary[$i]->AMOUNT.'</td>'  ;
         }
         else{
          echo '<th></th><td></td>';  
         }
         if(isset($deduction[$i])){
         echo '<th>'.$deduction[$i]->CATEGORY_NAME.'</th><td>'.$deduction[$i]->AMOUNT.'</td>'  ;
         }
         else{
          echo '<th></th><td></td>';  
         }
        echo '</tr>';
        }
       ?>   
  <tr style="background-color:black; color: white;">
    <th>Total Earnings</th>
    <td>{{$earningSum}}</td>
    <th>DEDUCTIONS</th>
    <td>{{$deductionSum}}</td>
  </tr>
  <tr style="background-color:black; color: white;">
    <th>Net Salary</th>
    <td>{{$sum}}</td>
  </tr>
</table>

</body>

<br>
</div>
</html>