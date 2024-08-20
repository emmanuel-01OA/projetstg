<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LoginPlann</title>
</head>
<body>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:700,600" rel="stylesheet" type="text/css" />


    <link href="{{ asset('style/styleAuth.css') }}" rel="stylesheet" type="text/css" />

<form method="post" action="{{ route('handlerLogin') }}">

    @csrf
    @method('POST')

    <div class="box">
        <h1>Login Plann</h1>

        @if(@Session:: get('error_msg'))

       <b style="align-content: center; color:rgb(224, 14, 14) ">{{ Session::get('error_msg') }} </b>

        @endif
        <input type="email" name="email" class="email" />

        <input type="password" name="password" class="email" />

        <div class="btn-container">
            <button type="submit"> Connexion </button>
        </div>

        <!-- End Btn -->
        <!-- End Btn2 -->
    </div>
    <!-- End Box -->
</form>


</body>
</html>
