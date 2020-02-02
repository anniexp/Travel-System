@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        
                          <center><h1>Holidays</h1></center>
                        
                    </div>

                    <div class="panel-body">
                        <!-- will be used to show any messages -->
                        @if (\Session::has('success'))
                            <div class="alert alert-info">{{\Session::get('success') }}</div>
                        @endif
                       
                        <table class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <td>ID</td>
                                <td>Name</td>
                                <td>Dates</td>
                                <td>Duration</td>
                                <td>Type Of Transport</td>
                                <td>Organisator</td>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($details as $detail)
                          
                                <tr>
                                    <td>{{ $detail->id }}</td>
                                    <td>{{ $detail->name }}</td>
                                    <td>{{ $detail->date }}</td>
                                    <td>{{ $detail->duration }}</td>
                                    <td>{{ $detail->typeoftransport }}</td>
                                    <td>{{ $detail->organisatorName}}</td>
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
