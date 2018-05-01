@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"> ជ្រើសរើសផែន </div>

                <div class="panel-body">
                    
                    <ul class="list-group">
                        @foreach($groups as $group)
                            <a href="{{ route('checking.group', $group) }}" class="list-group-item">{{ $group->name }}</a>
                        @endforeach
                    </ul>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection