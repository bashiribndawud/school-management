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
             <h4 class="box-title">Employee Leave Edit For {{ $editData->user->name }}</h4>
             <h6 class="box-subtitle">{{ __('Ensure your account is using a long, random password to stay secure.') }}</h6>
           </div>
           <!-- /.box-header -->
           <div class="box-body">
             <div class="row">
               <div class="col">
                   <form action="{{ route('edit.employee.leave', $editData->id) }}" method="POST">
                       @csrf
                     <div class="row">
                       <div class="col-12">	

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <h5>Employee<span class="text-danger">*</span></h5>
            <div class="controls">
                <select name="employee_id" id="role" required="" class="form-control" aria-invalid="false">
                    <option value="" selected disabled>Select Employee</option>
                    @foreach($employees as $employee)
                    <option value="{{ $employee->id }}" {{ ($editData->employee_id == $employee->id)? "selected" : "" }}>{{ $employee->name }}</option>
                    @endforeach
                </select>
            <div class="help-block"></div></div>
        </div>
    </div>
    {{-- End md-6 --}}

    <div class="col-md-6">
        <h5>Leave Purpose <span class="text-danger">*</span></h5>
            <div class="controls">
                <select name="leave_purposes_id"  id="leave_purpose_id" required="" class="form-control" aria-invalid="false">
                    <option value="" selected disabled>Select Employee</option>
                    @foreach($leaves as $leave)
                    <option value="{{ $leave->id }}" {{ ($editData->leave_purposes_id == $leave->id)? "selected" : "" }}>{{ $leave->name }}</option>
                    @endforeach
                    <option value="0">New Purpose</option>
                </select>
                <input type="text" name="name" id="add_another" 
                class="form-control" placeholder="Write new purpose"
                style="display: none">
            <div class="help-block"></div></div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <h5>Start Date<span class="text-danger">*</span></h5>
        <div class="form-group">
            <input class="form-control" value="{{ $editData->leave_start_date }}" type="date" name="leave_start_date">
        </div>
    </div>
    {{-- End of col-6 --}}
    <div class="col-md-6">
        <h5>End Date<span class="text-danger">*</span></h5>
        <div class="form-group">
            <input class="form-control" type="date" value="{{ $editData->leave_end_date }}" name="leave_end_date">
        </div>
    </div>
</div>







                        


</div>   
                           
                           
                       
                           
                       <div class="text-xs-right">
                          <input type="submit" class="btn btn-rounded btn-info mb-5" value="Update"> 
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
    $(document).ready(function() {
        $(document).on('change', '#leave_purpose_id', function() {
            var leave_purpose_id = $(this).val();
            if(leave_purpose_id == '0') {
                $('#add_another').show();
            }else {
                $('#add_another').hide();
            }
        })
    })
</script>

@endsection


