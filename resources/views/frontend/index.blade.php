
@extends('frontend.layout.master')
@section( 'content')


	
	
<div class="wrapper">
	@if(count($featured) > 0)
	<div class="row">
		@foreach($featured as $key => $f)
		@if($key == 0)
		<div class="col-md-6">
		<div class="relative">
		<a href="{{url('article')}}/{{$f->pid}}"><img src="{{url('/posts')}}/{{$f->image}}" width="100%" />
		<span class="caption">{{$f->title}}</span></a>
		</div>
		</div>
		@endif
		@endforeach

    	<div class="col-md-6">
    		<div class="row">
				@foreach($featured as $key => $f)
				@if($key > 0  && $key < 3 )
        		<div class="col-md-6">
					<div class="relative">
						<a href="{{url('article')}}/{{$f->pid}}"><img src="{{url('/posts')}}/{{$f->image}}" width="100%" />
							<span class="caption">{{$f->title}}</span></a>
					</div>
					</div>
				@endif
				@endforeach
        	</div>
			<div class="row" style="margin-top:30px;">
				@foreach($featured as $key => $f)
				@if($key > 3 && $key < 6)
				<div class="col-md-6">
					<div class="relative">
						<a href="{{url('article')}}/{{$f->pid}}"><img src="{{url('/posts')}}/{{$f->image}}" width="100%" />
							<span class="caption">{{$f->title}}</span></a>
					</div>
					</div>
        		@endif
				@endforeach
        	</div>        
    	</div>
	</div>
	@endif
	<div class="row" style="margin-top:30px;">
		
    	<div class="col-md-8">
        <div class="col-md-12" style="border:1px solid #ccc; padding:15px 15px 30px 0px;">
        	{{-- <div class="col-md-12">
        		<h3 style="border-bottom:3px solid #81d742; padding-bottom:5px;"><span style="padding:6px 12px; background:#81d742;">HEADLINES</span></h3>
        	</div> --}}
        	<div class="col-md-6">
			@foreach($general as $key => $g)
			@if($key == 0)
			<a href="{{url('article')}}/{{$g->pid}}"><img src="{{url('/posts')}}/{{$g->image}}" width="100%" style="margin-bottom:15px;" /></a>
			<a href="{{url('article')}}/{{$g->pid}}"><a href="{{url('article')}}/{{$g->pid}}"><p align="justify">{!! substr($g->description,0,300)!!}</p> <a href="{{url('article')}}/{{$g->pid}}"> Read more &raquo; </a>
			@endif
			@endforeach

            </div>
            <div class="col-md-6">
				@foreach($general as $key => $g)
				@if( $key > 0 && $key < 6 )
					
            	<div class="row" style="border-bottom:1px solid #ccc; padding-bottom:10px; margin-bottom:10px;">
	            	<div class="col-md-4">
                    	<div class="row">

						<img href="{{url('article')}}/{{$g->pid}}" src="{{url('/posts')}}/{{$g->image}}" width="100%" />
        	        	</div>
                    </div>
            	    <div class="col-md-8">
                    	<div class="row">
						<h4><a href="{{url('article')}}/{{$g->pid}}">{{$g->title}}</a></h4>
                		</div>
                    </div>
				</div>
				@endif
				@endforeach

            </div>
        </div>
{{--          
			<div class="col-md-12 image-gallery" style="border:1px solid #ccc; padding:15px 15px 30px 15px; margin-top:30px; margin-bottom:30px;">
			
					
    	    	<h3 style="border-bottom:3px solid #81d742; padding-bottom:5px;"><span style="padding:6px 12px; background:#81d742;">BUSINESS</span></h3>
				@foreach($business->take(4) as $key => $b)
				<a href="{{url('article')}}/{{$g->pid}}"><img src="{{url('/posts')}}/{{$b->image}}" /></a>
				@endforeach

		</div>  --}}
        
        <div class="row">
        	<div class="col-md-6">
            <div class="col-md-12" style="border:1px solid #ccc; padding-bottom:30px;">
            	<div class="col-md-12" style="border-bottom:1px solid #ccc; padding:20px 10px; margin-bottom:10px;">
				<h3 style="border-bottom:3px solid #b952c8; padding-bottom:5px;"><span style="padding:6px 12px; background:#b952c8;">राजकीय कट्टा</span></h3>
				@foreach($tech as $key => $t)
				@if($key == 0)

				<a href="{{url('article')}}/{{$t->pid}}"><img src="{{url('/posts')}}/{{$t->image}}" width="100%" style="margin-bottom:15px;" /></a>
				<a href="{{url('article')}}/{{$t->pid}}"><a href="{{url('article')}}/{{$t->pid}}"><h4>{{$t->title}}</h4> <a href="{{url('article')}}/{{$t->pid}}"><h4> Read more &raquo;</h4> </a>
				@endif
				@endforeach

				</div>
				@foreach($tech as $key => $t)
				@if( $key > 0 && $key < 5 )

                
                <div class="col-md-12" style="padding-bottom:10px;">
	            	<div class="col-md-4">
                    	<div class="row fashion">
							<img href="{{url('article')}}/{{$t->pid}}" src="{{url('/posts')}}/{{$t->image}}" width="100%" />
        	        	</div>
                    </div>
            	    <div class="col-md-8">
                    	<div class="row">
							<h4><a href="{{url('article')}}/{{$t->pid}}">{{$t->title}}</a></h4>
                		</div>
                    </div>
				</div>
				@endif
				@endforeach
            </div></div>
        	<div class="col-md-6">
            <div class="col-md-12" style="border:1px solid #ccc; padding-bottom:30px;">
            	<div class="col-md-12" style="border-bottom:1px solid #ccc; padding:20px 10px; margin-bottom:10px;">
				<h3 style="border-bottom:3px solid #d95757; padding-bottom:5px;"><span style="padding:6px 12px; background:#d95757;">क्राईम कट्टा</span></h3>
				@foreach($sport as $key => $s)
				@if($key == 0)
				<a href="{{url('article')}}/{{$s->pid}}"><img src="{{url('/posts')}}/{{$s->image}}" width="100%" style="margin-bottom:15px;" /></a>
				<a href="{{url('article')}}/{{$s->pid}}"><a href="{{url('article')}}/{{$s->pid}}"><h4>{{$s->title}}</h4> <a href="{{url('article')}}/{{$s->pid}}"><h4> Read more &raquo;</h4> </a>
				@endif
				@endforeach
				</div>
				@foreach($sport as $key => $s)
				@if( $key > 0 && $key < 5 )

                <div class="col-md-12" style="border-bottom:1px solid #ccc; padding-bottom:10px; margin-bottom:10px;">
	            	<div class="col-md-4">
                    	<div class="row fashion">
							<img href="{{url('article')}}/{{$s->pid}}" src="{{url('/posts')}}/{{$s->image}}" width="100%" />
        	        	</div>
                    </div>
            	    <div class="col-md-8">
                    	<div class="row" style="padding-left:0px;">
							<h4><a href="{{url('article')}}/{{$s->pid}}">{{$s->title}}</a></h4>
                		</div>
                    </div>
                </div>
				@endif
				@endforeach
            </div></div>
        
        <div class="col-md-12">
        	<div class="col-md-12" style="border:1px solid #ccc; padding:15px 15px 30px 0px; margin-top:30px;">
			<div class="col-md-12">
            <h3 style="border-bottom:3px solid #81d742; padding-bottom:5px;"><span style="padding:6px 12px; background:#81d742;">थोडक्यात!</span></h3>
            </div>
        	<div class="col-md-6">
				@foreach($health as $key => $h)
				@if($key == 0)
				<a href="{{url('article')}}/{{$h->pid}}"><img src="{{url('/posts')}}/{{$h->image}}" width="100%" style="margin-bottom:15px;" /></a>
				<a href="{{url('article')}}/{{$h->pid}}"><a href="{{url('article')}}/{{$h->pid}}"><p align="justify">{!! substr($h->description,0,300)!!}</p> <a href="{{url('article')}}/{{$h->pid}}"> Read more &raquo; </a>
				@endif
				@endforeach
			            </div>
            <div class="col-md-6">
				@foreach($health as $key => $h)
				@if( $key > 0 && $key < 6 )
            	<div class="row" style="border-bottom:1px solid #ccc; padding-bottom:10px; margin-bottom:10px;">
	            	<div class="col-md-4">
                    	<div class="row">
							<img href="{{url('article')}}/{{$h->pid}}" src="{{url('/posts')}}/{{$h->image}}" width="100%" />
        	        	</div>
                    </div>
            	    <div class="col-md-8">
                    	<div class="row" style="padding-left:10px;">
							<h4><a href="{{url('article')}}/{{$h->pid}}">{{$h->title}}</a></h4>
                		</div>
                    </div>
                </div>
				@endif
				@endforeach
            </div>
        </div>
		</div>
        
	<div class="col-md-12 image-gallery" style="border:1px solid #ccc; padding:15px 15px 30px 15px; margin-top:30px; margin-bottom:30px;">
			
					
    	    	<h3 style="border-bottom:3px solid #81d742; padding-bottom:5px;"><span style="padding:6px 12px; background:#81d742;">	महाराष्ट्र</span></h3>
				@foreach($travel as $key => $h)
				@if( $key > 0 && $key < 6 )
            	<div class="row" style="border-bottom:1px solid #ccc; padding-bottom:10px; margin-bottom:10px;">
	            	<div class="col-md-4">
                    	<div class="row">
							<img href="{{url('article')}}/{{$h->pid}}" src="{{url('/posts')}}/{{$h->image}}" width="100%" />
        	        	</div>
                    </div>
            	    <div class="col-md-8">
                    	<div class="row" style="padding-left:10px;">
							<h4><a href="{{url('article')}}/{{$h->pid}}">{{$h->title}}</a></h4>
                		</div>
                    </div>
                </div>
				@endif
				@endforeach

		</div>
        
        <div class="col-md-12">
        <div class="col-md-12" style="border:1px solid #ccc; padding:15px 15px 30px 15px; margin-top:30px;">
        	<h3 style="border-bottom:3px solid #81d742; padding-bottom:5px;"><span style="padding:6px 12px; background:#81d742;">आपला जिल्हा</span></h3>
			@foreach($enter as $key => $h)
			@if( $key > 0 && $key < 6 )
			<div class="row" style="border-bottom:1px solid #ccc; padding-bottom:10px; margin-bottom:10px;">
				<div class="col-md-4">
					<div class="row">
						<img href="{{url('article')}}/{{$h->pid}}" src="{{url('/posts')}}/{{$h->image}}" width="100%" />
					</div>
				</div>
				<div class="col-md-8">
					<div class="row" style="padding-left:10px;">
						<h4><a href="{{url('article')}}/{{$h->pid}}">{{$h->title}}</a></h4>
					</div>
				</div>
			</div>
			@endif
			@endforeach

        </div>
        </div>
        </div>
        </div>


        <div class="col-md-4">
			{{-- START MENU --}}
			<div class="col-md-12" style="border:1px solid; padding:15px;">
				
				@foreach ( $categories as $key => $cat)
				@if($key > 0 && $key > 5)
					
				<a href="{{url("category")}}/{{$cat->slug}}"><h4 style="border-bottom:3px solid; padding-bottom:5px;"><span style="padding:6px 12px; background:#000080; color:white;  ">{{$cat->title}}</span></h4></a>
				@endif
				@endforeach

			  </div>
 			{{-- STOP MENU --}}
			<div class="col-md-12" style="border:1px solid #ccc; padding:15px;">
			<h3 style="border-bottom:3px solid #2b99ca; padding-bottom:5px;"><span style="padding:6px 12px; background:#2b99ca;">शिक्षण कट्टा</span></h3>
			@foreach($edu as $key => $edu)
			@if( $key > 0 && $key < 6 )
			<div class="col-md-12" style="border-bottom:1px solid #ccc; padding-bottom:10px; margin-bottom:10px;">
	           	<div class="col-md-4">
                   	<div class="row">
						<img href="{{url('article')}}/{{$edu->pid}}" src="{{url('/posts')}}/{{$edu->image}}" width="100%" />
					</div>
                </div>
            	<div class="col-md-8">
                   	<div class="row" style="padding-left:10px;">
						<h4><a href="{{url('article')}}/{{$edu->pid}}">{{$edu->title}}</a></h4>
                	</div>
                </div>
            </div>
			@endif
			@endforeach
            
          </div>
          
          <div class="col-md-12" style="border:1px solid #ccc; padding:15px 15px 60px 15px; margin-top:30px;">
          	<div class="col-md-12" style="border-bottom:1px solid #ccc; padding:0px 10px 20px 10px; margin-bottom:10px;">
           		<h3 style="border-bottom:3px solid #2b99ca; padding-bottom:5px;"><span style="padding:6px 12px; background:#2b99ca;">आरोग्य कट्टा</span></h3>
				 @foreach($pol as $key => $p)
				 @if($key == 0)

				   <img href="{{url('article')}}/{{$p->pid}}" src="{{url('/posts')}}/{{$p->image}}" width="100%" />
				   <a href="{{url('article')}}/{{$p->pid}}"><a href="{{url('article')}}/{{$p->pid}}"><p align="justify">{!! substr($p->description,0,300)!!}</p> <a href="{{url('article')}}/{{$p->pid}}"> Read more &raquo; </a>
				 @endif 
				   @endforeach 

				</div>
				@foreach($pol->take(4) as $key => $p)

                <div class="col-md-12" style="border-bottom:1px solid #ccc; padding-bottom:10px; margin-bottom:10px;">

					<div class="col-md-4">
                    	<div class="row">
    	            		<img href="{{url('article')}}/{{$p->pid}}" src="{{url('/posts')}}/{{$p->image}}"  width="100%" style="margin-left:-15px;" />
        	        	</div>
                    </div>
            	    <div class="col-md-8">
                    	<div class="row" style="padding-left:0px;">
							<h4><a href="{{url('article')}}/{{$p->pid}}">{{$p->title}}</a></h4>
                		</div>
					</div>

				</div>
				@endforeach

          </div>
          
          {{-- <div class="col-md-12" style="border:1px solid #ccc; padding:15px 15px 30px 15px; margin-top:30px;">
          	<div class="col-md-12">
            	<h3 style="border-bottom:3px solid #2b99ca; padding-bottom:5px;"><span style="padding:6px 12px; background:#2b99ca;">MORE NEWS</span></h3>
            </div>          	
          	<div class="col-md-6">
            	<img src="images/add1.jpg" width="100%" />
            </div>
            <div class="col-md-6">
            	<img src="images/add1.jpg" width="100%" />
            </div>
		  </div> --}}
		  
          
         <div class="col-md-12" style="border:1px solid #ccc; padding:15px 15px 7px 15px; margin-top:30px;">
          	<div class="col-md-12" style="border-bottom:1px solid #ccc; padding:0px 10px 20px 10px; margin-bottom:10px;">
            <h3 style="border-bottom:3px solid #2b99ca; padding-bottom:5px;"><span style="padding:6px 12px; background:#2b99ca;">सांस्कृतिक कट्टा</span></h3>
			@foreach($pol as $key => $p)
			@if($key == 0)
			<img href="{{url('article')}}/{{$p->pid}}" src="{{url('/posts')}}/{{$p->image}}" width="100%" />
				<a href="{{url('article')}}/{{$p->pid}}"><a href="{{url('article')}}/{{$p->pid}}"><p align="justify">{!! substr($p->description,0,300)!!}</p> <a href="{{url('article')}}/{{$p->pid}}"> Read more &raquo; </a>
			@endif 
			@endforeach
			</div>
			@foreach($style->take(4) as $key => $s)

                <div class="col-md-12" style="border-bottom:1px solid #ccc; padding-bottom:10px; margin-bottom:10px;">

					<div class="col-md-4">
                    	<div class="row">
    	            		<img href="{{url('article')}}/{{$s->pid}}" src="{{url('/posts')}}/{{$s->image}}"  width="100%" style="margin-left:-15px;" />
        	        	</div>
                    </div>
            	    <div class="col-md-8">
                    	<div class="row" style="padding-left:0px;">
							<h4><a href="{{url('article')}}/{{$s->pid}}">{{$s->title}}</a></h4>
                		</div>
                    </div>
                </div>
          @endforeach
          </div> 
          
        </div>
    </div> 
</div>

@endsection