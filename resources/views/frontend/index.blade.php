
@extends('frontend.layout.master')
@section( 'content')
<div class="wrapper">
	@if(count($featured) > 0)
	<div class="row">
		@foreach($featured as $key => $f)
		@if($key == 0)
		<div class="col-md-6">
		<div class="relative">
		<a href="{{url('article')}}/{{$f->slug}}"><img src="{{url('/posts')}}/{{$f->image}}" width="100%" />
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
						<a href="{{url('article')}}/{{$f->slug}}"><img src="{{url('/posts')}}/{{$f->image}}" width="100%" />
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
						<a href="{{url('article')}}/{{$f->slug}}"><img src="{{url('/posts')}}/{{$f->image}}" width="100%" />
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
        	<div class="col-md-12">
        		<h3 style="border-bottom:3px solid #81d742; padding-bottom:5px;"><span style="padding:6px 12px; background:#81d742;">NEWS</span></h3>
        	</div>
        	<div class="col-md-6">
			@foreach($general as $key => $g)
			@if($key == 0)
			<a href="{{url('article')}}/{{$g->slug}}"><img src="{{url('/posts')}}/{{$g->image}}" width="100%" style="margin-bottom:15px;" /></a>
			<a href="{{url('article')}}/{{$g->slug}}"><a href="{{url('article')}}/{{$g->slug}}"><p align="justify">{!! substr($g->description,0,300)!!}</p> <a href="{{url('article')}}/{{$g->slug}}"> Read more &raquo; </a>
			@endif
			@endforeach

            </div>
            <div class="col-md-6">
				@foreach($general as $key => $g)
				@if( $key > 0 && $key < 6 )
					
            	<div class="row" style="border-bottom:1px solid #ccc; padding-bottom:10px; margin-bottom:10px;">
	            	<div class="col-md-4">
                    	<div class="row">

						<img href="{{url('article')}}/{{$g->slug}}" src="{{url('/posts')}}/{{$g->image}}" width="100%" />
        	        	</div>
                    </div>
            	    <div class="col-md-8">
                    	<div class="row">
						<h4><a href="{{url('article')}}/{{$g->slug}}">{{$g->title}}</a></h4>
                		</div>
                    </div>
				</div>
				@endif
				@endforeach

            </div>
        </div>
        
			<div class="col-md-12 image-gallery" style="border:1px solid #ccc; padding:15px 15px 30px 15px; margin-top:30px; margin-bottom:30px;">
			
					
    	    	<h3 style="border-bottom:3px solid #81d742; padding-bottom:5px;"><span style="padding:6px 12px; background:#81d742;">BUSINESS</span></h3>
				@foreach($business->take(4) as $key => $b)
				<a href="{{url('article')}}/{{$g->slug}}"><img src="{{url('/posts')}}/{{$b->image}}" /></a>
				@endforeach

		</div>
        
        <div class="row">
        	<div class="col-md-6">
            <div class="col-md-12" style="border:1px solid #ccc; padding-bottom:30px;">
            	<div class="col-md-12" style="border-bottom:1px solid #ccc; padding:20px 10px; margin-bottom:10px;">
				<h3 style="border-bottom:3px solid #b952c8; padding-bottom:5px;"><span style="padding:6px 12px; background:#b952c8;">TECHNOLOGY</span></h3>
				@foreach($tech as $key => $t)
				@if($key == 0)

				<a href="{{url('article')}}/{{$t->slug}}"><img src="{{url('/posts')}}/{{$t->image}}" width="100%" style="margin-bottom:15px;" /></a>
				<a href="{{url('article')}}/{{$t->slug}}"><a href="{{url('article')}}/{{$t->slug}}"><p align="justify">{!! substr($t->description,0,300)!!}</p> <a href="{{url('article')}}/{{$t->slug}}"> Read more &raquo; </a>
				@endif
				@endforeach

				</div>
				@foreach($tech as $key => $t)
				@if( $key > 0 && $key < 5 )

                
                <div class="col-md-12" style="padding-bottom:10px;">
	            	<div class="col-md-4">
                    	<div class="row fashion">
							<img href="{{url('article')}}/{{$t->slug}}" src="{{url('/posts')}}/{{$t->image}}" width="100%" />
        	        	</div>
                    </div>
            	    <div class="col-md-8">
                    	<div class="row">
							<h4><a href="{{url('article')}}/{{$t->slug}}">{{$t->title}}</a></h4>
                		</div>
                    </div>
				</div>
				@endif
				@endforeach
            </div></div>
        	<div class="col-md-6">
            <div class="col-md-12" style="border:1px solid #ccc; padding-bottom:30px;">
            	<div class="col-md-12" style="border-bottom:1px solid #ccc; padding:20px 10px; margin-bottom:10px;">
				<h3 style="border-bottom:3px solid #d95757; padding-bottom:5px;"><span style="padding:6px 12px; background:#d95757;">SPORTS</span></h3>
				@foreach($sport as $key => $s)
				@if($key == 0)
				<a href="{{url('article')}}/{{$s->slug}}"><img src="{{url('/posts')}}/{{$s->image}}" width="100%" style="margin-bottom:15px;" /></a>
				<a href="{{url('article')}}/{{$s->slug}}"><a href="{{url('article')}}/{{$s->slug}}"><p align="justify">{!! substr($s->description,0,300)!!}</p> <a href="{{url('article')}}/{{$s->slug}}"> Read more &raquo; </a>
				@endif
				@endforeach
				</div>
				@foreach($sport as $key => $s)
				@if( $key > 0 && $key < 5 )

                <div class="col-md-12" style="border-bottom:1px solid #ccc; padding-bottom:10px; margin-bottom:10px;">
	            	<div class="col-md-4">
                    	<div class="row fashion">
							<img href="{{url('article')}}/{{$s->slug}}" src="{{url('/posts')}}/{{$s->image}}" width="100%" />
        	        	</div>
                    </div>
            	    <div class="col-md-8">
                    	<div class="row" style="padding-left:0px;">
							<h4><a href="{{url('article')}}/{{$s->slug}}">{{$s->title}}</a></h4>
                		</div>
                    </div>
                </div>
				@endif
				@endforeach
            </div></div>
        
        <div class="col-md-12">
        	<div class="col-md-12" style="border:1px solid #ccc; padding:15px 15px 30px 0px; margin-top:30px;">
			<div class="col-md-12">
            <h3 style="border-bottom:3px solid #81d742; padding-bottom:5px;"><span style="padding:6px 12px; background:#81d742;">HEALTH</span></h3>
            </div>
        	<div class="col-md-6">
				@foreach($health as $key => $h)
				@if($key == 0)
				<a href="{{url('article')}}/{{$h->slug}}"><img src="{{url('/posts')}}/{{$h->image}}" width="100%" style="margin-bottom:15px;" /></a>
				<a href="{{url('article')}}/{{$h->slug}}"><a href="{{url('article')}}/{{$h->slug}}"><p align="justify">{!! substr($h->description,0,300)!!}</p> <a href="{{url('article')}}/{{$h->slug}}"> Read more &raquo; </a>
				@endif
				@endforeach
			            </div>
            <div class="col-md-6">
				@foreach($health as $key => $h)
				@if( $key > 0 && $key < 6 )
            	<div class="row" style="border-bottom:1px solid #ccc; padding-bottom:10px; margin-bottom:10px;">
	            	<div class="col-md-4">
                    	<div class="row">
							<img href="{{url('article')}}/{{$h->slug}}" src="{{url('/posts')}}/{{$h->image}}" width="100%" />
        	        	</div>
                    </div>
            	    <div class="col-md-8">
                    	<div class="row" style="padding-left:10px;">
							<h4><a href="{{url('article')}}/{{$h->slug}}">{{$h->title}}</a></h4>
                		</div>
                    </div>
                </div>
				@endif
				@endforeach
            </div>
        </div>
		</div>
        
			<div class="col-md-12 image-gallery" style="border:1px solid #ccc; padding:15px 15px 30px 15px; margin-top:30px; margin-bottom:30px;">
			
					
    	    	<h3 style="border-bottom:3px solid #81d742; padding-bottom:5px;"><span style="padding:6px 12px; background:#81d742;">Travel</span></h3>
				@foreach($travel->take(4) as $key => $t)
				<a href="{{url('article')}}/{{$t->slug}}"><img src="{{url('/posts')}}/{{$t->image}}" /></a>
				@endforeach

		</div>
        
        <div class="col-md-12">
        <div class="col-md-12" style="border:1px solid #ccc; padding:15px 15px 30px 15px; margin-top:30px;">
        	<h3 style="border-bottom:3px solid #81d742; padding-bottom:5px;"><span style="padding:6px 12px; background:#81d742;">ENTERTAINMENT</span></h3>
			@foreach($enter->take(3) as $key => $e)

			<div class="row" style="margin-bottom:30px;">
            <div class="col-md-4">
				<a href="{{url('article')}}/{{$e->slug}}"><img href="{{url('article')}}/{{$e->slug}}" src="{{url('/posts')}}/{{$e->image}}" width="100%" /></a>
            </div>
         
          
          
       
      
			</div>
			@endforeach

        </div>
        </div>
        </div>
        </div>


        <div class="col-md-4">
        <div class="col-md-12" style="border:1px solid #ccc; padding:15px;">
			<h3 style="border-bottom:3px solid #2b99ca; padding-bottom:5px;"><span style="padding:6px 12px; background:#2b99ca;">EDUCATION</span></h3>
			@foreach($edu as $key => $edu)
			@if( $key > 0 && $key < 6 )
			<div class="col-md-12" style="border-bottom:1px solid #ccc; padding-bottom:10px; margin-bottom:10px;">
	           	<div class="col-md-4">
                   	<div class="row">
						<img href="{{url('article')}}/{{$edu->slug}}" src="{{url('/posts')}}/{{$edu->image}}" width="100%" />
					</div>
                </div>
            	<div class="col-md-8">
                   	<div class="row" style="padding-left:10px;">
						<h4><a href="{{url('article')}}/{{$edu->slug}}">{{$edu->title}}</a></h4>
                	</div>
                </div>
            </div>
			@endif
			@endforeach
            
          </div>
          
          <div class="col-md-12" style="border:1px solid #ccc; padding:15px 15px 60px 15px; margin-top:30px;">
          	<div class="col-md-12" style="border-bottom:1px solid #ccc; padding:0px 10px 20px 10px; margin-bottom:10px;">
           		<h3 style="border-bottom:3px solid #2b99ca; padding-bottom:5px;"><span style="padding:6px 12px; background:#2b99ca;">POlITICS</span></h3>
				 @foreach($pol as $key => $p)
				 @if($key == 0)

				   <img href="{{url('article')}}/{{$p->slug}}" src="{{url('/posts')}}/{{$p->image}}" width="100%" />
				   <a href="{{url('article')}}/{{$p->slug}}"><a href="{{url('article')}}/{{$p->slug}}"><p align="justify">{!! substr($p->description,0,300)!!}</p> <a href="{{url('article')}}/{{$p->slug}}"> Read more &raquo; </a>
				 @endif 
				   @endforeach 

				</div>
				@foreach($pol->take(4) as $key => $p)

                <div class="col-md-12" style="border-bottom:1px solid #ccc; padding-bottom:10px; margin-bottom:10px;">

					<div class="col-md-4">
                    	<div class="row">
    	            		<img href="{{url('article')}}/{{$p->slug}}" src="{{url('/posts')}}/{{$p->image}}"  width="100%" style="margin-left:-15px;" />
        	        	</div>
                    </div>
            	    <div class="col-md-8">
                    	<div class="row" style="padding-left:0px;">
							<h4><a href="{{url('article')}}/{{$p->slug}}">{{$p->title}}</a></h4>
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
            <h3 style="border-bottom:3px solid #2b99ca; padding-bottom:5px;"><span style="padding:6px 12px; background:#2b99ca;">STYLE</span></h3>
			@foreach($pol as $key => $p)
			@if($key == 0)
			<img href="{{url('article')}}/{{$p->slug}}" src="{{url('/posts')}}/{{$p->image}}" width="100%" />
				<a href="{{url('article')}}/{{$p->slug}}"><a href="{{url('article')}}/{{$p->slug}}"><p align="justify">{!! substr($p->description,0,300)!!}</p> <a href="{{url('article')}}/{{$p->slug}}"> Read more &raquo; </a>
			@endif 
			@endforeach
			</div>
			@foreach($style->take(4) as $key => $s)

                <div class="col-md-12" style="border-bottom:1px solid #ccc; padding-bottom:10px; margin-bottom:10px;">

					<div class="col-md-4">
                    	<div class="row">
    	            		<img href="{{url('article')}}/{{$s->slug}}" src="{{url('/posts')}}/{{$s->image}}"  width="100%" style="margin-left:-15px;" />
        	        	</div>
                    </div>
            	    <div class="col-md-8">
                    	<div class="row" style="padding-left:0px;">
							<h4><a href="{{url('article')}}/{{$s->slug}}">{{$s->title}}</a></h4>
                		</div>
                    </div>
                </div>
          @endforeach
          </div> 
          
        </div>
    </div> 
</div>

@endsection