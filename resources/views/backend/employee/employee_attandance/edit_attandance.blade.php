@extends('admin.admin_master');

@section('admin')

<div class="content-wrapper">
    <div class="container-full">
      <!-- Content Header (Page header) -->
     
      <!-- Main content -->
      <section class="content">

        <!-- Basic Forms -->
         <div class="box">
           <div class="box-header with-border">
             <h4 class="box-title">Edit Employee Attandance</h4>
             <h6 class="box-subtitle">{{ __('Ensure your account is using a long, random password to stay secure.') }}</h6>
           </div>
           <!-- /.box-header -->
           <div class="box-body">
             <div class="row">
               <div class="col">
                   <form action="{{ route('update.employee.attandance', $editData['0']['date']) }}" method="POST">
                       @csrf
                     <div class="row">
                       <div class="col-12">	

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <h5>Date<span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input  type="date" value="{{ $editData['0']['date'] }}" name="date" class="form-control"  data-validation-required-message="This field is required"> <div class="help-block"></div></div>
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
                            <th class="text-center btn leave-all" style="display: table-cell; background-color: black;">Leave</th>
                            <th class="text-center btn absent-all" style="display: table-cell; background-color: black;">Absent</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($editData as $key => $data)
                        <tr class="text-center" id="{{ $data->id }}">
                            <input type="hidden" name="employee_id[]" value="{{ $data->employee_id }}">
                            <td>{{ $key+1 }} </td>
                            <td>{{ $data->user->name }}</td>
                            <td colspan="3">
                                <div class="switch-toggle switch-3 switch-candy">
                                    <input name="status{{ $key }}" type="radio" id="present{{ $key }}" value="present" checked="checked" {{ ($data->status == 'present')? "checked" : "" }}>
                                    <label for="present{{ $key }}">Pressent</label>

                                    <input name="status{{ $key }}" value="leave" type="radio" id="leave{{ $key }}" {{ ($data->status == "leave")? "checked": "" }}>
                                    <label for="leave{{ $key }}">Leave</label>

                                    <input name="status{{ $key }}" value="absent"  type="radio" id="absent{{ $key }}" {{ ($data->status == "absent")? "checked": "" }}>
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
