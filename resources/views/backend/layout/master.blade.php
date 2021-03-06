<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>ADMIN DASHBOARD | WEBSITE NAME</title>
	<link rel="stylesheet"  href="{{url('/css/bootstrap.min.css')}}">
	<link rel="stylesheet"  href="{{url('/css/font-awesome.min.css')}}">
	<link rel="stylesheet"  href="{{url('css/ionicons.min.css')}}">
	<link rel="stylesheet"  href="{{url('css/menu.css')}}">
  <link rel="stylesheet"  href="{{url('css/style.css')}}">	
  <script  src="{{url('/js/jquery.min.js')}}"></script>
<script  src="{{url('/js/bootstrap.min.js')}}"></script>
<script  src="{{url('/js/app.min.js')}}"></script>
<script  src="{{url('/js/script.js')}}"></script>
</head>
<body>
{{--  --}}

{{-- sidebar start --}}
<div class="sidebar">
	<ul class="sidebar-menu">
  <li><a href="{{url('admin')}}" class="dashboard"><i class="fa fa-tachometer"></i> <span>Dashboard</span></a></li>
		<li class="treeview">
            <a href="#">
              <i class="fa fa-bookmark-o"></i> <span>Posts</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
            <li><a href="{{url('allposts')}}"><i class="fa fa-eye"></i>All Posts</a></li>
              <li><a href="{{url('addpost')}}"><i class="fa fa-plus-circle"></i>Add Posts</a></li>
            <li><a href="{{url('viewcategory')}}"><i class="fa fa-plus-circle"></i>Categories</a></li>
            </ul>
        </li>
        <li class="treeview">
            <a href="#">
              <i class="fa fa-image"></i> <span>Ads</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
            <li><a href="{{url('allads')}}"><i class="fa fa-eye"></i>All Ads</a></li>
            <li><a href="{{url('addads')}}"><i class="fa fa-plus-circle"></i>Add Ads</a></li>
              {{--  <li><a href="#"><i class="fa fa-eye"></i>All Videos</a></li>
              <li><a href="#"><i class="fa fa-plus-circle"></i>Add Videos</a></li>  --}}
            </ul>
        </li>
        <li class="treeview">
            <a href="#">
              <i class="fa fa-file"></i> <span>Pages</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
            <li><a href="{{url("allpages")}}"><i class="fa fa-eye"></i>All Pages</a></li>
            <li><a href="{{url("addpage")}}"><i class="fa fa-plus-circle"></i>Add Pages</a></li>
            </ul>
        </li>
    
        <li class="treeview">
        <a href="{{url('set')}}">
              <i class="fa fa-gear"></i> <span>Settings</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            {{--  <ul class="treeview-menu">
              <li><a href="{{url('viewcategory')}}"><i class="fa fa-eye"></i>All Reports</a></li>
            </ul>  --}}
        </li>
     
        <li class="treeview">
            <a href="#">
              <i class="fa fa-address-book"></i> <span>Active User</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{url('register')}}"><i class="fa fa-user"></i>Add User</a></li>

            <li><a href="{{url('logout')}}"><i class="fa fa-power-off"></i>Log Out</a></li>
            </ul>
        </li>		

        <li class="treeview">
        <a href="{{url('elfinder/elfinder.src.html')}}">
            <i class="fa fa-address-book"></i> <span>File Manager</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
        
      </li>	
	</ul>
</div>


{{-- sidebar end --}}

@yield('sidebar')
@yield('content')
    {{-- footer --}}

    <footer>
        <div class="col-sm-6">
            Copyright &copy; 2020 <a href="http://www.webtrickshome.com">ProWiggle Data Solutions Pvt Ltd</a> All rights reserved. 
        </div>
        <div class="col-sm-6">
            <span class="pull-right">Version 2.2.3</span>
        </div>
    </footer>
    
    
    </body>
    </html>