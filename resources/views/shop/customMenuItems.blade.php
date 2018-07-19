@foreach($items as $item)
<li class="grid">
	<a href={{ $item->url() }}>{{ $item->title }}</a>
	@if($item->hasChildren())
		<div class="mepanel">
			<div class="row">
				<div class="col6 me-one">
					<ul>
						@include(env('THEME').'.customMenuItems',['items'=>$item->children()])
					</ul>

				</div>
		</div>
	@endif
</li>
@endforeach