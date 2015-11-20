@extends('template.admintemp')

@section('content')


<div class="container">
  <section>
    <div class="row">
          <div class="input-field col s2">
            <div class="collection">
                <a href="np" class="collection-item active teal lighten-1 white-text center-align">Non-Perishable</a>
            </div>
          </div>
          <div class="input-field col s2">
            <div class="collection">
                <a href="p" class="collection-item teal-text text-lighten-1 center-align">Perishable</a>
            </div>        
          </div>
                                   
          <div class="input-field col s3"></div>
     
    
      <!-- START Products Table -->
<div class="container col s12">
    <div class="card material-table">
      <div class="table-header">
        <span class="table-title"><div class="teal-text text-lighten-1 flow-text"><strong>Non-Perishable</strong></div></span>
        <div class="actions">
          <a href="#" class="search-toggle waves-effect btn-flat nopadding"><i class="material-icons">search</i></a>
        </div>
      </div>
      <table id="datatable">
        <thead>
                  <tr>
                    <th data-field="id">Product</th>
                    <th data-field="supplier">Supplier</th>
                    <th data-field="price">Item Price<br>(Php)</th>
                    <th data-field="quantity">Quantity</th>
                    <th data-field="edit">Action</th>
                  </tr>
                </thead>
                  <?php $products = DB::table('product')->where('product_type', '=','0')->paginate();?>
                <tbody>
                  <p>
                    <tr>
                        @foreach($products as $product)
                        <td>{{ $product->product_name }}</td>
                        <td>{{ $product->product_supplier }}</td>
                        <td>{{ $product->product_retailPrice }}</td>
                        <td>
                          {{ $product->product_quantity }}
                        </td>
                        <td>
                          <a class="teal-text text-lighten-1 modal-trigger" data-toggle="modal" href="#AddProductQty{{$product->id}}">Add</button>
                          <a> / </a>
                          <a class="teal-text text-lighten-1 modal-trigger" data-toggle="modal" href="#SubtractProductQty{{$product->id}}">Deduct</button>
                            <a> / </a>
                          <a class="teal-text text-lighten-1 modal-trigger" data-toggle="modal" href="{{ URL::to('np/' . $product->id . '/edit') }}">Edit</button>
                        </td>
                     </tr>
                        @endforeach
                  </p>
                </tbody>
</table>
    </div>
  </div>   
          <div class="input-field col s2 right">
          <a class="waves-effect waves-light btn teal lighten-1 modal-trigger" data-toggle="modal" href="{{ URL::to('np/create') }}">add</a>
          </div>
      <!-- END Products Table -->     


    </div>
  </section>
</div>



<!-- Add NP QTY Product-->
@foreach($products as $product)          
  <div id="AddProductQty{{$product->id}}" class="modal-2 fade modal-fixed-footer">
    <div class="modal-content">
      <h3>Add Quantity</h3>
      {{ Form::model($product,['method' => 'PATCH','route'=>['addDeductProduct.update',$product->id]]) }}
      <div class="center">
        <div class="col-lg-8">
              <div class="row">
                <div class="col s12">

                  <div>
                    <div class="input-field col s4">
                      {{ Form::label('Quantity', 'Quantity') }}
                      {{ Form::text('product_quantity',null, ['required', 'readonly']) }}
                    </div>
                  </div>

                  <div>
                    <div class="input-field col s6"=>
                      {{ Form::label('Add', 'Add') }}
                      {{ Form::number('addProduct',null, ['required', 'class'=>'form-control']) }}
                    </div>
                  </div>
                   <br><br><br><br>
                  <div class="row">
                    <div>
                      <h6>NOTE: Negative values would not be accepted</h6>
                    </div>
                  </div>

                </div>
              </div>

        </div>


    </div>
  </div>

                <!--Modal Footer-->
  <div class="modal-footer grey lighten-3">
    <a href="#!" class=" modal-action modal-close waves-effect waves-red btn-flat">Cancel</a>
    {{ Form::button('Submit', ['class' => 'waves-effect waves-green btn-flat', 'type'=>'submit']) }}
  </div>
  {{ Form::close() }}
</div>
@endforeach 
<!-- Add NP QTY Product-->

<!-- Deduct NP QTY Product-->
@foreach($products as $product)          
  <div id="SubtractProductQty{{$product->id}}" class="modal-2 fade modal-fixed-footer">
    <div class="modal-content">
      <h3>Subtract Quantity</h3>
      {{ Form::model($product,['method' => 'PATCH','route'=>['addDeductProduct.update',$product->id]]) }}
      <div class="center">
        <div class="col-lg-8">
              <div class="row">
                <div class="col s12">

                <div>
                    <div class="input-field col s4">
                      {{ Form::label('Quantity', 'Quantity') }}
                      {{ Form::text('product_quantity',null, ['required', 'readonly']) }}
                    </div>
                  </div>

                  <div>
                    <div class="input-field col s6">
                      {{ Form::label('Subtract', 'Subtract') }}
                      {{ Form::number('deductProduct',null, ['required', 'class'=>'form-control']) }}
                    </div>
                  </div>
                  <br><br><br><br>
                  <div class="row">
                    <div>
                      <h6>NOTE: Negative values would not be accepted</h6>
                    </div>
                  </div>

                </div>
              </div>

        </div>


    </div>
  </div>

                <!--Modal Footer-->
  <div class="modal-footer grey lighten-3">
    <a href="#!" class=" modal-action modal-close waves-effect waves-red btn-flat">Cancel</a>
    {{ Form::button('Submit', ['class' => 'waves-effect waves-green btn-flat', 'type'=>'submit']) }}
  </div>
  {{ Form::close() }}
</div>
@endforeach 
<!-- Deduct NP QTY Product-->
@stop
