<!DOCTYPE html>
<html>
<title>Chart Of Accounts</title>
<style>
    .table {
        border-collapse: collapse;
        width: 100%;
    }

    body, table, th, td, h1, h2, h3, h4 {
        counter-reset: Serial; /* Set the Serial counter to 0 */
        font-family: "Roboto", Helvetica Neue, Helvetica, Arial, sans-serif
    }

    tr td:first-child:before {
        counter-increment: Serial; /* Increment the Serial counter */
        content: counter(Serial); /* Display the counter */
    }

    table, th, td {
        border: 1px solid #ddd;
        vertical-align: top;
        padding: 2px;
        font-size: 11px;
        padding-left: 5px;
    }

    tr.row {
        background-color: #0a68b4;
        color: white;
    }

    .table tr:nth-child() {
        background-color: #f2f2f2;
    }

    .table tr.tr1:hover {
        background-color: aliceblue;
    }

    tbody tr:nth-child(odd) {
        background-color: #ddd;
    }
</style>
<body>
<div style="text-align: center;">
    <span style="font-size: 22px"><b>{{ env('COMPANY_NAME', 'Presbyterian Education Board') }}</b></span><br>
    <span style="font-size: 18px"><b>Chart Of Accounts</b></span><br>
    <span style="font-size: 14px">(PEB Whole For The Year <?php echo date('Y')?>)</span><br>
</div>
<br>
<span style="font-size: 12px; margin-left: 6px">Print Date: <?php echo date('d-m-Y'); ?></span>
<div class="dataTable_wrapper">
    <table class="table" id="dataTables-example" cellpadding="3" cellspacing="0" >
        <thead>
            <tr class="row">
                <th>Sr#</th>
                <th>Account Code</th>
                <th>Account Class</th>
                <th>Account Name</th>
                <th>Parent Account</th>
            </tr>
        </thead>
        <tbody>
            @foreach($glAccounts as $account)
                    @if($account->HAS_CHILD == 'YES' && $account->HEAD_PARENT_ID == '0')
                        <tr class="tr1" style="font-weight: bold; font-size: 18px; text-align: left">
                            <td></td>
                            <td>{{$account->ACCOUNT_HEAD_CODE}}</td>
                            <td>{{$account->CLASS_TYPE}}</td>
                            <td>{{$account->ACCOUNT_HEADS}}</td>
                            <td>{{$account->PARENT_NAME}}</td>
                        </tr>
                    @elseif($account->HAS_CHILD == 'YES' && $account->HEAD_PARENT_ID > '0')
                        <tr class="tr1" style="font-weight: bold; font-size: 14px; text-align: left">
                            <td></td>
                            <td>{{$account->ACCOUNT_HEAD_CODE}}</td>
                            <td>{{$account->CLASS_TYPE}}</td>
                            <td> -- {{$account->ACCOUNT_HEADS}}</td>
                            <td>{{$account->PARENT_NAME}}</td>
                        </tr>
                    @else
                        <tr class="tr1" style="font-size: 14px; text-align: left">
                            <td></td>
                            <td>{{$account->ACCOUNT_HEAD_CODE}}</td>
                            <td>{{$account->CLASS_TYPE}}</td>
                            <td> --- {{$account->ACCOUNT_HEADS}}</td>
                            <td>{{$account->PARENT_NAME}}</td>
                        </tr>
                    @endif
            @endforeach
        </tbody>
    </table>
</div>
</body>
</html>