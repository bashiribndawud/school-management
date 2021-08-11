

@extends('student.student_master')

@section('student')

<div class="content-wrapper">
    <div class="container-full">
      <!-- Content Header (Page header) -->
     
      <!-- Main content -->
      <section class="content">
        <div class="row">
            
          

         

          

          <div class="col-12">

           <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">{{ Auth::user()->name }} this are you attendance details</h3>
                <a href="{{ route('student.view.subjects') }}" style="float: right;" class="btn btn-rounded btn-success mb-5"><i class="fa fa-fw fa-arrow-left"></i>Subjects</a>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th width="15%">SN</th>
                              <th width="15%">ID</th>
                            
                              
                              <th width="15%">DATE</th>
                              <th width="15%">STATUS</th>
                              
                              
                              
                          </tr>
                      </thead>
                      <tbody>
                        @foreach($allData as $key => $value)
                          <tr>
                              <td>{{ $key++ }}</td>
                              <td>{{ $value->user->id_no }}</td>
             
                              <td>{{ date('Y-m-d', strtotime($value->date)) }}</td>
                              <td>{{ $value->status}}</td> 
                              
                              
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