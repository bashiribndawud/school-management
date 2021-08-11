

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
                <h3 class="box-title">Assign subject  List</h3>
                <a href="{{ route('assign.subject.add') }}" style="float: right;" class="btn btn-rounded btn-success mb-5">Add Assign Subject</a>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th width="5%">SL</th>
                              <th>Class Name</th>
                              <th width="50%">Action</th>
                              
                          </tr>
                      </thead>
                      <tbody>
                        @foreach($allData as $key => $assign)
                          <tr>
                              <td>{{ $key++ }}</td>
                              <td>{{ $assign->class->name ?? 'Default' }}</td>
                              <td>
                                <a href="{{ route('edit.assign.subject', $assign->class_id) }}" class="btn  btn-info mb-5">Edit</a>
                                <a href="{{ route('details.assign.subject', $assign->class_id) }}" class="btn  btn-primary mb-5" >Details</a>
                                <a href="{{ route('delete.assign.subject', $assign->class_id) }}" class="btn  btn-danger mb-5" id="delete">Delete</a>
                            
                              </td>
                              
                          </tr>
                        @endforeach
                      </tbody>
                      {{-- <tfoot>
                          <tr>
                              <th>Name</th>
                              <th>Position</th>
                              <th>Office</th>
                              <th>Age</th>
                              <th>Start date</th>
                              <th>Salary</th>
                          </tr>
                      </tfoot> --}}
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