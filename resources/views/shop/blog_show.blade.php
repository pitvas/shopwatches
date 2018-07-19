@if($blog)

<!--start-breadcrumbs-->
	<div class="breadcrumbs">
		<div class="container">
			<div class="breadcrumbs-main">
				<div class="breadcrumbs-main">
				<div class="breadcrumb">
				{{ Breadcrumbs::render('blog',$blog) }}
			</div>
			</div>
		</div>
	</div>
	<!--end-breadcrumbs-->
	<!--prdt-starts-->
	<div class="prdt"> 
		<div class="container">
			@foreach($blog as $bg)
				<?php $bg=$bg ?>
			@endforeach
			<div class="prdt-top">
				<div class="col-md-9 prdt-left">
					<div class="product-one">
					
						<div class="col-md-12" style="padding-bottom: 20px">
							<div class= "row">
								<div class="col-md-5">
								<img class="img-responsive zoom-img" src="{{ asset(env('THEME')) }}/upload/single/{{ $bg->img }}" alt="" />
								</div>
								<div class="col-md-7">
								<div class="product-bottom">
									<h1>{{ $bg->title }}</h1>
									<p>{{ $bg->description }}</p>
									<a href="{{ route('articlesCat',['cat_alias'=>$bg->category->alias]) }}">#{{ $bg->category->title }}</a>
								</div>
								
							</div>
							</div>
						</div>

						
						<div class="clearfix"></div>
					</div>	
				</div>	
				<div class="col-md-3 prdt-right">
					<form name="filterTag" action="{{ action('FilterController@filter') }}" method="get">
						{{ csrf_field() }}
					<div class="w_sidebar">
						<section  class="sky-form">
							<h4>Tags</h4>
							<div class="row1 scroll-pane">
								@foreach($all_cat as $all)
								<div class="col col-4">
									<label class="checkbox"><input type="checkbox" name="tags[]" value="{{ $all->id }}"><i></i>{{$all->title}} </label>
								</div>
								@endforeach
							</div>
						</section>
						<div class="row">
							<div class="col-md-12" style="text-align: center; padding:20px;">
								<input type="submit" value="Filter" class="btn btn-primary" style="width:100%;">
							</div>
						</div>
					</div>
				</form>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<div class="clearfix" style="padding-bottom: 120px"></div>
	<!--product-end-->
	<!--information-starts-->
	
	
@endif