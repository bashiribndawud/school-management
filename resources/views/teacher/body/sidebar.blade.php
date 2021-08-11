@php
 $prefix = Request::route()->getPrefix();
 $route = Route::current()->getName();   
@endphp




<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">	
		
        <div class="user-profile">
			<div class="ulogo">
				 <a href="index.html">
				  <!-- logo for regular state and mobile devices -->
					 <div class="d-flex align-items-center justify-content-center">					 	
						  <img src="" alt="">
						  <h3><b>BUK STAFF</b> SCHOOL</h3>
					 </div>
				</a>
			</div>
        </div>
      
      <!-- sidebar menu-->
      <ul class="sidebar-menu" data-widget="tree">  
		  
		<li class="">
          <a href="">
            <i data-feather="pie-chart"></i>
			<span>Dashboard</span>
          </a>
    </li>  
        <li class="treeview" {{ ($prefix === '/teacher_profile')? 'active' : '' }}">
          <a href="#">
            <i data-feather="message-circle"></i>
            <span>Manage Profile</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('teacher.profile') }}"><i class="ti-more"></i>My Profile</a></li>
            <li><a href="{{ route('teacher.password.view') }}"><i class="ti-more"></i>Reset Password</a></li>
            
          </ul>
        </li> 
    
        {{-- Student Registration --}}
        <li class="treeview" {{ ($prefix == '/manage')? 'active' : '' }}>
          <a href="#">
            <i data-feather="mail"></i> <span>Manage My Class</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('teacher.student.view') }}"><i class="ti-more"></i>View Student</a></li>
            <li><a href="{{ route('teacher.class.subject.view') }}"><i class="ti-more"></i>View Class Subject</a></li>
            <li><a href="{{ route('teacher.class.attendance.view') }}"><i class="ti-more"></i>View Attendance</a></li>
           

          </ul>
        </li>

        {{-- Employee Registration  --}}

        <li class="treeview">
          <a href="#">
            <i data-feather="mail"></i> <span>Marks Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('mark.entry.add') }}"><i class="ti-more"></i>Import Result</a></li>
            <li><a href="{{ route('view.student.result') }}"><i class="ti-more"></i>View Result</a></li>
            
            
           

          </ul>
        </li>
		 
        <li class="header nav-small-cap">User Interface</li>
		  
        <li class="treeview">
          <a href="#">
            <i data-feather="grid"></i>
            <span>Profile Update</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('teacher.profile') }}"><i class="ti-more"></i>My Profile</a></li>
            <li><a href="{{ route('teacher.logout') }}"><i class="ti-more"></i>Logout</a></li>
            
          </ul>
        </li>
		
		 
		  
		
        
      </ul>
    </section>
	
	<div class="sidebar-footer">
		<!-- item-->
		<a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Settings" aria-describedby="tooltip92529"><i class="ti-settings"></i></a>
		<!-- item-->
		<a href="mailbox_inbox.html" class="link" data-toggle="tooltip" title="" data-original-title="Email"><i class="ti-email"></i></a>
		<!-- item-->
		<a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i class="ti-lock"></i></a>
	</div>
  </aside>
