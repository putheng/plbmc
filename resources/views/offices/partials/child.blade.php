@if($get->children)
    @foreach($get->children as $chils)
        <li>
			<div>
				<span class="male">
				    {{ $chils->name }}
				</span>
			</div>
		</li>
    @endforeach
@endif