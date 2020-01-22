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
          {{$pdf->name}}
        </td>
        <td>
          {{$pdf->company}}
        </td>
          <td>
          {{$pdf->course}}
        </td>
      </tr>
      </tbody>
    </table>
  </body>
</html>
