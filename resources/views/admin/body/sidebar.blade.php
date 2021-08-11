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
		@if(Auth::user()->usertype == 'Admin')
        <li class="treeview {{ ($prefix === '/users')? 'active' : '' }}">
          <a href="#">
            <i data-feather="message-circle"></i>
            <span>Manage Admin</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('user.view') }}"><i class="ti-more"></i>View all</a></li>
            <li><a href="{{ route('add.user') }}"><i class="ti-more"></i>Add User</a></li>
          </ul>
        </li> 
		@endif
        <li class="treeview {{ ($prefix === '/profile') ? 'active' : '' }}">
          <a href="#">
            <i data-feather="mail"></i> <span>Manage Profile</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('profile.view') }}"><i class="ti-more"></i>Your Profile</a></li>
            <li><a href="{{ route('password.view') }}"><i class="ti-more"></i>Change Password</a></li>

          </ul>
        </li>
        @if(Auth::user()->role === "admin")
        <li class="treeview {{ ($prefix === '/setup') ? 'active' : '' }}">
          <a href="#">
            <i data-feather="mail"></i> <span>Setup Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('student.class.view') }}"><i class="ti-more"></i>Student Class</a></li>
            <li><a href="{{ route('student.year.view') }}"><i class="ti-more"></i>Student Year</a></li>
            <li><a href="{{ route('student.group.view') }}"><i class="ti-more"></i>Student Group</a></li>
            <li><a href="{{ route('student.shift.view') }}"><i class="ti-more"></i>Student shift</a></li>
            {{-- <li><a href="{{ route('student.fee.view') }}"><i class="ti-more"></i>Fee Category</a></li>
            <li><a href="{{ route('student.fee_amount.view') }}"><i class="ti-more"></i>Fee Category Amount</a></li> --}}
            <li><a href="{{ route('exam.type.view') }}"><i class="ti-more"></i>Exam Type</a></li>
            <li><a href="{{ route('school.subject.view') }}"><i class="ti-more"></i>School Subject</a></li>
            <li><a href="{{ route('assign.subject.view') }}"><i class="ti-more"></i>Assign Subject</a></li>
            <li><a href="{{ route('designation.view') }}"><i class="ti-more"></i>Designation</a></li>

          </ul>
        </li>
        @endif
        {{-- Student Registration --}}
        <li class="treeview {{ ($prefix === '/student') ? 'active' : '' }}">
          <a href="#">
            <i data-feather="mail"></i> <span>Student Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('student.reg.view') }}"><i class="ti-more"></i>Student Registration</a></li>
            {{-- <li><a href="{{ route('roll.generate.view') }}"><i class="ti-more"></i>Roll generate</a></li> --}}
            {{-- <li><a href="{{ route('registration.fee.view') }}"><i class="ti-more"></i>Registration Fee</a></li> --}}
           

          </ul>
        </li>

        {{-- Employee Registration  --}}

        <li class="treeview {{ ($prefix === '/employees') ? 'active' : '' }}">
          <a href="#">
            <i data-feather="mail"></i> <span>Teachers Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('employee.reg.view') }}"><i class="ti-more"></i>Teacher Registration</a></li>
            <li><a href="{{ route('employee.salary.view') }}"><i class="ti-more"></i>Teacher Salary</a></li>
            <li><a href="{{ route('employee.leave.view') }}"><i class="ti-more"></i>Teacher Leave</a></li>
            <li><a href="{{ route('employee.attendance.view') }}"><i class="ti-more"></i>Teacher Attendance</a></li>
            {{-- <li><a href="{{ route('montly.salary.view') }}"><i class="ti-more"></i>Monthly Salary</a></li> --}}
            
           

          </ul>
        </li>

        <li class="treeview {{ ($prefix === '/report') ? 'active' : '' }}">
          <a href="#">
            <i data-feather="mail"></i> <span>Report generate</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('teacher.attendance.report') }}"><i class="ti-more"></i>Teacher attendance report</a></li>
            
            
           

          </ul>
        </li>
        
        
        {{-- <li class="treeview {{ ($prefix === '/account') ? 'active' : '' }}">
          <a href="#">
            <i data-feather="mail"></i> <span>Account Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ ($route == 'student.fee.view')? active : "" }}"><a href="{{ route('mark.entry.add') }}"><i class="ti-more"></i>Student Fee</a></li>
            <li class="{{ ($route == 'account.salary.view')?'active':'' }}"><a href="{{ route('account.salary.view') }}"><i class="ti-more"></i>Employee Salary</a></li> 
            <li class="{{ ($route == 'other.cost.view')?'active':'' }}"><a href="{{ route('other.cost.view') }}"><i class="ti-more"></i>Other Cost</a></li>
            
          </ul>
        </li> --}}
		 
        <li class="header nav-small-cap">User Interface</li>
		  
        
		
		 
		  
		<li>
          <a href="{{ route('admin.logout') }}">
            <i data-feather="lock"></i>
			<span>Log Out</span>
          </a>
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