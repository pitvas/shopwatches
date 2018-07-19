@extends(env('THEME').'.layouts.site')

@section('navigation')
	{!! $navigation !!}
@endsection

@section('blog_content')
	{!! $blog_content !!}
@endsection