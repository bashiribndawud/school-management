
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
                <div class="row">
                  <div class="col-md-8">
                    <h3 class="box-title">Name: {{ Auth::user()->name }} </h3>
                    <div>
                        <h3 class="badge badge-success">ID_NO: {{ Auth::user()->id_no }}</h3>
                        <h3 class="mt-5">Class: </h3>
                    </div>
                    
                  </div>
                  {{-- end --}}
                  <div class="col-md-4">
                    <a target="_blank" href="{{ route('student.view.result.pdf') }}" style="float: right;" class="btn btn-rounded btn-primary mb-5"><i class="fa fa-download" aria-hidden="true"></i>View Pdf</a>
                    
                  </div>
                </div>
               
               
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th width="5%">SN</th>
                              <th>English</th>
                              <th>Mathematic</th>
                              <th>Further Mathematic</th>
                              <th>Hausa</th>
                              <th>Basic Science</th>
                              
                              
                          </tr>
                      </thead>
                      <tbody>
                        @foreach($allData as $key => $detail)
                          <tr>
                              <td>{{ $key++ }}</td>
                              <td>{{ $detail->english}}</td>
                              <td>{{ $detail->mathematics}}</td>
                              <td>{{ $detail->further_math }}</td>
                              <td>{{ $detail->hausa }}</td>
                              <td>{{ $detail->basic_science }}</td>
                              
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