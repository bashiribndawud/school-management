
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
                <div class="row">
                  <div class="col-md-8">
                    <h3 class="box-title">Attendance Detail for <strong>{{ $allData[0]->date }}</strong></h3>
                    <h5>Number of Students Present <a class="btn btn-success" onclick="return false;">{{ count($present) }}</a></h5>
                    <h5>Number of Students Absent <a class="btn btn-danger" onclick="return false;">{{ count($absent) }}</a></h5>
                  </div>
                  {{-- end --}}
                  <div class="col-md-4">
                    <a href="{{ route('teacher.class.attendance.view') }}" style="float: right;" class="btn btn-rounded btn-success mb-5"><i class="fa fa-fw fa-arrow-left"></i></a>
                    {{-- <a target="_blank" href="{{ route('teacher.class.attendance.view.pdf', $allData[0]->date) }}" style="float: right;" class="btn btn-rounded btn-primary mr-5 mb-5"><i class="fa fa-fw fa-arrow-down"></i>View PDF</a> --}}
                  </div>
                </div>
               
               
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
                         
                              <th>Status</th>
                              
                              
                          </tr>
                      </thead>
                      <tbody>
                        @foreach($allData as $key => $detail)
                          <tr>
                              <td class="text-white">{{ $key++ }}</td>
                              <td class="text-white">{{ $detail->user->name}}</td>
                              <td class="text-white">{{ $detail->user->id_no }}</td>
                              @if($detail->status == 'present')
                                <span><td class="badge text-white badge-success badge-sm">{{ strtoupper($detail->status) }}</td></span>
                              @elseif($detail->status == 'absent')
                              <span><td style="margin-right: 5px;" class="badge text-white badge-danger badge-sm">{{ strtoupper($detail->status) }}</td></span>
                              @endif
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