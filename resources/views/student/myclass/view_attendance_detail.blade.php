
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
                    <h3 class="box-title"><strong>Welcome {{ Auth::user()->name }} {{ Auth::user()->fname }} this are your attendance detail for {{ $allData[0]->date }}</strong></h3>
                    
                  </div>
                  {{-- end --}}
                  <div class="col-md-4">
                    <a href="{{ route('student.view.attendance') }}" style="float: right;" class="btn btn-rounded btn-success mb-5"><i class="fa fa-fw fa-arrow-left"></i></a>
                    
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
                              <th>Name</th>
                              <th>Surname</th>
                              <th>ID No</th>
                         
                              <th>Status</th>
                              
                              
                          </tr>
                      </thead>
                      <tbody>
                        @foreach($allData as $key => $detail)
                          <tr>
                              <td>{{ $key++ }}</td>
                              <td>{{ $detail->user->name}}</td>
                              <td>{{ $detail->user->fname}}</td>
                              <td>{{ $detail->user->id_no }}</td>
                              @if($detail->status == 'present')
                                <span><td class="badge badge-success">{{ strtoupper($detail->status) }}</td></span>
                              @elseif($detail->status == 'absent')
                              <span><td style="margin-right: 5px;" class="badge badge-danger">{{ strtoupper($detail->status) }}</td></span>
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