@extends('backend.layout.master')
@section( 'content')

@section( 'sidebar')
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-10 title">
			<h1><i class="fa fa-bars"></i>  Edit Ads</h1>
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
			<form method="post" action="{{url('updateads')}}/{{$data->aid}}" enctype="multipart/form-data" >
					{{ csrf_field ()}}
					<input type="hidden" name="tbl" value="{{encrypt('ads')}}"/>
           			<input type="hidden" name="aid" value="{{$data->aid}}"/>

						<div class="col-sm-9">
							<div class="form-group">	
							<input type="text" name="title" class="form-control" placeholder="Enter title here" id="post_title" value="{{$data->title}}">				
							</div>	
							<div class="form-group">	
							<input type="text" name="url" class="form-control" placeholder="Enter url here" id="url" value="{{$data->url}}">				
							</div>	
						
							<div class="form-group">
								<label>Location</label>
								<select class="form-control" name="location">
								<option>{{$data->location}}</option>
									@if($data->location != 'leaderboard')
									<option>leaderboard</option>
									@endif
									@if($data->location != 'sidebar-top')
									<option>sidebar-top</option>
									@endif
									@if($data->location != 'sidebar-bottom')
									<option>sidebar-bottom</option>
									@endif

								
			
								</select>
							</div>		
							
							<div class="form-group">
								<label>Status</label>
								<select class="form-control" name="status" >
									<option>{{$data->status}}</option>
									@if($data->status == 'hide')
									<option>Display</option>
									@else
									<option>Hide</option>
									@endif
									
	
			
								</select>
							</div>	
							
					
							
						
							<div class="form-group content featured-image">
								<h4>Ads Image <span class="pull-right"><i class="fa fa-chevron-down"></i></span></h4><hr>	
								@if($data->image != '')
									<p><img id="output" src="{{url('ads')}}/{{$data->image}}" style="max-width: 100%" /></p>
										<p>
										<input type="file" name="image" id="file" accept="image/" onchange="loadFile(event)" style="display: none;"></p>
										<p><label for="file" style="cursor: pointer;">Upload Image</label></p>			
								@else	
								<p><img id="output"  style="max-width: 100%" /></p>
										<p>
										<input type="file" name="image" id="file" accept="image/*" onchange="loadFile(event)" style="display: none;"></p>
										<p><label for="file" style="cursor: pointer;">Upload Image</label></p>				
									@endif
									</div>
	
							<div class="form-group">
									<button class="btn btn-primary" >Edit Ads</button>
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
<script src="{{url('ckeditor/ckeditor.js')}}"></script>
<script>
	CKEDITOR.replace('description', { "filebrowserBrowseUrl": "ckfinder\/ckfinder.html", "filebrowserImageBrowseUrl": "ckfinder\/ckfinder.html?type=Images", "filebrowserFlashBrowseUrl": "ckfinder\/ckfinder.html?type=Flash", "filebrowserUploadUrl": "ckfinder\/core\/connector\/php\/connector.php?command=QuickUpload&type=Files", "filebrowserImageUploadUrl": "ckfinder\/core\/connector\/php\/connector.php?command=QuickUpload&type=Images", "filebrowserFlashUploadUrl": "ckfinder\/core\/connector\/php\/connector.php?command=QuickUpload&type=Flash" });	
</script>
@endsection