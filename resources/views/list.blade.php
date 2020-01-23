@extends('layouts.app')
@section('content')
<table class="table table-striped">
  <thead>
    <th>ID</th>
    <th>Name</th>
    <th>Date</th>
    <th>Company</th>
    <th>Course</th>
    <th>Begin time</th>
    <th>End Time</th>
  </thead>
  <tbody>
    @foreach($pdfs as $pdf)
    <tr>
        <td>{{$pdf->id}}</td>
        <td>{{$pdf->name}}</td>
        <td>{{$pdf->date}}</td>
        <td>{{$pdf->company}}</td>
        <td>{{$pdf->course}}</td>
        <td>{{$pdf->beginTime}}</td>
        <td>{{$pdf->endTime}}</td>
    <td><a href="{{action('CreatePDFController@downloadPDF', $pdf->id)}}">Download PDF</a></td>
        <td><a href="{{ route('createpdfs.edit', $pdf->id)}}" class="btn btn-primary">Edit</a></td>
        <td>
            <form action="{{ route('createpdfs.destroy', $pdf->id)}}" method="post">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection
