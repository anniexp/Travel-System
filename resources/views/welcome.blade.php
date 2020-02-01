<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Holidays</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Holidays
                </div>
                <div>
                <form action="/search" method="POST" role="search">
                   {{ csrf_field() }}
                    <div class="input-group">
                         <input type="text" class="form-control" name="q"
                              placeholder="Search holidays"> <span class="input-group-btn">
                        <button type="submit" class="btn btn-default">
                      <span class="glyphicon glyphicon-search"></span>
                        </button>
                      </span>
                    </div>
                </form>

                </div>

                <div class="container">
    @if(isset($details))
        <p> The Search results for your query <b> {{ $query }} </b> are :</p>
    <h2>Sample User details</h2>
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
                            @foreach($details as $holiday)
                                <tr>
                                    <td>{{ $holiday->id }}</td>
                                    <td>{{ $holiday->name }}</td>
                                    <td>{{ $holiday->date }}</td>
                                    <td>{{ $holiday->duration }}</td>
                                    <td>{{ $holiday->typeOfTransport_id }}</td>
                                    <td>{{ $holiday->organisator_id }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
    @endif
</div>

               <div class="links">
                @if (auth()->check())
                @if(auth()->user()->isAdmin())
                     <a href="/holidays">Holidays</a>
                     <a href="/organisators">Organisators</a>
                     <a href="/types">TypeOfTransports</a>
                @endif
                @endif
                     <a href="/holidayusers">Holidays</a>
                </div>
            </div>
        </div>
    </body>
</html>
