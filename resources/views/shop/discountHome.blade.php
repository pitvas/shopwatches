<div class="product"> 
		<div class="container">
			<div class="product-top">
				<div class="product-one">
					<?php $i=1; ?>
					@foreach($discountHome as $disc)
					<div class="col-md-3 product-left">
						
						<div class="product-main simpleCart_shelfItem">
							<a href="{{ route('items.show',['sex'=>$disc->sex, 'brd'=>$disc->tag,'items'=>$disc->id]) }}" class="mask"><img class="img-responsive zoom-img" src="{{ asset(env('THEME')) }}/images/{{ $disc->img }}" alt="" /></a>
							<div class="product-bottom">
								<h3>{{ $disc->title }}</h3>
								<p>Explore Now</p>
								<h4><a class="item_add" href="#"><i></i></a> <span class=" item_price">$ {{ $disc->price }}</span></h4>
							</div>
							<div class="srch">
								<span>-50%</span>
							</div>
						</div>
					<?php $i++; ?>
					</div>
					@if($i == 5)
						<div class=col-md-12 style="height: 20px;"></div>
					@endif
					@endforeach
					<div class="clearfix"></div>
				</div>

			</div>
		</div>
	</div>