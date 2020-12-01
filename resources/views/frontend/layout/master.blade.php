{{-- header --}}
<!DOCTYPE html >

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>{{config('name','NEWSKATTA')}}</title>
<link href="{{url('/css/bootstrap.min.css')}}" rel="stylesheet"  />
<link href="{{url('/css/bootstrap-theme.min.css')}}" rel="stylesheet"  />
<link href="{{url('/style.css')}}" rel="stylesheet"  />
<script src="{{url('/js/jquery.min.js')}}"></script>
<script src="{{url('/js/bootstrap.min.js')}}"></script>

</head>

<body>
<div class="col-md-12 top" id="top">
	<div class="col-md-9 top-left">
    	<div class="col-md-3">
        <span class="day">{{date($lastnews->created_at)}}</span> 
        </div>
        <div class="col-md-9">
        <span class="latest">Latest: </span> <a >{{$lastnews->slug}}</a>
        </div>
    </div>
    <div class="col-md-3">
        {{--  @foreach($setting->social as $key->$social)
        <a href="{{$social}}"><i class="fa fa-{{$icons}}"></i></a>

         @endforeach      --}}
    </div>
</div>

<div class="col-md-12 brand">
	<div class="col-md-4 name">
    @if($setting->image)
    <img src="{{url('/settings')}}/{{$setting->image}}" width="50%"/>
    @endif
    </div>
    <div class="col-md-8">
    	{{--  <img src="images/final-news-site_06.gif" width="100%" />  --}}
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
                    <li><a href="{{url('/')}}" class="active"><span class="glyphicon glyphicon-home"></span></a></li>
                    @foreach($categories as $cat)
                        
                <li><a href="{{url("category")}}/{{$cat->slug}}" class="text-uppercase">{{$cat->title}}</a></li>
                    @endforeach

    				
        		</ul> 
			</div>
		</nav>
	</div>
	<div class="col-md-2 search">
    	<input type="search" id="search_content" class="form-control" /><span class="glyphicon glyphicon-search btn"></span>
        <div class="search-output"></div>
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
                @foreach($categories as $cat)
                <li><a href="{{url('category')}}/{{$cat->slug}}"  class="text-uppercase">{{$cat->title}}</a>
                </li>
               @endforeach
            </ul> 
            </div>
        </div>
        <div class="col-md-6">
            <div class="row">
              <ul class="nav">
                {{--  <li><a href="#">SPORTS</a></li>
                <li><a href="#">TRAVEL</a></li>
                <li><a href="#">STYLE</a></li>
                <li><a href="#">HEALTH</a></li>  --}}
            </ul> 
            </div>
        </div>    
    </div>
    <div class="col-md-4">
        <h3 style="border-bottom:2px solid #ccc;"><span style="border-bottom:2px solid #f00;">Contact Us</span></h3>
        @if($setting->image)
        <img src="{{url('/settings')}}/{{$setting->image}}" width="50%"/>
        @endif     
        <br /><br />  
         Follow us at:<br /><br />
         {{--  @foreach($setting->social as $social)
        <a href="{{$social}}"><i class="fa fa-">{{$social}}</a>

         @endforeach  --}}
       
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

