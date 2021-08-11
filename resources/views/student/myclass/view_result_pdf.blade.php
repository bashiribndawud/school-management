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
@php
    $count = 0;
    $class_id = Auth::user()->class_id
@endphp
<table id="customers">
  <tr>
    <td><h2>BUK STAFF SCHOOL</h2></td>
    <td><h5>Result for {{ Auth::user()->name }} {{ Auth::user()->fname }}</h5>
    <td><h5>Class: {{ $allData->classId->name }}</h5></td>
    </td>
  </tr>
  
  
</table>
{{-- <table id="customers">
  <tr>
    <th width="10%">SN</th>
    <th width="45%">Student Name</th>
    <th width="45%">Student ID</th>
    <th width="45%">Status</th>
  </tr>
  @foreach($details as $data)
  <tr>
    <td>{{ $count++ }}</td>
    <td>{{ $data->user->name }}</td>
    <td>{{ $data->user->id_no }}</td>
    <td>{{ $data->status }}</td>
  </tr>
  @endforeach
</table> --}}
<br>
<br>
<i style="font-size: 10px; float: right;">Print Data: {{ date("d M Y") }}</i>

</body>
</html>
