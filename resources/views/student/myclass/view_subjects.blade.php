@extends('student.student_master')

@section('student')


 <div class="content-wrapper">
	  <div class="container-full">
		<!-- Content Header (Page header) -->
		 

		<!-- Main content -->
		<section class="content">
		  <div class="row">
			  
			 

			<div class="col-12">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title"><strong>Welcome {{ Auth::user()->name }} this are your subjects</strong> </h3>
	

				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
			<tr>
				<th width="5%">SN</th>   
				<th>Subject Name</th> 
				<th width="25%">Full Mark</th>
				<th width="25%">Pass Mark</th>
			
				 
			</tr>
		</thead>
		<tbody>
			@foreach($allData as $key => $subject )
			<tr>
				<td>{{ $key+1 }}</td>
				<td>{{ $subject->subject->name }}</td>				 
				<td>{{ $subject->full_mark }}</td>				 
				<td>{{ $subject->pass_mark }}</td>				 
							 
				<td></td>
				 
			</tr>
			@endforeach
							 
						</tbody>
						<tfoot>
							 
						</tfoot>
					  </table>
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
