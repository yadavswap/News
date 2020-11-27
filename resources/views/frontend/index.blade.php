
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
            		<img src="images/relay-race-655353_1280-390x205.jpg" width="100%" style="margin-bottom:15px;" />
        			<p align="justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>Read more <a href="#"><span class="glyphicon glyphicon-chevron-right"></span><span class="glyphicon glyphicon-chevron-right"></span></a>
            	</div>
                <div class="col-md-12" style="border-bottom:1px solid #ccc; padding-bottom:10px; margin-bottom:10px;">
	            	<div class="col-md-4">
                    	<div class="row fashion">
    	            		<img src="images/swimmer-583667_1280-392x272.jpg" width="100%"/>
        	        	</div>
                    </div>
            	    <div class="col-md-8">
                    	<div class="row" style="padding-left:0px;">
                			<h4>Lorem ipsum dolor sit amet</h4>
                		</div>
                    </div>
                </div>
                <div class="col-md-12" style="border-bottom:1px solid #ccc; padding-bottom:10px; margin-bottom:10px;">
	            	<div class="col-md-4">
                    	<div class="row fashion">
    	            		<img src="images/basketball-95607_1280-392x272.jpg" width="100%" />
        	        	</div>
                    </div>
            	    <div class="col-md-8">
                    	<div class="row" style="padding-left:0px;">
                			<h4>Lorem ipsum dolor sit amet</h4>
                		</div>
                    </div>
                </div>
                <div class="col-md-12" style="border-bottom:1px solid #ccc; padding-bottom:10px; margin-bottom:10px;">
	            	<div class="col-md-4">
                    	<div class="row fashion">
    	            		<img src="images/football-622873_1280-300x205.jpg" width="100%" />
        	        	</div>
                    </div>
            	    <div class="col-md-8">
                    	<div class="row" style="padding-left:0px;">
                			<h4>Lorem ipsum dolor sit amet</h4>
                		</div>
                    </div>
                </div>
                <div class="col-md-12" style="padding-bottom:10px;">
	            	<div class="col-md-4">
                    	<div class="row fashion">
    	            		<img src="images/relay-race-655353_1280-392x272.jpg" width="100%" />
        	        	</div>
                    </div>
            	    <div class="col-md-8">
                    	<div class="row" style="padding-left:0px;">
                			<h4>Lorem ipsum dolor sit amet</h4>
                		</div>
                    </div>
                </div>
            </div></div>
        
        <div class="col-md-12">
        	<div class="col-md-12" style="border:1px solid #ccc; padding:15px 15px 30px 0px; margin-top:30px;">
			<div class="col-md-12">
            <h3 style="border-bottom:3px solid #81d742; padding-bottom:5px;"><span style="padding:6px 12px; background:#81d742;">HEALTH</span></h3>
            </div>
        	<div class="col-md-6">
            	<img src="images/iphone-500291_1280-390x205.jpg" width="100%" style="margin-bottom:15px;" />
        		<p align="justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>Read more <a href="#"><span class="glyphicon glyphicon-chevron-right"></span><span class="glyphicon glyphicon-chevron-right"></span></a>
            </div>
            <div class="col-md-6">
            	<div class="row" style="border-bottom:1px solid #ccc; padding-bottom:10px; margin-bottom:10px;">
	            	<div class="col-md-4">
                    	<div class="row">
    	            		<img src="images/supersonic-fighter-63211_1280-392x272.jpg" width="100%" />
        	        	</div>
                    </div>
            	    <div class="col-md-8">
                    	<div class="row" style="padding-left:10px;">
                			<h4>Lorem ipsum dolor sit amet</h4>
                		</div>
                    </div>
                </div>
                <div class="row" style="border-bottom:1px solid #ccc; padding-bottom:10px; margin-bottom:10px;">
	            	<div class="col-md-4">
                    	<div class="row">
    	            		<img src="images/headphones-15600_1280-392x272.jpg" width="100%" />
        	        	</div>
                    </div>
            	    <div class="col-md-8">
                    	<div class="row" style="padding-left:10px;">
                			<h4>Lorem ipsum dolor sit amet</h4>
                		</div>
                    </div>
                </div>
                <div class="row" style="border-bottom:1px solid #ccc; padding-bottom:10px; margin-bottom:10px;">
	            	<div class="col-md-4">
                    	<div class="row">
    	            		<img src="images/drone-674238_1280-392x272.jpg" width="100%" />
        	        	</div>
                    </div>
            	    <div class="col-md-8">
                    	<div class="row" style="padding-left:10px;">
                			<h4>Lorem ipsum dolor sit amet</h4>
                		</div>
                    </div>
                </div>
                <div class="row" style="padding-bottom:10px;">
	            	<div class="col-md-4">
                    	<div class="row">
    	            		<img src="images/headphones-15600_1280-392x272.jpg" width="100%" />
        	        	</div>
                    </div>
            	    <div class="col-md-8">
                    	<div class="row" style="padding-left:10px;">
                			<h4>Lorem ipsum dolor sit amet</h4>
                		</div>
                    </div>
                </div>    
            </div>
        </div>
		</div>
        
        <div class="col-md-12 image-gallery">
	        <div class="col-md-12" style="border:1px solid #ccc; padding:15px 15px 30px 15px; margin-top:30px;">
    	    	<h3 style="border-bottom:3px solid #81d742; padding-bottom:5px;"><span style="padding:6px 12px; background:#81d742;">HEALTH</span></h3>
        	    <img src="images/basketball-95607_1280-392x272.jpg" /><img src="images/beauty-666605_1920-392x272.jpg" /><img src="images/drone-674238_1280-392x272.jpg" /><img src="images/football-622873_1280-300x205.jpg" /><img src="images/headphones-15600_1280-392x272.jpg" />
	        </div>
        </div>
        
        <div class="col-md-12">
        <div class="col-md-12" style="border:1px solid #ccc; padding:15px 15px 30px 15px; margin-top:30px;">
        	<h3 style="border-bottom:3px solid #81d742; padding-bottom:5px;"><span style="padding:6px 12px; background:#81d742;">HEALTH</span></h3>
            <div class="row" style="margin-bottom:30px;">
            <div class="col-md-4">
            	<img src="images/vehicle-193213_1280-800x445.jpg" width="100%" />
            </div>
            <div class="col-md-4">
            	<img src="images/vehicle-193213_1280-800x445.jpg" width="100%" />
            </div>
            <div class="col-md-4">
            	<img src="images/vehicle-193213_1280-800x445.jpg" width="100%" />
            </div>
            </div>
            <div class="row" style="margin-bottom:30px;">
            <div class="col-md-4">
            	<img src="images/vehicle-193213_1280-800x445.jpg" width="100%" />
            </div>
            <div class="col-md-4">
            	<img src="images/vehicle-193213_1280-800x445.jpg" width="100%" />
            </div>
            <div class="col-md-4">
            	<img src="images/vehicle-193213_1280-800x445.jpg" width="100%" />
            </div>
            </div>
            <div class="row">
            <div class="col-md-4">
            	<img src="images/vehicle-193213_1280-800x445.jpg" width="100%" />
            </div>
            <div class="col-md-4">
            	<img src="images/vehicle-193213_1280-800x445.jpg" width="100%" />
            </div>
            <div class="col-md-4">
            	<img src="images/vehicle-193213_1280-800x445.jpg" width="100%" />
            </div>
            </div>
        </div>
        </div>
        </div>
        </div>


        <div class="col-md-4">
        <div class="col-md-12" style="border:1px solid #ccc; padding:15px;">
			<h3 style="border-bottom:3px solid #2b99ca; padding-bottom:5px;"><span style="padding:6px 12px; background:#2b99ca;">MORE NEWS</span></h3>
        	<div class="col-md-12" style="border-bottom:1px solid #ccc; padding-bottom:10px; margin-bottom:10px;">
	           	<div class="col-md-4">
                   	<div class="row">
    	           		<img src="images/relaxed-498245_1280-392x272.jpg" width="100%" style="margin-left:-15px;" />
        	       	</div>
                </div>
            	<div class="col-md-8">
                   	<div class="row" style="padding-left:10px;">
                		<h4>Lorem ipsum dolor sit amet</h4>
                	</div>
                </div>
            </div>
            <div class="col-md-12" style="border-bottom:1px solid #ccc; padding-bottom:10px; margin-bottom:10px;">
	           	<div class="col-md-4">
                   	<div class="row">
    	           		<img src="images/relaxed-498245_1280-392x272.jpg" width="100%" style="margin-left:-15px;" />
        	       	</div>
                </div>
            	<div class="col-md-8">
                   	<div class="row" style="padding-left:10px;">
                		<h4>Lorem ipsum dolor sit amet</h4>
                	</div>
                </div>
            </div>
            <div class="col-md-12" style="border-bottom:1px solid #ccc; padding-bottom:10px; margin-bottom:10px;">
	           	<div class="col-md-4">
                   	<div class="row">
    	           		<img src="images/relaxed-498245_1280-392x272.jpg" width="100%" style="margin-left:-15px;" />
        	       	</div>
                </div>
            	<div class="col-md-8">
                   	<div class="row" style="padding-left:10px;">
                		<h4>Lorem ipsum dolor sit amet</h4>
                	</div>
                </div>
            </div>
            <div class="col-md-12" style="border-bottom:1px solid #ccc; padding-bottom:10px; margin-bottom:10px;">
	           	<div class="col-md-4">
                   	<div class="row">
    	           		<img src="images/relaxed-498245_1280-392x272.jpg" width="100%" style="margin-left:-15px;" />
        	       	</div>
                </div>
            	<div class="col-md-8">
                   	<div class="row" style="padding-left:10px;">
                		<h4>Lorem ipsum dolor sit amet</h4>
                	</div>
                </div>
            </div>
            <div class="col-md-12" style="border-bottom:1px solid #ccc; padding-bottom:10px; margin-bottom:10px;">
	           	<div class="col-md-4">
                   	<div class="row">
    	           		<img src="images/relaxed-498245_1280-392x272.jpg" width="100%" style="margin-left:-15px;" />
        	       	</div>
                </div>
            	<div class="col-md-8">
                   	<div class="row" style="padding-left:10px;">
                		<h4>Lorem ipsum dolor sit amet</h4>
                	</div>
                </div>
            </div>
            <div class="col-md-12" style="border-bottom:1px solid #ccc; padding-bottom:10px; margin-bottom:10px;">
	           	<div class="col-md-4">
                   	<div class="row">
    	           		<img src="images/relaxed-498245_1280-392x272.jpg" width="100%" style="margin-left:-15px;" />
        	       	</div>
                </div>
            	<div class="col-md-8">
                   	<div class="row" style="padding-left:10px;">
                		<h4>Lorem ipsum dolor sit amet</h4>
                	</div>
                </div>
            </div>
            <div class="col-md-12" style="padding-bottom:10px;">
	           	<div class="col-md-4">
                   	<div class="row">
    	           		<img src="images/relaxed-498245_1280-392x272.jpg" width="100%" style="margin-left:-15px;" />
        	       	</div>
                </div>
            	<div class="col-md-8">
                   	<div class="row" style="padding-left:10px;">
                		<h4>Lorem ipsum dolor sit amet</h4>
                	</div>
                </div>
            </div>
            <div class="col-md-12 text-center" style="padding:30px 0px;">
            	<img src="images/add.jpg" width="80%" />
            </div>    
          </div>
          
          <div class="col-md-12" style="border:1px solid #ccc; padding:15px 15px 60px 15px; margin-top:30px;">
          	<div class="col-md-12" style="border-bottom:1px solid #ccc; padding:0px 10px 20px 10px; margin-bottom:10px;">
           		<h3 style="border-bottom:3px solid #2b99ca; padding-bottom:5px;"><span style="padding:6px 12px; background:#2b99ca;">MORE NEWS</span></h3>
                    <img src="images/coffee-563797_1280-390x205.jpg" width="100%" style="margin-bottom:15px;" />
        			<p align="justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>Read more <a href="#"><span class="glyphicon glyphicon-chevron-right"></span><span class="glyphicon glyphicon-chevron-right"></span></a>
            	</div>
                <div class="col-md-12" style="border-bottom:1px solid #ccc; padding-bottom:10px; margin-bottom:10px;">
	            	<div class="col-md-4">
                    	<div class="row">
    	            		<img src="images/relaxed-498245_1280-392x272.jpg" width="100%" style="margin-left:-15px;" />
        	        	</div>
                    </div>
            	    <div class="col-md-8">
                    	<div class="row" style="padding-left:0px;">
                			<h4>Lorem ipsum dolor sit amet</h4>
                		</div>
                    </div>
                </div>
                <div class="col-md-12" style="border-bottom:1px solid #ccc; padding-bottom:10px; margin-bottom:10px;">
	            	<div class="col-md-4">
                    	<div class="row">
    	            		<img src="images/relaxed-498245_1280-392x272.jpg" width="100%" style="margin-left:-15px;" />
        	        	</div>
                    </div>
            	    <div class="col-md-8">
                    	<div class="row" style="padding-left:0px;">
                			<h4>Lorem ipsum dolor sit amet</h4>
                		</div>
                    </div>
                </div>
          </div>
          
          <div class="col-md-12" style="border:1px solid #ccc; padding:15px 15px 30px 15px; margin-top:30px;">
          	<div class="col-md-12">
            	<h3 style="border-bottom:3px solid #2b99ca; padding-bottom:5px;"><span style="padding:6px 12px; background:#2b99ca;">MORE NEWS</span></h3>
            </div>          	
          	<div class="col-md-6">
            	<img src="images/add1.jpg" width="100%" />
            </div>
            <div class="col-md-6">
            	<img src="images/add1.jpg" width="100%" />
            </div>
          </div>
          
         <div class="col-md-12" style="border:1px solid #ccc; padding:15px 15px 7px 15px; margin-top:30px;">
          	<div class="col-md-12" style="border-bottom:1px solid #ccc; padding:0px 10px 20px 10px; margin-bottom:10px;">
            <h3 style="border-bottom:3px solid #2b99ca; padding-bottom:5px;"><span style="padding:6px 12px; background:#2b99ca;">MORE NEWS</span></h3>
            		<img src="images/bride-301814_1280-392x272.jpg" width="100%" style="margin-bottom:15px;" />
        			<p align="justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>Read more <a href="#"><span class="glyphicon glyphicon-chevron-right"></span><span class="glyphicon glyphicon-chevron-right"></span></a>
            	</div>
                <div class="col-md-12" style="border-bottom:1px solid #ccc; padding-bottom:10px; margin-bottom:10px;">
	            	<div class="col-md-4">
                    	<div class="row">
    	            		<img src="images/relaxed-498245_1280-392x272.jpg" width="100%" style="margin-left:-15px;" />
        	        	</div>
                    </div>
            	    <div class="col-md-8">
                    	<div class="row" style="padding-left:0px;">
                			<h4>Lorem ipsum dolor sit amet</h4>
                		</div>
                    </div>
                </div>
                <div class="col-md-12" style="border-bottom:1px solid #ccc; padding-bottom:10px; margin-bottom:10px;">
	            	<div class="col-md-4">
                    	<div class="row">
    	            		<img src="images/relaxed-498245_1280-392x272.jpg" width="100%" style="margin-left:-15px;" />
        	        	</div>
                    </div>
            	    <div class="col-md-8">
                    	<div class="row" style="padding-left:0px;">
                			<h4>Lorem ipsum dolor sit amet</h4>
                		</div>
                    </div>
                </div>
                <div class="col-md-12" style="border-bottom:1px solid #ccc; padding-bottom:10px; margin-bottom:10px;">
	            	<div class="col-md-4">
                    	<div class="row">
    	            		<img src="images/relaxed-498245_1280-392x272.jpg" width="100%" style="margin-left:-15px;" />
        	        	</div>
                    </div>
            	    <div class="col-md-8">
                    	<div class="row" style="padding-left:0px;">
                			<h4>Lorem ipsum dolor sit amet</h4>
                		</div>
                    </div>
                </div>
                <div class="col-md-12" style="border-bottom:1px solid #ccc; padding-bottom:10px; margin-bottom:10px;">
	            	<div class="col-md-4">
                    	<div class="row">
    	            		<img src="images/relaxed-498245_1280-392x272.jpg" width="100%" style="margin-left:-15px;" />
        	        	</div>
                    </div>
            	    <div class="col-md-8">
                    	<div class="row" style="padding-left:0px;">
                			<h4>Lorem ipsum dolor sit amet</h4>
                		</div>
                    </div>
                </div>
                <div class="col-md-12" style="padding-bottom:10px;">
	            	<div class="col-md-4">
                    	<div class="row">
    	            		<img src="images/relaxed-498245_1280-392x272.jpg" width="100%" style="margin-left:-15px;" />
        	        	</div>
                    </div>
            	    <div class="col-md-8">
                    	<div class="row" style="padding-left:0px;">
                			<h4>Lorem ipsum dolor sit amet</h4>
                		</div>
                    </div>
                </div>
          </div> 
          
        </div>
    </div> 
</div>

@endsection