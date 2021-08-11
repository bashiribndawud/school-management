@extends('admin.admin_master');

@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="content-wrapper">
    <div class="container-full">
      <!-- Content Header (Page header) -->
     
      <!-- Main content -->
      <section class="content">

        <!-- Basic Forms -->
         <div class="box">
           <div class="box-header with-border">
             <h4 class="box-title">Promote Student</h4>
             
           </div>
           <!-- /.box-header -->
           <div class="box-body">
             <div class="row">
               <div class="col">
                   <form action="{{ route('promote.student.reg', $editData->student_id) }}" method="POST" enctype="multipart/form-data">
                       @csrf
                       <input type="hidden" name="id" value="{{ $editData->id }}">
                     <div class="row">
                       <div class="col-12">	


        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <h5>Student Name <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input  type="text" value="{{ $editData->user->name }}" name="name" class="form-control"  data-validation-required-message="This field is required"> <div class="help-block"></div></div>
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
        
                </div>
            </div> 
            {{-- end row --}}
            <div class="col-md-4">
                <div class="form-group">
                    <h5>Father's Name <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input  type="text" name="fname" value="{{ $editData->user->fname }}" class="form-control"  data-validation-required-message="This field is required"> <div class="help-block"></div></div>
                        @error('fname')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
        
                </div>
            </div>
            {{-- end row --}}
            <div class="col-md-4">
                <div class="form-group">
                    <h5>Mother's Name <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input  type="text" name="mname" value="{{ $editData->user->mname }}" class="form-control"  data-validation-required-message="This field is required"> <div class="help-block"></div></div>
                        @error('mname')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
        
                </div>
            </div>
            {{-- end row --}}
        </div>

        {{-- second row --}}

        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <h5>Mobile <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input  type="text" name="mobile" value="{{ $editData->user->mobile }}" class="form-control"  data-validation-required-message="This field is required"> <div class="help-block"></div></div>
                        @error('mobile')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
        
                </div>
            </div>
            {{-- end row --}}
            <div class="col-md-4">
                <div class="form-group">
                    <h5>Address <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input  type="area" value="{{ $editData->user->address }}" name="address" class="form-control"  data-validation-required-message="This field is required"> <div class="help-block"></div></div>
                        @error('address')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
        
                </div>
            </div>
            {{-- end row --}}
            <div class="col-md-4">
                <div class="form-group">
                    <h5>Gender <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <select name="gender" id="gender" required="" class="form-control" aria-invalid="false">
                            <option value="" selected disabled>Select Gender</option>
                            <option value="male" {{ ($editData->user->gender == "male")? "selected" : "" }}>Male</option>
                            <option value="female" {{ ($editData->user->gender == "female")? "selected" : "" }}>Female</option>
                        </select>
                    <div class="help-block"></div></div>
                </div>
            </div>
        </div>

        {{-- third row --}}

        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <h5>Religion <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <select name="religion" id="religion" required="" class="form-control" aria-invalid="false">
                            <option value="" selected disabled>Select Religion</option>
                            <option value="islam" {{ ($editData->user->religion == "islam")? "selected": "" }}>Islam</option>
                            <option value="christian" {{ ($editData->user->religion == "christian")? "selected" : "" }}>Christian</option>
                            <option value="hindu" {{ ($editData->user->religion == "hindu")? "selected" : "" }}>Hindu</option>
                        </select>
                    <div class="help-block"></div></div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <h5>Date of Birth <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="date" value="{{ $editData->user->dob }}" class="form-control" name="dob" required>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <h5>Discount <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" value="{{ $editData->discount->discount }}" class="form-control" name="discount" required>
                    </div>
                </div>
            </div>
        </div>
        {{-- thourth row --}}
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <h5>Year <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <select name="year_id" id="year" required="" class="form-control" aria-invalid="false">
                            <option value="" selected disabled>Select Year</option>
                            @foreach ($years as $year)
                            <option value="{{ $year->id }}" {{ ($editData->year_id == $year->id)? "selected" : "" }}>{{ $year->name }}</option>
                            @endforeach
                        </select>
                       
                       
                    <div class="help-block"></div></div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <h5>Class <span class="text-danger">*</span></h5>
                    <div class="controls">
                        
                        <select name="class_id" id="religion" required="" class="form-control" aria-invalid="false">
                            <option value="" selected disabled>Select Class</option>
                            @foreach($classes as $class)
                            <option value="{{ $class->id }}" {{ ($editData->class_id == $class->id)? "selected": "" }}>{{ $class->name }}</option>
                            @endforeach
                        </select>
                        
                    <div class="help-block"></div></div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <h5>Group <span class="text-danger">*</span></h5>
                    <div class="controls">
                        
                        <select name="group_id" id="religion" required="" class="form-control" aria-invalid="false">
                            <option value="" selected disabled>Select Group</option>
                            @foreach($groups as $group)
                            <option value="{{ $group->id }}" {{ ($editData->group_id == $group->id)? "selected": "" }}>{{ $group->name }}</option>
                            @endforeach
                        </select>
                        
                    <div class="help-block"></div></div>
                </div>
            </div>
        </div>
        
        {{-- Fifth row --}}

        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <h5>Shift <span class="text-danger">*</span></h5>
                    <div class="controls">
                        
                        <select name="shift_id" id="religion" required="" class="form-control" aria-invalid="false">
                            <option value="" selected disabled>Select Shift</option>
                            @foreach($shifts as $shift)
                            <option value="{{ $shift->id }}" {{ ($editData->shift_id == $shift->id)? "selected" : "" }}>{{ $shift->name }}</option>
                            @endforeach
                        </select>
                        
                    <div class="help-block"></div></div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <h5>Profile Image <span class="text-danger">*</span></h5>
                    <div class="controls">
                    <input type="file" id="image"  id="choose-file" name="image" accept="image/*"  class="form-control" > <div class="help-block"></div></div>
                    
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <div class="controls">
                        <img id="showImage" src="{{ (!empty($editData->user->image))? 
                        url('upload/student_images/'.$editData->user->image) : url('upload/no_image.jpg') }}" alt="No_Image" 
                        style="width: 100px; height: 100px; border: 1px solid black;">
                    </div>
                </div>
            </div>
        </div>





                        


</div>   
                           
                           
                       
                           
                       <div class="text-xs-right">
                          <input type="submit" class="btn btn-rounded btn-info mb-5" value="Promote"> 
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

<script type="text/javascript">

    $(document).ready(function(){
        $(#image).change(function(e){
            e.preventDefault();
            // create a new instance of file reader
            var reader = new FileReader()
            reader.onload = function(e) {
                $(#showImage).attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        })
    })
</script>


@endsection
