@extends('frontend.layout.master')
@section( 'content')
@section('title', $data->title)
@section('image', $data->image)


<script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=5fe2e4577c936200185ee863&product=inline-share-buttons" async="async"></script>

{{-- <meta property="og:title" content="{{$data->title}}">
<meta property="og:image" content="{{url('/posts')}}/{{$data->image}}"> --}}
<script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=5fd3276a88122800187db5a5&product=inline-share-buttons' async='async'></script>

<script id="dsq-count-scr" src="//http-newskatta-in.disqus.com/count.js" async></script>
<div class="wrapper">
	<div id="fb-root"></div>
	
	{{-- <script type="text/javascript">if(typeof wabtn4fg==="undefined"){wabtn4fg=1;h=document.head||document.getElementsByTagName("head")[0],s=document.createElement("script");s.type="text/javascript";s.src="url/to/your/button/whatsapp-button.js";h.appendChild(s);}</script>	<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v9.0" nonce="y5rGMszp"></script> --}}
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
	  <div id="fb-root"></div>
	  <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v9.0" nonce="q2AODBcw"></script>
		<div class="row" style="margin-top:60px;">
			<div class="col-md-8">
				<div class="col-md-12" style="padding:15px 15px 0px 0px;">				
					<div class="col-md-12">
						{{-- <div class="text-left view-count ">
						<h4>By {{$data->editor}}</h4><br/>
						<h4> {{$data->place}}</h4>

						</div> --}}

					
						<div class="text-right view-count">
							<h3>
								<i class="fa fa-eye"></i>
								{{ $data->views + 1 }}
								@if($data->views != 0 )
								Views
								@else
								View
								@endif
							</h3>
						</div>
						<div class="text-left view-count ">

						<h1>{{$data->title}}</h1>
						<h4>By {{$data->editor}}</h4><br/>
						<h4> {{$data->place}}</h4>
						</div>

						<img href="{{url('article')}}/{{$data->slug}}" src="{{url('/posts')}}/{{$data->image}}"  width="100%" style="margin-bottom:15px;" />
						{!! $data->description!!}
					</div>	
					<div class="share-this">
						<h4>Share this ....</h4>
						{{-- <div class="sharethis-inline-share-buttons" data-title="{{$data->title}}" data-image="{{url('/posts')}}/{{$data->image}}"
							></div> --}}
						{{-- <div class="fb-share-button" data-href="{{url('article')}}/{{$data->title}}" data-layout="button" data-size="small"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{url('article')}}/{{$data->pid}}" ></a></div> --}}
					{{-- <div class="fb-share-button" data-href="{{url('article')}}/{{$data->title}}" data-layout="button" data-size="small"><a href={{ "whatsapp://send?text=https://theainet.net/newblog/".$data->pid }} ></a></div> --}}

						<div class="col-md-12">
							{{--  <a href={{ "whatsapp://send?text=https://theainet.net/newblog/" }} ><i class="fa fa-whatsapp" aria-hidden="true"></i></a>  --}}
							{{-- <div class="fb-share-button" data-href="{{url('article')}}/{{$data->slug}}" data-layout="button" data-size="small"></div> --}}
						
						<span class="tweet-btn">
								{{-- <a class="twitter-share-button"
								href="https://twitter.com/intent/tweet"
								data-size="small">
								Tweet</a> --}}
								{{-- <a class="whatsapp-share-button" data-size="small" href={{ "whatsapp://send?text=http://newskatta.in/article/".$data->pid }} >Whatsapp</a> --}}
						</span>
						{{-- <span class="whatsapp-btn">
							<a class="whatsapp-share-button"
							href="whatsapp://9730267645?text=GFG Example for whatsapp sharing"
							data-size="small">
							whatsapp</a>
					</span> --}}
						
					{{-- <div class="sharethis-inline-share-buttons"></div> --}}
					<div class="sharethis-inline-share-buttons" data-url="{{url('article')}}/{{$data->pid}}" data-title="{{$data->title}}" data-image="http://newskatta.in/posts/2012186335520121721032news%20%20katta.png"
						></div>

<script>
    /**
    *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
    *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables    */
    /*
    var disqus_config = function () {
    this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
    this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
    };
    */
         
                                    var disqus_config = function () {
                                    this.page.url = '{{Request::url()}}';  // Replace PAGE_URL with your page's canonical URL variable
                                    this.page.identifier ={{$data->pid}} ; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                                    };
    (function() { 
		// DON'T EDIT BELOW THIS LINE
	
    var d = document, s = d.createElement('script');
    s.src = 'https://http-newskatta-in.disqus.com/embed.js';
    s.setAttribute('data-timestamp', +new Date());
    (d.head || d.body).appendChild(s);
    })();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
					</div>
						{{-- <div class="col-md-12 also" >
							<h3>You May Also Like</h3>

						</div>			
						@foreach($releated->take(4) as $key => $r)

						<div class="col-md-4">
								
							<a><img  href="{{url('article')}}/{{$r->pid}}" src="{{url('/posts')}}/{{$r->image}}"   width="100%" style="margin-bottom:15px;" /></a>
							<p><a href="{{url('article')}}/{{$r->pid}}">{{$r->title}}</a></p>

						</div>
						@endforeach --}}


					
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
								<img href="{{url('article')}}/{{$l->pid}}" src="{{url('/posts')}}/{{$l->image}}" width="100%" style="margin-left:-15px;" />
							</div>
						</div>
						<div class="col-md-8">
							<div class="row" style="padding-left:10px;">
								<h4><a href="{{url('article')}}/{{$l->pid}}">{{$l->title}}</a></h4>
							</div>
						</div>
					</div>
					@endforeach

				</div>

			

			

			</div>
		</div> 
	</div>
@endsection