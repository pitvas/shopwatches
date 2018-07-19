
@extends(env('THEME').'.layouts.site')

@section('navigation')
	{!! $navigation !!}
@endsection

@section('sliderHome')
	{!! $sliderHome !!}
@endsection

@section('about')
	{!! $about !!}
@endsection

@section('discountHome')
	{!! $discountHome !!}
@endsection