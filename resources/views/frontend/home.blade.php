<!doctype html>
<html>
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="/path/to/tailwind.css" rel="stylesheet">
  <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
  @section('title', $data->title)
  @section('image', $data->image)
  <script data-ad-client="ca-pub-4029595698860144" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
  
  <script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=5fe2e4577c936200185ee863&product=inline-share-buttons" async="async"></script>
  
  {{-- <meta property="og:title" content="{{$data->title}}">
  <meta property="og:image" content="{{url('/posts')}}/{{$data->image}}"> --}}
  <script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=5fd3276a88122800187db5a5&product=inline-share-buttons' async='async'></script>
  
  <script id="dsq-count-scr" src="//http-newskatta-in.disqus.com/count.js" async></script>
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
  <!-- ... -->
</head>
@extends('frontend.layout.master')
@section( 'content')
<body>
  <!-- ... -->
  <section class="text-gray-600 body-font">
    
    <div class="container mx-auto flex px-5 py-24 items-center justify-center flex-col">
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
        <h4>By {{$data->editor}}</h4><br/>
        <h4> {{$data->place}}</h4>
      <img class="lg:w-2/6 md:w-3/6 w-5/6 mb-10 object-cover object-center rounded"  src="{{url('/posts')}}/{{$data->image}}" href="{{url('article')}}/{{$data->slug}}">
      <div class="text-center lg:w-2/3 w-full">

        <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">{{$data->title}}</h1>
        
        <p class="mb-8 leading-relaxed">	{!! $data->description!!}</p>
        <div class="sharethis-inline-share-buttons" data-url="{{url('article')}}/{{$data->pid}}" data-title="{{$data->title}}" data-image="http://newskatta.in/posts/2012186335520121721032news%20%20katta.png"
            ></div>
        {{-- <div class="flex justify-center">
          <button class="inline-flex text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">Button</button>
          <button class="ml-4 inline-flex text-gray-700 bg-gray-100 border-0 py-2 px-6 focus:outline-none hover:bg-gray-200 rounded text-lg">Button</button>
        </div> --}}
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
    </div>
  </section>
  <div class="col-md-8-center">
    <div class="col-md-12" style="padding:15px;">
        <h3 style="border-bottom:3px solid #2b99ca; padding-bottom:5px;"><span style="padding:6px 12px; background:#2b99ca;">Latest NEWS</span></h3>
        @foreach($latest->take(10) as $key => $l)
            
        <div class="col-md-12" style="border-bottom:1px solid #ccc; padding-bottom:10px; margin-bottom:10px;">
            
            <div class="col-md-4">
                <div class="row">
                    {{--  <a ><img href="{{url('article')}}/{{$p->pid}}" src="{{url('/posts')}}/{{$p->image}}" width="100%" /></a>  --}}
                    <a href="{{url('article')}}/{{$l->pid}}"><img src="{{url('/posts')}}/{{$l->image}}" width="50%" style="margin-bottom:15px;" /></a>

                    {{--  <img href="{{url('article')}}/{{$l->pid}}" src="{{url('/posts')}}/{{$l->image}}" width="100%" style="margin-left:-15px;" />  --}}
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
</body>
@endsection
</html>