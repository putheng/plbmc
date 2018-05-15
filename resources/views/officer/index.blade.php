@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"> 
                    {{ $officer->name }} 
                    <span class="pull-right">
                        <a href="{{ route('officer.edit', $officer) }}">Edit</a>
                    </span>
                </div>

                <div class="panel-body">
                    
                    <ul class="list-group">
                        <li class="list-group-item">
                            <strong>អត្ថលេខ :</strong>
                            {{ $officer->identity }}
                        </li>
                        <li class="list-group-item">
                            <strong>ភេទ :</strong>
                            {{ $officer->gender }}
                        </li>
                        <li class="list-group-item">
                            <strong>ឋានន្តរសក្តិ :</strong>
                            {{ $officer->level->name }}
                            <a class="pull-right" href="{{ route('officer.level', $officer) }}">Edit</a>
                            
                            @if($officer->levels->count())
                                <br><br>
                                <ul class="list-group">
                                    @foreach($officer->levels as $level)
                                        <li class="list-group-item">
                                            {{ $level->name }}
                                            <div>{{ $level->pivot->note }}</div>
                                            <div>{{ $level->office()->name }}</div>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </li>
                        <li class="list-group-item">
                            <strong>ឋានៈ :</strong>
                            {{ $officer->position->name }}
                            <a class="pull-right" href="{{ route('officer.position', $officer) }}">Edit</a>
                            @if($officer->position->count())
                                <br><br>
                                <ul class="list-group">
                                    @foreach($officer->positions as $position)
                                        <li class="list-group-item">
                                            {{ $position->name }}
                                            <br>
                                            <strong>{{ $position->pivot->note }}</strong>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </li>
                        <li class="list-group-item">
                            <strong>លេខទូរសព្ទ : :</strong>
                            {{ $officer->phone }}
                        </li>
                    </ul>
                    
                </div>
                <div class="panel-footer">
                    <h5><a href="{{ route('officer.office', $officer->office) }}">Back</a></h5>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection