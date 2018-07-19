@extends(env('THEME').'.layouts.site')



@section('content')
<style>
	.wrap{
		text-align: center;
	}
	.container-wrap{
		width:100vw;
		height:100vh;
	}
	.error{
		font-size: 10em;
		 text-shadow: 0px 5px 5px;
	}
</style>
<div class="container container-wrap">
	<div class="row">
		<div class="col-md-12 wrap">
			<h1 class='error'>404</h1>
		</div>
		<div class="col-md-12 wrap">
			<div class="alert alert-danger" role="alert">
				<strong>Ooops!</strong> This page is not found!!!
			  </div>
		</div>
	</div>
</div>
@endsection