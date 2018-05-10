@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ $office->name }} 
                    ({{ $office->officers()->count() }})
                </div>

                <div class="panel-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <th>Name:</th>
                            <th>ID</th>
                            <th>Gender</th>
                            <th>Level</th>
                            <th>Position</th>
                            <th>Phone</th>
                            
                        </thead>
                        <tbody>
                            @foreach($officers as $key => $officer)
                                <tr>
                                    <td>{{ ($key + 1) }}
                                        <a href="{{ route('officer.show', [$officer]) }}">{{ $officer->name }}</a></td>
                                    <td>{{ $officer->identity }}</td>
                                    <th>{{ $officer->gender }}</th>
                                    <td>{{ $officer->level->name }}</td>
                                    <td>{{ $officer->position->name }}</td>
                                    <td>{{ $officer->phone }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection