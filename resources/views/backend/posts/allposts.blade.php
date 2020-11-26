@extends('backend.layout.master')
@section( 'content')

@section( 'sidebar')

<div class="sidebar">
  <ul class="sidebar-menu">
    <li><a href="index.html" class="dashboard"><i class="fa fa-tachometer"></i> <span>Dashboard</span></a></li>
    <li class="treeview">
            <a href="#">
              <i class="fa fa-bookmark-o"></i> <span>Posts</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="view-table.html"><i class="fa fa-eye"></i>All Posts</a></li>
              <li><a href="add-post.html"><i class="fa fa-plus-circle"></i>Add Posts</a></li>
              <li><a href="category.html"><i class="fa fa-plus-circle"></i>Categories</a></li>
            </ul>
        </li>
        <li class="treeview">
            <a href="#">
              <i class="fa fa-image"></i> <span>Gallery</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="#"><i class="fa fa-eye"></i>All Images</a></li>
              <li><a href="#"><i class="fa fa-plus-circle"></i>Add Images</a></li>
              <li><a href="#"><i class="fa fa-eye"></i>All Videos</a></li>
              <li><a href="#"><i class="fa fa-plus-circle"></i>Add Videos</a></li>
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
              <li><a href="#"><i class="fa fa-eye"></i>All Pages</a></li>
              <li><a href="#"><i class="fa fa-plus-circle"></i>Add Pages</a></li>
            </ul>
        </li>
        <li class="treeview">
            <a href="menu.html">
              <i class="fa fa-file"></i> <span>Menu</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>            
        </li>
        <li class="treeview">
            <a href="#">
              <i class="fa fa-bar-chart"></i> <span>Reports</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="#"><i class="fa fa-eye"></i>All Reports</a></li>
              <li><a href="#"><i class="fa fa-plus-circle"></i>Add Reports</a></li>
            </ul>
        </li>
        <li class="treeview">
            <a href="#">
              <i class="fa fa-user-plus"></i> <span>Users</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="#"><i class="fa fa-eye"></i>All Users</a></li>
              <li><a href="#"><i class="fa fa-plus-circle"></i>Add Users</a></li>
            </ul>
        </li>
        <li class="treeview">
            <a href="#">
              <i class="fa fa-address-book"></i> <span>Active User</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="#"><i class="fa fa-edit"></i>Edit Profile</a></li>
              <li><a href="login.html"><i class="fa fa-power-off"></i>Log Out</a></li>
            </ul>
        </li>   
  </ul>
</div>

<div class="container-fluid">
  <div class="row">
    <div class="col-sm-12 title">
      <h1><i class="fa fa-bars"></i> Add New Posts <button class="btn btn-sm btn-default">Add New</button></h1>
    </div>
    <div class="search-div">
      <div class="col-sm-9">
        All(6) | <a href="#">Published (6)</a>
      </div>

      <div class="col-sm-3">
        <input type="text" id="search" name="search" class="form-control" placeholder="Search Posts">
      </div>
    </div>  

    <div class="clearfix"></div>

    <div class="filter-div">
      <form method="post">
        <div class="col-sm-2">
          <select name="action" class="form-control">
            <option>Bulk Action</option>
            <option>Move to Trash</option>
          </select>
        </div>

        <div class="col-sm-1">
          <div class="row">
            <button class="btn btn-default">Apply</button>
          </div>  
        </div>
      </form>
    
      <form method="post">
        <div class="col-sm-2">
          <select name="dates" class="form-control">
            <option>All Dates</option>
            <option>No Dates Found</option>
          </select>
        </div>
        <div class="col-sm-2">
          <select name="dates" class="form-control">
            <option>All Categories</option>
            <option>No Categories Found</option>
          </select>
        </div>
        <div class="col-sm-2">
          <button class="btn btn-default">Apply Filter</button>
        </div>  
      </form> 
      <div class="col-sm-3">
        <ul class="pagination">
          {{ $posts->links() }}

        </ul>
      </div>
    </div>  
    
    <div class="col-sm-12">
      <div class="content">
        <table class="table table-striped" id="myTable">
          <thead>
            <tr>
              <th width="50%"><input type="checkbox" id="select-all"> Title</th>
              <th width="15%">Author</th>
              <th width="15%">Category</th>
              <th width="10%">Date</th>
            </tr>
          </thead>
          <tbody>
            @foreach($posts as $post)
              
            <tr>
              <td>
                <input type="checkbox" name="select-cat"> 
              <a href="#">{{$post->title}}</a>
              </td>
              <td>admin@webtrickshome.com</td>
              <td>Welcome text</td>
              <td>Pubished 2018/01/05</td>              
            </tr>
        
            @endforeach
     
          </tbody>
        </table>
      </div>
    </div>

    <div class="clearfix"></div>

    <div class="filter-div">
      <form method="post">
        <div class="col-sm-2">
          <select name="action" class="form-control">
            <option>Bulk Action</option>
            <option>Move to Trash</option>
          </select>
        </div>

        <div class="col-sm-1">
          <div class="row">
            <button class="btn btn-default">Apply</button>
          </div>  
        </div>
      </form>
    
      
      <div class="col-sm-3 col-sm-offset-6">
        <ul class="pagination">
      {{ $posts->links() }}
        </ul>
      </div>
    </div>
  </div>
</div>


@endsection