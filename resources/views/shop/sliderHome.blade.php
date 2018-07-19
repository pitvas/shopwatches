
@if(count($sliderHome)>0)
	
	
<div class="bnr" id="home">
		<div  id="top" class="callbacks_container">
			
			<ul class="rslides" id="slider4">
				@foreach($sliderHome as $img)
			    <li>
					<img src="{{ asset(env('THEME')) }}/images/{{ $img->img }}" alt=""/>
				</li>
				<!--<li>
					<img src="images/bnr-2.jpg" alt=""/>
				</li>
				<li>
					<img src="images/bnr-3.jpg" alt=""/>
				</li>-->
				@endforeach
			</ul>
			
		</div>
		<div class="clearfix"> </div>
	</div>
	<!--banner-ends--> 
	<!--Slider-Starts-Here-->
				<script src="{{ asset(env('THEME')) }}/js/responsiveslides.min.js"></script>
			 <script>
			    // You can also use "$(window).load(function() {"
			    $(function () {
			      // Slideshow 4
			      $("#slider4").responsiveSlides({
			        auto: true,
			        pager: true,
			        nav: true,
			        speed: 500,
			        namespace: "callbacks",
			        before: function () {
			          $('.events').append("<li>before event fired.</li>");
			        },
			        after: function () {
			          $('.events').append("<li>after event fired.</li>");
			        }
			      });
			
			    });
			  </script>

@endif