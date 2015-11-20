@extends('template.admintemp')

@section('content')

<div class="section">
  <div class="row">
    <div class="col s12 m6 l6 offset-l3 offset-m3">
      <div class="card white">
        <div class="card-content black-text">
          <span class="card-title black-text"><h3>Edit Product</h3></span>

          {{ Form::model($product,['method' => 'PATCH','route'=>['editNP.update',$product->id]]) }}
          <div class="center">
        
            <div class="center"> <!-- Details START -->
              <div class="container">                   
                <section>
                  <div class="row">
                    <div class="col-lg-8">
                      <h5 class="teal-text text-lighten-1">Details</h5>
                      <div class="row">
                        <div class="col s12">
                          <div class="row">
             
                            <div class="input-field col s6 @if ($errors->has('product_name')) red-text text-darken-3 @endif">
                              <input id="product_name" name="product_name" type="text" required="" maxlength="40" value="{{$product->product_name}}">
                              <label for="product_name">Product Name</label>
                              @if ($errors->has('product_name')) <p class="help-block">{{ $errors->first('product_name') }}</p> @endif
                            </div>

                            <div class="row">
                              <div>
                                <select id="product_supplier" name="product_supplier" class="input-field col s6">
                                @foreach(Supplier::all() as $s)
                                <option value="{{$s->supplier_name}}">{{$s->supplier_name}}</option>
                                @endforeach
                                </select>
                              </div>
                            </div>

                            <div class="input-field col s12 @if ($errors->has('product_description')) red-text text-darken-3 @endif"> 
                              <input id="product_description" name="product_description" type="text" length="100" value="{{$product->product_description}}">
                              <label for="description">Description(Optional)</label>
                              @if ($errors->has('product_description')) <p class="help-block">{{ $errors->first('product_description') }}</p> @endif
                            </div>

                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </section>
              </div>
            </div>                                                  <!-- Details End -->

            <div class="container">                                   <!-- Pricing -->
              <section>
                <div class="row">
                  <div class="col-lg-8">
                  <h5 class="teal-text text-lighten-1 ">Pricing</h5>
                    <div class="row">
                      <div class="col s12">

                        <div>
                          <div class="input-field col s4 @if ($errors->has('product_supplyPrice')) red-text text-darken-3 @endif">
                          <input id="product_supplyPrice" name="product_supplyPrice" type="number" required="" maxlength="40" value="{{$product->product_supplyPrice}}">
                          <label for="supply_price">Supply Price</label>
                          @if ($errors->has('product_supplyPrice')) <p class="help-block">{{ $errors->first('product_supplyPrice') }}</p> @endif
                          </div>
                        </div>

                        <div class="input-field col s4">
                          <input placeholder="" id="product_MarkUpPrice" name="product_MarkUpPrice" readonly="readonly" value="{{$product->product_markUpPrice}}" type="text" required="" maxlength="40">
                          <label for="vat">Mark-Up Price</label>
                        </div>


                        <div class="row">
                          <div class="input-field col s4 @if ($errors->has('product_retailPrice')) red-text text-darken-3 @endif">
                            <input id="product_retailPrice" name="product_retailPrice"  type="number" required="" maxlength="40" value="{{$product->product_retailPrice}}">
                            <label for="retail_price">Retail Price</label>
                            @if ($errors->has('product_retailPrice')) <p class="help-block">{{ $errors->first('product_retailPrice') }}</p> @endif
                          </div>
                        </div>
    
                      </div>
                    </div>
                  </div>
                </div>
              </section>
            </div>                                                <!-- Pricing End -->


            <div class="container">                               <!-- Inventory -->               
              <section>
                <div class="row">
                  <div class="col-lg-8">
                    <h5 class="teal-text text-lighten-1">Inventory</h5>
                    <div class="row">
                      <div class="col s12">

                        <div>
                          <div class="input-field col s4">
                            <input id="product_quantity" name="product_quantity" readonly="readonly" type="number" required="" maxlength="10" value="{{$product->product_quantity}}">
                            <label for="product_quantity">Quantity</label>
                          </div>
                        </div>

                        <div class="input-field col s4 @if ($errors->has('product_reorderPoint')) red-text text-darken-3 @endif">
                          <input id="product_reorderPoint" name="product_reorderPoint" type="number" required="" maxlength="20" value="{{$product->product_reorderPoint}}">
                          <label for="product_reorderPoint">Reorder Point</label>
                          @if ($errors->has('product_reorderPoint')) <p class="help-block">{{ $errors->first('product_reorderPoint') }}</p> @endif
                        </div>

                        <div class="row">
                          <div class="input-field col s4 @if ($errors->has('product_reorderAmount')) red-text text-darken-3 @endif">
                            <input id="product_reorderAmount" name="product_reorderAmount"  type="number" required="" maxlength="20" value="{{$product->product_reorderAmount}}">
                            <label for="product_reorderAmount">Reorder Amount</label>
                            @if ($errors->has('product_reorderAmount')) <p class="help-block">{{ $errors->first('product_reorderAmount') }}</p> @endif
                          </div>
                        </div>

                      </div>
                    </div>
                  </div>
                </div>
              </section>
            </div>

            @if(Session::has('update-success'))
            <div class="alert-box success green-text text-darken-3">
              <h6>{{ Session::get('update-success') }}</h6>
            </div>
            @endif

          </div>

          <div class=" right-align">
          <a href='/np'><button type="button" class=" waves-effect waves-light btn teal lighten-1">Back</button></a>
          {{ Form::button('Submit', ['class' => 'waves-effect waves-light btn teal lighten-1', 'type'=>'submit']) }}
          {{ Form::close() }}
          </div>

        </div>


      </div>
    </div>
  </div>
</div>

@stop