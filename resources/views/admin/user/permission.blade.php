@if($status)
	<h3>用户： {{$user->name}}</h3>

	<ul>
		@forelse($permissions as $permission)
			<li>{{$permission->name}} -- {{$permission->slug}} -- {{$permission->description}}</li>
		@empty
			<li>没有数据</li>
		@endforelse
	</ul>
@else
@endif