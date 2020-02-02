@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                     <center><h1> Create a Type</h1></center>
                       
                         <a class="btn btn-small btn-info" href="{{ URL::to('types') }}">List all</a>
                      </div>

                    <div class="panel-body">
                        <!-- will be used to show any messages -->
                        @if (Session::has('message'))
                            <div class="alert alert-info">{{ Session::get('message') }}</div>
                        @endif
                         @if ($errors->any())
                          <div class="alert alert-danger">
                            <ul>
                                 @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                    @endforeach
                            </ul>
                            </div>
                        @endif

                        
                        <form method="post" action="{{url('types')}}">
                            <div class="form-group row">
                                {{csrf_field()}}
                                <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">TypeOfTransport</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control form-control-lg" id="lgFormGroupInput" placeholder="type" name="typeoftransport">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-2"></div>
                                <input type="submit" class="btn btn-primary">
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
