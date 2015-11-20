@extends('template.cashiertemp')

@section('content')

<script type="text/javascript" src="https://code.jquery.com/jquery-1.8.3.min.js"></script>
<!-- cash tender start --> 
<script >
        $(document).ready(function() {
            //this calculates values automatically 
            sum();
            $("#num1, #num2").on("keydown keyup", function() {
                sum();
            });
        });

        function sum() {
                    var num1 = document.getElementById('num1').value;
                    var num2 = document.getElementById('num2').value;
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

<br> 
<br>
<div class="container" ng-controller="AirplanesCtrl">
<form id="cart" method="POST" action="/AddtoCart">
  <div class="row">
    <div class="input-field col s6 @if ($errors->has('product_name')) red-text text-darken-3 @endif">
      <h5>Product</h5>
      <input autocomplete="off" name="product_name" required="" id="product_name" rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.css" placeholder="Search" type="text" ng-model="selectedAirplane" typeahead="airplane as airplane.product_name for airplane in getAirplane($viewValue) | filter:$viewValue | limitTo:3" typeahead-template-url="templates/airplane-tpl.html">
      @if ($errors->has('product_name')) <p class="help-block">{{ $errors->first('product_name') }}</p> @endif
    </div>
                
    <div class="input-field col s2 @if ($errors->has('product_quantity')) red-text text-darken-3 @endif">
      <h5>Quantity</h5>
      <input  autocomplete="off" name="product_quantity" required=""id="product_quantity" type="number" min="1" max="200">
      @if ($errors->has('product_quantity')) <p class="help-block">{{ $errors->first('product_quantity') }}</p> @endif
    </div>
    
    <br><br><br>
     &nbsp&nbsp&nbsp&nbsp&nbsp  
    <button class="waves-effect waves-light btn teal lighten-1" onclick="AddCart">Add</button>
  </div>
</form>

  <table class ="card-panel bordered">                            <!-- Table -->
    <div class="row">
      <thead>
        <tr>
          <th data-field="product">Product</th>
          <th data-field="Price">Price</th>
          <th data-field="Quantity">Quantity</th>
          <th data-field="Total">Total</th>
          <th data-field="Delete">Action</th>

        </tr>
      </thead>

      <tbody>
        <tr>
          @foreach (Cart::contents() as $product)
         
            <td>{{ $product->name }}</td>
            <td>{{ '₱ '.$product->price }}</td>
            <td>
          <div  id="item" class="row">
         
                  <div class="input-field col s6">
                <form id="edit" method="POST" action="/EditItem">
                  <input id="quantity" type="number" value="{{ $product->quantity }}" name="quantity" min="1" max="1000">
                  <input type="hidden" value="{{$product->identifier}}" name="identity">
                  </div>
                  <br>
                  <button class="btn btn-floating" type="submit"><i class="material-icons">done</i></button>
                  </div>
                    </div>
                    </form>
              
                    </div>
                </td>
                <td>{{ '₱ '.$product->total() }}</td>
                <td>
                <form id="delete" method="POST" action="/RemoveItem">
                  <input type="hidden" value="{{$product->identifier}}" name="identity">
                  <button class="btn-floating" type="submit"><i class="material-icons">delete</i></button>
                  </form>
                </td>
        
        </tr>
           @endforeach                  
      </tbody>
    </div>

  </table> 
  <br>
  <br>
  <div class="right">
    <form method="post" action="/pay">

    <table class="card-panel bordered">
      <tbody>
          <td>Total</td>
          <td>{{ '₱ '.Cart::total()}} </td>
          <td></td>
        </tr>
        <tr>
          <td><br>Cash Tendered</td>
          <td>
            <div class="row">
            <div class="input-field col s12">
              <input type="text" required=" "name="num2" id="num2" />
            </div>
            </div>
            </div>
          </td>              
        </tr>
        <tr>
          <td>Change</td>
          <td>
          <input type="text" name="subt" id="subt" readonly />
          <input type="hidden" name="num1" id="num1" value="{{Cart::total()}}" />
          </td> 
        </tr>
        <tr>
          <div class="row">
          <div class="col s6 offset-s6">
          <td>
            <button type="submit" class="waves-effect waves-light btn teal lighten-1"><i class="material-icons right"></i>Pay</button>
            </form> 
          </td>
          </div>
          </div>
          
          <td>
          <form method="post" action="/void">
          <button href="/void" class="waves-effect waves-light btn teal lighten-1"><i class="material-icons right"></i>Void</button>   
          </form>
          </td>

        </tr>
      </tbody>
    </table>
  </div>
</div>


           
@stop
