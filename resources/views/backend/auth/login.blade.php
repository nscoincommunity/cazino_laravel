@extends('backend.layouts.auth')

@section('page-title', trans('app.login'))

@section('content')

<div class="col-md-8 col-lg-6 col-xl-5 mx-auto my-10p" id="login">

    <div class="card mt-5">
        <div class="card-body">
            <h5 class="card-title text-center mt-4 text-uppercase">
                @lang('app.login')
            </h5>

            <div class="p-4">

                @include('backend.partials.messages')

                <form role="form" action="<?= route('backend.auth.login.post') ?>" method="POST" id="login-form" autocomplete="off" class="mt-3">

                    <input type="hidden" value="<?= csrf_token() ?>" name="_token">

                    @if (Input::has('to'))
                        <input type="hidden" value="{{ Input::get('to') }}" name="to">
                    @endif

                    <div class="form-group">
                        <label for="username" class="sr-only">@lang('app.email_or_username')</label>
                        <input type="text"
                                name="username"
                                id="username"
                                class="form-control"
                                placeholder="@lang('app.email_or_username')">
                    </div>

                    <div class="form-group password-field">
                        <label for="password" class="sr-only">@lang('app.password')</label>
                        <input type="password"
                               name="password"
                               id="password"
                               class="form-control"
                               placeholder="@lang('app.password')">
                    </div>


                    @if (settings('remember_me'))
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" name="remember" id="remember" value="1" checked="checked" />
                            <label class="custom-control-label font-weight-normal" for="remember">
                                @lang('app.remember_me')
                            </label>
                        </div>
                    @endif


                    <div class="form-group mt-4">
                        <button type="submit" class="btn btn-primary btn-lg btn-block" id="btn-login">
                            @lang('app.log_in')
                        </button>
                    </div>
                </form>

                @if (settings('forgot_password'))
                    <a href="<?= route('backend.password.remind') ?>" class="forgot">@lang('app.i_forgot_my_password')</a>
                @endif

            </div>
        </div>
    </div>

</div>

@stop

@section('scripts')
    {!! HTML::script('assets/js/as/login.js') !!}
    {!! JsValidator::formRequest('VanguardDK\Http\Requests\Auth\LoginRequest', '#login-form') !!}
@stop