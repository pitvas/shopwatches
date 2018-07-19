<?php //dd($articles) ?>
@if($articles)

<!--start-breadcrumbs-->
	<div class="breadcrumbs">
		<div class="container">
			<div class="breadcrumbs-main">
				<div class="breadcrumb">
				{{ Breadcrumbs::render('tags',$articles) }}
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
					<div class="product-one">
						@foreach($articles as $a)
						<div class="col-md-12 product-left p-left" style="padding-bottom: 20px">
							<div class="product-main simpleCart_shelfItem row">
								<div class="col-md-3">
								<a href="{{ route('articles.show',['alias'=>$a->alias]) }}" class="mask"><img class="img-responsive zoom-img" src="{{ asset(env('THEME')) }}/upload/{{ $a->img }}" alt="" /></a>
								</div>
								<div class="col-md-9">
								<div class="product-bottom">
									<h3>{{ $a->title }}</h3>
									<p>{{ $a->short_description }}</p>
									<h4><a class="btn btn-primary" href="{{ route('articles.show',['alias'=>$a->alias]) }}">Read more</a></h4>

									<a href="{{ route('articlesCat',['cat_alias'=>$a->category->alias]) }}">#{{ $a->category->title }}</a>
								</div>
								
							</div>
							</div>
						</div>

						@endforeach
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
	<!--product-end-->
	<!--information-starts-->
	<div class="container">
		<nav style="text-align: center;">
			<div class="col-md-9 prdt-left">

			{{ $articles->appends($_GET)->links() }}
			</div>
		</nav>
	</div>
	<div class="clearfix"></div>
	
@endif
	<!--information-end-->
	<!--footer-starts-->
	