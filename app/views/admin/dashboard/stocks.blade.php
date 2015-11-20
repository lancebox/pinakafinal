@extends('template.admintemp')

@section('content')

 

  <div class="container">
  <section>
    <div class="row">

          <div class="input-field col s3">
            <div class="collection">
                <a href="daily" class="collection-item teal-text text-lighten-1  center-align">Daily</a>
            </div>
          </div>

          <div class="input-field col s2">
            <div class="collection">
                <a href="weekly" class="collection-item teal-text text-lighten-1 center-align">Weekly</a>
            </div>        
          </div>

          <div class="input-field col s2">
            <div class="collection">
                <a href="monthly" class="collection-item teal-text text-lighten-1 center-align">Monthly</a>
            </div>        
          </div>

          <div class="input-field col s2">
            <div class="collection">
                <a href="stocks" class="collection-item active teal lighten-1 white-text center-align">Stocks</a>
            </div>        
          </div>

          <div class="input-field col s3">
            <div class="collection">
                <a href="shelflife" class="collection-item teal-text text-lighten-1 center-align">Shelf life</a>
            </div>        
          </div>
    </div>
  </section>
</div>
                   
  <div class="container col s12 l12 m12">
    <div class="card material-table">
      <div class="table-header">
        <span class="table-title"><div class="teal-text text-lighten-1 flow-text"><strong>Stocks</strong></div></span>
        <div class="actions">
          <a href="#" class="search-toggle waves-effect btn-flat nopadding"><i class="material-icons">search</i></a>
        </div>
      </div>
      <table id="datatable">
        <thead>
          <tr>
              <th data-field="id">Product Name</th>
              <th data-field="name">Product Status</th>
               <th data-field="name">Quantity</th>
          </tr>
        </thead>
        <?php $products = Product::all();?>
        <tbody>
          <tr>

                                    @foreach($products as $product)
                                    <?php
                                        $ROP = $product->product_reorderPoint;
                                        $QTY = $product->product_quantity;
                                        $ROPLow1 = $ROP * 1.01;
                                        $ROPLow = $ROP * 1.35;
                                        $ROPMed1 = $ROP * 1.36;
                                        $ROPMed = $ROP * 1.7;
                                        $ROPHigh = $ROP *1.71;
                                        ?>
                                        @if ($QTY == 0)
                                                        <td>{{ $product->product_name }}</td>
                                                        <td style="color:grey;">Out of Stock</td>
                                                        <td>{{ $product->product_quantity }} </td>
                                         @elseif ($ROP >= $QTY)
                                                        <td>{{ $product->product_name }}</td>
                                                        <td style="color:red;">Critical Level</td>
                                                        <td>{{ $product->product_quantity }} </td>
                                          @elseif ($QTY >= $ROPLow1 and $ROPLow >= $QTY )
                                                        <td>{{ $product->product_name }}</td>
                                                        <td style="color:blue;">Low</td>
                                                        <td>{{ $product->product_quantity }} </td>     
                                        @endif

        </tr>
      
        @endforeach
  
                </tbody>
</table>
    </div>
  </div>    
                                 <!-- Stocks End -->

@stop