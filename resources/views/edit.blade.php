@extends('layout')

@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    <div class="card uper">
        <div class="card-header">
            Update Certificaat
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br />
            @endif
            <form method="post" action="{{ route('createpdfs.update', $pdf->id) }}">
                <div class="form-group">
                    @csrf
                    @method('PATCH')
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" name="name" value="{{ $pdf->name }}"/>
                </div>

                <div class="form-group">
                    <label for="price">Date:</label>
                    <input type="date" class="form-control" name="date" value="{{ $pdf->date }}"/>
                </div>

                <div class="form-group">
                    <label for="price">Company:</label>
                    <input type="text" class="form-control" name="company" value="{{ $pdf->company }}"/>
                </div>
                <div class="form-group">
                    <label for="quantity">Course:</label>
                    <input type="text" class="form-control" name="course" value="{{ $pdf->course }}"/>
                </div>

                <div class="form-group">
                    <label for="price">Begin Time:</label>
                    <input type="time" class="form-control" name="beginTime" value="{{ $pdf->beginTime }}"/>
                </div>

                <div class="form-group">
                    <label for="price">End Time:</label>
                    <input type="time" class="form-control" name="endTime" value="{{ $pdf->endTime }}"/>
                </div>
                <button type="submit" class="btn btn-primary">Update Certificaat</button>
            </form>
        </div>
    </div>
@endsection
