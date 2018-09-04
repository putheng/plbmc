@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ $status->name }}<span class="font-sr"> ថ្ងៃទី​ </span>
                    {{ request()->date }}
                    សរុប {{ $status->getCount(request()->date)->count() }} <span>នាក់</span>
                </div>

                <div class="panel-body">
                    
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <th>ការិយាល័យ</th>
                                <th>ចំនួន​</th>
                            </thead>
                            <tbody>
                                @foreach($offices as $office)
                                <tr>
                                    <td>
                                        <a href="{{ route('checking.show.officeStatus', [$office->office_id, $status]) }}?date={{ request()->date }}">
                                            {{ $office->getOffice()->first()->name }}
                                        </a>
                                    </td>
                                    <td>{{ $office->getCount(request()->date, $status->id) }}</td>
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