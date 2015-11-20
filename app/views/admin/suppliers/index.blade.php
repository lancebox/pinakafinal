@extends('template.admintemp')

@section('content')



<div class="section">
  <div class="row">   
    
<!--Users Table-->
<div class="container col col s8 l8 m8">
    <div class="card material-table">
      <div class="table-header">
        <span class="table-title"><div class="teal-text text-lighten-1 flow-text"><strong>Suppliers</strong></div></span>
        <div class="actions">
          <a href="#" class="search-toggle waves-effect btn-flat nopadding"><i class="material-icons">search</i></a>
        </div>
      </div>
      <table id="datatable">
        <thead>
                <tr>
                  <th data-field="brand">Name</th>
                  <th data-field="price">Email</th>
                  <th data-field="quantity">Mobile</th>
                  <th data-field="quantity">Address</th>
                  <th data-field="id">Action</th>
                </tr>
            </thead>
            <?php $suppliers = Supplier::all();?>
            <tbody>
                <form> 
                  <p>
                      <tr>
                        @foreach($suppliers as $supplier)
                        <td>{{$supplier->supplier_name}}</td>
                        <td>{{$supplier->supplier_email}}</td>
                        <td>{{$supplier->supplier_contactNo}}</td>
                        <td>{{$supplier->supplier_address}}</td>
                        <td>
                            <div class ="center">
                              <a class="teal-text text-lighten-1 modal-trigger" data-toggle="modal" href="{{ URL::to('suppliers/' . $supplier->id . '/edit') }}">Edit</button>
                            </div>
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

      <!-- Add Supplier -->
      <form method="POST" action="/createSupplier" id="createSupplier">
      <div class="col s4 l4 m4">  
          <div class="card white lighten-1 ">

          <div class="input-field col s12 @if ($errors->has('supplier_name')) red-text text-darken-3 @endif">
                <input id="supplier_name" name="supplier_name" type="text" required="" maxlength="40" value="{{ Input::old('supplier_name') }}">
                <label for="name">Name</label>
                @if ($errors->has('supplier_name')) <p class="help-block">{{ $errors->first('supplier_name') }}</p> @endif
            </div>
            

            <div class="input-field col s12 @if ($errors->has('supplier_email')) red-text text-darken-3 @endif">
              <input id="supplier_email" name="supplier_email" type="email" required="" maxlength="40" value="{{ Input::old('supplier_email') }}">
              <label for="email">Email</label>
              @if ($errors->has('supplier_email')) <p class="help-block">{{ $errors->first('supplier_email') }}</p> @endif
            </div>
            
             
            <div class="input-field col s12 @if ($errors->has('supplier_contactNo')) red-text text-darken-3 @endif">
              <input id="supplier_contactNo" name="supplier_contactNo" type="tel" required="" maxlength="11" value="{{ Input::old('supplier_contactNo') }}">
              <label for="password">Contact Number</label>
              @if ($errors->has('supplier_contactNo')) <p class="help-block">{{ $errors->first('supplier_contactNo') }}</p> @endif
            </div>


            <div class="input-field col s12 @if ($errors->has('supplier_address')) red-text text-darken-3 @endif">
              <input id="supplier_address" name="supplier_address" type="text" required="" maxlength="100" value="{{ Input::old('supplier_address') }}">
              <label for="mobile">Address</label>
              @if ($errors->has('supplier_address')) <p class="help-block">{{ $errors->first('supplier_address') }}</p> @endif
            </div>

            @if(Session::has('store-success'))
            <div class="center">
              <div class="alert-box success green-text text-darken-3">
                <h6>{{ Session::get('store-success') }}</h6>
              </div>
            </div>
            @endif
           
    
            <div class="row"  >
              <div class="center">
                <button class="waves-effect waves-light btn teal lighten-1" type="submit" name="action">Add Supplier</a>
              </div>
            </div>

          </div>
      </div>
    </form>


  </div>
</div>

 
@stop

