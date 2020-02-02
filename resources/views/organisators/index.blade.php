@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                       <center><h3> List of organisators</h3></center>
                       </br>
                        
                         <a class="btn btn-small btn-info" href="{{ URL::to('organisators/create') }}">Add an organisator</a>
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
                                

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($organisators as $key => $value)
                                <tr>
                                    <td>{{ $value->id }}</td>
                                    <td>{{ $value->organisatorName }}</td>
                                    
                                     <!--<td><img src="<?php echo asset('imagecache/small/' . $value->sampleName);?>" alt="image" /></td>-->
                                    <!-- we will also add show, edit, and delete buttons -->
                                    <td>
                                    <a class="btn btn-small btn-info" href="{{ URL::to('organisators' . '/' . $value->id . '/edit') }}">Edit Organisator</a>
                                    </td>
                                    <td>
                                        <form action="{{action('admin\OrganisatorsController@destroy', $value->id )}}" method="post">
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
