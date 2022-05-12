<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LogIn</title>
  <link rel="stylesheet" href="../css/newLogin.css">
</head>
<body>
<div class="login">
        
<div class="container login__box">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="login__top">
                    <div class="card-header f1">Login <span></span></div>
                </div>
                

                <div class="card-body login__bottom">
                    <form method="POST" action="{{ route('login') }}">
                       
                      <div class="row-1">
                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">Email:</label>

                            <div class="col-md-6 input-s1">
                                <input id="email" type="email"
                                 class="form-control @error('email') is-invalid @enderror" 
                                 name="email" value=""  placeholder="Email" required autocomplete="email" autofocus>

                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">Password:</label>

                            <div class="col-md-6 input-s1">
                                <input id="password" type="password"
                                placeholder="Password"
                                 class="form-control @error('password') is-invalid @enderror"
                                  name="password"  required autocomplete="current-password">

                            </div>
                        </div>
                    </div>

                    <div class="row-2">
                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember" class="checkbox-s1">
                                       Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0 ">
                            <div class="col-md-8 offset-md-4 button-s1">
                                <button type="submit" class="btn btn-primary">
                                   <span>Login</span>
                                </button>
                             </div>
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