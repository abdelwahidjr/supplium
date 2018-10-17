@extends('layouts.shared')

@section('content')
    <!-- main-content-->
    <div class="wrapper">
        <div class="w-100">
            <div class="row d-flex justify-content-center  pt-5 mt-5 mb-4">
                <div class="col-12 col-xl-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <h4 class="mb-0 redial-font-weight-400">Create New Account</h4>
                        </div>
                        <div class="redial-divider"></div>
                        <div class="card-body py-4 text-center">
                            <img src="dist/images/logo-v2.png" alt="" class="img-fluid mb-4">
                            <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
                                @csrf

                                <div class="form-group">
                                    <input id="name" type="text"
                                           class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                           name="name" value="{{ old('name') }}" placeholder="Name" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                          <strong>{{ $errors->first('name') }}</strong>
                                      </span>
                                    @endif
                                </div>



                                <div class="form-group">
                                    <input id="email" type="email"
                                           class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                           name="email" value="{{ old('email') }}" placeholder="Email" required>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                          <strong>{{ $errors->first('email') }}</strong>
                                      </span>
                                    @endif

                                </div>



                                <div class="form-group">
                                    <input id="password" type="password"
                                           class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                           name="password" placeholder="Password" required>

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                          <strong>{{ $errors->first('password') }}</strong>
                                      </span>
                                    @endif
                                </div>



                                <div class="form-group">

                                    <input id="password-confirm" type="password" class="form-control"
                                           name="password_confirmation" placeholder="Confirm Password" required>
                                </div>


                                <div class="form-group">
                                    <input id="company_id" type="number"
                                           class="form-control{{ $errors->has('company_id') ? ' is-invalid' : '' }}"
                                           name="company_id" value="{{ old('company_id') }}" placeholder="Company Id" required>

                                    @if ($errors->has('company_id'))
                                        <span class="invalid-feedback" role="alert">
                                          <strong>{{ $errors->first('company_id') }}</strong>
                                      </span>
                                    @endif

                                </div>



                                <button type="submit" class="btn btn-primary btn-md redial-rounded-circle-50 btn-block">
                                    {{ __('Register') }}
                                </button>
                                <a href="{{route('login')}}" class="my-3">Already have an account?</a>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End main-content-->


    {{--  <div class="container">
          <div class="row justify-content-center">
              <div class="col-md-8">
                  <div class="card">
                      <div class="card-header">{{ __('Register') }}</div>

                      <div class="card-body">
                          <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
                              @csrf

                              <div class="form-group row">
                                  <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                  <div class="col-md-6">
                                      <input id="name" type="text"
                                             class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                             name="name" value="{{ old('name') }}" required autofocus>

                                      @if ($errors->has('name'))
                                          <span class="invalid-feedback" role="alert">
                                          <strong>{{ $errors->first('name') }}</strong>
                                      </span>
                                      @endif
                                  </div>
                              </div>

                              <div class="form-group row">
                                  <label for="email"
                                         class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                  <div class="col-md-6">
                                      <input id="email" type="email"
                                             class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                             name="email" value="{{ old('email') }}" required>

                                      @if ($errors->has('email'))
                                          <span class="invalid-feedback" role="alert">
                                          <strong>{{ $errors->first('email') }}</strong>
                                      </span>
                                      @endif
                                  </div>
                              </div>

                              <div class="form-group row">
                                  <label for="password"
                                         class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                  <div class="col-md-6">
                                      <input id="password" type="password"
                                             class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                             name="password" required>

                                      @if ($errors->has('password'))
                                          <span class="invalid-feedback" role="alert">
                                          <strong>{{ $errors->first('password') }}</strong>
                                      </span>
                                      @endif
                                  </div>
                              </div>

                              <div class="form-group row">
                                  <label for="password-confirm"
                                         class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                  <div class="col-md-6">
                                      <input id="password-confirm" type="password" class="form-control"
                                             name="password_confirmation" required>
                                  </div>
                              </div>

                              <div class="form-group row mb-0">
                                  <div class="col-md-6 offset-md-4">
                                      <button type="submit" class="btn btn-primary">
                                          {{ __('Register') }}
                                      </button>
                                  </div>
                              </div>
                          </form>
                      </div>
                  </div>
              </div>
          </div>
      </div>--}}
@endsection
