@extends('layouts.auth')

@section('content')
<div id="wrapper">

  <div class="card card-authentication1 mx-auto my-5">

      <div class="card-body">

          <div class="card-content p-2">

              <div class="text-center">
                  <img src="{{ asset('images/avatar/logo.jpeg') }}" alt="logo icon" width="150px">
              </div>

              <div class="card-title text-uppercase text-center py-3">{{ __('lang.signin') }}</div>
            @if (count($errors))
                <ul style="direction: rtl; text-align: right;">
                    @foreach($errors->all() as $error)
                    <li>
                    <span class="text-danger">
                        <strong>{{ $error }}</strong>
                    </span>
                    </li>
                    @endforeach
                </ul>
               
            @endif
              <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">

                  @csrf

                  <div class="form-group">
                      <label class="">{{ __('lang.phone') }}</label>
                      <div class="position-relative has-icon-right">
                          <input type="text" name="phone" maxlength="10" value="{{ old('phone') }}" class="form-control" placeholder="{{ __('lang.phone') }}">
                          <div class="form-control-position">
                              <i class="icon-phone"></i>
                          </div>
                      </div>
                  </div>

                  <div class="form-group">
                      <label class="">{{ __('lang.password') }}</label>
                      <div class="position-relative has-icon-right">
                          <input type="password" name="password" value="{{ old('password') }}" class="form-control" placeholder="{{ __('lang.password') }}">
                          <div class="form-control-position">
                              <i class="icon-lock"></i>
                          </div>
                      </div>
                  </div>

                  

                  <div class="form-row align-items-center">
                      <div class="form-group col-6 text-left">
                          <!-- <a href="#">{{ __('lang.reset_password') }}</a> -->
                      </div>
                      <div class="form-group col-6">
                          <div class="icheck-material-primary">
                              <input type="checkbox" name="rememberMe" value="" id="user-checkbox" checked="" />
                              <label for="user-checkbox">{{ __('lang.remember_me') }}</label>
                          </div>
                      </div>

                  </div>
                  <input type="submit" value="{{ __('lang.submit') }}" class="btn btn-primary shadow-primary btn-block waves-effect waves-light" />
              </form>

          </div>

          
      </div>


  </div>
</div>
@endsection
