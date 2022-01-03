<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

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
            .logn_page {
                max-width: 30%;
                margin: 0 auto;
                display: flex;
                flex-wrap: wrap;
            }
            .logn_page ul{
                display: block;
                width: 100%;
                padding: 0;
            }
            .logn_page ul li{
                list-style: none;
            }
            .logn_page .content, .logn_page form{
                width: 100%;
                max-width: 100%;
            }
            .logn_page .content .form-group input {
                width: 100% !important;
                display: block !important;
            }
            .logn_page .content .form-group textarea{
                resize: none;
                height: 100px;
                width: 100%;
                display: block;
            }

        </style>
    </head>
    <body>
        <div class="logn_page flex-center position-ref full-height">
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
             <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>

    @if(Session::has('alert_success'))
    <div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('alert_success') !!}</em></div>
@endif

            <div class="content">
                <form action="{{ url('sent-email') }}" method="post">
                     @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Please Enter Your Email :</label>
                        <input type="email"  name ="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email" value="{{ isset($data->email  ) ? $data->email   : '' }}">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                        <div class="form-group">
                        <label for="exampleFormControlTextarea1">Message: </label>
                        <textarea class="form-control" name="message" id="message" rows="3">{{ isset($data->description  ) ? $data->description   : '' }}</textarea>
                        </div>
                    
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </body>
</html>
