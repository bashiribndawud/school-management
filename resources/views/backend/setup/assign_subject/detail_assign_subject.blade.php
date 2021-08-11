

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
                <h3 class="box-title">Assign Subject Details</h3>
                <a href="{{ route('add.fee.amount') }}" style="float: right;" class="btn btn-rounded btn-success mb-5">Add Fee Amount</a>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <h4><strong>Assigned Subject: </strong>{{ $detailDatas[0]->class->name }}</h4>
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead class="thead-light">
                          <tr>
                              <th width="5%">SL</th>
                              <th width="20%">Subject</th>
                              <th width="20%">Full mark</th>
                              <th width="20%">Pass Mark</th>
                              <th width="20%">Subjective Mark</th>
                              
                              
                          </tr>
                      </thead>
                      <tbody>
                        @foreach($detailDatas as $key => $detail)
                          <tr>
                              <td>{{ $key++ }}</td>
                              <td>{{ $detail->subject->name }}</td>
                              <td>{{ $detail->full_mark }}</td>
                              <td>{{ $detail->pass_mark }}</td>
                              <td>{{ $detail->subjective_mark }}</td>
                              
                              
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