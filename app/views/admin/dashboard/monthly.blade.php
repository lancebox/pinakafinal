@extends('template.admintemp')

@section('content')

<div class="container">
  <section>
    <div class="row">
        <div class="input-field col s3">
            <div class="collection">
                <a href="daily" class="collection-item teal-text  text-lighten-1  center-align">Daily</a>
            </div>
          </div>

          <div class="input-field col s2">
            <div class="collection">
                <a href="weekly" class="collection-item teal-text text-lighten-1 center-align">Weekly</a>
            </div>        
          </div>

          <div class="input-field col s2">
            <div class="collection">
                <a href="monthly" class="collection-item active teal-lighten text-lighten-1 white-text center-align">Monthly</a>
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



    <div class="container">                    <!-- Monthly -->
      <section>
      <div class="row">
      <div class="row">
      <div class="col s6 m6 l6">
        <div class="card blue-grey darken-1" id="widgetreport">
          <div class="card-content white-text">
            <?php 
                  $today = Carbon::now()->month;
                  $yesterday = Carbon::now()->subMonth()->month;
                  $salesmonth = Sale::where('month', $today)->where('year', Carbon::now()->year)->sum('sales_finalTotal');
            ?>
            
            <h4>{{ 'Sales : ₱ '.$salesmonth }}</h4>
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
              <th data-field="name">Quantities Sold</th>
          </tr>
        </thead>

        <tbody>
          <?php  

                  $today = Carbon::now()->month;
                  $salesmonth = DB::table('salesdetail')->where('month', $today)->orderBy('product_quantity', 'DESC')->paginate(5);
            ?>
          <tr>
            @foreach ($salesmonth as $sale)
            <td>{{ $sale->product_name }}</td>
            <td>{{ $sale->product_quantity }}</td>

          </tr>
          @endforeach
   
        </tbody>
      </table>
    </div>
<br><br>
<div class="card-panel">
<table class="bordered striped highlight">
        <thead>
          <tr>
              <th data-field="id">Top 3 Slow Moving Items</a></th>
              <th data-field="name">Quantities Sold</th>
          </tr>
        </thead>

        <tbody>
          <tr>
            <td>Blue</td>
            <td>5</td>
          </tr>
          <tr>
            <td>Puso ni lance</td>
            <td>2</td>
          </tr>
          <tr>
            <td>Elaine</td>
            <td>0</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
  </section>
    </div>                                               <!-- Monthly End -->
@stop