@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                       <center><h1>Types of transportstion</h1></center>
                       </br>
                        <a class="btn btn-small btn-info" href="{{ URL::to('types/create') }}">Add a type</a>

                       
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
                                <td>Type of transportation</td>
                                

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($typeoftransports as $key => $value)
                                <tr>
                                    <td>{{ $value->id }}</td>
                                    <td>{{ $value->typeoftransport }}</td>
                                    
                                     <!--<td><img src="<?php echo asset('imagecache/small/' . $value->sampleName);?>" alt="image" /></td>-->
                                    <!-- we will also add show, edit, and delete buttons -->
                                    <td>
                                    <a class="btn btn-small btn-info" href="{{ URL::to('types' . '/' . $value->id . '/edit') }}">Edit Type</a>
                                    </td>
                                    <td>
                                        <form action="{{action('admin\TypeOfTransportsController@destroy', $value->id )}}" method="post">
                                            {{csrf_field()}}
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button class="btn btn-danger" type="submit">Delete</button>
                                        </form>

                                    </td>
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
