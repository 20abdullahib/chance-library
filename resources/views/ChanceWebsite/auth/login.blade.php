@extends('ChanceWebsite.layout.layout')

<!-- login-style -->
<link rel="stylesheet" href="{{ asset('assets-login/login_page.min.css') }}">
@section('content')
    <div id="login_page">
        <div class="login_page_wrapper">
            <div class="md-card" id="login_card">
                <div class="md-card-content large-padding" id="login_form">
                    <div class="login_heading">
                        <h2>Chance Admin Login</h2>
                    </div>
                    <form method="post" action="{{ route('admin.dashboard.checklogin') }}">
                        @csrf
                        <div class="uk-form-row">
                            <label for="login_username">Email</label>
                            <input class="md-input" type="text" id="login_username" name="email" />
                            @error('email')
                                <span class="invalid-feedback text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="uk-form-row">
                            <label for="login_password">Password</label>
                            <input class="md-input" type="password" id="login_password" name="password" />
                            @error('password')
                                <span class="invalid-feedback text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="uk-margin-medium-top">
                            <input type="submit" value="Sign In" class="md-btn md-btn-primary md-btn-block md-btn-large" />
                        </div>

                    </form>
                </div>
                {{-- <div class="md-card-content large-padding uk-position-relative" id="register_form" style="display: none">
                <button type="button" class="uk-position-top-right uk-close uk-margin-right uk-margin-top back_to_login"></button>
                <h2 class="heading_b uk-text-success">Can't log in?</h2>
                <p>Here’s the info to get you back in to your account as quickly as possible.</p>
                <p>First, try the easiest thing: if you remember your password but it isn’t working, make sure that Caps Lock is turned off, and that your username is spelled correctly, and then try again.</p>
                <p>If your password still isn’t working, it’s time to <a href="#" id="password_reset_show">Reset Your Student password</a>.</p>
            </div>
            <div class="md-card-content large-padding" id="login_password_reset" style="display: none">
                <button type="button" class="uk-position-top-right uk-close uk-margin-right uk-margin-top back_to_login"></button>
                <h2 class="heading_a uk-margin-large-bottom">Reset password</h2>
                <form method = "POST">
                    <div class="uk-form-row">
                        <label for="login_email_reset">Your email address</label>
                        <input class="md-input" required name="pr_useremail"  type="email" id="login_email_reset" />
                    </div>
                    <div class="uk-form-row" style="display:none">
                        <label for="login_email_reset">User Type</label>
                        <input class="md-input" name="pr_usertype" value="Student"  type="text" id="login_email_reset" />
                    </div>
                    <div class="uk-form-row" style="display:none">
                        <label for="login_email_reset">Your email address</label>
                        <input class="md-input" name="" value=""  type="text" id="login_email_reset" />
                    </div>
                    <div class="uk-form-row" style="display:none">
                        <label for="login_email_reset">Reset Status</label>
                        <input class="md-input" name="" value="Pending"  type="text" id="login_email_reset" />
                    </div>
                    <div class="uk-margin-medium-top">
                        <input type="submit" value="" name="" class="md-btn md-btn-primary md-btn-block"/>
                    </div>
                </form>
            </div> --}}
            </div>

            {{-- <div class="uk-margin-top uk-text-center">
            <a href="#" id="signup_form_show">Forgot Password</a>
        </div> --}}
            <div class="uk-margin-top uk-text-center">
                <a href="{{route('Home.index')}}">Home</a>
            </div>
        </div>
    </div>
@endsection
