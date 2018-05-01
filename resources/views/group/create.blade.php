@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">បន្ថែមផែន</div>

                <div class="panel-body">
                    <form action="{{ route('group.create') }}" method="post">
                        
                        <div class="form-group{{ $errors->has('name') ? ' has-error': '' }}">
                            <label class="control-label">Name :</label>
                            <input type="text" name="name" class="form-control">
                            @if($errors->has('name'))
                                <span class="help-block">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                        
                        <br>
                        {{ csrf_field() }}
                        <input type="submit" value="Submit" class="btn btn-primary">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection