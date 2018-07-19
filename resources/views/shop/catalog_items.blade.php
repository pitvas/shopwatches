<!--@if(isset($search))
<?php
 if(!isset($catalog)){
 	$catalog=$search;
 	print_r($catalog);
}
//$search=null;
 ?>
@elseif(isset($filter));
<?php 
dd($filter);
$catalog=$filter?>
@endif-->

@if($catalog)


<div class="breadcrumbs" style="padding: 20px 0 10px 0;">
		<div class="container">
			<div class="breadcrumbs-main">
			
				<div class="breadcrumb">
			{{ Breadcrumbs::render('brand',$catalog) }}
			</div>
			</div>
		</div>
	</div>

	<!--end-breadcrumbs-->
	<!--prdt-starts-->
	<div class="prdt"> 
		<div class="container">
			<div class="prdt-top">
				<div class="col-md-9 prdt-left">
					
					<?php $i=1; ?>
					<div class="product-one">
						@foreach($catalog as $cat)
						<div class="col-md-4 product-left p-left">
							<div class="product-main simpleCart_shelfItem">
								<a href="{{ route('items.show',['sex'=>$cat->sex, 'brd'=>$cat->tag,'items'=>$cat->id]) }}" class="mask"><img class="img-responsive zoom-img" src="{{ asset(env('THEME')) }}/upload/{{ $cat->img }}" alt="" /></a>
								<div class="product-bottom">
									<h3>{{ $cat->title }}</h3>
									<p>Explore Now</p>
									<h4><a class="item_add" href="#"><i></i></a> <span class=" item_price">$ {{ $cat->price }}</span></h4>
								</div>
								@if($cat->discount > 0)
								<div class="srch srch1">
									<span>-{{ $cat->discount }}%</span>
								</div>
								@endif
							</div>
						</div>
						<?php $i++; ?>
						@if($i == 4)
							<div class=col-md-12 style="height: 20px;"></div>
						@endif
						@endforeach
					</div>
					
					<div class="clearfix"></div>	
				</div>



				<div class="col-md-3 prdt-right">
					<form name='filter' action="{{ action('FilterController@filter') }}" method="get">
						{{ csrf_field() }}
					<div class="w_sidebar">
						<section  class="sky-form">
							<h4>Catogories</h4>
							<div class="row1 scroll-pane">
								<div class="col col-4">								
									<label class="checkbox"><input type="checkbox" name="sex[]" value="women"><i></i>Women Watches</label>
									<label class="checkbox"><input type="checkbox" name="sex[]" value="kids"><i></i>Kids Watches</label>
									<label class="checkbox"><input type="checkbox" name="sex[]" value="men"><i></i>Men Watches</label>			
								</div>
							</div>
						</section>
						<section  class="sky-form">
							<h4>Brand</h4>
							<div class="row1 row2 scroll-pane">
								<!--<div class="col col-4">
									<label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i></i>kurtas</label>
								</div>-->
								<div class="col col-4">
									<label class="checkbox"><input type="checkbox" name="brand[]" value="Titan"><i></i>Titan</label>
									<label class="checkbox"><input type="checkbox" name="brand[]" value="Casio"><i></i>Casio</label>
									<label class="checkbox"><input type="checkbox" name="brand[]" value="Fastrack"><i></i>Fastrack</label>
									<label class="checkbox"><input type="checkbox" name="brand[]" value="Fossil"><i></i>Fossil</label>
									<label class="checkbox"><input type="checkbox" name="brand[]" value="Maxima"><i></i>Maxima</label>
									<label class="checkbox"><input type="checkbox" name="brand[]" value="TomTom"><i></i>TomTom</label>
									<label class="checkbox"><input type="checkbox" name="brand[]" value="Timex"><i></i>Timex</label>
								</div>
							</div>
						</section>
						<section class="sky-form">
							<h4>price</h4>
								<div class="row1 row2 scroll-pane">
									
										<label class="radio"><input type="radio" name="price" value="100" checked=""><i></i>up to 100$</label>
										<label class="radio"><input type="radio" name="price" value="200"><i></i>up to 200$</label>
										<label class="radio"><input type="radio" name="price" value="300"><i></i>up to 300$</label>
										<label class="radio"><input type="radio" name="price" value="400"><i></i>up to 400$</label>
										<label class="radio"><input type="radio" name="price" value="500"><i></i>up to 500$</label>
										<label class="radio"><input type="radio" name="price" value="600"><i></i>up to 600$</label>
									
								</div>						
						</section>
						<section class="sky-form">
							<h4>discount</h4>
								<div class="row1 row2 scroll-pane">
									<div class="col col-4">
										<label class="radio"><input type="radio" name="discount" value="60" checked=""><i></i>60 % and above</label>
										<label class="radio"><input type="radio" name="discount" value="50"><i></i>50 % and above</label>
										<label class="radio"><input type="radio" name="discount" value="40"><i></i>40 % and above</label>
									</div>
									<div class="col col-4">
										<label class="radio"><input type="radio" name="discount" value="30"><i></i>30 % and above</label>
										<label class="radio"><input type="radio" name="discount" value="20"><i></i>20 % and above</label>
										<label class="radio"><input type="radio" name="discount" value="10"><i></i>10 % and above</label>
									</div>
								</div>						
						</section>
						
					</div>
						<div class="row">
							<div class="col-md-12" style="text-align: center; padding:20px;">
								<input type="submit" value="Filter" class="btn btn-primary" style="width:100%;">
							</div>
						</div>
				</form>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>

			
				<div class="container">
					<nav style="text-align: center;">
					<div class="col-md-9 prdt-left">

					 {{ $catalog->appends($_GET)->links() }}
					</div>
					</nav>
				</div>
				<div class="clearfix"></div>


		
	@endif