@extends('template.admintemp')

@section('content')

<div class="section">
  <div class="row">
    <div class="col s12 m6 l6 offset-l3 offset-m3">
      <div class="card white">
        <div class="card-content black-text">
          <span class="card-title black-text"><h3>Edit User</h3></span>

          {{ Form::model($user,['method' => 'PATCH','route'=>['editUsers.update',$user->id]]) }}
          <div class="center">
        
            <div class="input-field col s12">
              <input id="id" name="id" disabled value="<?php if ($user->user_type == 0): ?>Admin<?php elseif ($user->user_type == 1): ?>Cashier<?php endif; ?>" type="text">
              <label for="name">Type</label>
            </div> 
      
            <div class="input-field col s12 @if ($errors->has('user_name')) red-text text-darken-3 @endif">
              <input id="user_name" name="user_name" value="{{$user->user_name}}" type="text" required="" maxlength="40">
              <label for="name">Name</label>
              @if ($errors->has('user_name')) <p class="help-block">{{ $errors->first('user_name') }}</p> @endif
            </div>

            <div class="input-field col s12 @if ($errors->has('email')) red-text text-darken-3 @endif">
              <input id="email" name="email" value="{{$user->email}}" type="email" required="" maxlength="40">
              <label for="email">Email</label>
              @if ($errors->has('email')) <p class="help-block">{{ $errors->first('email') }}</p> @endif
            </div>

            <div class="input-field col s12 @if ($errors->has('user_contactNo')) red-text text-darken-3 @endif">
              <input id="user_contactNo" name="user_contactNo" value="{{$user->user_contactNo}}" type="tel" required="" maxlength="11">
              <label for="password">Contact Number</label>
              @if ($errors->has('user_contactNo')) <p class="help-block">{{ $errors->first('user_contactNo') }}</p> @endif
            </div>

            <div class="input-field col s12">
              {{ Form::select('user_status', array('1' => 'Active', '0' => 'Inactive')); }}
            </div>

            @if(Session::has('update-success'))
            <div class="alert-box success green-text text-darken-3">
              <h6>{{ Session::get('update-success') }}</h6>
            </div>
            @endif

          </div>

          <div class=" right-align">
          <a href='/users'><button type="button" class=" waves-effect waves-light btn teal lighten-1">Back</button></a>
          {{ Form::button('Submit', ['class' => 'waves-effect waves-light btn teal lighten-1', 'type'=>'submit']) }}
          {{ Form::close() }}
          </div>

        </div>


      </div>
    </div>
  </div>
</div>

@stop