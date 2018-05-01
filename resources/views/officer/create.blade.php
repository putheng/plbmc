@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"> {{ $office->name }} </div>

                <div class="panel-body">
                <form action="{{ route('officer.create', $office) }}" method="post">
                    <div class="form-group{{ $errors->has('name') ? ' has-error': '' }}">
                        <label class="control-label">ឈ្មោះ :</label>
                        <input type="text" name="name" class="form-control">
                        @if($errors->has('name'))
                            <span class="help-block">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                    
                    <div class="form-group{{ $errors->has('gender') ? ' has-error': '' }}">
                        <label class="control-label">ភេទ :</label>
                        <select name="gender" class="form-control">
                            <option value="male">ប្រុស</optio>
                            <option value="female">ស្រី</option>  
                        </select>
                        @if($errors->has('gender'))
                            <span class="help-block">{{ $errors->first('gender') }}</span>
                        @endif
                    </div>
                    
                    <div class="form-group{{ $errors->has('identity') ? ' has-error': '' }}">
                        <label class="control-label">អត្ថលេខ :</label>
                        <input type="text" name="identity" class="form-control">
                        @if($errors->has('identity'))
                            <span class="help-block">{{ $errors->first('identity') }}</span>
                        @endif
                    </div>
                    
                    <div class="form-group{{ $errors->has('position') ? ' has-error': '' }}">
                        <label class="control-label">ឋានៈ </label>
                        <select name="position" class="form-control">
                            @foreach($positions as $position)
                                <option value="{{ $position->id }}">{{ $position->name }}</optio>
                            @endforeach
                        </select>
                        @if($errors->has('position'))
                            <span class="help-block">{{ $errors->first('position') }}</span>
                        @endif
                    </div>
                    
                    <div class="form-group{{ $errors->has('level') ? ' has-error': '' }}">
                        <label class="control-label">ឋានន្តរសក្តិ </label>
                        <select name="level" class="form-control">
                            @foreach($levels as $level)
                                <option value="{{ $level->id }}">{{ $level->name }}</optio>
                            @endforeach
                        </select>
                        @if($errors->has('level'))
                            <span class="help-block">{{ $errors->first('level') }}</span>
                        @endif
                    </div>
                    
                    <div class="form-group{{ $errors->has('phone') ? ' has-error': '' }}">
                        <label class="control-label">លេខទូរសព្ទ :</label>
                        <input type="text" name="phone" class="form-control">
                        @if($errors->has('phone'))
                            <span class="help-block">{{ $errors->first('phone') }}</span>
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