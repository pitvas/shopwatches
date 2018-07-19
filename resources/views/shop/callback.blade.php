@extends(env('THEME').'.layouts.site')

@section('navigation')
	{!! $navigation !!}
@endsection

@section('callback')
	{{!! $callback !!}}
@endsection