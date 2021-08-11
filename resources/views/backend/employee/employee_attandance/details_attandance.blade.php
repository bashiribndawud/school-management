

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
                <h3 class="box-title">Teachers Attendance Details</h3>
                <a href="{{ route('employee.attendance.view') }}" style="float: right;" class="btn btn-rounded btn-success mb-5"><i class="fa fa-fw fa-arrow-left"></i>All Attendance</a>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th width="5%">SL</th>
                              <th>Name</th>
                              <th>ID No</th>
                              <th width="15%">Date</th>
                              <th>Status</th>
                              
                              
                          </tr>
                      </thead>
                      <tbody>
                        @foreach($details as $key => $detail)
                          <tr>
                              <td>{{ $key++ }}</td>
                              <td>{{ $detail->user->name}}</td>
                              <td>{{ $detail->user->id_no }}</td>
                              <td>{{ date('Y-m-d', strtotime($detail->date)) }}</td>
                              <td>{{ $detail->status }}</td>
                       
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