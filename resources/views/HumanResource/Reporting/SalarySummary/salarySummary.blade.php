<!DOCTYPE html>
<html>
    <title>Summary</title>
    <style>
        body
        {
            counter-reset: Serial;           /* Set the Serial counter to 0 */
        }
        tr td:first-child:before
        {
            counter-increment: Serial;      /* Increment the Serial counter */
            content:  counter(Serial); /* Display the counter */
        }

        .table {
            border-collapse: collapse;
            width: 1000px;

        }
        .TABLE{
            margin-top: 40px;
        }
        table, th, td {
            border: 1px solid black;
            vertical-align: top;
            padding: 2px;
            font-size: 15px;
            text-align: center;
        }
        .table tr:nth-child(even){background-color: #f2f2f2;}
        .table tr.tr1:hover {background-color: aliceblue;}
        tr.row{
            background-color: darkcyan;
            color: white;
        }

    </style>
<body>
<h2 style="text-align: center"><b>Presbyterian Education Board</b></h2>
<h3 style="text-align: center"><b>Detail Of Payment Of Salary</b></h3>
<h3 style="text-align: center"><b>Summary {{$detail->first()->YEAR}}</b></h3>
<div class="dataTable_wrapper TABLE">
    <table class="table" id="dataTables-example" align="center">
        <thead>
        <tr align="center" class="row">
            <th>SR NO</th>
            <th>Branch Name</th>
            <th>JAN</th>
            <th>FEB</th>
            <th>MAR</th>
            <th>APR</th>
            <th>MAY</th>
            <th>JUN</th>
            <th>JUL</th>
            <th>AUG</th>
            <th>SEP</th>
            <th>OCT</th>
            <th>NOV</th>
            <th>DEC</th>
            <th>Total</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td></td>
            <td>{{$detail->first()->BRANCH_NAME}}</td>
            <td>@isset($summary[0]->TOTAL) {{$summary[0]->TOTAL}} @else 0 @endisset</td>
            <td>@isset($summary[1]->TOTAL) {{$summary[1]->TOTAL}} @else 0 @endisset</td>
            <td>@isset($summary[2]->TOTAL) {{$summary[2]->TOTAL}} @else 0 @endisset</td>
            <td>@isset($summary[3]->TOTAL) {{$summary[3]->TOTAL}} @else 0 @endisset</td>
            <td>@isset($summary[4]->TOTAL) {{$summary[4]->TOTAL}} @else 0 @endisset</td>
            <td>@isset($summary[5]->TOTAL) {{$summary[5]->TOTAL}} @else 0 @endisset</td>
            <td>@isset($summary[6]->TOTAL) {{$summary[6]->TOTAL}} @else 0 @endisset</td>
            <td>@isset($summary[7]->TOTAL) {{$summary[7]->TOTAL}} @else 0 @endisset</td>
            <td>@isset($summary[8]->TOTAL) {{$summary[8]->TOTAL}} @else 0 @endisset</td>
            <td>@isset($summary[9]->TOTAL) {{$summary[9]->TOTAL}} @else 0 @endisset</td>
            <td>@isset($summary[10]->TOTAL) {{$summary[10]->TOTAL}} @else 0 @endisset</td>
            <td>@isset($summary[11]->TOTAL) {{$summary[11]->TOTAL}} @else 0 @endisset</td>
            <td>{{$sum}}</td>
        </tr>
        </tbody>
    </table>
</div>
</body>
</html>