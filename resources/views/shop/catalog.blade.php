
@extends(env('THEME').'.layouts.site')

@section('navigation')
	{!! $navigation !!}
@endsection

@if(isset($content))
@section('content')
	{!! $content !!}
@endsection
@endif

