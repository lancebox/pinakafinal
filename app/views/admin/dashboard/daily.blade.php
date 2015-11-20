@extends('template.admintemp')

@section('content')
<div class="container">
  <section>
    <div class="row">
          <div class="input-field col s3">
            <div class="collection">
                <a href="daily" class="collection-item active teal lighten-1 white-text center-align">Daily</a>
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
                <a href="stocks" class="collection-item teal-text text-lighten-1 center-align">Stocks</a>
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



<div class="container">                    <!-- Daily -->
<section>
  <div class="row">

  <div class="row">
      <div class="col s6 m6 l6">
        <div class="card blue-grey darken-1" id="widgetreport">
          <div class="card-content white-text">
            <?php  

                   $today = date('Y-m-d', strtotime(Carbon::now()));
                    $yesterday = date('Y-m-d', strtotime(Carbon::now()->subDay()));
                    $sales = Sale::where('sales_date', $today)->sum('sales_finalTotal'); 
            ?>
            <h4>{{ 'Sales : ₱ '. $sales }}</h4>
          </div>
         </div>
      </div>
      
      <div class="col s6 m6 l6">
        <div class="card green darken-1" id="widgetreport">
          <div class="card-content white-text">

            <h4>Profit</h4>
          </div>
         </div>
      </div>
  </div>
  <div class="card-panel">
<table class="bordered striped highlight">
        <thead>
          <tr>
              <th data-field="id">Top 5 Best Selling Products</th>
              <th data-field="name">Quantity</th>
          </tr>
        </thead>

        <tbody>
            <?php  

                   $today = date('Y-m-d', strtotime(Carbon::now()));
                    $sales = DB::table('salesdetail')->where('sales_date',$today)->orderBy('product_quantity', 'DESC')->paginate(5);
            ?>
          <tr>
              @foreach($sales as $sale)
              <td>{{ $sale->product_name}}</td>
              <td>{{ $sale->product_quantity}}</td>
          </tr>
             @endforeach
        </tbody>
      </table>
      </div>
<br><br>
<div class="card-panel">
<table class="bordered striped highlight">
        <thead>
            <?php  

                   $today = date('Y-m-d', strtotime(Carbon::now()));
                    $hstock = DB::table('product')->orderBy('product_quantity', 'DESC')->paginate(5);
            ?>
          <tr>
              <th data-field="id">Top 5 Highest Stock Products</a></th>
              <th data-field="name">Quantities Sold</th>
          </tr>
        </thead>

        <tbody>
          <tr>
             @foreach($hstock as $stock)
              <td>{{ $stock->product_name}}</td>
              <td>{{ $stock->product_quantity}}</td>
          </tr>
             @endforeach
          </tr>
        </tbody>
      </table>  
      </div>
</div>
</section>
</div>
                                                     <!-- Daily End -->


@stop