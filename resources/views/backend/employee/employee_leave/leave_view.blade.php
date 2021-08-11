

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
                <h3 class="box-title">Teacher Leave</h3>
                <a href="{{ route('add.leave') }}" style="float: right;" class="btn btn-rounded btn-success mb-5">Add Leave</a>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th width="5%">SL</th>
                              <th width="20%">Employee name</th>
                              @if(Auth::user()->role === "Admin")
                              <th>Id NO</th>
                              @endif
                              <th>Purpose</th>
                              <th width="15%">Start Date</th>
                              <th width="15%">End Date</th>
                              <th width="50%">Action</th>
                              
                          </tr>
                      </thead>
                      <tbody>
                        @foreach($allData as $key => $leave)
                          <tr>
                              <td>{{ $key++ }}</td>
                              <td>{{ $leave->user->name }}</td>
                              @if(Auth::user()->role === "Admin")
                              <td>{{ $leave->user->id_no }}</td>
                              @endif
                              <td>{{ $leave->purpose->name }}</td>
                              <td>{{ $leave->leave_start_date }}</td>
                              <td>{{ $leave->leave_end_date }}</td>
                              
                              <td>
                                <a href="{{ route('edit.employee.leave', $leave->id) }}" class="btn  btn-info mb-5">Edit</a>
                                
                                <a href="{{ route('delete.employee.leave', $leave->id) }}" class="btn  btn-danger mb-5" id="delete">Delete</a>
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