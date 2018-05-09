@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/tree.css') }}">
<div style="width:14000px;">
	<form id="form1">
		<div class="tree" id="FamilyTreeDiv">
		    <ul>
				<li>
					<div>
						<span class="male">
						    ស្នងការដ្ឋាន
						</span>
					</div>
					<ul>
		                @foreach($groups as $group)
						<li title="{{ $group->name }}">
							<div>
								<span class="male">
								    {{ $group->name }}
								</span>
							</div>
							<ul>
							    @foreach($group->offices as $office)
								<li title="{{ $office->name }}">
									<div>
										<span class="male">
										    {{ $office->name }}
										</span>
									</div>
									<ul>
    									@foreach($office->parts as $part)
    									<li title="{{ $part->name }}">
        									<div>
        										<span class="male">
        										    {{ $part->name }}
        										</span>
        									</div>
    									</li>
    									@endforeach
									</ul>
								</li>
								@endforeach
							</ul>
						</li>
			            @endforeach
			        </ul>
				</li>
			</ul>
		</div>
	</form>
</div>
@endsection