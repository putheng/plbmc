@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ $office->name }}
                    <span class="font-sr">{{ $status->name }} ថ្ងៃទី​ </span>
                    {{ request()->date }} សរុប {{ $lists->count() }} <span>នាក់</span>
                </div>

                <div class="panel-body">
                    
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <th>ឈ្មោះ</th>
                                <th>អត្ថលេខ</th>
                                <th>ឋានន្តរសក្តិ</th>
                                <th>មុខតំណែង</th>
                            </thead>
                            <tbody>
                            @foreach($lists as $list)
                                <tr>
                                    <td>{{ $list->officer->name }}</td>
                                    <td>{{ $list->officer->identity }}</td>
                                    <td>{{ $list->officer->level->name }}</td>
                                    <td>{{ $list->officer->position->name }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection