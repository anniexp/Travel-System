@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Edit Holiday
                        <a href="{{ URL::to('holidays') }}" class="pull-right">List all</a>
                    </div>

                    <div class="panel-body">
                        <!-- will be used to show any messages 
                        @if (Session::has('message'))
                            <div class="alert alert-info">{{ Session::get('message') }}</div>
                        @endif
                        -->

                        <form method="post" action="{{action('HolidaysController@update', $holiday->id)}}">
                            <div class="form-group row">
                                {{csrf_field()}}
                                <input name="_method" type="hidden" value="PATCH">
                                <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">Name</label>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="name" value={{ $holiday->name }} />
                                </div>
                                <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">Dates</label>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="date" value={{ $holiday->date }} />
                                </div>
                                <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">Duration</label>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="duration" value={{ $holiday->duration }} />
                                </div>
                                <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">Type of transport id</label>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="typeOfTransport_id" value={{ $holiday->typeOfTransport_id }} />
                                </div>
                                <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">Organisator id</label>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="organisator_id" value={{ $holiday->organisator_id }} />
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-2"></div>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
