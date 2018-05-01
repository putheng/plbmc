@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"> {{ $group->name }} </div>

                <div class="panel-body">
                    
                    <ul class="list-group">
                        @foreach($group->offices as $office)
                            <a href="{{ route('checking.offices', $office) }}" class="list-group-item">{{ $office->name }}</a>
                        @endforeach
                    </ul>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection