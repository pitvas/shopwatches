
@if($item)
<script type="text/javascript">
	$(function() {
	
	    var menu_ul = $('.menu_drop > li > ul'),
	           menu_a  = $('.menu_drop > li > a');
	    
	    menu_ul.hide();
	
	    menu_a.click(function(e) {
	        e.preventDefault();
	        if(!$(this).hasClass('active')) {
	            menu_a.removeClass('active');
	            menu_ul.filter(':visible').slideUp('normal');
	            $(this).addClass('active').next().stop(true,true).slideDown('normal');
	        } else {
	            $(this).removeClass('active');
	            $(this).next().stop(true,true).slideUp('normal');
	        }
	    });
	
	});
</script>	



<!--start-breadcrumbs-->
	<div class="breadcrumbs">
		<div class="container">
			<div class="breadcrumbs-main">
				<div class="breadcrumb">
				{{ Breadcrumbs::render('item',$item) }}
			</div>
			</div>
		</div>
	</div>
	<!--end-breadcrumbs-->
	<!--start-single-->
	@foreach($item as $it)
	<div class="single contact">
		<div class="container">
			<div class="single-main">
				<div class="col-md-9 single-main-left">
				<div class="sngl-top">
					<div class="col-md-5 single-top-left">	
						<div class="flexslider">
							  <ul class="slides">
								<li data-thumb="{{ asset(env('THEME')) }}/images/{{ $it->img }}">
									<div class="thumb-image"> <img src="{{ asset(env('THEME')) }}/upload/single/{{ $it->img }}" data-imagezoom="true" class="img-responsive" alt=""/> </div>
								</li>
								<li data-thumb="{{ asset(env('THEME')) }}/images/s-2.jpg">
									 <div class="thumb-image"> <img src="{{ asset(env('THEME')) }}/images/s-2.jpg" data-imagezoom="true" class="img-responsive" alt=""/> </div>
								</li>
								<li data-thumb="{{ asset(env('THEME')) }}/images/s-3.jpg">
								   <div class="thumb-image"> <img src="{{ asset(env('THEME')) }}/images/s-3.jpg" data-imagezoom="true" class="img-responsive" alt=""/> </div>
								</li> 
							  </ul>
						</div>
						<!-- FlexSlider -->
						<script src="{{ asset(env('THEME')) }}/js/imagezoom.js"></script>
						<script defer src="{{ asset(env('THEME')) }}/js/jquery.flexslider.js"></script>
						<link rel="stylesheet" href="{{ asset(env('THEME')) }}/css/flexslider.css" type="text/css" media="screen" />

						<script>
						// Can also be used with $(document).ready()
						$(window).load(function() {
						  $('.flexslider').flexslider({
							animation: "slide",
							controlNav: "thumbnails"
						  });
						});
						</script>
					</div>	
					<div class="col-md-7 single-top-right">
						<div class="single-para simpleCart_shelfItem">
						<h2>{{ $it->title }}</h2>
							<div class="star-on">
								<ul class="star-footer">
										<li><a href="#"><i> </i></a></li>
										<li><a href="#"><i> </i></a></li>
										<li><a href="#"><i> </i></a></li>
										<li><a href="#"><i> </i></a></li>
										<li><a href="#"><i> </i></a></li>
									</ul>
								<div class="review">
									<a href="#"> 1 customer review </a>
									
								</div>
							<div class="clearfix"> </div>
							</div>
							
							<h5 class="item_price">$ {{ $it->price }}</h5>
							<p>{{ $it->desc }}</p>
							<div class="available">
								
						<p>Color:{{ $it->color }}</p>
						<p>Size:{{ $it->size }}</p>
						</div>
							<ul class="tag-men">
								<li><span>TAG</span>
								<span class="women1">:{{ $it->tag }}</span></li>
								<li><span>SKU</span>
								<span class="women1">:{{ $it->sku }}</span></li>
							</ul>
								<a href="#" class="add-cart item_add">ADD TO CART</a>
							
						</div>
					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="tabs">
					<ul class="menu_drop">
						<li class="item1"><a href="#"><img src="{{ asset(env('THEME')) }}/images/arrow.png" alt="">Additional Description</a>
							<ul>
								<li class="subitem1"><a>{{ $it->ad_desc }}</a></li>
						
							</ul>
						</li>
	 				</ul>
				</div>
				</div>
			</div>

			

		</div>
	</div>
	@endforeach
</div>	




@endif