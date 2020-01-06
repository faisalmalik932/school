@extends('Template.master')
@section('title', 'Import Students')
@section('content')
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title">Users</h5>
            <div class="heading-elements">
                <ul class="icons-list">
                    <li><a data-action="collapse"></a></li>
                    <li><a data-action="reload" title="Reset Form"></a></li>
                </ul>
            </div>
        </div>
        <div class="panel-body">
            <form method="POST" action="{{ url('import/import-students') }}" name="myForm" id="DATAFORM" enctype="multipart/form-data">
                {{ csrf_field() }}
                @include('Template.Components.messages')
                @if (Session::has('users'))
                    <div class="alert alert-success" id="success-alert">
                        <button type="button" class="close" data-dismiss="alert">x</button>
                        <strong>{{ Session::get('users') }}</strong>
                    </div>
                @endif
                <input id="primaryid" name="primary" type="hidden"/>
                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                            <label class="control-label col-lg-12">Import Data (Upload CSV Only)</label>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <div class="col-lg-12">
                                <input type="file" name="file" class="file-styled">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <div class="col-lg-12">
                                <button type="submit" class="btn btn-primary IMPORT"><i class="icon-import position-left"></i> Import Data</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                            <label class="control-label col-lg-12"><a href="https://peb.edu.pk/portal/storage/template_full_school_name.csv">Download Student CSV Template</a></label>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('jsheader')
    <script  type="text/javascript" src="{{ asset('js/platform/users.js') }}"></script>
@endsection
