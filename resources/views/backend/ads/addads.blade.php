@extends('backend.layout.master')
@section( 'content')

@section( 'sidebar')
<script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>

<div class="container-fluid">
	<div class="row">
		<div class="col-sm-10 title">
			<h1><i class="fa fa-bars"></i> Add New Ads</h1>
		</div>
		<div class="col-sm-12 ">
			@if(Session::has('message'))
			<div class="alert alert-success alert-dismissable fade in">
				<a href="#" class="close" data-dismiss="alert" >&times;</a>
				{{ Session('message')}}


			</div>
			@endif
		</div>

		<div class="col-sm-12">
			<div class="row">
			<form method="post" action="{{url('addads')}}" >
				{{ csrf_field ()}}
			<input type="hidden" name="tbl" value="{{encrypt('ads')}}"/>
					<div class="col-sm-9">
						<div class="form-group">	
							<input type="text" name="title" class="form-control" placeholder="Enter title here" id="post_title">				
						</div>	
						<div class="form-group">	
							<input type="text" name="url" class="form-control" placeholder="Enter url here" id="url">				
						</div>	
					
						<div class="form-group">
							<label>Location</label>
							<select class="form-control" name="location">
								<option>leaderboard</option>
								<option>sidebar-top</option>
								<option>sidebar-bottom</option>
		
							</select>
						</div>		
						
						<div class="form-group">
							<label>Status</label>
							<select class="form-control" name="status">
								<option>Display</option>
								<option>Hide</option>
								

		
							</select>
						</div>	
						
				
						
					
						<div class="form-group content featured-image">
							<h4>Ads Image <span class="pull-right"><i class="fa fa-chevron-down"></i></span></h4><hr>	
							<p><img id="output" style="max-width: 100%" /></p>
							<p>
							<input type="file" name="image" id="file" accept="image/" onchange="loadFile(event)" style="display: none;"></p>
							<p><label for="file" style="cursor: pointer;">Set Ads Image</label></p>							
						</div>

						<div class="form-group">
								<button class="btn btn-primary" >Add Ads</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>




<script  src="{{url('js/jquery.min.js')}}"></script>
<script  src="{{url('js/bootstrap.min.js')}}"></script>
<script  src="{{url('js/app.min.js')}}"></script>
<script >
	$(document).ready(function(){
		$('.fa-bars').click(function(){
			$('.sidebar').toggle();
		})
	});
</script>
{{--  <script src="{{url('ckeditor/ckeditor.js')}}"></script>
<script>
	CKEDITOR.replace('description', { 
		"filebrowserBrowseUrl": "ckfinder\/ckfinder.html",
		 "filebrowserImageBrowseUrl": "ckfinder\/ckfinder.html?type=Images",
		  "filebrowserFlashBrowseUrl": "ckfinder\/ckfinder.html?type=Flash", 
		  "filebrowserUploadUrl": "ckfinder\/core\/connector\/php\/connector.php?command=QuickUpload&type=Files",
		   "filebrowserImageUploadUrl": "ckfinder\/core\/connector\/php\/connector.php?command=QuickUpload&type=Images", 
		   "filebrowserFlashUploadUrl": "ckfinder\/core\/connector\/php\/connector.php?command=QuickUpload&type=Flash" });	
</script>  --}}

@endsection