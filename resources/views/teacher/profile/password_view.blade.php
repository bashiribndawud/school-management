@extends('teacher.teacher_master');

@section('teacher')

<div class="content-wrapper">
    <div class="container-full">
      <!-- Content Header (Page header) -->
     
      <!-- Main content -->
      <section class="content">

        <!-- Basic Forms -->
         <div class="box">
           <div class="box-header with-border">
             <h4 class="box-title">Welcome <strong>{{ $user->name }}</strong> Kindly Reset Your Password Here</h4>
             
           </div>
           <!-- /.box-header -->
           <div class="box-body">
             <div class="row">
               <div class="col">
                   <form action="{{ route('teacher.password.update') }}" method="POST">
                       @csrf
                     <div class="row">
                       <div class="col-12">	

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <h5>Current Password <span class="text-danger">*</span></h5>
            <div class="controls">
                <input id="current_password" type="password" name="old_password" class="form-control"  data-validation-required-message="This field is required"> <div class="help-block"></div></div>
                @error('old_password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <h5>New Password <span class="text-danger">*</span></h5>
            <div class="controls">
                <input id="password" type="password" name="password" class="form-control"  > <div class="help-block"></div></div>
                @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <h5>Confirm Password <span class="text-danger">*</span></h5>
            <div class="controls">
                
                <input id="password_confirmation" type="password" name="password_confirmation" class="form-control"> <div class="help-block"></div></div>
                @error('password_confirmation')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
    </div>
</div>



                        


</div>   
                           
                           
                       
                           
                       <div class="text-xs-right">
                          <input type="submit" class="btn btn-rounded btn-info mb-5 ml-10" value="Submit"> 
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
