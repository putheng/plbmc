@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ $office->name }} <span class="font-sr"> ថ្ងៃទី {{ request()->date }}</span>
                    <br><br>
                    <form action="{{ route('checking.show.date') }}" method="get">
                        <div class="row">
                            <div class="col-md-3">
                                <input value="{{ request()->from }}" class="form-control input-sm " type="date" name="from">
                            </div>
                            <div class="col-md-1 text-center">
                                <p class="font-sr">ដល់ដ្ងៃទី</p>
                            </div>
                            <div class="col-md-3">
                                <input value="{{ request()->to }}" class="form-control input-sm" type="date" name="to">
                            </div>
                            <div class="col-md-2">
                                <input class="btn btn-primary btn-sm" type="submit"  value="Go">
                            </div>
                        </div>
                        
                    </form>
                </div>

                <div class="panel-body">
                    
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>

                            </thead>
                            <tbody>
                            @foreach($office->officers()->PO()->get() as $officer)
                                <tr>
                                    <td>{{ $officer->name }}</td>
                                    <td>{{ $officer->identity }}</td>
                                    <td>{{ $officer->level->name }}</td>
                                    <td>{{ $officer->position->name }}</td>
                                    <td>{{ $officer->getStatus()->getStatus()->name }}</td>

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