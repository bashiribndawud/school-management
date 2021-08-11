

@extends('teacher.teacher_master')

@section('teacher')

<div class="content-wrapper">
    <div class="container-full">
      <!-- Content Header (Page header) -->
     
      <!-- Main content -->
      <section class="content">
        <div class="row">
            
          

         

          

          <div class="col-12">

           <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">All Attendance</h3>
                <a href="{{ route('student.add.attendance') }}" style="float: right;" class="btn btn-rounded btn-success mb-5">Take Attendance</a>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th width="5%">SN</th>
                              
                              <th width="15%">Date</th>
                              
                              <th width="50%">Action</th>
                              
                          </tr>
                      </thead>
                      <tbody>
                        @foreach($allData as $key => $value)
                          <tr>
                              <td class="text-white">{{ $key++ }}</td>
                             
                              <td class="text-white">{{ date('Y-m-d', strtotime($value->date)) }}</td>
                            
                              
                              <td>
                                <a href="{{ route('student.attend.edit', $value->date) }}" class="btn  btn-info mb-5">Edit</a>
                                
                                <a href="{{ route('student.attend.detail', $value->date) }}" class="btn  btn-primary mb-5"><i class="fa fa-eye"></i> View Detail</a>
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