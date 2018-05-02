@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
            <form action="{{ route('officer.position', $officer) }}" method="post">
                {{ csrf_field() }}
                <h4 class="panel-heading"> 
                    {{ $officer->name }}
                </h4>

                <div class="panel-body">
                    {{ $officer->position->name }}
                    <a class="pull-right" href="{{ route('officer.show', $officer) }}">back</a>
                    <div class="form-group{{ $errors->has('level') ? ' has-error' : '' }}">
                        <label class="control-label"></label>
                        <select name="position" class="form-control">
                            @foreach(\App\Models\Position::get() as $position)
                                @if($officer->position->id == $position->id)
                                    <option selected value="{{ $position->id }}">{{ $position->name }}</option>
                                @else
                                    <option value="{{ $position->id }}">{{ $position->name }}</option>
                                @endif
                            @endforeach
                        </select>
                        @if($errors->has('position'))
                            <span class="help-block">
                                {{ $errors->first('position') }}
                            </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('note') ? ' has-error' : '' }}">
                        <label class="control-label">Note:</label>
                        <textarea name="note" class="form-control"></textarea>
                        @if($errors->has('note'))
                            <span class="help-block">
                                {{ $errors->first('note') }}
                            </span>
                        @endif
                    </div>
                </div>
                
                <div class="panel-footer">
                    <input type="submit" class="btn btn-primary" value="Save">
                </div>
            </form>
            </div>
        </div>
    </div>
</div>
@endsection