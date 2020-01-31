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
                                <td>Type Of Transport id</td>
                                <td>Organisator id</td>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($holidays as $key => $value)
                                <tr>
                                    <td>{{ $value->id }}</td>
                                    <td>{{ $value->name }}</td>
                                    <td>{{ $value->date }}</td>
                                    <td>{{ $value->duration }}</td>
                                    <td>{{ $value->typeOfTransport_id }}</td>
                                    <td>{{ $value->organisator_id }}</td>
                                     <!--<td><img src="<?php echo asset('imagecache/small/' . $value->sampleName);?>" alt="image" /></td>-->
                                    <!-- we will also add show, edit, and delete buttons -->
                                  <!--  <td>
                                    </td>
                                    <td>
                                        <form action="{{action('admin\HolidaysController@destroy', $value->id )}}" method="post">
                                            {{csrf_field()}}
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button class="btn btn-danger" type="submit">Delete</button>
                                        </form>

                                    </td> -->
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
