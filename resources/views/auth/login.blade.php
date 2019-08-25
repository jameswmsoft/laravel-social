@include('includes.header_account')

<!-- Begin page -->
<div class="accountbg"></div>
<div class="wrapper-page">

    <div class="card">
        <div class="card-body" style="margin-top: 20px">

            <h1 class="text-center m-0">
                <img src="{{asset('assets/images/logo.png')}}" style="height: 60px"/>
                <span class="login_title spark">Spark</span><span class="login_title com">.com</span>
            </h1>

            <div class="p-3">
                <h4 class="text-muted font-18 m-b-5 text-center">Welcome !</h4>
                <p class="text-muted text-center">Sign in to continue to Spark.</p>

                <form class="form-horizontal m-t-30"  method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="username">Email</label>
                        <input type="text" class="form-control" id="useremail" placeholder="Enter username" name="email" value="{{ old('email') }}" required autofocus>

                        @if ($errors->has('email'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="userpassword">Password</label>
                        <input type="password" class="form-control" id="userpassword" placeholder="Enter password" value="QWE!@#" name="password" required>
                        @if ($errors->has('password'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                        @endif
                    </div>

                    <div class="form-group row m-t-20">
                        <div class="col-sm-6">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="customControlInline" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="custom-control-label" for="customControlInline">Remember me</label>
                            </div>
                        </div>
                        <div class="col-sm-6 text-right">
                            <button class="btn btn-primary w-md waves-effect waves-light auth_btn" type="submit">Log In</button>
                        </div>
                    </div>

                    <div class="form-group m-t-10 mb-0 row">
                        <div class="col-12 m-t-20">
                            <a href="{{ route('password.request') }}" class="text-muted"><i class="mdi mdi-lock"></i> Forgot your password?</a>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>

    <div class="m-t-40 text-center">
        <p>Don't have an account ? <a href="{{route('register')}}" class="font-500 font-14 text-primary font-secondary"> Signup Now </a> </p>
    </div>

</div>

@include('includes/footer_account')