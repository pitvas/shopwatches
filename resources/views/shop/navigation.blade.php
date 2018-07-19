@if($menu)
<div class="header-bottom">
		<div class="container">
			<div class="header">
				<div class="col-md-9 header-left">
					<div class="top-nav">
						<ul class="memenu skyblue">
							@include(env('THEME').'.customMenuItems',['items'=>$menu->roots()])
						</ul>
					</div>
				</div>
				<div class="col-md-3 header-right"> 
				<div class="search-bar">
					<form name="searchForm" action="{{ action('SearchController@search') }}" method="get">
						{{ csrf_field() }}
					<input type="text" name="search" value="Search" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search';}">
					<input type="submit" value=''>
				</form>
				</div>
			</div>
		<div class="clearfix"> </div>
	</div>
</div>				

@endif


						
				