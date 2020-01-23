@extends('layout')
@section('content')
<table class="table table-striped">
  <thead>
    <th>ID</th>
    <th>Name</th>
    <th>Company</th>
    <th>Course</th>
  </thead>
  <tbody>
    @foreach($pdfs as $pdf)
    <tr>
      <td>{{$pdf->id}}</td>
      <td>{{$pdf->name}}</td>
      <td>{{$pdf->company}}</td>
      <td>{{$pdf->course}}</td>
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
