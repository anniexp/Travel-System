
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Holidays</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet"> 
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        
        <!-- Styles -->
        <style>
            html, body {
                background-color: #ffcc66;
                color: #636b6f;
                font-family: 'Open Sans', sans-serif; 
                font-weight: bold;
                height: 100vh;
                margin: 0;
                 border-radius: 15px;
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
                font-size: 94px;
                width: 1500px;
                height: 100px;
                text-align:center;

                font-style:italic;
                font-family:'Curlz MT';
                background-color:#FFDC73;
                border-radius: 15px;


            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 30px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
                 background-color:#f7e6ff;
                 border-radius: 25px;

            }

            .m-b-md {
                margin-bottom: 50px;
            }
            .container{
            padding-right:15px;
            padding-left:15px;                      
            color:#636b6f;
            padding: 0 25px;
               width: 1000px;
                height: auto;
                opacity: 0.8;
                text-align:center;
                font-size:20px;
                font-style:normal;
                background-color:#ffff80;
                 border-radius: 25px;
                 margin-top:20px;
                margin-left:200px;
                }

                .table{width:100%;margin-bottom:1rem;background-color:transparent}
                .table-striped tbody tr:nth-of-type(odd){background-color:rgba(0,0,0,.05)}

            .form-group
            {
            margin-bottom:1rem

            }
            .button
                {
                font-size: 25px;
                background-color:white;
                margin-top:5px;
                margin-left:20px;
                border-radius: 15px;
                }
                .footer {
  
                    
                    bottom: 0;
                    height:130px;
                    width: 1500px;
                    background-color:#FFDC73 ; 
                     font-size:1em;
                    color:darkorange;
                     text-align: center;
                     border-radius: 30px 30px 30px 30px;
                     margin-left:200px;
}
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
                    </br>
                </div>
              
                <form action="/search" method="POST" role="search">
                   {{ csrf_field() }}
                    <div class="input-group">
                         <input type="text" class="form-control" name="q"
                              placeholder="Search holidays"> <span class="input-group-btn">
                        <button type="submit" class="btn btn-default"> Search
                     
                        </button>
                      </span>
                      </br>
                      </br>
                    </div>
                </form>

                <!--</div>-->

                <div class="container">
                    @if(isset($details))
                    
                           <p>Search results for <b> {{ $query }} </b> are :</p>
                            
                            
                                <table class="table table-striped table-bordered">
                                 <thead>
                                   <tr>
                                     <td>ID</td>
                                     <td>Name</td>
                                     <td>Dates</td>
                                     <td>Duration</td>
                                    <!-- <td>Type Of Transport id</td>
                                     <td>Organisator id</td>-->

                                    </tr>
                                 </thead>
                                <tbody>
                           
                             @foreach($details as $holiday )
                                   <tr>
                                     <td>{{ $holiday->id }}</td>
                                     <td>{{ $holiday->name }}</td>
                                     <td>{{ $holiday->date }}</td>
                                     <td>{{ $holiday->duration }}</td>
                                  <!--   <td>{{ $holiday->typeOfTransport_id }}</td>
                                     <td>{{ $holiday->organisator_id }}</td>-->
                                   </tr>
                              @endforeach 
                             </tbody>
                           </table>
                         

                        </br>
                @elseif(isset($message))
		         	<p>{{ $message }}</p>

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
               
             
            <div class="footer">

            
                <p><big>Posted by: Ani Pendasheva</big></p>
                <p><big>Contact information:</big> github: anniexp
                <br>  f number: 180 901 0657</p> 
            </div>
            
         </div>
       
       </div>
    </body>
    
</html>
