@extends('teacher.teacher_master')

@section('teacher')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

 <div class="content-wrapper">
	  <div class="container-full">
		<!-- Content Header (Page header) -->
		 

		<!-- Main content -->
		<section class="content">
		  <div class="row">

		
<div class="col-12">
<div class="box bb-3 border-warning">
				  <div class="box-header">
					<h4 class="box-title"> <strong>Import Student Grade</strong></h4>
					<a style="float: right;" class="btn btn-secondary " href="{{ url('grade_upload/sample.xlsx') }}">Download sample file</a>
				  </div>

				  <div class="box-body">
				
		<form method="post" action="{{ route('import.student.grade') }}" enctype="multipart/form-data">
			@csrf
			<div class="row">
				<div class="col-md-4">
          <h5>Select Exam Term <span class="text-danger">*</span></h5>
              <div class="controls">
                  <select name="term" required="" class="form-control p-2" aria-invalid="false">
                      <option value="" selected disabled>Select Term</option>
                      @foreach($examtypes as $type)
                      <option value="{{ $type->name }}">{{ $type->name }}</option>
                      @endforeach
                    </select>
              <div class="help-block"></div></div>
        </div>
        {{-- End col-4 --}}
          <div class="col-md-4">
            <div class="form-group">
              <h5>Select File <span class="text-danger">*</span></h5>
              <div class="form-group">
                <input type="file" name="file" class="form-control">
              </div>
              
            </div>
          </div>
          {{-- end col-md-4 --}}
					
				</div>
			</div>
      
        <div class="form-group">
						
          <input style="margin-left: 20px;" type="submit" class="btn btn-primary" value="Import File"> 
          
        </div>
        
      
		</form> 

			       
			</div>
			<!-- /.col -->
		  </div>
		  <!-- /.row -->
		</section>
		<!-- /.content -->
	  
	  </div>
  </div>


{{-- <script type="text/javascript">
  $(document).on('click','#search',function(){
    var class_id = $('#class_id').val();
    var assign_subject_id = $('#assign_subject_id').val();
    var exam_type_id = $('#exam_type_id').val();
     $.ajax({
      url: "{{ route('student.marks.getstudents')}}",
      type: "GET",
      data: {'class_id':class_id},
      success: function (data) {
        $('#marks-entry').removeClass('d-none');
        var html = '';
        $.each( data, function(key, v){
          html +=
          '<tr>'+
          '<td>'+v.student.id_no+'<input type="hidden" name="student_id[]" value="'+v.student_id+'"> <input type="hidden" name="id_no[]" value="'+v.student.id_no+'"> </td>'+
          '<td>'+v.student.name+'</td>'+
          '<td>'+v.student.fname+'</td>'+
          '<td>'+v.student.gender+'</td>'+
          '<td><input type="text" class="form-control form-control-sm" name="marks[]" ></td>'+
          '</tr>';
        });
        html = $('#marks-entry-tr').html(html);
      }
    });
  });

</script>
 --}}

<!--   // for get Student Subject  -->

{{-- <script type="text/javascript">
  $(function(){
    $(document).on('change','#class_id',function(){
      var class_id = $('#class_id').val();
      $.ajax({
        url:"{{ route('marks.getsubject') }}",
        type:"GET",
        data:{class_id:class_id},
        success:function(data){
          var html = '<option value="">Select Subject</option>';
          $.each( data, function(key, v) {
            html += '<option value="'+v.id+'">'+v.school_subject.name+'</option>';
          });
          $('#assign_subject_id').html(html);
        }
      });
    });
  });
</script>
 --}}


@endsection
