@extends('backend.layout.master')
@section( 'content')

@section( 'sidebar')


<div class="container-fluid">
  <div class="row">
    <div class="col-sm-12 title">
    <h1><i class="fa fa-bars"></i> Add New Page <a class="btn btn-sm btn-default" href="{{url('addpost')}}">Add New</a></h1>
    </div>
    <div class="col-sm-12">
			@if(Session::has('message'))
			<div class="alert alert-success alert-dismissable fade in">
				<a href="#" class="close" data-dismiss="alert" >&times;</a>
				{{ Session('message')}}


			</div>
      @endif
    </div>
    <div class="search-div">
      <div class="col-sm-9">
        All({{$allpages}}) | <a href="#">Published ({{$published}})</a>
      </div>

      <div class="col-sm-3">
        <input type="text" id="search" name="search" class="form-control" placeholder="Search Posts">
      </div>
    </div>  

    <div class="clearfix"></div>
    <form  method="post" action="{{url('multipledelete')}}">
  

    <div class="filter-div">
      {{ csrf_field() }}
      <input type="hidden" name="tbl" value="{{encrypt('posts')}}">
      <input type="hidden" name="tblid" value="{{encrypt('pid')}}">
        <div class="col-sm-2">
          <select name="bulk-action" class="form-control">
            <option value="0">Bulk Action</option>
            <option value="1">Move to Trash</option>
          </select>
        </div>

        <div class="col-sm">
          <div class="row">
            <button class="btn btn-default">Apply</button>
          </div>  
        </div>
    
       
   
    </div>  
    
    <div class="col-sm-12">
      <div class="content">
        <table class="table table-striped" id="myTable">
          <thead>
            <tr>
              <th width="50%"><input type="checkbox" id="select-all"> Title</th>
              <th width="15%">Description</th>
              <th width="10%">Date</th>
            </tr>
          </thead>
          <tbody>
            @if(count($pages) > 0)   
            @foreach($pages as $page)
              
            <tr>
              <td>
                {{--  <input type="checkbox" name="select-data[]" value="{{$pages->pageid}}">   --}}
              <a href="{{url('editpages')}}/{{$page->pageid}}">{{$page->title}}</a>
              </td>
              <td>{!!substr($page->description,0,100)!!}</td>
              <td>{{$page->status}}</td>
              <td>{{$page->created_at}}</td>              
            </tr>
            @endforeach           

        
            @else
            <tr>
              <td colspan=" 4">
                No Data Found

              </td>
            </tr>

            @endif
          </tbody>
        </table>
      </div>
    </div>

  
</div>


@endsection