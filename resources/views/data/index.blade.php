@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-xs-4 col-xs-4 text-center">
            <br><div class="font-muol">ក្រសួងមហាផ្ទៃ</div>
            <div class="font-muol">អគ្គស្នងការដ្ឋាននគរបាលជាតិ</div>
            <div class="font-sr">ស្នងការដ្ឋាននគរបាលខេត្តបន្ទាយមានជ័យ</div>
        </div>
        <div class="col-xs-4 col-xs-4 col-xs-offset-4 text-center">
            <div class="font-muol">ព្រះរាជាណាចក្រកម្ពុជា</div>
            <div class="font-muol">ជាតិ  សាសនា  ព្រះមហាក្សត្រ</div>
            
            <img class="tacteng-img" src="{{ asset('images/tacteng.png') }}">
        </div>
    </div>
    
    <br>
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <p class="text-center font-sr text-underline">
                តារាងទិន្នន័យជាក់ស្តែងនៃក្របខ័ណ្ឌមន្រ្តីនគរបាលជាតិ
                <br>
                ត្រឹមថ្ងៃទី១៥ ខែមិថុនា ឆ្នាំ២០១៨ ត្រីមាសទី II ឆ្នាំ២០១៨
            </p>
        </div>
    </div>
    
    <br>
</div>
<div>
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a target="_blank" href="{{ route('officer.data.print') }}">Print</a></p>
            <div class="table-responsive">
                <table class="table table-bordered td-middle font-sr text-center">
                    <tbody>
                        <tr>
                            <td rowspan="2">ល.រ</td>
                            <td rowspan="2">អង្គភាព</td>
                            <td colspan="2">ក្រ.ខ័ណ្ឌជាក់ស្តែង</td>
                            <td colspan="3">ថ្នាក់ដឹកនាំ</td>
                            
                            <td colspan="2">ថ្នាក់ការិយាល័យ</td>
                            <td colspan="3">ថ្នាក់ផ្នែក</td>
                            <td rowspan="2">ផ្សេងៗ</td>
                            <td colspan="2">គ្រោង</td>
                        </tr>
                        <tr>
                            <td>ចំនួនរួម</td>
                            <td>ស្រី</td>
                            <td>ស្នងការ</td>
                            <td>រង</td>
                            <td>អនុ.កណ្តាល</td>
                            <td>នាយ</td>
                            <td>រង</td>
                            <td>នាយ</td>
                            <td>រង</td>
                            <td>មន្រ្តី</td>
                            <td>បន្ថែម</td>
                            <td>បន្ថយ</td>
                        </tr>
                        
                        @foreach($groups as $group)
                            <tr>
                                <td></td>
                                <td class="font-muol"><a href="{{ route('officer.group', $group) }}" target="_blank">{{ $group->name }}</a></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            @foreach($group->offices as $office)
                                <tr>
                                    <td></td>
                                    <td class="font-muol"><a target="_blank" href="{{ route('officer.office', $office) }}">{{ $office->name }}</a></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                @foreach($office->parts as $part)
                                    <tr>
                                        <td></td>
                                        <td class="font-sr"><a href="{{ route('part.index', $part) }}" target="_blank">{{ $part->id .' - '. $part->name }}</a></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>{{ $part->position(6) }}</td>
                                        <td>{{ $part->position(8) }}</td>
                                        <td>{{ $part->position(10) }}</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                @endforeach
                            @endforeach
                        @endforeach
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection