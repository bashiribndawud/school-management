@extends('teacher.teacher_master')

@section('teacher')

<div class="content-wrapper">
    <div class="container-full">
      <!-- Content Header (Page header) -->
     
      <!-- Main content -->
      <section class="content">

        <!-- Basic Forms -->
         <div class="box">
           <div class="box-header with-border">
             <h4 class="box-title">Student Attendance</h4>
             <a href="{{ route('teacher.class.attendance.view') }}" style="float: right;" class="btn btn-rounded btn-success mb-5">All attendance</a>
           </div>
           <!-- /.box-header -->
           <div class="box-body">
             <div class="row">
               <div class="col">
                   <form action="{{ route('store.student.attandance') }}" method="POST">
                       @csrf
                     <div class="row">
                       <div class="col-12">	

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <h5>Date<span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input  type="date" name="date" class="form-control"  data-validation-required-message="This field is required"> <div class="help-block"></div></div>
                </div>
            </div>
        </div>
        {{-- End row --}}

        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered table-striped" style="width: 100%;">
                    <thead>
                        <tr>
                            <th rowspan="2" class="text-center" style="vertical-align: middle;">Sl</th>
                            <th rowspan="2" class="text-center" style="vertical-align: middle;">Employee List</th>
                            <th colspan="3" class="text-center" style="vertical-align: middle; width: 30%;">status</th>
                        </tr>

                        <tr>
                            <th class="text-center btn present-all" style="display: table-cell; background-color: black;">Present</th>
                            <th class="text-center btn absent-all" style="display: table-cell; background-color: black;">Absent</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($allData as $key => $student)
                        <tr class="text-center" id="{{ $student->id }}">
                            <input type="hidden" name="student_id[]" value="{{ $student->id }}">
                            <td class="text-white">{{ $key+1 }} </td>
                            <td class="text-white">{{ $student->name }}</td>
                            <td colspan="3">
                                <div class="switch-toggle switch-3 switch-candy">
                                    <input name="status{{ $key }}" type="radio" id="present{{ $key }}" value="present" checked="checked">
                                    <label for="present{{ $key }}">Pressent</label>

                                    <input name="status{{ $key }}" value="absent"  type="radio" id="absent{{ $key }}" >
                                    <label for="absent{{ $key }}">Absent</label>
                
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>







                        


</div>   
                           
                           
                       
                           
                       <div class="text-xs-right">
                          <input type="submit" class="btn btn-rounded btn-info mb-5" value="Submit"> 
                       </div>
                   </form>

               </div>
               <!-- /.col -->
             </div>
             <!-- /.row -->
           </div>
           <!-- /.box-body -->
         </div>
         <!-- /.box -->

       </section>
      <!-- /.content -->
    
    </div>
</div>


@endsection
