@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
            <form action="{{ route('officer.edit', $officer) }}" method="post">
                {{ csrf_field() }}
                <div class="panel-heading"> 
                    {{ $officer->name }}
                </div>

                <div class="panel-body">
                    <ul class="list-group">
						<li class="list-group-item">
                            <strong>ឈ្មោះ :</strong>
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label class="control-label"></label>
                                <input type="text" name="name" class="form-control" value="{{ old('name') ? old('name') : $officer->name }}">
                                @if($errors->has('name'))
                                    <span class="help-block">
                                        {{ $errors->first('name') }}
                                    </span>
                                @endif
                            </div>
                        </li>
                        
                        <li class="list-group-item">
                            <strong>អត្ថលេខ :</strong>
                            <div class="form-group{{ $errors->has('identity') ? ' has-error' : '' }}">
                                <label class="control-label"></label>
                                <input type="text" name="identity" class="form-control" value="{{ old('identity') ? old('identity') : $officer->identity }}">
                                @if($errors->has('identity'))
                                    <span class="help-block">
                                        {{ $errors->first('identity') }}
                                    </span>
                                @endif
                            </div>
                        </li>
                        <li class="list-group-item">
                            <strong>ភេទ :</strong>
                            <div class="form-group">
                                <label class="control-label"></label>
                                <select name="gender" class="form-control">
                                    @if($officer->gender == 'male')
                                        <option value="male">ប្រុស</option>
                                    @else
                                        <option value="female">ស្រី</option>
                                    @endif
                                        <option value="male">ប្រុស</option>
                                        <option value="female">ស្រី</option>
                                </select>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <strong>ឋានន្តរសក្តិ :</strong>
                            {{ $officer->level->name }}
                            <a class="pull-right" href="{{ route('officer.level', $officer) }}">Edit</a>
                            <div class="form-group{{ $errors->has('level') ? ' has-error' : '' }}">
                                <label class="control-label"></label>
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
                        </li>
                        <li class="list-group-item">
                            <strong>ឋានៈ :</strong>
                            {{ $officer->position->name }}
                            <div class="form-group{{ $errors->has('position') ? ' has-error' : '' }}">
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
                        </li>
                        
                        <li class="list-group-item">
                            <strong>ការិយាល័យ :</strong>
                            {{ $officer->office->name }}
                            <div class="form-group{{ $errors->has('level') ? ' has-error' : '' }}">
                                <label class="control-label"></label>
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
                        </li>
                        <li class="list-group-item">
                            <strong>លេខទូរសព្ទ : :</strong>
                            {{ $officer->phone }}
                            <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                                <label class="control-label"></label>
                                <input type="text" name="phone" class="form-control" value="{{ old('phone') ? old('phone') : $officer->phone }}">
                                @if($errors->has('phone'))
                                    <span class="help-block">
                                        {{ $errors->first('phone') }}
                                    </span>
                                @endif
                            </div>
                        </li>
                    </ul>
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