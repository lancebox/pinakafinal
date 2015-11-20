@extends('template.cashiertemp')

@section('content')


<div class="container">
  <section>
    <div class="row">
          <div class="input-field col s2">
            <div class="collection">
                <a href="/np" class="collection-item teal-text text-lighten-1 center-align">Non-Perishable</a>
            </div>
          </div>
          <div class="input-field col s2">
            <div class="collection">
                <a href="/p" class="collection-item active teal lighten-1 white-text center-align">Perishable</a>
            </div>        
          </div>

          <div class="input-field col s3"></div>
    
    
      <!-- START Products Table -->
     <div class="container col col s12 l12 m12">
    <div class="card material-table">
      <div class="table-header">
        <span class="table-title"><div class="teal-text text-lighten-1 flow-text"><strong>Perishable</strong></div></span>
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
                  </tr>
                </thead>
                  <?php $products = DB::table('product')->where('product_type', '=','1')->paginate();?>
                <tbody>
                  <p>
                    <tr>
                        @foreach($products as $product)
                        <td>{{ $product->product_name }}</td>
                        <td>{{ $product->product_supplier }}</td>
                        <td>{{ $product->product_retailPrice }}</td>
                        <td>{{ $product->product_quantity }}</td>
                     </tr>
                        @endforeach
                  </p>
                </tbody>
</table>
    </div>
  </div> 
          

    </div>
  </section>
</div>


@stop