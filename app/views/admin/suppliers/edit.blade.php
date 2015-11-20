@extends('template.admintemp')

@section('content')

<div class="section">
  <div class="row">
    <div class="col s12 m6 l6 offset-l3 offset-m3">
      <div class="card white">
        <div class="card-content black-text">
          <span class="card-title black-text"><h3>Edit Supplier</h3></span>

          {{ Form::model($supplier,['method' => 'PATCH','route'=>['editSuppliers.update',$supplier->id]]) }}
          <div class="center">
        
            <div class="input-field col s12 @if ($errors->has('supplier_name')) red-text text-darken-3 @endif">
              <input id="supplier_name" name="supplier_name" value="{{$supplier->supplier_name}}" type="text" required="" maxlength="40">
              <label for="name">Name</label>
              @if ($errors->has('supplier_name')) <p class="help-block">{{ $errors->first('supplier_name') }}</p> @endif
            </div>

            <div class="input-field col s12 @if ($errors->has('supplier_email')) red-text text-darken-3 @endif">
              <input id="supplier_email" name="supplier_email" value="{{$supplier->supplier_email}}" type="email" required="" maxlength="40">
              <label for="email">Email</label>
              @if ($errors->has('supplier_email')) <p class="help-block">{{ $errors->first('supplier_email') }}</p> @endif
            </div>

            <div class="input-field col s12 @if ($errors->has('supplier_contactNo')) red-text text-darken-3 @endif">
              <input id="supplier_contactNo" name="supplier_contactNo" value="{{$supplier->supplier_contactNo}}" type="tel" required="" maxlength="40">
              <label for="password">Contact Number</label>
              @if ($errors->has('supplier_contactNo')) <p class="help-block">{{ $errors->first('supplier_contactNo') }}</p> @endif
            </div>

            <div class="input-field col s12 @if ($errors->has('supplier_address')) red-text text-darken-3 @endif">
              <input id="supplier_address" name="supplier_address" value="{{$supplier->supplier_address}}" type="text" required="" maxlength="11">
              <label for="mobile">Address</label>
              @if ($errors->has('supplier_address')) <p class="help-block">{{ $errors->first('supplier_address') }}</p> @endif
            </div>

            @if(Session::has('update-success'))
            <div class="alert-box success green-text text-darken-3">
              <h6>{{ Session::get('update-success') }}</h6>
            </div>
            @endif

          </div>

          <div class=" right-align">
          <a href='/suppliers'><button type="button" class=" waves-effect waves-light btn teal lighten-1">Back</button></a>
          {{ Form::button('Submit', ['class' => 'waves-effect waves-light btn teal lighten-1', 'type'=>'submit']) }}
          {{ Form::close() }}
          </div>

        </div>


      </div>
    </div>
  </div>
</div>

@stop