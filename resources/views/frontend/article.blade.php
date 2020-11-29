@extends('frontend.layout.master')
@section( 'content')
<div class="wrapper">

		<div class="row" style="margin-top:30px;">
			<div class="col-md-8">
				<div class="col-md-12" style="padding:15px 15px 30px 0px;">				
					<div class="col-md-12">
						<img href="{{url('article')}}/{{$data->slug}}" src="{{url('/posts')}}/{{$data->image}}"  width="100%" style="margin-bottom:15px;" />
					<h3>{{$data->title}}</h3>
					{!! $data->description!!}
					</div>	
						<div class="col-md-12 also" >
							<h3>You May Also Like</h3>
						</div>			
						@foreach($releated->take(4) as $key => $r)

						<div class="col-md-4">
								
							<a><img  href="{{url('article')}}/{{$r->slug}}" src="{{url('/posts')}}/{{$r->image}}"   width="100%" style="margin-bottom:15px;" /></a>
							<p><a href="{{url('article')}}/{{$r->slug}}">{{$r->title}}</a></p>

						</div>
						@endforeach


					
				</div>        
			</div>

<!-- right section -->
			<div class="col-md-4">
				<div class="col-md-12" style="padding:15px;">
					<h3 style="border-bottom:3px solid #2b99ca; padding-bottom:5px;"><span style="padding:6px 12px; background:#2b99ca;">Latest NEWS</span></h3>
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