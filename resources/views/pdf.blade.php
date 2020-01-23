<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <table class="table table-bordered">
    <thead>
      <tr>
        <td><b>Name</b></td>
        <td><b>Company</b></td>
          <td><b>Course</b></td>
      </tr>
      </thead>
      <tbody>
      <tr>
        <td>
{{--            {{ $pdf ?? '' }}--}}
            {{$pdf->name}}
        </td>
        <td>
{{--            {{ $pdf ?? '' }}--}}
          {{$pdf->company}}
        </td>
          <td>
{{--              {{ $pdf ?? '' }}--}}
          {{$pdf->course}}
        </td>
      </tr>
      </tbody>
    </table>
  </body>
</html>
