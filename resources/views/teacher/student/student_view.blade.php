@extends('teacher.teacher_master')

@section('teacher')

<div class="content-wrapper">
    <div class="container-full">
      <!-- Content Header (Page header) -->
     
      <!-- Main content -->
      <section class="content">
        <div class="row">
          
          {{-- Search bar --}}
          

         {{-- End Search bar --}}

          

          <div class="col-12">

           <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Students in <strong>{{ $allData[0]->class->name }}</strong> </h3>
                <a href="{{ route('viewstudent.myclass') }}" style="float: right;" class="btn btn-rounded btn-success mb-5">View Student (Excel)</a>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">
            {{-- if user did not serach (search == 0)--}}
            @if(!@$search)
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th>SN</th>
                              <th>Student Id No</th>
                              <th>Student Name</th>
                              <th>Year of Entry</th>
                              
                              <th>Image</th>
                             
                            
                              
                          </tr>
                      </thead>
                      <tbody>
                        @foreach($allData as $key => $value)
                          <tr>
                              <td class="text-white">{{ $key++ }}</td>
                              <td class="text-white">{{ $value->user->id_no }}</td>
                              <td class="text-white">{{ $value->user->name }}</td>
                              <td class="text-white">{{ $value->year->name }}</td>
                              
                              <td><img src="{{ (!empty($value->user->image))? 
                                    url('upload/student_images/'.$value->user->image) : 
                                    url('upload/no_image.jpg')}}"
                                    style="width: 70px; height: 70px;"></td>
                              
                              
                              
                              
                              
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
                            <th>Year</th>
                            <th>Class</th>
                            <th>Image</th>
                           
                          
                        
                            <th>Action</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                      @foreach($allData as $key => $value)
                        <tr>
                            <td class="text-white">{{ $key++ }}</td>
                            <td class="text-white">{{ $value->user->name }}</td>
                            <td class="text-white">{{ $value->user->id_no }}</td>
                            <td class="text-white">{{ $value->year->name }}</td>
                            <tdnclass="text-white">{{ $value->class->name }}</td>
                            <td><img src="{{ (!empty($value->user->image))? 
                                  url('upload/student_images/'.$value->user->image) : 
                                  url('upload/no_image.jpg')}}"
                                  style="width: 70px; height: 70px;"></td>
                            
                            
                            
                            <td>
                              <a href="{{ route('student.registration.edit', $value->student_id) }}" class="btn  btn-info mb-5">Edit</a>
                              <a href="{{ route('student.promote', $value->student_id) }}" class="btn  btn-secondary mb-5" >Promote</a>
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