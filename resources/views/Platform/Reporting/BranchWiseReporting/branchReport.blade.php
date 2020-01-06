<!DOCTYPE html>
<html>
<head>
    <title>Test Pdf</title>
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
    <?php echo $branchData;?>
    <table class="table">
        <tbody>
            @foreach($branchData as $branchdata)
            <tr><td></td><td id="branch"><b>{{$branchdata->BRANCH_NAME}}</b></td></tr>
            <tr>
                <td>Teachers</td>
                <td width="1em"></td>
                <td>{{$branchdata->TITLE_NAME}}</td>
            </tr>
            <tr>
                <td>Teachers</td>
                <td width="1em"></td>
                <td>{{$branchdata->TITLE_NAME}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</body>
</html>