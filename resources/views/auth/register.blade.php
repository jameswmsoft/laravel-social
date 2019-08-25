@include('includes/header_account')

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
                <h4 class="text-muted font-18 m-b-5 text-center">Create an account</h4>
                <p class="text-muted text-center">It's free and always will be.</p>

                <form class="form-horizontal m-t-30" method="POST" action="{{ route('register') }}">
                    {{ csrf_field() }}
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" placeholder="Enter username" name="name" value="{{ old('name') }}" required autofocus>

                        @if ($errors->has('name'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="useremail">Email</label>
                        <input type="email" class="form-control" id="useremail" placeholder="Enter email" name="email" value="{{ old('email') }}" required>
                    @if ($errors->has('email'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                @endif
                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="userpassword">Password</label>
                        <input type="password" class="form-control" name="password" id="userpassword" placeholder="Enter password" required>
                        @if ($errors->has('password'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="userpassword">Confirm Password</label>
                        <input type="password" class="form-control" id="re-userpassword" placeholder="Enter Confirm password" name="password_confirmation" required>
                    </div>

                    <div class="form-group row m-t-30">
                        <div class="col-12 text-right">
                            <button class="btn btn-primary w-md waves-effect waves-light auth_btn" type="submit">Register</button>
                        </div>
                    </div>

                    {{--<div class="form-group m-t-10 mb-0 row">--}}
                    {{--<div class="col-12 m-t-20">--}}
                    {{--<p class="font-14 text-muted mb-0">By registering you agree to the Spark <a href="#">Terms of Use</a></p>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                </form>
            </div>

        </div>
    </div>

    <div class="m-t-40 text-center">
        <p>Already have an account ? <a href="{{ route('login') }}" class="font-500 font-14 text-primary font-secondary"> Login </a> </p>
    </div>
</div>

@include('includes/footer_account')