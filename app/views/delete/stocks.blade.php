@extends('template.admintemp')

@section('content')

 

  <div class="container">
  <section>
    <div class="row">

          <div class="input-field col s3">
            <div class="collection">
                <a href="/dashboard/daily" class="collection-item teal-text text-lighten-1  center-align">Daily</a>
            </div>
          </div>

          <div class="input-field col s2">
            <div class="collection">
                <a href="/dashboard/weekly" class="collection-item teal-text text-lighten-1 center-align">Weekly</a>
            </div>        
          </div>

          <div class="input-field col s2">
            <div class="collection">
                <a href="/dashboard/monthly" class="collection-item teal-text text-lighten-1 center-align">Monthly</a>
            </div>        
          </div>

          <div class="input-field col s2">
            <div class="collection">
                <a href="/dashboard/stocks" class="collection-item active teal lighten-1 white-text center-align">Stocks</a>
            </div>        
          </div>

          <div class="input-field col s3">
            <div class="collection">
                <a href="/dashboard/shelflife" class="collection-item teal-text text-lighten-1 center-align">Shelf life</a>
            </div>        
          </div>
    </div>
  </section>
</div>
                   
<div class="container">
  <section>
   <div id="test4" class="col s12">                    <!-- Stocks -->
    <table class="bordered striped highlight">
        <thead>
          <tr>
              <th data-field="id">Product Name</th>
              <th data-field="name">Product Status</th>
               <th data-field="name">Quantity</th>
          </tr>
        </thead>
        <?php
                        $products= DB::table('product')
                                    ->orderBy('id', 'ASC')
                                    ->paginate(4);
                        ?>
        <tbody>
          <tr>

                                    @foreach($products as $product)
                                                @if ($product->product_reorderPoint >= $product->product_quantity)
                                      <td>{{ $product->product_name }}</td>
                                      <td style="color:red;">Critical Level</td>
                                      @if ($product->product_quantity < 1)
                                       <td> 0 </td>
                                      @else 
                                      <td>{{ $product->product_quantity }} </td>
                                      @endif
        </tr>
              @endif
        @endforeach
  
        </tbody>
      </table>
    </div>
    </section>
    </div>       
                                 <!-- Stocks End -->

@stop