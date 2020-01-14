        <!DOCTYPE html>
        <html>
            <title>Donors List</title>
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
                    font-size: 20px;
                }
                tr.row{
                    background-color: darkcyan;
                    color: white;
                }
                .table tr:nth-child(even){background-color: #f2f2f2;}

                .table tr.tr1:hover {background-color: aliceblue;}

                #total{
                    padding-left: 780px;
                    height: 1px;
                }
                #logo{
                    text-align: center;
                }


            </style>
        <body>
        <h2 style="text-align: center"><b>Presbyterian Education Board</b></h2>
        <h3 style="text-align: center"><b>Details Of Donors </b></h3>
        <div id="logo"><img src="{{ asset('assets/images/peb-logo.png') }}"/></div>
        <div id="total"><h4 style="height: 1px">Total Donors &nbsp;&nbsp;{!!$total!!}</h4>
        <h4 >Total Amount &nbsp;&nbsp;{!!$sum!!}</h4></div>
        <div class="dataTable_wrapper TABLE">
            <table class="table" id="dataTables-example" align="center">
                <thead>
                <tr align="center" class="row">
                    <th><b>S.No</b></th>
                    <th><b>Name</b></th>
                    <th><b>Description</b></th>
                    <th>Address</th>
                    <th>State</th>
                    <th>City</th>
                    <th>Gift Amount</th>
                </tr>
                </thead>
                <tbody>
                @foreach($donors as $donor)
                <tr>
                    <td></td>
                    <td>{{$donor->DONOR_NAME}}</td>
                    <td>{{$donor->DONOR_TYPE}}</td>
                    <td>{{$donor->ADDRESS}}</td>
                    <td>{{$donor->STATE_NAME}}</td>
                    <td>{{$donor->CITY_NAME}}</td>
                    <td>{{$donor->FUND_AMOUNT}}</td>
                </tr>
                @endforeach

                </tbody>
            </table>
        </div>
        </body>
        </html>