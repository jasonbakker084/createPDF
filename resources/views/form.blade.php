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
                </form>
                <hr>
                <br>
                <br>
                <form class="form-horizontal" action="" method="post" name="uploadCSV"
                      enctype="multipart/form-data">
                    <div class="input-row">
                        <label class="col-md-4 control-label">Choose CSV File</label> <input
                            type="file" name="file" id="file" accept=".csv">
                        <button type="submit" id="submit" name="import"
                                class="btn-submit btn btn-primary">Import</button>
                        <br />
                    </div>
                    <div id="labelError"></div>
                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(
        function() {
            $("#frmCSVImport").on(
                "submit",
                function() {

                    $("#response").attr("class", "");
                    $("#response").html("");
                    var fileType = ".csv";
                    var regex = new RegExp("([a-zA-Z0-9\s_\\.\-:])+("
                        + fileType + ")$");
                    if (!regex.test($("#file").val().toLowerCase())) {
                        $("#response").addClass("error");
                        $("#response").addClass("display-block");
                        $("#response").html(
                            "Invalid File. Upload : <b>" + fileType
                            + "</b> Files.");
                        return false;
                    }
                    return true;
                });
        });
</script>
@endsection
