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
		  
		<li class="{{ ($route === 'dashboard')? 'active' : '' }}">
          <a href="{{ route('dashboard') }}">
            <i data-feather="pie-chart"></i>
			<span>Dashboard</span>
          </a>
    </li>  
		
	
        <li class="treeview">
          <a href="#">
            <i data-feather="mail"></i> <span>Manage Profile</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('student.view.profile') }}"><i class="ti-more"></i>View Profile</a></li>
            <li><a href="{{ route('student.changepassword') }}"><i class="ti-more"></i>Change Password</a></li>

          </ul>
        </li>
       
        {{-- <li class="treeview">
          <a href="#">
            <i data-feather="mail"></i> <span>Setup Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href=""><i class="ti-more"></i>Student Class</a></li>
            
          </ul>
        </li> --}}
       
        {{-- Student Registration --}}
        {{-- <li class="treeview">
          <a href="#">
            <i data-feather="mail"></i> <span>Student Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href=""><i class="ti-more"></i>Student Registration</a></li>
            

          </ul>
        </li> --}}

        {{-- Employee Registration  --}}

        {{-- <li class="treeview">
          <a href="#">
            <i data-feather="mail"></i> <span>Employee Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href=""><i class="ti-more"></i>Employee Registration</a></li>
            
            
           

          </ul>
        </li> --}}
        <li class="treeview">
          <a href="#">
            <i data-feather="mail"></i> <span>My Class</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('student.view.subjects') }}"><i class="ti-more"></i>View Subjects</a></li>
            <li><a href="{{ route('student.view.attendance') }}"><i class="ti-more"></i>View Attendance</a></li>
            <li><a href="{{ route('student.view.result') }}"><i class="ti-more"></i>View Result</a></li>
            
            
           

          </ul>
        </li>
		 
        
		  
        <li class="treeview">
          <a href="#">
            <i data-feather="grid"></i>
            <span>Update Profile</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('student.view.profile') }}"><i class="ti-more"></i>View Profile</a></li>
            <li><a href="{{ route('student.logout') }}"><i class="ti-more"></i>Logout</a></li>
            
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
