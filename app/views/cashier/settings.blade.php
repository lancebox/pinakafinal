@extends('template.cashiertemp')

@section('content')

<div class="section">
  <div class="row">
    <div class="col s12 m6 l6 offset-l3">
      <div class="card white">
        <div class="card-content black-text">
          <span class="card-title black-text"><h3>Account Settings</h3></span>


            <div class="center"> <!-- Details START -->
              <div class="container">                   
                <section>
                  <div class="row">
                    <div class="col-lg-8">
                      <h5 class="teal-text text-lighten-1">Details</h5>
                      <div class="row">
                        <div class="col s12">
                          {{ Form::open(array('method' => 'PUT', 'url' => 'editAccount' )) }}
                          <div class="row">
             
                            <div class="input-field col s12">
                              <input id="id" name="id" disabled value="<?php if (Auth::user()->user_type == 0): ?>Admin<?php elseif (Auth::user()->user_type == 1): ?>Cashier<?php endif; ?>" type="text">
                              <label for="name">Type</label>
                            </div> 
      
                            <div class="input-field col s12 @if ($errors->has('user_name')) red-text text-darken-3 @endif">
                              <input id="user_name" name="user_name" value="{{Auth::user()->user_name}}" type="text" required="" maxlength="40">
                              <label for="name">Name</label>
                              @if ($errors->has('user_name')) <p class="help-block">{{ $errors->first('user_name') }}</p> @endif
                            </div>

                            <div class="input-field col s12 @if ($errors->has('email')) red-text text-darken-3 @endif">
                              <input id="email" name="email" value="{{Auth::user()->email}}" type="email" required="" maxlength="40">
                              <label for="email">Email</label>
                              @if ($errors->has('email')) <p class="help-block">{{ $errors->first('email') }}</p> @endif
                            </div>

                            <div class="input-field col s12 @if ($errors->has('user_contactNo')) red-text text-darken-3 @endif">
                              <input id="user_contactNo" name="user_contactNo" value="{{Auth::user()->user_contactNo}}" type="tel" required="" maxlength="11">
                              <label for="password">Contact Number</label>
                              @if ($errors->has('user_contactNo')) <p class="help-block">{{ $errors->first('user_contactNo') }}</p> @endif
                            </div>

                            @if(Session::has('update-success'))
                            <div class="alert-box success green-text text-darken-3">
                              <h6>{{ Session::get('update-success') }}</h6>
                            </div>
                            @endif

                          </div>
                          <div class=" center-align">
                            {{ Form::button('Update', ['class' => 'waves-effect waves-light btn teal lighten-1', 'type'=>'submit']) }}
                            {{ Form::close() }}
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </section>
              </div>
            </div>

            <div class="center"> <!-- Change Password START -->
              <div class="container">                   
                <section>
                  <div class="row">
                    <div class="col-lg-8">
                      <h5 class="teal-text text-lighten-1">Change Password</h5>
                      <div class="row">
                        <div class="col s12">
                          {{ Form::open(array('method' => 'PUT', 'url' => 'changePassword' )) }}
                          <div class="row">
             
                            <div class="input-field col s12 @if ($errors->has('old_password')) red-text text-darken-3 @endif">
                              <input id="old_password" name="old_password" type="password" maxlength="40">
                              <label for="old_password">Old Password</label>
                              @if ($errors->has('old_password')) <p class="help-block">{{ $errors->first('password') }}</p> @endif
                              @if(Session::has('password-fail'))<div class="alert-box success red-text text-darken-3"><p>{{ Session::get('password-fail') }}</p></div>
                            @endif
                            </div>

                            <div class="input-field col s12 @if ($errors->has('password')) red-text text-darken-3 @endif">
                              <input id="password" name="password" type="password" maxlength="40">
                              <label for="password">New Password</label>
                              @if ($errors->has('password')) <p class="help-block">{{ $errors->first('password') }}</p> @endif
                            </div>

                            <div class="input-field col s12 @if ($errors->has('password_confirmation')) red-text text-darken-3 @endif">
                              <input id="password_confirmation" name="password_confirmation" type="password" maxlength="40">
                              <label for="password_confirmation">Confirm Password</label>
                              @if ($errors->has('password_confirmation')) <p class="help-block">{{ $errors->first('password') }}</p> @endif
                            </div>

                            @if(Session::has('password-success'))
                            <div class="alert-box success green-text text-darken-3">
                              <h6>{{ Session::get('password-success') }}</h6>
                            </div>
                            @endif



                          </div>
                          <div class=" center-align">
                            {{ Form::button('Change Password', ['class' => 'waves-effect waves-light btn teal lighten-1', 'type'=>'submit']) }}
                            {{ Form::close() }}
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </section>
              </div>
            </div>              



        </div>
      </div>
    </div>
  </div>
</div>

@stop



