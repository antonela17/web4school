<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link href="{{ asset('css/newRegister.css') }}" rel="stylesheet">
</head>
<body>
    <div class="register">
    <div class="container register__box">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="register__top">
                    <div class="card-header f1">Register<span></span></div>
                    </div>
                    

                    <div class="card-body register__bottom">
                        <form id="register_form" method="POST" action="{{ route('register') }}">

                            <div class="row mb-3 input1  ">
                                <label for="name" class="col-md-4 col-form-label text-md-end">Name:</label>

                                <div class="col-md-6 input-s1">
                                    <input id="name" type="text"
                                    placeholder="Name"
                                           class="form-control @error('name') is-invalid @enderror " name="name"
                                           value="" required autocomplete="name" autofocus>
                                </div>
                            </div>
                            <div class="row mb-3 input1">
                                <label for="surname" class="col-md-4 col-form-label text-md-end">Surname:</label>

                                <div class="col-md-6  input-s1">
                                    <input id="surname" type="text"
                                    placeholder="Surname"
                                           class=" form-control @error('surname') is-invalid @enderror" name="surname"
                                           value="" required ="" autofocus>
                                    
                                </div>
                            </div>
                            <div class="row mb-3 input1">
                                <label for="username" class="col-md-4 col-form-label text-md-end">Username:</label>

                                <div class="col-md-6  input-s1">
                                    <input id="username" type="text"
                                    placeholder="Userame"
                                           class="form-control @error('username') is-invalid @enderror " name="username"
                                           value="" required ="" autofocus>

                                </div>
                            </div>

                            <div class="row mb-3 input1 ">
                                <label for="email"
                                       class="col-md-4 col-form-label text-md-end">Email Address:</label>

                                <div class="col-md-6 input-s1">
                                    <input id="email" type="email"
                                    placeholder="Email"
                                           class="form-control @error('email') is-invalid @enderror " name="email"
                                           value="" required autocomplete="email">

                                </div>
                            </div>
                            <div class="row mb-3 input1">
                                <label class="col-md-4 col-form-label text-md-end" for="role">Role(choose):</label>
                                <div class="col-md-6  input-s1">
                                    <select class="form-control" name="role" id="role">
                                        <option value="2">Mesues</option>
                                        <option value="3">Student</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3 input1">
                                <label for="password"
                                       class="col-md-4 col-form-label text-md-end">Password:</label>

                                <div class="col-md-6  input-s1">
                                    <input id="password" type="password"
                                    placeholder="Password"
                                           class=" form-control @error('password') is-invalid @enderror" name="password"
                                           required autocomplete="new-password">

                                </div>
                            </div>

                            <div class="row mb-3 input1">
                                <label for="password-confirm"
                                       class="col-md-4 col-form-label text-md-end">Confirm Password:</label>

                                <div class="col-md-6  input-s1">
                                    <input id="password-confirm" type="password" placeholder="Confirm Password" class="form-control"
                                           name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4 button-s1">
                                    <button type="submit" class="btn btn-primary">
                                        <span>Register</span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>
</html>