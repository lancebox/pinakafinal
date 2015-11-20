@extends('template.admintemp')

@section('content')

<div class="container">
  <section>
    <div class="row">
       <div class="input-field col s3">
            <div class="collection">
                <a href="daily" class="collection-item  teal-text text-lighten-1 center-align">Daily</a>
            </div>
          </div>

          <div class="input-field col s2">
            <div class="collection">
                <a href="weekly" class="collection-item active text-lighten-1 white-text center-align">Weekly</a>
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


 <div class="container">
  <section>
    <div class="row">
                <!-- Weekly -->
      
      <div class="row">
      <div class="center">
      <div class="col s6 m6 l6 offset-l3">
        <div class="card green" id="widgetreport">
          <div class="card-content white-text">
            <?php     
              $ddate = Carbon::now();
              $date = new DateTime($ddate);
              $week = $date->format("W");

              $today = $week;
              $yesterday = $week - 1;
              $salesweek = Sale::where('week', $today)->where('year', Carbon::now()->year)->sum('sales_finalTotal'); 
            ?>

            <h4>{{'Sales : ₱ '. $salesweek }}</h4>
          </div>
         </div>
      </div>
    </div>
  </div>
      
      
       <div class="card-panel">
       <table class="bordered striped highlight">
        <thead>
          <tr>
              <th data-field="id">Top 5 Best Selling Products</th>
              <th data-field="name">Quantities Sold</th>
          </tr>
        </thead>

        <tbody>
              <?php     
              $ddate = Carbon::now();
              $date = new DateTime($ddate);
              $week = $date->format("W");

              $today = $week;
              $yesterday = $week - 1;
              $salesweek = DB::table('salesdetail')->where('week', $today)->orderBy('product_quantity', 'DESC')->paginate(5);

            ?>
          <tr>
              @foreach($salesweek as $sale)
              <td>{{ $sale->product_name}}</td>
              <td>{{ $sale->product_quantity}}</td>
          </tr>
             @endforeach
        </tbody>
      </table>
      </div>
<br><br>


                            <!-- Weekly End -->

@stop