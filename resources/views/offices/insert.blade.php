@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('officer.insert.insert') }}" method="post">
                    {{ csrf_field() }}
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Create Officer
                        </div>
                        
                        <div class="panel-body">
                            
                            <div class="form-group">
                                <label class="control-label">Office</label>
                                <select name="office" class="form-control">
                                    @foreach($offices as $office)
                                        <option value="{{ $office->id }}">{{ $office->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label class="control-label">Part</label>
                                <select name="part" class="form-control">
                                    @foreach($offices as $office)
                                    <optgroup label="{{ $office->name }}"> 
                                        <option value="{{ $office->id }}">{{ $office->name }}</option>
                                        @foreach($office->parts as $part)
                                            <option value="{{ $part->id }}">{{ $part->name }}</option>
                                        @endforeach
                                     </optgroup>
                                    @endforeach
                                    <option value="">រងការិយាល័យ</option>
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label for="text" class="label-control">Text</label>
                                <textarea style="height:200px" name="text" class="form-control" id="text"></textarea>
                            </div>
                            
                        </div>
                        <div class="panel-footer">
                            <input type="submit" value="Submit" class="btn btn-primary">
                        </div>
                        
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection