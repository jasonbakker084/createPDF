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

                    <br>
                     <button type="submit" class="btn btn-primary">Create PDF</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
