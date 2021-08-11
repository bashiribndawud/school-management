

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
                <h3 class="box-title">Fee Amount Details</h3>
                <a href="{{ route('add.fee.amount') }}" style="float: right;" class="btn btn-rounded btn-success mb-5">Add Fee Amount</a>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead class="thead-light">
                          <tr>
                              <th width="5%">SL</th>
                              <th>Fee Category</th>
                              <th>class</th>
                              <th>amount</th>
                              
                              
                          </tr>
                      </thead>
                      <tbody>
                        @foreach($allData as $key => $amount)
                          <tr>
                              <td>{{ $key++ }}</td>
                              <td>{{ $amount->fee_category->name }}</td>
                              <td>{{ $amount->class->name }}</td>
                              <td>{{ $amount->amount }}</td>
                              
                              
                          </tr>
                        @endforeach
                      </tbody>
                      <tfoot>
                          <tr>
                              <th>Name</th>
                              <th>Position</th>
                              <th>Office</th>
                              <th>Age</th>
                              <th>Start date</th>
                              <th>Salary</th>
                          </tr>
                      </tfoot>
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