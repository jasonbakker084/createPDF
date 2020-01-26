@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Maak PDF</div>

                <form method="post" action="{{ route('createpdf.store') }}">
                     <div class="form-group">
                     @csrf
                     <label>Naam:</label><br>
                     <input type="text" class="form-control" name="name"/><br>
{{--                     <input type="hidden" id="notification">--}}
                     </div>

                    <div class="form-group">
                        <label>Datum:</label><br>
                        <input type="date" class="form-control" name="date"/><br>
                    </div>

                       <div class="form-group">
                     <label>Bedrijfsnaam:</label><br>
                     <input type="text" class="form-control" name="company"/><br>
                       </div>

                    <div class="form-group">
                     <label>Deelgenomen training:</label><br>
                     <input type="text" class="form-control" name="course"/><br>
                    </div>

                    <div class="form-group">
                        <label>Begin tijd:</label><br>
                        <input type="time" class="form-control" name="beginTime"/><br>
                    </div>

                    <div class="form-group">
                        <label>Eind tijd:</label><br>
                        <input type="time" class="form-control" name="endTime"/><br>
                    </div>

                    <br>
                     <button type="submit" class="btn btn-primary">Create PDF</button>

                <hr>
                <br>
                <br>
{{--                <div class="fileupload fileupload-new" data-provides="fileupload">--}}
{{--    <span class="btn btn-primary btn-file"><span class="fileupload-new" tooltip="One with headers">Select a CSV file</span>--}}
{{--    <span class="fileupload-exists">Change</span>         <input type="file" id="csv-file" /></span>--}}
{{--                    <span class="fileupload-preview"></span>--}}
{{--                    <a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none">×</a>--}}
{{--                </div>--}}
{{--                <table id="csv-table" class="table table-stripped table-bordered" data-toggle="table"></table>--}}
{{--                <span id="upload" data-action="submit" class="btn btn-success">Upload</span>--}}
{{--                <span id="export" data-action="export" class="btn btn-success">Export</span>--}}
{{--                <span id="notification" class=""></span>--}}
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
