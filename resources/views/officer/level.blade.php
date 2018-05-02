@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
            <form action="{{ route('officer.level', $officer) }}" method="post">
                {{ csrf_field() }}
                <h4 class="panel-heading"> 
                    {{ $officer->name }}
                    <small>
                        <a class="pull-right" href="{{ route('officer.show', $officer) }}">back</a>
                    </small>
                </h4>

                <div class="panel-body">
                    <div class="form-group{{ $errors->has('level') ? ' has-error' : '' }}">
                        <label class="control-label">{{ $officer->level->name }}</label>
                        <select name="level" class="form-control">
                            @foreach(\App\Models\Level::get() as $level)
                                @if($officer->level->id == $level->id)
                                    <option selected value="{{ $level->id }}">{{ $level->name }}</option>
                                @else
                                    <option value="{{ $level->id }}">{{ $level->name }}</option>
                                @endif
                            @endforeach
                        </select>
                        @if($errors->has('level'))
                            <span class="help-block">
                                {{ $errors->first('level') }}
                            </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('office') ? ' has-error' : '' }}">
                        <label class="control-label">ការិយាល័យ</label>
                        <select name="office" class="form-control">
                            @foreach(\App\Models\Office::get() as $office)
                                @if($officer->office->id == $office->id)
                                    <option selected value="{{ $office->id }}">{{ $office->name }}</option>
                                @else
                                    <option value="{{ $office->id }}">{{ $office->name }}</option>
                                @endif
                            @endforeach
                        </select>
                        @if($errors->has('office'))
                            <span class="help-block">
                                {{ $errors->first('office') }}
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