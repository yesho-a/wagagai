<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link href="{{ asset('css/custom.css') }}" rel="stylesheet">


    <title>Login Form</title>
</head>
<body>
    <div class="container-full" >
        <div class="row mt-5">
        </div>
        <div class="row justify-content-center m-2" >
            <div class="col-md-7">
                
                <div class="card ">
    
                    <div class="card-body text-center">
                        <!-- <p id="text3">Not a Member?  <a id="signup" href="login.html">Signup Now</a></p> -->
<p class="p-3" id="text" ><strong>Login</strong> </p>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">Email</label>

                                <div class="col-md-5">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                    
                                </div>
                            </div>
    
                            <div class="row mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-end">Password</label>
    
                                <div class="col-md-5">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                            </div>
    
                            <div class="row mb-3">
                                <div class="col-md-5 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input mt-2" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="remember">
                                            Remember Me
                                        </label>
                            
                                        @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}"  id="forgot">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                               
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-5 offset-md-4 ">
                                        <button type="submit" class="btn btn-primary  btn-lg" style="width: 100%;">
                                            {{ __('Login') }}
                                        </button> 
                              
                                </div>
                            </div>
                         
                            <div class="row mb-0 ">
                                <div class="col-md-8 offset-md-4">
                                   
                                </div>
                            </div>
                        </form>
                        <hr>
                        <div class="text-center">
                        <p>Not a Member?  <a id="signup" href="{{ route('register') }}">Signup Now</a></p>
                    </div>
                    </div>

                </div>

            </div>
        </div>
    </div>

</body>
</html>