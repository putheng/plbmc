@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <form action="{{ route('checking.show.date') }}" method="get">
                        <div class="row">
                            <div class="col-md-3">
                                <input value="{{ request()->from }}" class="form-control" type="date" name="from">
                            </div>
                            <div class="col-md-2 text-center">
                                <p class="font-sr">ដល់ដ្ងៃទី</p>
                            </div>
                            <div class="col-md-3">
                                <input value="{{ request()->to }}" class="form-control" type="date" name="to">
                            </div>
                            <div class="col-md-2">
                                <input class="btn btn-primary" type="submit"  value="Go">
                            </div>
                        </div>
                        
                    </form>
                </div>

                <div class="panel-body">
                    
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                               <th>ថ្ងៃទី</th>
                               @foreach($statuses as $status)
                                    <th>{{ $status->name }}</th>
                               @endforeach
                            </thead>
                            <tbody>
                                @foreach($dates as $date)
                                    <tr>
                                        <td>
                                            <a href="{{ route('checking.show.on') }}?date={{ $date->dates->format('Y-m-d') }}">
                                                {{ $date->dates->format('Y-m-d') }}
                                            </a>
                                        </td>

                                        @foreach($statuses as $status)
                                            <td><a href="{{ route('checking.show.status', $status) }}?date={{ $date->dates->format('Y-m-d') }}">{{ $date->status($date->dates, $status->id) }}</a></td>
                                        @endforeach
                                    </tr>

                                @endforeach
                                <tr>
                                    <td>សរុប</td>
                                    @foreach($statuses as $status)
                                        <td>{{ $status->getTotal(request()->from, request()->to) }}</td>
                                    @endforeach
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection