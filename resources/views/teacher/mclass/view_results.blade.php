@extends('teacher.teacher_master')

@section('teacher')


 <div class="content-wrapper">
	  <div class="container-full">
		<!-- Content Header (Page header) -->
		 

		<!-- Main content -->
		<section class="content">
		  <div class="row">
			  
			 

			<div class="col-12">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">View Result</strong> </h3>
                  <a href="{{ route('mark.entry.add') }}" style="float: right;" class="btn btn-rounded btn-success mb-5"><i class="fa fa-fw fa-arrow-left"></i>back to import</a>

				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
			<tr>
				<th width="5%">SL</th>   
				<th>Student Id</th> 
				<th width="25%">Student Name</th>
				<th width="20%">English</th>
				<th width="20%">Math</th>
				<th width="20%">Further Math</th>
				<th width="20%">Hausa</th>
				<th width="20%">Basic Science</th>
			</tr>
		</thead>
		<tbody>
			@foreach($allData as $key => $data )
			<tr>
				<td class="text-white">{{ $key+1 }}</td>
				<td class="text-white">{{ $data->id_no }}</td>				 
				<td class="text-white">{{ $data->name }}</td>				 
				<td class="text-white">{{ $data->english }}</td>				 
				<td class="text-white">{{ $data->mathematics }}</td>				 
				<td class="text-white">{{ $data->further_math }}</td>				 
				<td class="text-white">{{ $data->hausa }}</td>				 
				<td class="text-white">{{ $data->basic_science }}</td>				 
				
				 
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
