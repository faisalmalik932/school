<?php
$salary = [];
$deduction = [];
?>
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
</table>