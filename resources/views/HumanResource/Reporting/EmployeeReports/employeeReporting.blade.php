    <!DOCTYPE html>
    <html>
        <head>
            <title>Test Pdf</title>
        </head>
        <body>
            <div class="dataTable_wrapper">
                <table width="100%" class="table" id="dataTables-example">
                    <thead>
                    <tr style="border-style: solid;color: #01a252">
                        <th >Full Name</th>
                        <th>Father Name</th>
                        <th>Status</th>
                        <th>Gender</th>
                        <th>Mobile</th>
                        <th>Email</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($employees as $employee)
                    <tr>
                        <td>{{$employee->FULL_NAME}}</td>
                        <td>{{$employee->FATHER_NAME}}</td>
                        <td>{{$employee->STATUS}}</td>
                        <td>{{$employee->GENDER}}</td>
                        <td>{{$employee->MOBILE_NUMBER}}</td>
                        <td>{{$employee->PERSONAL_EMAIL}}</td>
                    </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </body>
    </html>