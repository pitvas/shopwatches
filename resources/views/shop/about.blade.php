@if($about)

<div class="about"> 
		<div class="container">
			<div class="about-top grid-1">
				@foreach($about as $ab)
				<div class="col-md-4 about-left">
					<a href="{{ route('articles.show',['alias'=>$ab->alias]) }}">
					<figure class="effect-bubba">
						<img class="img-responsive" src="{{ asset(env('THEME')) }}/images/{{ $ab->img }}" alt=""/>
						<figcaption>
							<h2>{{ $ab->title }}</h2>
							<p>{{ $ab->promo_description }}</p>	
						</figcaption>			
					</figure>
					</a>
				</div>
				@endforeach
				<div class="clearfix"></div>
			</div>
		</div>
	</div>

@endif