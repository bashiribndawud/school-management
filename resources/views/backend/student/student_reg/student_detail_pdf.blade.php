<!DOCTYPE html>
<html>
<head>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}
</style>
</head>
<body>

<table id="customers">
  <tr>
    <td><h2>Bayero University Staff School</h2></td>
    <td><h2>Buk Staff School</h2>
    <p>School Address</p>
    <p>Phone: {{ $details->user->mobile }}</p>
    <p>Email: {{ $details->user->email }}</p>
    </td>
  </tr>
  
  
</table>
<table id="customers">
  <tr>
    <th width="10%">SL</th>
    <th width="45%">Student Details</th>
    <th width="45%">Student Data</th>
  </tr>
  <tr>
    <td>1</td>
    <td>Student Name</td>
    <td>{{ $details->user->name }}</td>
  </tr>
  <tr>
    <td>2</td>
    <td>Father's Name</td>
    <td>{{ $details->user->fname }}</td>
  </tr>
  <tr>
    <td>3</td>
    <td>Student Id No</td>
    <td>{{ $details->user->id_no }}</td>
  </tr>
  <tr>
    <td>4</td>
    <td>Mother's Name</td>
    <td>{{ $details->user->mname }}</td>
  </tr>
  <tr>
    <td>5</td>
    <td>Mobile Number</td>
    <td>{{ $details->user->mobile }}</td>
  </tr>
  
  <tr>
    <td>6</td>
    <td>Address</td>
    <td>{{ $details->user->address }}</td>
  </tr>
  <tr>
    <td>7</td>
    <td>Gender</td>
    <td>{{ $details->user->gender }}</td>
  </tr>
  <tr>
    <td>8</td>
    <td>Religion</td>
    <td>{{ $details->user->religion }}</td>
  </tr>
  <tr>
    <td>9</td>
    <td>Date of Birth</td>
    <td>{{ $details->user->dob }}</td>
  </tr>
  
  <tr>
    <td>10</td>
    <td>Class</td>
    <td>{{ $details->class->name }}</td>
  </tr>
  <tr>
    <td>11</td>
    <td>Year</td>
    <td>{{ $details->year->name }}</td>
  </tr>
  <tr>
    <td>12</td>
    <td>Group</td>
    <td>{{ $details->group->name }}</td>
  </tr>
  <tr>
    <td>13</td>
    <td>Group</td>
    <td>{{ $details->shift->name }}</td>
  </tr>
  <tr>
    <td>15</td>
    <td>Password</td>
    <td>{{ $details->user->code }}</td>
  </tr>
  
</table>
<br>
<br>
<i style="font-size: 10px; float: right;">Print Data: {{ date("d M Y") }}</i>

</body>
</html>
