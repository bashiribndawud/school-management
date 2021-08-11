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
             <h4 class="box-title">Edit Teacher Detail</h4>
             <h6 class="box-subtitle">{{ __('Ensure your account is using a long, random password to stay secure.') }}</h6>
           </div>
           <!-- /.box-header -->
           <div class="box-body">
             <div class="row">
               <div class="col">
                   <form action="{{ route('update.employee.reg', $editData->id) }}" method="POST" enctype="multipart/form-data">
                       @csrf
                     <div class="row">
                       <div class="col-12">	


        <div class="row">
            {{-- <div class="col-md-4">
                <div class="form-group">
                    <h5>Employee Name <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input  type="text" value="{{ $editData->name }}" name="name" class="form-control"  data-validation-required-message="This field is required"> <div class="help-block"></div></div>
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
        
                </div>
            </div>  --}}
            {{-- end row --}}
            {{-- <div class="col-md-4">
                <div class="form-group">
                    <h5>Father's Name <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input  type="text" value="{{ $editData->fname }}" name="fname" class="form-control"  data-validation-required-message="This field is required"> <div class="help-block"></div></div>
                        @error('fname')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
        
                </div>
            </div> --}}
            {{-- end row --}}
            {{-- <div class="col-md-4">
                <div class="form-group">
                    <h5>Mother's Name <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input  type="text" value="{{ $editData->mname }}" name="mname" class="form-control"  data-validation-required-message="This field is required"> <div class="help-block"></div></div>
                        @error('mname')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
        
                </div>
            </div> --}}
            {{-- end row --}}
        </div>

        {{-- second row --}}

        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <h5>Mobile <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input  type="text" value="{{ $editData->mobile }}" name="mobile" class="form-control"  data-validation-required-message="This field is required"> <div class="help-block"></div></div>
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
                        <input  type="area" value="{{ $editData->address }}" name="address" class="form-control"  data-validation-required-message="This field is required"> <div class="help-block"></div></div>
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
                            <option value="male" {{ ($editData->gender === "male")? "selected" : "" }}>Male</option>
                            <option value="female" {{ ($editData->gender === "female")? "selected" : "" }}>Female</option>
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
                            <option value="islam" {{ ($editData->religion === "islam")? "selected" : "" }}>Islam</option>
                            <option value="christian" {{ ($editData->religion === "christian")? "selected" : "" }}>Christian</option>
                            <option value="hindu" {{ ($editData->religion === "hindu")? "selected" : "" }}>Hindu</option>
                        </select>
                    <div class="help-block"></div></div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <h5>Date of Birth <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="date" value="{{ $editData->dob }}" class="form-control" name="dob" required>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <h5>Designation <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <select name="designation_id" id="year" required="" class="form-control" aria-invalid="false">
                            <option value="" selected disabled>Select Designation</option>
                            @foreach ($designations as $designation)
                            <option value="{{ $designation->id }}" {{ ($editData->designation_id === $designation->id)? "selected" : ""}}>{{ $designation->name }}</option>
                            @endforeach
                        </select>
                       
                       
                    <div class="help-block"></div></div>
                </div>
            </div>
            
        </div>
        
        {{-- Fifth row --}}

        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <h5>Salary <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input  type="text" value="{{ $editData->salary }}" name="salary" class="form-control"  data-validation-required-message="This field is required"> <div class="help-block"></div></div>
                        @error('salary')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
        
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <h5>Join Date <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="date" value="{{ $editData->join_date }}" class="form-control" name="join_date" required>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <h5>Profile Image <span class="text-danger">*</span></h5>
                    <div class="controls">
                    <input type="file" id="image"  id="choose-file" name="image" accept="image/*"  class="form-control" > <div class="help-block"></div></div>
                    
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <div class="controls">
                        <img id="showImage" src="{{  (!empty($editData->image))? url('upload/employee_images/'.$editData->image) :
                        url('/upload/no_image.jpg') }}" alt="No_Image" 
                        style="width: 100px; height: 100px; ">
                    </div>
                </div>
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
