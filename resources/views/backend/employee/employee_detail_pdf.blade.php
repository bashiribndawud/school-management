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
    <td><h2>Bayero University</h2></td>
    <td><h2>BUK STAFF SCHOOL</h2>
    <p>School Address</p>
    <p>Phone: {{ $details->mobile }}</p>
    <p>Email: {{ $details->email }}</p>
    </td>
  </tr>
  
  
</table>
<table id="customers">
    <tr>
        <td><h2>
            <?php $image_path = '/upload/easychool.png' ?>
            <img src="{{ public_path() .$image_path }}" style="width: 200; height: 100;" alt="">
        </h2></td>
    </tr>
  <tr>
    <th width="10%">SL</th>
    <th width="45%">Employee Details</th>
    <th width="45%">Employee Data</th>
  </tr>
  <tr>
    <td>1</td>
    <td>Employee Name</td>
    <td>{{ $details->name }}</td>
  </tr>
  <tr>
    <td>1</td>
    <td>SurName </td>
    <td>{{ $details->fname }}</td>
  </tr>
  <tr>
    <td>1</td>
    <td>Employee Password</td>
    <td>{{ $details->code }}</td>
  </tr>
  <tr>
    <td>1</td>
    <td>Employee Id No</td>
    <td>{{ $details->id_no }}</td>
  </tr>
  <tr>
    <td>1</td>
    <td>Employee Name</td>
    <td>{{ $details->mname }}</td>
  </tr>
  <tr>
    <td>1</td>
    <td>Address</td>
    <td>{{ $details->address }}</td>
  </tr>
  <tr>
    <td>1</td>
    <td>Gender</td>
    <td>{{ $details->gender }}</td>
  </tr>
  <tr>
    <td>1</td>
    <td>Religion</td>
    <td>{{ $details->religion }}</td>
  </tr>
  <tr>
    <td>1</td>
    <td>Date of Birth</td>
    <td>{{ date('d-m-Y' ,strtotime($details->dob))  }}</td>
  </tr>

  <tr>
    <td>1</td>
    <td>Join_Date</td>
    <td>{{ date('d-m-Y', strtotime($details->join_date))  }}</td>
  </tr>
  <tr>
      <td>1</td>
      <td>Designation</td>
      <td>{{ $details->designation->name }}</td>
  </tr>
  <tr>
      <td>1</td>
      <td>Salary</td>
      <td>{{ $details->salary }}</td>
  </tr>
  
</table>
<br>
<br>
<i style="font-size: 10px; float: right;">Print Data: {{ date("d M Y") }}</i>

</body>
</html>
