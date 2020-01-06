<!DOCTYPE html>
<html>
<title>@yield('title')</title>
<style>
    body, table, th, td, h1, h2, h3, h4, table, span, div, label {
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
        border-collapse: collapse;
        width: 100%;
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
    <table width="100%">
        <tr>
            <td>
                <img src="{{ asset('images/peb-logo.png') }}" />
            </td>
            <td>
                <span style="font-size: 22px"><b>{{ env('COMPANY_NAME', 'Presbyterian Education Board') }}</b></span><br>
                <span style="font-size: 18px"><b>@yield('title')</b></span><br>
                <span style="font-size: 14px">@yield('subtitle')</span><br>
            </td>
        </tr>
    </table>
</div>
<br>
<span style="font-size: 12px; margin-left: 6px">Print Date: <?php echo date('d-m-Y'); ?></span>
@yield('content')
</body>
</html>