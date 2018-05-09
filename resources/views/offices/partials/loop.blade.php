<li>
	<div>
		<span class="male">
		    {{ $child->name }}
		</span>
	</div>
	@foreach($child->children as $item)
	<ul>
		<li>
			<div>
				<span class="male">
					{{ $item->name }}
				</span>
			</div>
			<ul>
			    @foreach($item->children as $list)
					<li>
						<div>
							<span class="male">
							    {{ $list->name }}
							</span>
						</div>
					</li>
				@endforeach
			</ul>
		</li>
	</ul>
	@endforeach
</li>