@extends(env('THEME').'.layouts.site')

@section('navigation')
	{!! $navigation !!}
@endsection

@section('item_content')
	{!! $item_content !!}
@endsection
