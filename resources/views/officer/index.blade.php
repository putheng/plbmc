@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"> {{ $officer->name }} </div>

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
                        </li>
                        <li class="list-group-item">
                            <strong>ឋានៈ :</strong>
                            {{ $officer->position->name }}
                        </li>
                        <li class="list-group-item">
                            <strong>លេខទូរសព្ទ : :</strong>
                            {{ $officer->phone }}
                        </li>
                    </ul>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection