@extends('backend.layout.master')
@section( 'content')

@section( 'sidebar')
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-10 title">
			<h1><i class="fa fa-bars"></i> Edit Post</h1>
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
            <form method="post" action="{{url('updatepost')}}/{{$data->pid}}" >
				{{ csrf_field ()}}
            <input type="hidden" name="tbl" value="{{encrypt('posts')}}"/>
            <input type="hidden" name="pid" value="{{$data->pid}}"/>

            
					<div class="col-sm-9">
						<div class="form-group">	
                        <input type="text" name="title" class="form-control" placeholder="Enter title here" id="post_title" value="{{$data->title}}">				
						</div>	
						<div class="form-group">	
							<input type="text" name="slug" class="form-control" placeholder="Enter slug here" id="slug" value="{{$data->title}}">				
						</div>	
						<div class="form-group">	
							<input type="text" name="place" class="form-control" placeholder="Enter place here" id="place" value="{{$data->place}}">				
						</div>	
						<div class="form-group">
							<label>Editor</label>
							<select class="form-control" name="editor">
							<option>{{$data->editor}}</option>
								@if($data->editor == 'न्यूज कट्टा ब्युरो')

								<option>नदीम खान</option>
								<option>कविता मोरे/ नागापूरे</option>
								<option>न्यूज कट्टा</option>
								@elseif($data->editor == 'नदीम खान')
								<option>न्यूज कट्टा ब्युरो</option>
								<option>कविता मोरे/ नागापूरे</option>
								<option>न्यूज कट्टा</option>
								@elseif($data->editor == 'कविता मोरे/ नागापूरे')

								<option>न्यूज कट्टा ब्युरो</option>
								<option>नदीम खान</option>
								<option>न्यूज कट्टा</option>
							
								@elseif($data->editor == 'न्यूज कट्टा')
								<option>न्यूज कट्टा ब्युरो</option>
								<option>नदीम खान</option>
								<option>कविता मोरे/ नागापूरे</option>		
							
								@endif
							</select>
						</div>						
						<div class="form-group">		
							<textarea class="form-control" name="description" rows="15" >{!!$data->description!!}</textarea>
							<div class="col-sm-12 word-count">Word count: 0</div>
						</div>	
					</div>
					<div class="col-sm-3">
						<div class="content publish-box">
							<h4>Publish  <span class="pull-right"><i class="fa fa-chevron-down"></i></span></h4><hr>	
							<div class="form-group">
								<button class="btn btn-default" name="status" value="draft">Save Draft</button>
							</div>
							<p>Status: Draft <a href="#">Edit</a></p>
							<p>Visibility: Public <a href="#">Edit</a></p>
							<p>Publish: Immediately <a href="#">Edit</a></p>
							<div class="row">
								<div class="col-sm-12 main-button">
									<button class="btn btn-primary pull-right" name="status" value="publish">Edit Publish</button>
								</div>
							</div>	
						</div>
						
						<div class="content cat-content">
							<h4>Category  <span class="pull-right"><i class="fa fa-chevron-down"></i></span></h4><hr>	
							@foreach($categories as $cat)
								
						<p><label for="{{$cat->cid}}"><input type="checkbox" name="category_id[]" value="{{$cat->cid}}" @if(in_array($cat->cid,$postcat)) checked @endif> {{$cat->title}}</label></p>
							@endforeach

		
						</div>
						<div class="content featured-image">
							<h4>Featured Image <span class="pull-right"><i class="fa fa-chevron-down"></i></span></h4><hr>	
							<p><img id="output" style="max-width: 100%" /></p>
							<p>
							<input type="file" name="image" id="file" accept="image/" onchange="loadFile(event)" style="display: none;" value="{{$data->image}}"> </p>
							<p><label for="file" style="cursor: pointer;">Set Featured Image</label></p>							
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