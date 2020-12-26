
@section('image', $data->image)

@extends('frontend.layout.master')
@section( 'content')
@section('title', $data->title)
  <!-- ... -->
  <div class="text-gray-600 body-font">
    
    <div class="container mx-auto flex px-5 py-24 items-center justify-center flex-col">
        <div class="text-right view-count">
            <h3 >
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
      <div class="text-justify lg:w-2/3 w-full">

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
  </div>
  
  <div class="col-md-8-center">
    <div class="col-md-12" style="padding:15px;">
        <h3 style="border-bottom:3px solid #000080;text-align:center; padding-bottom:5px;"><span style="padding:6px 12px; background:#000080;">लेटेस्ट न्यूज</span></h3>
        {{-- @foreach($latest->take(10) as $key => $l)
            
        <div class="col-md-12" style="border-bottom:1px solid #ccc; padding-bottom:10px; margin-bottom:10px;">
            
            <div class="col-md-4">
                <div class="row">
                     <a ><img href="{{url('article')}}/{{$p->pid}}" src="{{url('/posts')}}/{{$p->image}}" width="100%" /></a> 
                    <a href="{{url('article')}}/{{$l->pid}}"><img src="{{url('/posts')}}/{{$l->image}}" width="50%" style="margin-bottom:15px;" /></a>

                     <img href="{{url('article')}}/{{$l->pid}}" src="{{url('/posts')}}/{{$l->image}}" width="100%" style="margin-left:-15px;" /> 
                </div>
            </div>
            <div class="col-md-8">
                <div class="row" style="padding-left:10px;">
                    <h4><a href="{{url('article')}}/{{$l->pid}}">{{$l->title}}</a></h4>
                </div>
            </div>
        </div>
        @endforeach --}}

        <section class="text-gray-600 body-font">

            <div class="container px-5 py-24 mx-auto">

              <div class="flex flex-wrap -m-4">
                @foreach($latest->take(10) as $key => $l)

                <div class="p-4 md:w-1/6">
                  <div class="h-full border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden">
                    <img class="lg:h-48 md:h-10 w-full object-cover object-center" href="{{url('article')}}/{{$l->pid}}" src="{{url('/posts')}}/{{$l->image}}" >
                    <div class="p-6">
                      <h2 class="tracking-widest text-xs title-font font-medium text-gray-400 mb-1">{{$l->place}}</h2>
                      <h1 class="title-font text-lg font-medium text-gray-900 mb-3">{{$l->title}}</h1>
                      <p class="leading-relaxed mb-3">{!! substr($l->description,0,100)!!}...</p>
                      <div class="flex items-center flex-wrap ">
                        <a class="text-indigo-500 inline-flex items-center md:mb-2 lg:mb-0"  href="{{url('article')}}/{{$l->pid}}">Learn More
                          <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M5 12h14"></path>
                            <path d="M12 5l7 7-7 7"></path>
                          </svg>
                        </a>
                        {{-- <span class="text-gray-400 mr-3 inline-flex items-center lg:ml-auto md:ml-0 ml-auto leading-none text-sm pr-3 py-1 border-r-2 border-gray-200">
                          <svg class="w-4 h-4 mr-1" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                            <circle cx="12" cy="12" r="3"></circle>
                          </svg>1.2K
                        </span> --}}
                        {{-- <span class="text-gray-400 inline-flex items-center leading-none text-sm">
                          <svg class="w-4 h-4 mr-1" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                            <path d="M21 11.5a8.38 8.38 0 01-.9 3.8 8.5 8.5 0 01-7.6 4.7 8.38 8.38 0 01-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 01-.9-3.8 8.5 8.5 0 014.7-7.6 8.38 8.38 0 013.8-.9h.5a8.48 8.48 0 018 8v.5z"></path>
                          </svg>6
                        </span> --}}
                      </div>
                    </div>
                  </div>
                </div>
                @endforeach

                     </div>

            </div>

          </section>

        

    </div>





</div>
@endsection
