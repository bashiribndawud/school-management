

@extends('admin.admin_master')

@section('admin')

<div class="content-wrapper">
    <div class="container-full">
      <!-- Content Header (Page header) -->
     
      <!-- Main content -->
      <section class="content">
        <div class="row">
            
          

         

          

          <div class="col-12">

           <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Teachers Salary List</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th width="5%">SL</th>
                              <th>name</th>
                              <th>Id</th>
                              <th>Mobile</th>
                              <th>gender</th>
                              <th width="35%">Join Data</th>
                              <th>Salary</th>
                              <th width="70%">Action</th>
                              
                          </tr>
                      </thead>
                      <tbody>
                        @foreach($allData as $key => $salary)
                          <tr>
                              <td>{{ $key++ }}</td>
                              <td>{{ $salary->name }}</td>
                              <td>{{ $salary->id_no }}</td>
                              <td>{{ $salary->mobile }}</td>
                              
                              <td>{{ $salary->gender }}</td>
                              <td>{{ date('Y-m-d', strtotime($salary->join_date))  }}</td>
                              <td>{{ $salary->salary }}</td>
                              <td>
                                <a title="Increment" href="{{ route('employee.salary.increment', $salary->id) }}" class="btn  btn-info mb-5"><i class="fa fa-plus-circle"></i></a>
                                
                                <a title="Details" target="_blank" href="{{ route('employee.salary.details', $salary->id) }}" class="btn  btn-danger mb-5"><i class="fa fa-eye"></i></a>
                              </td>
                              
                          </tr>
                        @endforeach
                      </tbody>
                      
                    </table>
                  </div>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->

                    
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </section>
      <!-- /.content -->
    
    </div>
</div>

    	

@endsection