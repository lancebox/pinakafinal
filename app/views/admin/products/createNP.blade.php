@extends('template.admintemp')

@section('content')

<script type="text/javascript" src="https://code.jquery.com/jquery-1.8.3.min.js"></script>
<!-- cash tender start --> 
<script >
        $(document).ready(function() {
            //this calculates values automatically 
            sum();
            $("#product_supplyPrice, #product_retailPrice").on("keydown keyup", function() {
                sum();
            });
        });

        function sum() {
                    var num1 = document.getElementById('product_supplyPrice').value;
                    var num2 = document.getElementById('product_retailPrice').value;
                    var result1 = parseInt(num2) - parseInt(num1);
                            if (num1 = 0)
                            {

                            }
                                if (result1 < 1)
                                {
                                  document.getElementById('subt').value = 0;
                                }
                                 else 
                                    if (!isNaN(result1)) 
                                    {
                                      document.getElementById('subt').value = result1;
                                    }       
                        }
</script>

<div class="section">
  <div class="row">
    <div class="col s12 m6 l6 offset-l3 offset-m3">
      <div class="card white">
        <div class="card-content black-text">
          <span class="card-title black-text"><h3>Add Product</h3></span>

          {{ Form::open(['url' => 'addNP']) }}
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
                              <input id="product_name" name="product_name" type="text" required="" maxlength="40 value="{{ Input::old('product_name') }}"">
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
                              <input id="product_description" name="product_description" type="text" length="100" value="{{ Input::old('product_description') }}">
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
                          <input name="product_supplyPrice" id="product_supplyPrice" type="number" required="" maxlength="40" value="{{ Input::old('product_supplyPrice') }}">
                          <label for="supply_price">Supply Price</label>
                          @if ($errors->has('product_supplyPrice')) <p class="help-block">{{ $errors->first('product_supplyPrice') }}</p> @endif
                          </div>
                        </div>

                        <div class="input-field col s4">
                          <input placeholder="" name="subt" id="subt" readonly type="text">
                          <label for="vat">Mark-Up Price</label>
                        </div>


                        <div class="row">
                          <div class="input-field col s4 @if ($errors->has('product_retailPrice')) red-text text-darken-3 @endif">
                            <input name="product_retailPrice" id="product_retailPrice" type="number" required="" maxlength="40" value="{{ Input::old('product_retailPrice') }}">
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
                          <div class="input-field col s4 @if ($errors->has('product_quantity')) red-text text-darken-3 @endif">
                            <input id="product_quantity" name="product_quantity"  type="number" required="" maxlength="10" value="{{ Input::old('product_quantity') }}">
                            <label for="product_quantity">Quantity</label>
                            @if ($errors->has('product_quantity')) <p class="help-block">{{ $errors->first('product_quantity') }}</p> @endif
                          </div>
                        </div>

                        <div class="input-field col s4 @if ($errors->has('product_reorderPoint')) red-text text-darken-3 @endif">
                          <input id="product_reorderPoint" name="product_reorderPoint"  type="number" required="" maxlength="20" value="{{ Input::old('product_reorderPoint') }}">
                          <label for="product_reorderPoint">Reorder Point</label>
                          @if ($errors->has('product_reorderPoint')) <p class="help-block">{{ $errors->first('product_reorderPoint') }}</p> @endif
                        </div>

                        <div class="row">
                          <div class="input-field col s4 @if ($errors->has('product_reorderAmount')) red-text text-darken-3 @endif">
                            <input id="product_reorderAmount" name="product_reorderAmount"  type="number" required="" maxlength="20" value="{{ Input::old('product_reorderAmount') }}">
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