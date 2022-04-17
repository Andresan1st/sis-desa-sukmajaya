
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('login_template/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('login_template/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('login_template/css/iofrm-style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('login_template/css/iofrm-theme21.css') }}">
    <style>
        @media screen and (min-width: 480px) {
            #logo_desa {
                display: none;
            }
        }
    </style>
</head>

<body>
    <div class="form-body without-side">
        <div class="website-logo" style="margin-left: -110px;">
            {{-- LOGO IMAGE --}}
            @if ($message = Session::get('error'))
                <div class="alert alert-danger alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
            @endif
        </div>
        <div class="row">
            <div class="img-holder">
                <div class="bg"></div>
                <div class="info-holder">
                    <img id="logo_desa" src="{{asset('asset/logo-desa.png')}}" style="width: 200px; margin-right: 10px; margin-bottom: 50px" alt="">
                    <img src="{{ asset('login_template/images/graphic3.svg') }}" alt="">
                </div>
            </div>
            <form method="POST" action="{{ route('login') }}">@csrf
                <div class="form-holder" style="position: absolute; bottom: 32%">
                    <div class="form-content" style="padding: 0; margin: 0;">
                        <div class="row">
                            <div class="col-md-12" style="margin: 5px;">
                                <div class="form-items" style="padding: 5px; margin: 0; border-radius: 50px;">
                                    <input class="form-control text-center text-lowercase  @error('username') is-invalid @enderror"
                                        style="background: white;margin: 0; padding: 10px;  border-radius: 50px;"
                                        type="text" id="username" name="username" placeholder="username"  value="{{ old('username') }}"  required>
                                    @error('username')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                      
                                </div>
                            </div>
                            <div class="col-md-12" style="margin: 5px;">
                                <div class="form-items" style="padding: 5px; margin: 0; border-radius: 50px;">
                                    <input class="form-control text-center text-lowercase  @error('password') is-invalid @enderror " 
                                        style="background: white;margin: 0; padding: 10px;  border-radius: 50px;"
                                        type="password" id="password" name="password" placeholder="password" required>
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                     @enderror
                                </div>
                            </div>
                            <div class="col-md-12" style="margin-top: 50px">
                                {{-- <button class="btn btn-warning" id="login" name="login" type="submit"> Log In </button> --}}
                                <button typ="submit"class="btn btn-warning" tabindex="4"> {{ __('Login') }}</button>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="col-md-12 text-center" style="position: absolute; bottom: 10%">
                    <span class="text-white">Lupa Password ? </span><br>
                    <span class="text-muted">Belum Punya Akun ? </span><u><a href="#" class="text-white"> Sign
                            Up </a></u>
                </div> --}}
            </form>
            {{-- <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <h3>Login to account</h3>
                        <p>Kumpulan Media Social dan Aplikasi.</p>
                        <form method="POST" action="{{ route('login') }}">@csrf
                            <input class="form-control" type="text" name="name" placeholder="E-mail Address" required>
                            <input class="form-control" type="password" name="password" placeholder="Password" required>
                            <div class="form-button">
                                <button id="submit" type="submit" class="ibtn">Login</button> 
                                <a class="page-links" href="{{route('register')}}">Daftar baru</a>
                                <a href="forget21.html">Forget password?</a>
                            </div>
                        </form>
                        <div class="other-links">
                            <div class="text">Belum punya akun ? </div>
                            <a href="#"><i class="fab fa-facebook-f"></i>Facebook</a><a href="#"><i class="fab fa-google"></i>Google</a><a href="#"><i class="fab fa-linkedin-in"></i>Linkedin</a>
                        </div>
                        <div class="page-links">
                            <a class="btn btn-info text-white" href="{{route('register')}}">Daftar</a>
                        </div>
                    </div>
                </div>
            </div> --}}


        </div>
    </div>
    <script src="{{ asset('login_template/js/jquery.min.js') }}"></script>
    <script src="{{ asset('login_template/js/popper.min.js') }}"></script>
    <script src="{{ asset('login_template/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('login_template/js/main.js') }}"></script>
</body>

</html>
