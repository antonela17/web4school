<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/newChangePassword.css">
    <title>ChangePassword</title>
</head>
<body>
    <div class="changePassword">
        
    <div class="container change__box">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                   <div class="change__top">
                    <div class="card-header f1">Change Password <span></span></div>
                   </div>

                    <div class="card-body change__bottom">
                        <form method="POST" action="{{ route('change.password') }}">

                        <div class="row-1">
                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Current Password</label>

                                <div class="col-md-6 input-s1">
                                    <input id="password" type="password" 
                                    class="form-control" name="current_password" 
                                    autocomplete="current-password">
                                </div>
                            </div>
                        </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">New Password</label>

                                <div class="col-md-6 input-s1">
                                    <input id="new_password" type="password" class="form-control" name="new_password" autocomplete="current-password">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">New Confirm Password</label>

                                <div class="col-md-6 input-s1">
                                    <input id="new_confirm_password" type="password" 
                                    class="form-control" name="new_confirm_password"
                                     autocomplete="current-password">
                                </div>
                            </div>

                            <div class="form-group row mb-0 row-2">
                                <div class="col-md-8 offset-md-4 button-s1">
                                    <button type="submit" class="btn btn-primary">
                                        <span>Update Password</span>
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