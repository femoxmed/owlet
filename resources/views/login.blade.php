<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="images/favi.png" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}" />
    <title>Maine auto parts | Agent</title>
    <link href="https://fonts.googleapis.com/css2?family=Oxygen:wght@300;400;700&display=swap" rel="stylesheet">
</head>

<body>


    <div class="bac-login">

        <div class="container">
            <div class="row">
                <div class="col-lg-12">

                    <img src="images/logo.png" class="img-fluid logo" />

                    <div class="login-card">
                        @if(null !== session('message'))
                        <div class="alert alert-success">
                            <ul>
                                <li>{{ session('message') }}</li>
                            </ul>
                        </div>
                        @endif
                        @if(null !== session('error'))
                        <div class="alert alert-danger">
                            <ul>
                                <li>{{ session('error') }}</li>
                            </ul>
                        </div>
                        @endif
                        <form method="POST" action="{{ route('post-login') }}">
                            @csrf
                            <input type="email" name="email" id="email" placeholder="email address" required />
                            <input type="password" name="password" id="password" placeholder="valid password" required />

                            <button class="btn-login-admin" type="submit">Login</button>

                        </form>

                    </div>


                </div>
            </div>
        </div>



    </div>


</body>

</html>
