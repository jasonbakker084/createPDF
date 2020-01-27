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
        <td><b>Name</b></td><br>
          <td><b>Date</b></td><br>
        <td><b>Company</b></td><br>
          <td><b>Course</b></td><br>
          <td><b>Begin Time</b></td><br>
          <td><b>End Time</b></td><br>
      </tr>
      </thead>
      <tbody>
      <tr>
        <td>
            {{$pdf->name}}
        </td><br>
          <td>
              {{$pdf->date}}
          </td><br>
        <td>
          {{$pdf->company}}
        </td><br>
          <td>
          {{$pdf->course}}
        </td><br>
          <td>
              {{$pdf->beginTime}}
          </td><br>
          <td>
              {{$pdf->endTime}}
          </td><br>
      </tr>
      </tbody>
    </table>
  </body>
</html>
