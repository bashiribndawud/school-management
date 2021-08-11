@extends('admin.admin_master')

@section('admin')

<div class="content-wrapper">
    <div class="container-full">
      <!-- Content Header (Page header) -->
     
      <!-- Main content -->
      <section class="content">
        <div class="row">
          
          {{-- Search bar --}}
          <div class="col-12">
            
              <div class="box bb-3 border-warning">
                <div class="box-header">
                <h4 class="box-title">Student <strong>Registration Fee</strong></h4>
                </div>
      
                <div class="box-body">
                
                  
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                            <h5>Year <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <select name="year_id" id="year" required="" class="form-control" aria-invalid="false">
                                    <option value="" selected disabled>Select Year</option>
                                    @foreach ($years as $year)
                                    <option value="{{ $year->id }}" >{{ $year->name }}</option>
                                    @endforeach
                                </select>
                              
                              
                            <div class="help-block"></div></div>
                        </div>
                    </div>
                    {{-- End year col --}}
    
                    <div class="col-md-4">
                      <div class="form-group">
                          <h5>Class <span class="text-danger">*</span></h5>
                          <div class="controls">
                              
                              <select name="class_id" id="religion" required="" class="form-control" aria-invalid="false">
                                  <option value="" selected disabled>Select Class</option>
                                  @foreach($classes as $class)
                                  <option value="{{ $class->id }}" >{{ $class->name }}</option>
                                  @endforeach
                              </select>
                              
                          <div class="help-block"></div></div>
                      </div>
                  </div>
                  {{-- End class col --}}
                  <div class="col-md-4" style="padding-top: 25px;">
                    <a href="#" id="search" class="btn btn-primary">Search</a>
                  </div>
    
                    </div>
              
    
                </div>
              </div>

          </div>

         {{-- End Search bar --}}


         {{-- Registration Fee Table  --}}
          <div class="row box-body">
                <div class="col-md-12">
                  <div id="DocumentResults">
                    <script id="document-template" type="text/x-handlebars-template"></script>
                      <table class="table table-bordered table-striped" style="width: 100%">
                        <thead>
                            <tr>
                              @{{{thsource}}}
                            </tr>
                        </thead> 
 
                        <tbody>
                            @{{ {#each this} }}

                            @{{ /each }}}}
                        </tbody>
 
                     </table>
                    
                  </div>
                    
                </div>
          </div>
          {{-- end row generate --}}
        

                    
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </section>
      <!-- /.content -->
    
    </div>
</div>

    	

@endsection