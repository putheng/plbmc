@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"> {{ $office->name }} </div>

                <div class="panel-body">
                    <table class="table table-bordered">
                        <thead>
                            <th>Name:</th>
                            @foreach($query as $item)
                                <th>{{ $item->dates->format('d') }}</th>
                            @endforeach
                        </thead>
                        <tbody>
                            @foreach($officers as $officer)
                                <tr>
                                    <td>
                                        {{ $officer->name }}
                                    </td>
                                        @foreach($query as $status)
                                            <td>
                                                {{ $officer->check($status->dates, $officer->id) }}
                                            </td>
                                        @endforeach
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