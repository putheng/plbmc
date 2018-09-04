@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"> ជ្រើសរើសផែន 
                <br>
                    <form action="{{ route('checking.show.date') }}" method="get">
                        <input type="date" name="from">
                        <span class="font-sr">ដល់ដ្ងៃទី</span>
                        <input type="date" name="to">
                        <input type="submit" class="btn btn-sm btn-primary" value="Go">
                    </form>
                </div>

                <div class="panel-body">
                    
                    <ul class="list-group">
                        @foreach($groups as $group)
                            <a href="{{ route('checking.show.group', $group) }}" class="list-group-item">{{ $group->name }}</a>
                        @endforeach
                    </ul>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection