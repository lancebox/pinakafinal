@extends('template.admintemp')

@section('content')


<div class="section">
    <div class="row">

        <!--Users Table-->

  <div class="col s8 l8 m8">
    <div class="card material-table">
      <div class="table-header">
        <span class="table-title"><div class="teal-text text-lighten-1 flow-text"><strong>Users</strong></div></span>
        <div class="actions">
          <a href="#" class="search-toggle waves-effect btn-flat nopadding"><i class="material-icons">search</i></a>
        </div>
      </div>
      <table id="datatable">
        <thead>
          <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Contact Number</th>
            <th>Type</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </thead>
            <?php $users = User::all();?>
                <tbody>
                    <form> 
                        <p>
                            <tr>
                        @foreach($users as $user)
                        <td>{{ $user->user_name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->user_contactNo}}</td>
                        
                        <?php if ($user->user_type == 0): ?>
                        <td>Admin</td>
                        <?php elseif ($user->user_type == 1): ?>
                        <td>Cashier</td>
                        <?php endif; ?>

                        <?php if ($user->user_status == 0): ?>
                        <td>Inactive</td>
                        <?php elseif ($user->user_status == 1): ?>
                        <td>Active</td>
                        <?php endif; ?>
                        
                                <td>
                            <a class="teal-text text-lighten-1 modal-trigger" data-toggle="modal" href="{{ URL::to('users/' . $user->id . '/edit') }}">Edit</button>
                        </td>                       
                      </tr>
                      @endforeach      
                        </p>
                    </form>
                </tbody>
</table>
    </div>
  </div>

        <!--/Users Table-->

        <!-- Add User -->
      <form method="POST" action="/createUser" id="createUser">
        <div class="col s4 l4 m4">  
            <div class="card white lighten-1 ">

              <div class="input-field col s12 @if ($errors->has('user_name')) red-text text-darken-3 @endif">
                <input id="user_name" name="user_name" type="text" required="" maxlength="40" value="{{ Input::old('user_name') }}">
                <label for="name">Name</label>
                @if ($errors->has('user_name')) <p class="help-block">{{ $errors->first('user_name') }}</p> @endif
              </div>
              

              <div class="input-field col s12 @if ($errors->has('email')) red-text text-darken-3 @endif">
                <input id="email" name="email" type="email" required="" maxlength="40" value="{{ Input::old('email') }}">
                <label for="email">Email</label>
                @if ($errors->has('email')) <p class="help-block">{{ $errors->first('email') }}</p> @endif
              </div>
              
               
              <div class="input-field col s12 @if ($errors->has('password')) red-text text-darken-3 @endif">
                <input id="password" name="password" type="password" required="" maxlength="40">
                <label for="password">Password</label>
                @if ($errors->has('password')) <p class="help-block">{{ $errors->first('password') }}</p> @endif
              </div>
             
             
              <div class="input-field col s12 @if ($errors->has('user_contactNo')) red-text text-darken-3 @endif">
                <input id="user_contactNo" name="user_contactNo" type="tel" required="" maxlength="11" value="{{ Input::old('user_contactNo') }}">
                <label for="contactNo">Contact Number</label>
                @if ($errors->has('user_contactNo')) <p class="help-block">{{ $errors->first('user_contactNo') }}</p> @endif
              </div>

              <div class="col s3">
                <br>
                <a class="grey-text">User Type</a>
              </div>

              <div class="row">
                <div class="input-field col s9">
                  {{ Form::select('user_type', array('1' => 'Cashier', '0' => 'Admin')); }}
                </div>
              </div>

              @if(Session::has('store-success'))
              <div class="center">
              <div class="alert-box success green-text text-darken-3">
                <h6>{{ Session::get('store-success') }}</h6>
              </div>
              </div>
              @endif

              <div class="row">
                <div class="center">
                  
                  <button class="waves-effect waves-light btn teal lighten-1" type="submit" name="action">Add Account</a>
                </div>
              </div>

            </div>
        </div>
      </form>
        <!-- /Add User -->
    </div>
</div>
@stop

