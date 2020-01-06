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

<div style="background-color: black; color: white;"> 
<h2 style="text-align: center;"><b>Presbyterian Education Board</b></h2>
<h3 style="text-align: center"><b>00923211111111</b></h3>
<h3 style="text-align: center"><b>prosigns@prosigns.com</b></h3>
</div>

<hr width="200" align="left">
<hr width="200" align="left">


<div class="row">
      <div class="col-md-6">
          <div  class="content-group-lg" style="float:left; margin-left: 10%;">
              <label>Transaction Code: </label>
              {{$transactioncode[0]->TRANSACTION_CODE}}
          </div>
      </div>  
      <div class="col-md-6">
          <label>Transaction Date: </label>
         {{$transactioncode[0]->TRANSACTION_DATE}}
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
          <div  class="content-group-lg" style="float:left; margin-left: -23%;">
              <label>Description: </label>
              {{$transactioncode[0]->DESCRIPTION}}
          </div>
      </div>  
      <div class="col-md-6">
          <label>Cheque No: </label>
         {{$transactioncode[0]->CHEQUE_NO}}
      </div>
    </div><br><br>

<table style="width:100%">
  <tr style="background-color:black; color: white;">
    <th>GL Code</th>
    <th>GL Account</td>
    <th>Bank</th>
    <th>Debit Amount</td>
    <th>Credit Amount</td>
  </tr>
  @foreach($transactioncode as $transactioncodes)
  <tr>
    <td>{{$transactioncodes->GL_CODE}}</td>
    <td>{{$transactioncodes->LEDGER_ACCOUNT}}</td>
    <td>{{$transactioncodes->BANK_NAME}}</td>
    <td>{{$transactioncodes->DEBIT_AMOUNT}}</td>
    <td>{{$transactioncodes->CREDIT_AMOUNT}}</td>
  </tr>
  @endforeach
</table>

</body>

<br>
</div>
</html>