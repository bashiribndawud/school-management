@extends('admin.admin_master')

@section('admin')

<div class="content-wrapper">
    <div class="container-full">
      <!-- Content Header (Page header) -->
     
      <!-- Main content -->
      <section class="content">
        <div class="row">
          
          {{-- Search bar --}}
          <div class="col-12">
            
              <div class="box bb-3 border-warning">
                <div class="box-header">
                <h4 class="box-title">Search <strong>Student</strong></h4>
                </div>
      
                <div class="box-body">
                
                  <form action="{{ route('student.year.class.search') }}" method="GET">
    
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                            <h5>Year <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <select name="year_id" id="year" required="" class="form-control" aria-invalid="false">
                                    <option value="" selected disabled>Select Year</option>
                                    @foreach ($years as $year)
                                    <option value="{{ $year->id }}" {{ ($year_id == $year->id)? "selected" : "" }}>{{ $year->name }}</option>
                                    @endforeach
                                </select>
                              
                              
                            <div class="help-block"></div></div>
                        </div>
                    </div>
                    {{-- End year col --}}
    
                    <div class="col-md-4">
                      <div class="form-group">
                          <h5>Class <span class="text-danger">*</span></h5>
                          <div class="controls">
                              
                              <select name="class_id" id="religion" required="" class="form-control" aria-invalid="false">
                                  <option value="" selected disabled>Select Class</option>
                                  @foreach($classes as $class)
                                  <option value="{{ $class->id }}" {{ ($class_id == $class->id)? "selected" : "" }}>{{ $class->name }}</option>
                                  @endforeach
                              </select>
                              
                          <div class="help-block"></div></div>
                      </div>
                  </div>
                  {{-- End class col --}}
                  <div class="col-md-4" style="padding-top: 25px;">
                    <input type="submit" class="btn btn-rounded btn-dark mb-5" name="search" value="Search" >
                  </div>
    
                    </div>
                  
                  </form>
    
                </div>
              </div>

          </div>

         {{-- End Search bar --}}

          

          <div class="col-12">

           <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Student List</h3>
                <a href="{{ route('student.reg.export') }}" style="float: right;" class="btn btn-rounded btn-primary mb-5">Export Student (Excel)</a>
                <a href="{{ route('student.reg.add') }}" style="float: right;" class="btn btn-rounded btn-success mb-5 mr-5">Add Student</a>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">
            {{-- if user did not serach (search == 0)--}}
            @if(!@$search)
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th>SL</th>
                              <th>Name</th>
                              <th>Id No</th>
                              
                              <th>Year</th>
                              <th>Class</th>
                              <th>Image</th>
                              @if(Auth::user()->role === "admin")
                              <th>Code</th>
                              @endif
                              <th>Action</th>
                              
                          </tr>
                      </thead>
                      <tbody>
                        @foreach($allData as $key => $value)
                          <tr>
                              <td>{{ $key++ }}</td>
                              <td>{{ $value->user->name }}</td>
                              <td>{{ $value->user->id_no }}</td>
                              
                              <td>{{ $value->year->name }}</td>
                              <td>{{ $value->class->name }}</td>
                              <td><img src="{{ (!empty($value->user->image))? 
                                    url('upload/student_images/'.$value->user->image) : 
                                    url('upload/no_image.jpg')}}"
                                    style="width: 70px; height: 70px;"></td>
                              <td>{{ $value->user->code }}</td>
                              
                              
                              
                              <td>
                                <a href="{{ route('student.registration.edit', $value->student_id) }}" class="btn btn-rounded btn-info mb-5"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                {{-- <a href="{{ route('student.promote', $value->student_id) }}" class="btn btn-rounded btn-success mb-5" ><i class="fa fa-check" aria-hidden="true"></i></a> --}}
                                <a target="_blank" href="{{ route('student.promote.detail', $value->student_id) }}" class="btn btn-rounded btn-dark mb-5" ><i class="fa fa-low-vision" aria-hidden="true"></i></a>
                              </td>
                              
                          </tr>
                        @endforeach
                      </tbody>
                     
                    </table>
                    {{-- display searched result in table --}}
            @else 

                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Name</th>
                            <th>Id No</th>
                            <th>Roll</th>
                            <th>Year</th>
                            <th>Class</th>
                            <th>Image</th>
                            @if(Auth::user()->role === "Admin")
                            <th>Code</th>
                            @endif
                            <th>Action</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                      @foreach($allData as $key => $value)
                        <tr>
                            <td>{{ $key++ }}</td>
                            <td>{{ $value->user->name }}</td>
                            <td>{{ $value->user->id_no }}</td>
                            <td>{{ $value->roll }}</td>
                            <td>{{ $value->year->name }}</td>
                            <td>{{ $value->class->name }}</td>
                            <td><img src="{{ (!empty($value->user->image))? 
                                  url('upload/student_images/'.$value->user->image) : 
                                  url('upload/no_image.jpg')}}"
                                  style="width: 70px; height: 70px;"></td>
                            <td>{{ $value->user->code }}</td>
                            
                            
                            
                            <td>
                              <a href="{{ route('student.registration.edit', $value->student_id) }}" class="btn  btn-info mb-5">Edit</a>
                              {{-- <a href="{{ route('student.promote', $value->student_id) }}" class="btn  btn-secondary mb-5" >Promote</a> --}}
                              <a target="_blank" href="{{ route('student.promote.detail', $value->student_id) }}" class="btn  btn-secondary mb-5" >Details</a>
                            </td>
                            
                        </tr>
                      @endforeach
                    </tbody>
                   
                  </table>


          @endif
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