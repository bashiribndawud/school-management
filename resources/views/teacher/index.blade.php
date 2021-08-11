@extends('teacher.teacher_master')

@section('teacher')

<div class="content-wrapper">
    <div class="container-full">

        @php
            $id = Auth::user()->id;
            // @dd($id);
            $no_student = DB::table('user')->where('usertype', 'student')->where('class_id', $id);
            // @dd(count($no_student));
        @endphp

      <!-- Main content -->
      <section class="content">
          <div class="row">
              <div class="col-xl-3 col-6">
                  <div class="box overflow-hidden pull-up">
                      <div class="box-body">							
                          <div class="icon bg-primary-light rounded w-60 h-60">
                              <i class="text-primary mr-0 font-size-24 mdi mdi-account"></i>
                              
                          </div>
                          <div>
                              <p class="text-mute mt-20 mb-0 font-size-16">My profile</p>

                          </div>
                      </div>
                  </div>
              </div>
              <div class="col-xl-3 col-6">
                  <div class="box overflow-hidden pull-up">
                      <div class="box-body">							
                          <div class="icon bg-warning-light rounded w-60 h-60">
                              <i class="text-warning mr-0 font-size-24 mdi mdi-car"></i>
                          </div>
                          <div>
                              <p class="text-mute mt-20 mb-0 font-size-16">Students</p>

                          </div>
                      </div>
                  </div>
              </div>
             
              
              
              
             
        
    </div>
</section>
<!-- /.content -->
</div>
</div>

@endsection