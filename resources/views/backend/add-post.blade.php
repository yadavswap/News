@extends('backend.layout.master')
@section( 'content')

@section( 'sidebar')
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-10 title">
			<h1><i class="fa fa-bars"></i> Add New Post</h1>
		</div>

		<div class="col-sm-12">
			<div class="row">
				<form method="post">
					<div class="col-sm-9">
						<div class="form-group">	
							<input type="text" name="title" class="form-control" placeholder="Enter title here">				
						</div>						
						<div class="form-group">		
							<textarea class="form-control" name="description" rows="15"></textarea>
							<div class="col-sm-12 word-count">Word count: 0</div>
						</div>	
					</div>
					<div class="col-sm-3">
						<div class="content publish-box">
							<h4>Publish  <span class="pull-right"><i class="fa fa-chevron-down"></i></span></h4><hr>	
							<div class="form-group">
								<button class="btn btn-default">Save Draft</button>
							</div>
							<p>Status: Draft <a href="#">Edit</a></p>
							<p>Visibility: Public <a href="#">Edit</a></p>
							<p>Publish: Immediately <a href="#">Edit</a></p>
							<div class="row">
								<div class="col-sm-12 main-button">
									<button class="btn btn-primary pull-right">Publish</button>
								</div>
							</div>	
						</div>
						
						<div class="content cat-content">
							<h4>Category  <span class="pull-right"><i class="fa fa-chevron-down"></i></span></h4><hr>	
							<p><label for="cat1"><input type="checkbox" name="category" id="cat1" checked=""> Category 1</label></p>
							<p><label for="cat2"><input type="checkbox" name="category" id="cat2"> Category 2</label></p>
							<p><label for="cat3"><input type="checkbox" name="category" id="cat3"> Category 3</label></p>
							<p><label for="cat4"><input type="checkbox" name="category" id="cat4"> Category 4</label></p>
							<p><label for="cat5"><input type="checkbox" name="category" id="cat5"> Category 5</label></p>
							<p><label for="cat6"><input type="checkbox" name="category" id="cat6"> Category 6</label></p>
						</div>
						<div class="content featured-image">
							<h4>Featured Image <span class="pull-right"><i class="fa fa-chevron-down"></i></span></h4><hr>	
							<input type="file" name="image" id="file" class="inputfile" style="display: none;">
							<p><label for="file" style="cursor: pointer;">Set Featured Image</label></p>							
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>


<footer>
	<div class="col-sm-6">
		Copyright &copy; 2018 <a href="http://www.webtrickshome.com">Webtrickshome.com</a> All rights reserved. 
	</div>
	<div class="col-sm-6">
		<span class="pull-right">Version 2.2.3</span>
	</div>
</footer>

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
<script src="ckeditor/ckeditor.js"></script>
<script>
	CKEDITOR.replace('description', { "filebrowserBrowseUrl": "..\/editor\/ckfinder\/ckfinder.html", "filebrowserImageBrowseUrl": "..\/editor\/ckfinder\/ckfinder.html?type=Images", "filebrowserFlashBrowseUrl": "..\/editor\/ckfinder\/ckfinder.html?type=Flash", "filebrowserUploadUrl": "..\/editor\/ckfinder\/core\/connector\/php\/connector.php?command=QuickUpload&type=Files", "filebrowserImageUploadUrl": "..\/editor\/ckfinder\/core\/connector\/php\/connector.php?command=QuickUpload&type=Images", "filebrowserFlashUploadUrl": "..\/editor\/ckfinder\/core\/connector\/php\/connector.php?command=QuickUpload&type=Flash" });	
</script>
@endsection