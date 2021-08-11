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
    <td><h2>Easy Learning</h2></td>
    <td><h2>Easy ERP</h2>
    <p>School Address</p>
    <p>Phone: {{ $details->mobile }}</p>
    <p>Email: support@bashir4windowslive@hotmail.com</p>
    </td>
  </tr>
  
  
</table>
<table id="customers">
    <thead>
        <tr>
            <th>Sl</th>
            <th>Employee Name</th>
            <th>Previous Salary</th>
            <th>Present Salary</th>
            <th>Increment Salary</th>
            <th>Effected Date</th>
        </tr>
    </thead>
 <tbody>
     @foreach($salary_logs as $key => $salary_log)
        <tr>
            <td>{{ $key++ }}</td>
            <td>{{ $salary_log->user->name }}</td>
            <td>{{ $salary_log->previous_salary }}</td>
            <td>{{ $salary_log->present_salary }}</td>
            <td>{{ $salary_log->increment_salary }}</td>
            <td>{{ date('Y-m-d', strtotime($salary_log->effected_salary)) }}</td>
        </tr>

     @endforeach
 </tbody>
 
     
 
  
</table>
<br>
<br>
<i style="font-size: 10px; float: right;">Print Data: {{ date("d M Y") }}</i>

</body>
</html>
