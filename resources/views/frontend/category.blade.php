@extends('frontend.layout.master')
@section( 'content')
	<div class="wrapper">

		<div class="row" style="margin-top:30px;">
			<div class="col-md-8">
				<div class="col-md-12" style="padding:15px 15px 30px 0px;">
					<div class="col-md-12">
					<h3 style="border-bottom:3px solid #81d742; padding-bottom:5px;"><span style="padding:6px 12px; background:#81d742; text-transform:uppercase;"  >{{$cat->title}}</span></h3>
					</div>
					@if(count($posts) > 0)
					<div class="col-md-12">
						@foreach($posts as $key => $p)
						@if($key == 0)
							
						<img href="{{url('posts')}}/{{$p->image}}" src="{{url('/posts')}}/{{$p->image}}" width="100%" style="margin-bottom:15px;" />
						{!! substr($p->description,0,3000)!!}
						<a href="{{url('article')}}/{{$p->slug}}"> Read more &raquo; </a>
						@endif
						@endforeach

					</div>
					<div class="row">
						@foreach($posts as $key => $p)
						@if($key > 0 && $key < 3)
						<div class="col-md-6">
							<img  href="{{url('posts')}}/{{$p->image}}" src="{{url('/posts')}}/{{$p->image}}" width="100%" style="margin-bottom:15px;" />
							{!! substr($p->description,0,100)!!}
						<a href="{{url('article')}}/{{$p->slug}}"> Read more &raquo; </a>
						</div>
						@endif
						@endforeach

						@endif
					</div>            
				</div>        
			</div>

<!-- right section -->
			<div class="col-md-4">
				<div class="col-md-12" style="padding:15px;">
					<h3 style="border-bottom:3px solid #2b99ca; padding-bottom:5px;"><span style="padding:6px 12px; background:#2b99ca;">RECENTS NEWS</span></h3>
					@foreach($latest->take(10) as $key => $l)
						
					<div class="col-md-12" style="border-bottom:1px solid #ccc; padding-bottom:10px; margin-bottom:10px;">
						
						<div class="col-md-4">
							<div class="row">
								<img href="{{url('article')}}/{{$l->slug}}" src="{{url('/posts')}}/{{$l->image}}" width="100%" style="margin-left:-15px;" />
							</div>
						</div>
						<div class="col-md-8">
							<div class="row" style="padding-left:10px;">
								<h4><a href="{{url('article')}}/{{$l->slug}}">{{$l->title}}</a></h4>
							</div>
						</div>
					</div>
					@endforeach
		
				</div> 
			</div>
		</div> 
	</div>

@endsection