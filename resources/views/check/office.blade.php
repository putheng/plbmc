@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <form action="{{ route('checking.offices', $office) }}" method="post">
                <div class="panel-heading"> 
                    {{ $office->name }} 
                    <input type="date" name="dates" class="pull-right">
                    @if($errors->has('dates'))
                        <strong class="text-danger pull-right">{{ $errors->first('dates') }}</strong>
                    @endif
                </div>
                    
                <div class="panel-body">
                    
                    <ul class="list-group">
                        {{ csrf_field() }}
                        <table class="table table-bordered text-center table-striped">
                            <thead>
                                <th class="text-center">អត្ថលេខ</th>
                                <th>ឈ្មោះ</th>
                                <th class="text-center">មានមុខ</th>
                                <th class="text-center">ច្បាប់</th>
                                <th class="text-center">ឈឺ</th>
                                <th class="text-center">បេសកកម្ម</th>
                                <th class="text-center">រៀន</th>
                                <th class="text-center">សេរី</th>
                                <th class="text-center">ផ្ទេរ</th>
                                <th class="text-center">មរណៈ</th>
                            </thead>
                            <tbody>
                                @foreach($office->officers as $officer)
                                <tr>
                                    <td>{{ $officer->identity }}</td>
                                    <td class="text-left">{{ $officer->name }}</td>
                                    @foreach(\App\Models\Status::get() as $key => $item)
                                        <td class="radio-toolbar">
                                            <input {{ $key == 0 ? 'checked' : '' }} id="{{ $key }}_a_{{ $officer->id }}" type="radio" value="{{ $item->id }}" {{ old('result.'. $officer->id) == $item->id ? 'checked' : '' }} name="result[{{ $officer->id }}]">
                                            <label class="btn btn-sm btn-info" for="{{ $key }}_a_{{ $officer->id }}">{{ $item->name }}
                                                
                                            </label>
                                        </td>
                                    @endforeach
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    
                    </ul>
                    
                </div>
                <div class="panel-footer">
                    <input type="submit" value="Submit" class="btn btn-primary">
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection