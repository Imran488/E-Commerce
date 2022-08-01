<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Cortexsof Limited</title>
    <link rel="shortcut icon" type="image/png" href="{{ url('images/logo.png') }}">
</head>

<style type="text/css">

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif
}

body {
    background: #edecf3;
    background-image: url(../images/);
}

.wrapper {
    max-width: 350px;
    min-height: 500px;
    margin: 80px auto;
    padding: 40px 30px 30px 30px;
    background-color: #ecf0f3;
    border-radius: 15px;
    box-shadow: 13px 13px 20px #cbced1, -13px -13px 20px #fff
}

.logo {
    width: 80px;
    margin: auto
}

.logo img {
    width: 100%;
    height: 80px;
    object-fit: cover;
    border-radius: 50%;
    box-shadow: 0px 0px 3px #5f5f5f, 0px 0px 0px 5px #ecf0f3, 8px 8px 15px #a7aaa7, -8px -8px 15px #fff
}

.wrapper .name {
    font-weight: 600;
    font-size: 1.4rem;
    letter-spacing: 1.3px;
    padding-left: 10px;
    color: #555
}

.wrapper .form-field input {
    width: 100%;
    display: block;
    border: none;
    outline: none;
    background: none;
    font-size: 1.2rem;
    color: #666;
    padding: 10px 15px 10px 10px
}

.wrapper .form-field {
    padding-left: 10px;
    margin-bottom: 20px;
    border-radius: 20px;
    box-shadow: inset 8px 8px 8px #cbced1, inset -8px -8px 8px #fff
}

.wrapper .form-field .fas {
    color: #555
}

.wrapper .btn {
    box-shadow: none;
    width: 100%;
    height: 40px;
    background-color: #06a80e;
    color: #fff;
    border-radius: 25px;
    box-shadow: 3px 3px 3px #b1b1b1, -3px -3px 3px #fff;
    letter-spacing: 1.3px
}

.wrapper .btn-btn {
    box-shadow: none;
    width: 100%;
    height: 40px;
    background-color: #ee0909;
    color: #fff;
    border-radius: 25px;
    box-shadow: 3px 3px 3px #b1b1b1, -3px -3px 3px #fff;
    letter-spacing: 1.3px
}

.wrapper .btn:hover {
    background-color: #039BE5
}


.wrapper a {
    text-decoration: none;
    font-size: 0.8rem;
    color: #03A9F4
}

.wrapper a:hover {
    color: #039BE5
}

@media(max-width: 380px) {
    .wrapper {
        margin: 30px 20px;
        padding: 40px 15px 15px 15px
    }
}
</style>

<div>
    <h1 class="container about-sec shadow" style="color:rgb(1, 133, 45);text-align: center" class="py-3 fw-bold">WELCOME TO <span style="color:blue">CORTEXSOF LIMITED</span></h1>
</div>

<div class="wrapper">
    <div>@if(session()->has('message'))
        <p class="alert alert-success" style="text-align: center">{{session()->get('message')}}</p>
         @endif
    </div>

    <div>
        @if(session()->has('error'))
        <p class="alert alert-danger"style="color: rgb(175, 3, 26);text-align: center">{{session()->get('error')}}</p>
         @endif
    </div>
    <br>
    <div class="form-field d-flex align-items-center"><h1 class="container about-sec shadow" style="color:rgb(1, 133, 45);text-align: center" class="py-3 text-center fw-bold">Login <span style="color:blue">Please</span></h1>
    </div>
    <br>
    <div class="logo"> <img src="{{url('images/logo.png')}}" alt="logo"> </div>
    <br><br>
    <form class="p-3 mt-3" action="{{route('user.login')}}" method="post">
        @csrf

        <div class="form-field d-flex align-items-center"> <span class="far fa-user"></span> <input type="text" name="email" id="email" placeholder="Enter Email"required> </div>
        <div class="form-field d-flex align-items-center"> <span class="fas fa-key"></span> <input type="password" name="password" id="password" placeholder="Enter Password"required> </div>
        <div><button type="submit" class="btn mt-3">Login</button></div>
        <br>
        <center>
            <div><a href="{{route('signup')}}"><strong>...Didnt Account Register First...</strong></a></div>
        </center>
        <br><br>

        <center>
            <div>
                <a href="#">Forgot Password</a>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="{{route('signup')}}">Register</a>
            </div>
        </center>
        <br><br>

    </form>
</div>
