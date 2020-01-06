<!DOCTYPE html>
<html>
<head>
    <title>Income and Expenditure</title>
    <style>
        .table {
            width: 100%;
        }
        #tables{
            /* border: 2px solid rgba(0, 0, 0, 0.81);
             border-radius: 3px;*/

        }
        .datatable{
            margin-top: 100px;
            font-weight: bold;
            /*padding-left: 40px;*/
        }

        .table td {
            vertical-align: top;
            padding: 1px;
            width: 2px;
        }
        .headings{
            text-align: center;
        }
        tr.line td{
            padding-top: 20px;
        }
        /* .table tr:nth-child(){background-color: #f0ad4e;}
         tbody tr:nth-child(odd){
             background-color:  #ddd;
         }*/
        .table, th, td {
            border: 1px solid #ddd;
            vertical-align: top;
            padding: 2px;
            font-size: 17px;
           text-align: center;
        }
        .table tr:nth-child(){background-color: #f2f2f2;}
        .table tr.tr1:hover {background-color: aliceblue;}
        tbody tr:nth-child(odd){
            background-color:  #ddd;
        }
        tr.row{
            background-color: darkcyan;
            color: white;
        }
    </style>
</head>
<body>
<h3 class="headings">PRESBYTERIAN EDUCATION BOARD</h3>
<h3 class="headings"></h3>
<h3 class="headings">Income And Expenditures</h3>
<div class="datatable">
<div class="dataTable_wrapper TABLE"  style="display:inline-block; width:300px;font-size:12px;">
    <table class="table" id="dataTables-example" align="center">
        <thead>
        <tr><td colspan="2">Expenditures</td></tr>
        <tr>
            <td>Personnel Cost</td>
            <td></td>
        </tr>
        <tr>
            <td>Running and Administrative Cost</td>
            <td></td>
        </tr>
        <tr align="center" class="row">
            <th>Account</th>
            <th>Amount</th>
        </tr>
        </thead>
        <tbody>
        <tr class="tr1">
            <td>Cost</td>
            <td>1000000</td>
        </tr>
        <tr>
            <td>Total</td>
            <td></td>
        </tr>
        </tbody>
    </table>
    <table style="padding-top: 105px; width: 300px;">
        <tr>
            <td style="padding-top: 50px"><b><hr width="50%"></b></td>
            <td style="padding-top: 50px"><b><hr width="50%"></b></td>
        </tr>
        <tr>
            <td><b>PRINCIPAL</b></td>
            <td><b>ACCOUNTANT</b></td>
        </tr>
    </table>
</div>
<div class="dataTable_wrapper TABLE" style="display:inline-block; width:300px;font-size:12px;margin-left: 25px">
    <table class="table" id="dataTables-example" align="center">
        <thead>
        <tr><td colspan="2">Income</td></tr>
        <tr>
            <td>Personnel Cost</td>
            <td></td>
        </tr>
        <tr>
            <td>Running and Administrative Cost</td>
            <td></td>
        </tr>
        <tr align="center" class="row">
            <th>Account</th>
            <th>Amount</th>
        </tr>
        </thead>
        <tbody>
        <tr class="tr1">
            <td>Cost</td>
            <td>1000</td>
        </tr>
        <tr>
            <td>Total</td>
            <td></td>
        </tr>
        </tbody>
    </table>
    <table  style="padding-top: 105px;width: 300px">
        <tr>
            <td style="padding-top: 50px"><b><hr width="50%"></b></td>
            <td style="padding-top: 50px"><b><hr width="50%"></b></td>
        </tr>
        <tr>
            <td><b>PRINCIPAL</b></td>
            <td><b>ACCOUNTANT</b></td>
        </tr>
    </table>
</div>
</div>
<!--<div class="datatable">
    <div class="dataTable_wrapper" id="tables" style="display:inline-block;padding-right: 8px; width:500px;font-size:15px; border-right: 1px dashed #333;">
        <table class="table">
            <tbody>
            <tr>
                <td><b></b></td>
                <td><b>EXPENDITURES</b></td>
                <td style="text-align: right"><b></b></td>
            </tr>
            <tr>
                <td><b>PERSONNEL COST</b></td>
                <td><b></b></td>
            </tr>
            <tr>
                <td><b>RUNNING AND ADMINISTRATIVE COST</b></td>
                <td><b></b></td>
                <td style="text-align: right"><b>1000</b></td>
            </tr>
            </tbody>
        </table>
        <table class="table" id="dataTables-example" align="center">
            <thead>
            <tr class="row">
                <th >Account Code</th>
                <th >Amount</th>
            </tr>
            </thead>
            <tbody>
            <tr class="tr1">
                <td>PERSONNEL COST</td>
                <td style="text-align: right">1000</td>
            </tr>
            </tbody>
        </table>
        <table style="margin-left: 170px;padding-top: 105px;">
        <tr>
            <td style="padding-top: 50px"><b><hr width="50%"></b></td>
            <td style="padding-top: 50px"><b><hr width="50%"></b></td>
            <td style="padding-top: 50px">1000000</td>
        </tr>
        <tr>
            <td><b>PRINCIPAL</b></td>
            <td><b>ACCOUNTANT</b></td>
            <td>Total</td>
        </tr>
        </table>
    </div>
    <div class="dataTable_wrapper" id="tables" style="display:inline-block;padding-left: 6px; width:500px;font-size:15px;">
        <table class="table">
            <tbody>
            <tr>
                <td><b></b></td>
                <td><b>INCOME</b></td>
                <td><b></b></td>
            </tr>
            <tr>
                <td><b>PERSONNEL COST</b></td>
                <td><b></b></td>
                <td style="text-align: right"><b></b></td>
            </tr>
            <tr>
                <td><b>RUNNING AND ADMINISTRATIVE COST</b></td>
                <td><b></b></td>
                <td style="text-align: right"><b>1000</b></td>
            </tr>
            </tbody>
        </table>
        <table class="table" id="dataTables-example" align="center">
            <thead>
            <tr  class="row">
                <th >Account Code</th>
                <th >Amount</th>
            </tr>
            </thead>
            <tbody>
            <tr class="tr1">
                <td>PERSONNEL COST</td>
                <td style="text-align: right">10000</td>
            </tr>
            </tbody>
        </table>
        <table style="margin-left: 170px;padding-top: 105px;">
            <tr>
                <td style="padding-top: 50px"><b><hr width="50%"></b></td>
                <td style="padding-top: 50px"><b><hr width="50%"></b></td>
                <td style="padding-top: 50px">1000000</td>
            </tr>
            <tr>
                <td><b>PRINCIPAL</b></td>
                <td><b>ACCOUNTANT</b></td>
                <td>Total</td>
            </tr>
        </table>
    </div>
</div>-->
</body>
</html>