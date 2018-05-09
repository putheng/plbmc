@if($get->children)
    @foreach($get->children as $chils)
        <ul>
			<li>
				<div>
					<span class="male">
					    {{ $chils->name }}
					</span>
				</div>
				
			</li>
		</ul>
    @endforeach
@endif