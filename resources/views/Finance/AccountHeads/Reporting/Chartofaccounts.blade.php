<!DOCTYPE html>
<html>
<head>
    <title>Chart Of Accounts</title>
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
    <div id="logo"><img src="{{ asset('images/peb-logo.png') }}"/></div>
    <h1 id="peb"><b>Presbyterian Education Board</b></h1>
    <h1 id="peb"><b>Chart Of Accounts</b></h1>
    <table class="table">
        <thead>
        <tr>
            <th>Account Code</th>
            <th></th>
            <th>Account Name</th>
        </tr>
        </thead>
        <tbody>
        @foreach($employees as $employee)
        <tr>
            <td></td>
            <td width="1em"></td>
            <td></td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>
</body>
</html>