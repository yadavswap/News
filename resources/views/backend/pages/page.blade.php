@extends('frontend.layout.master')
@section( 'content')
<div class="wrapper">
	<div id="fb-root"></div>
	
	<script type="text/javascript">if(typeof wabtn4fg==="undefined"){wabtn4fg=1;h=document.head||document.getElementsByTagName("head")[0],s=document.createElement("script");s.type="text/javascript";s.src="url/to/your/button/whatsapp-button.js";h.appendChild(s);}</script>	<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v9.0" nonce="y5rGMszp"></script>
	<script>window.twttr = (function(d, s, id) {
		var js, fjs = d.getElementsByTagName(s)[0],
		  t = window.twttr || {};
		if (d.getElementById(id)) return t;
		js = d.createElement(s);
		js.id = id;
		js.src = "https://platform.twitter.com/widgets.js";
		fjs.parentNode.insertBefore(js, fjs);
	  
		t._e = [];
		t.ready = function(f) {
		  t._e.push(f);
		};
	  
		return t;
	  }(document, "script", "twitter-wjs"));</script>
		<div class="row" style="margin-top:30px;">
			<div class="col-md-8">
				<div class="col-md-12" style="padding:15px 15px 30px 0px;">				
					<div class="col-md-12">
					
						{{--  <img href="{{url('article')}}/{{$data->slug}}" src="{{url('/posts')}}/{{$data->image}}"  width="100%" style="margin-bottom:15px;" />  --}}
					<h3 class="text-upper">{{$data->title}}</h3>
					{!! $data->description!!}
					</div>	
				
					
					


					
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