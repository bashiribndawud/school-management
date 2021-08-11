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
             <h4 class="box-title">Register a Teacher</h4>
             <h6 class="box-subtitle">{{ __('Ensure your account is using a long, random password to stay secure.') }}</h6>
           </div>
           <!-- /.box-header -->
           <div class="box-body">
             <div class="row">
               <div class="col">
                   <form action="{{ route('store.employee.reg') }}" method="POST" enctype="multipart/form-data">
                       @csrf
                     <div class="row">
                       <div class="col-12">	


        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <h5>Employee First Name <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input  type="text" name="name" class="form-control"  data-validation-required-message="This field is required"> <div class="help-block"></div></div>
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
        
                </div>
            </div> 
            {{-- end row --}}
            <div class="col-md-4">
                <div class="form-group">
                    <h5>Surname<span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input  type="text" name="fname" class="form-control"  data-validation-required-message="This field is required"> <div class="help-block"></div></div>
                        @error('fname')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
        
                </div>
            </div>
            {{-- end row --}}
            <div class="col-md-4">
                <div class="form-group">
                    <h5>Miden Name <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input  type="text" name="mname" class="form-control"  data-validation-required-message="This field is required"> <div class="help-block"></div></div>
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
                    <h5>Email <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input  type="email" name="email" class="form-control"  data-validation-required-message="This field is required"> <div class="help-block"></div></div>
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
        
                </div>
            </div>
            {{-- end row --}}
            <div class="col-md-4">
                <div class="form-group">
                    <h5>Address <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input  type="area" name="address" class="form-control"  data-validation-required-message="This field is required"> <div class="help-block"></div></div>
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
                            <option value="male">Male</option>
                            <option value="female">Female</option>
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
                            <option value="islam">Islam</option>
                            <option value="christian">Christian</option>
                            <option value="hindu">Hindu</option>
                        </select>
                    <div class="help-block"></div></div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <h5>Date of Birth <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="date" class="form-control" name="dob" required>
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
                            <option value="{{ $designation->id }}">{{ $designation->name }}</option>
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
                    <h5>Salary <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input  type="text" name="salary" class="form-control"  data-validation-required-message="This field is required"> <div class="help-block"></div></div>
                        @error('salary')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
        
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <h5>Join Date <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="date" class="form-control" name="join_date" required>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                    <div class="form-group">
                        <h5>Class<span class="text-danger">*</span></h5>
                        <div class="controls">
                            <select name="class_id" id="year" required="" class="form-control" aria-invalid="false">
                                <option value="" selected disabled>Select class</option>
                                @foreach ($classes as $class)
                                <option value="{{ $class->id }}">{{ $class->name }}</option>
                                @endforeach
                            </select>
                        <div class="help-block"></div></div>
                    </div>       
            </div>
            
            
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <h5>Mobile <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input  type="text" name="mobile" class="form-control"  data-validation-required-message="This field is required"> <div class="help-block"></div></div>
                        @error('mobile')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
        
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <h5>Qualification<span class="text-danger">*</span></h5>
                    <div class="controls">
                        <select name="qualification" id="" required="" class="form-control" aria-invalid="false">
                            <option value="" selected disabled>Select Qualification</option>
                            
                            <option value="bachelor">Bachelor Degree</option>
                            <option value="masters">Masters</option>
                            <option value="Phd">Phd</option>
                            
                        </select>
                    <div class="help-block"></div></div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <h5>Discipline<span class="text-danger">*</span></h5>
                    <div class="controls">
                        <select name="discipline" id="" required="" class="form-control" aria-invalid="false">
                            <option value="" selected disabled>Select Qualification</option>
                            
                            <option value="bachelor">Computer Science</option>
                            <option value="masters">Mathematic Education</option>
                            <option value="Phd">Physics Education</option>
                            <option value="Phd">English Education</option>
                            <option value="Phd">Literature</option>
                            
                        </select>
                    <div class="help-block"></div></div>
                </div>
            </div>
            
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <h5>Blood Group <span class="text-danger">*</span></h5>
                    <div class="controls">
                        
                        <select name="blood_group" id="blood" required="" class="form-control" aria-invalid="false">
                            <option value="" selected disabled>Select Blood Group</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="AB">AB</option>
                            <option value="O">O</option>
                        </select>
                        
                    <div class="help-block"></div></div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <h5>Genotype <span class="text-danger">*</span></h5>
                    <div class="controls">
                        
                        <select name="genotype" id="blood" required="" class="form-control" aria-invalid="false">
                            <option value="" selected disabled>Select Genotype</option>
                            <option value="AA">AA</option>
                            <option value="AO">AO</option>
                            <option value="BB">BB</option>
                            <option value="AB">AB</option>
                            <option value="BO">BO</option>
                            <option value="OO">OO</option>
                        </select>
                        
                    <div class="help-block"></div></div>
                </div>
            </div>
           

            <div class="col-md-4">
                <div class="form-group">
                    <h5>Disabilities <span class="text-danger">*</span></h5>
                    <div class="controls">
                        
                        <select name="disability" id="blood" required="" class="form-control" aria-invalid="false">
                            <option value="" selected disabled>Select Option</option>
                            @foreach($disabilities as $value)
                            <option value="{{ $value->name }}">{{ $value->name }}</option>
                            @endforeach
                            <option value="none">None</option>
                        </select>
                        
                    <div class="help-block"></div></div>
                </div>
            </div>
        </div>

        <div class="row">
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
                        <img id="showImage" src="{{  
                        url('/upload/no_image.jpg') }}" alt="No_Image" 
                        style="width: 100px; height: 100px; border: 1px solid black;">
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
