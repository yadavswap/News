{{-- header --}}
<!DOCTYPE html >

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>{{config('name','NEWSKATTA')}}</title>
{{-- <title>{{config($data->title)}}</title> --}}


<link href="{{url('/css/bootstrap.min.css')}}" rel="stylesheet"  />
<link href="{{url('/css/bootstrap-theme.min.css')}}" rel="stylesheet"  />
<link href="{{url('/style.css')}}" rel="stylesheet"  />
<script src="{{url('/js/jquery.min.js')}}"></script>
<script src="{{url('/js/bootstrap.min.js')}}"></script>
{{-- <script src="https://apps.elfsight.com/p/platform.js" defer></script>
<div class="elfsight-app-f92c1bae-c8cc-4f8d-9100-e2213a314d82"></div> --}}
<a class="fx-widget" data-widget="coronastatus" data-lang="en" data-base-url="https://www.fxempire.com" data-url="//www.fxempire.com" href="https://www.fxempire.com" rel="nofollow" > </a> <script async charset="utf-8" src="https://widgets.fxempire.com/widget.js" ></script>
<script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=5fd327e088122800187db5a6&product=inline-share-buttons" async="async"></script>

</head>

<body>
    
{{-- <div class="col-md-12 top" id="top">
	<div class="col-md-9 top-left">
    	<div class="col-md-3">
        <span class="day">{{date($lastnews->created_at)}}</span> 
        </div>
        <div class="col-md-9">
        <span class="latest">Latest: </span> <a >{{$lastnews->slug}}</a>
        </div>
    </div>
    <div class="col-md-3">
       
    </div>
</div> --}}

<div class="col-md-12 brand">
    	
	 <script type="text/javascript">
        function googleTranslateElementInit() {
        new google.translate.TranslateElement({pageLanguage: 'mr'}, 'google_translate_element');
        }
      </script>
      
      <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
	<div class="col-md-8 name">

    @if($setting->image)

    <img src="{{url('/settings')}}/{{$setting->image}}"  class="center"/>
    @endif
    <h4>न्यूज कट्टा को अपनी भाषा मे पढे</h4>

    <div id="google_translate_element"></div>
    </div>
    
    <div class="col-md-4">
        @foreach($ads as $key=>$ads)

        @if($key < 1)

         <img  src="{{url('/posts')}}/{{$ads->image}}" class="left"  width="50%" /> 
         @endif
        @endforeach
    </div>
    
</div>

<div class="col-md-12 main-menu">
    
	<div class="col-md-10 menu">
        
		<nav class="navbar">
			<div class="navbar-header">
    			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mynavbar"> 
					<span class="icon-bar"></span>
            		<span class="icon-bar"></span>
            		<span class="icon-bar"></span>
            		<span class="icon-bar"></span>
        		</button>
        		<span class="navbar-brand"><font color="#555555">NEWS</font><font color="#2ca0c9">KATTA</font></span>
            </div>
            
    		<div class="collapse navbar-collapse" id="mynavbar">
    			<ul class="nav nav-justified">
                    <li><a href={{url('/')}} class="active"><span class="glyphicon glyphicon-home"></span></a></li>
                    @foreach($categories as $key=> $cat)
                    @if($key < 6 )
                        
                    <li><a href="{{url("category")}}/{{$cat->slug}}" class="text-uppercase" >{{$cat->title}}</a></li>
                    @endif
                    @endforeach
                    
    				
        		</ul> 
			</div>
		</nav>
    </div>
    



	<div class="col-md-2 search" >
    	{{-- <input type="search" id="search_content" class="form-control" /> --}}
    </div>
</div> 
{{-- header end --}}
@yield('content')
{{-- footer --}}
<div class="col-md-12 bottom">

    <div class="col-md-4">
            
        <h3 style="border-bottom:2px solid #ccc;"><span style="border-bottom:2px solid #f00;">About Us</span></h3>
        @if($setting->image)
        <img src="{{url('/settings')}}/{{$setting->image}}" width="50%"/><br/>
        @endif
        <br />
            <p align="justify">{{$setting->about}}</p>

    </div>
    

    <div class="col-md-4">
        <div class="col-md-12">
            <h3 style="border-bottom:2px solid #ccc;"><span style="border-bottom:2px solid #f00;">Quick Links</span></h3>
        </div>    
        <div class="col-md-6">
            <div class="row">
              <ul class="nav">
                  
                @foreach($pages as $page)

                <li><a href="{{url('page')}}/{{$page->slug}}"  class="text-uppercase">{{$page->title}}</a>
                </li>
                @endforeach
                <li>
                <a href="{{url('contact')}}"  class="text-uppercase">Contact Us</a>
                </li>

            </ul> 
            </div>
        </div>
        
    </div>
   
</div>

<div class="col-md-12 text-center copyright">
Copyright &copy; {{date('Y')}}  <a href="#">NEWSKATTA</a> Powered by: <a href="prowiggle.com">ProWiggle Data Solutions Pvt. Ltd.</a>
</div>

<script>
    $('#search_content').keyup(function(){
        var text = $('#search_content').val();
        if(text.length < 1){
            $('#search-output').hide();

            return false;
        }else{
            $.ajax({
                type : "get",
                url : "{{url('search_content')}}",
                data :  {text:text},
                success:function(res){
                    $('#search-output').show();

                    $('#search-output').html(res);
                }
            })
        }
    })
    </script>


</body>
</html>

