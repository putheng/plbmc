@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ $part->name }}
                </div>
                <div class="panel-body">
                    <ul class="list-group">
                        @foreach($part->officers as $item)
                            <a href="{{ route('officer.show', $item) }}" class="list-group-item">{{ $item->name }}</a>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection