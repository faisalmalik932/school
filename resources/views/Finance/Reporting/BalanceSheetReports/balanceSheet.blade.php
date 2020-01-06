<!DOCTYPE html>
<html>
<head>
    <title>Balance Sheet</title>
    <style>
        .table {
            border-collapse: collapse;
            width: 480px;
        }
        .datatable{
            text-align: -webkit-center;
        }
        .TABLE{
            margin-top: 40px;
        }
        /* body
         {
             counter-reset: Serial;           !* Set the Serial counter to 0 *!
         }
         tr td:first-child:before
         {
             counter-increment: Serial;      !* Increment the Serial counter *!
             content:  counter(Serial); !* Display the counter *!
         }*/
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
        .headings{
            text-align: center;
        }
    </style>
</head>
<body>
<h3 class="headings">PRESBYTERIAN EDUCATION BOARD</h3>
<h3 class="headings"></h3>
<h3 class="headings">Balance Sheet At</h3>
<div class="datatable">
        <table class="table">
            <thead>
            <tr align="center" class="row">
                <th >ASSETS</th>
                <th >Amount</th>
            </tr>
            </thead>
            @if(!empty($balancesheetAssetsReport))
            @foreach($balancesheetAssetsReport as $report)
                @if($report->CLASS_TYPE =='ASSETS' )
            <tbody>
            <tr class="tr1">
                <td>{{$report->LEDGER_ACCOUNT_NAME}}</td>
                <td></td>
            </tr>
            </tbody>
            @endif
            @endforeach
            @endif
            <tr>
                <td><b>Total ASSETS</b></td>
                <td></td>
            </tr>
        </table>
        <table class="table">
            <thead>
            <tr align="center" class="row">
                <th >LIABILITIES</th>
                <th >Amount</th>
            </tr>
            </thead>
            @if(!empty($balancesheetLiablitiesReport))
            @foreach($balancesheetLiablitiesReport as $Liabreport)
                @if($Liabreport->CLASS_TYPE =='LIABILITIES' )
                    <tbody>
                    <tr class="tr1">
                        <td>{{$Liabreport->LEDGER_ACCOUNT_NAME}}</td>
                        <td></td>
                    </tr>
                    </tbody>
                    <tbody>
                    @endif
                    @endforeach
                    @endif
                    </tbody>

            <tr>
                <td><b>Total LIABILITIES</b></td>
                <td><b></b></td>
            </tr>
        </table>
</div>
</body>
</html>