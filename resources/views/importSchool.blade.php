<div class="box box-success">
        <div class="box-header with-border">
            <h2 class="panel-title"><strong>Family Import</strong></h2>
        </div>
        <div class="box-body">
            <form action="{{url('test-post')}}" class="form-horizontal" method="POST"
                  enctype="multipart/form-data">
                <div class="">
                    <label for="exampleInputFile">File input</label>
                    <input type="file" name="familyCsv" required>

                    <p class="help-block">*Select CSV files only. Click <a
                                href="#" download>here</a> to see example
                        file.</p>
                    {{csrf_field()}}
                </div>
                <input type="submit" name="submit">
            </form>
        </div>
    </div>