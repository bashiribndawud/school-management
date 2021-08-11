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
                <h3 class="box-title">User List</h3>
                <a href="{{ route('add.user') }}" style="float: right;" class="btn btn-rounded btn-success mb-5">Add User</a>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th>SN</th>
                             
                              <th>Name</th>
                              <th>Email</th>
                              <th>Code</th>
                              <th>Action date</th>
                              
                          </tr>
                      </thead>
                      <tbody>
                        <?php $count = 0 ?>
                        @foreach($alldata as $user)
                          <tr>
                              <td>{{ $count++ }}</td>
                            
                              <td>{{ $user->name }}</td>
                              <td>{{ $user->email }}</td>
                              <td>{{ $user->code }}</td>
                              <td>
                                <a href="{{ route('user.edit', $user->id) }}" class="btn  btn-info mb-5">Edit</a>
                                <a href="{{ route('user.delete', $user->id) }}" class="btn  btn-danger mb-5" id="delete">Delete</a>
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