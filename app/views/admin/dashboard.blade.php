@extends('template.admintemp')

@section('content')

<!-- START Dashboard Content -->

<br>    
<div class="container">
 <div class="row">
    <div class="col s12">
      <ul class="tabs grey grey-darken-4">
        <li class="tab col s3"><a class="white-text" href="#test1">Daily</a></li>
        <li class="tab col s3"><a class="white-text" href="#test2">Weekly</a></li>
        <li class="tab col s3"><a class="white-text" href="#test3">Monthly</a></li>
        <li class="tab col s3"><a class="white-text" href="#test4">Stocks</a></li>
        <li class="tab col s3"><a class="white-text" href="#test5">Shelf Life</a></li>
      </ul>
    </div>

                                               <!-- Content -->


<div id="test1" class="col s12">                      <!-- Daily -->

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
              <th data-field="id">Top 3 Fast Moving Items</th>
              <th data-field="name">Quantities Sold</th>
          </tr>
        </thead>

        <tbody>
          <tr>
            <td>RH</td>
            <td>145</td>
          </tr>
          <tr>
            <td>Arvince</td>
            <td>69</td>
          </tr>
          <tr>
            <td>Half Pack</td>
            <td>45</td>
          </tr>
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
                                                     <!-- Daily End -->

  
 <div id="test2" class="col s12">                      <!-- Weekly -->
      
      <div class="row">
      <div class="col s6 m6 l6">
        <div class="card blue-grey darken-1" id="widgetreport">
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
              <th data-field="id">Top 3 Fast Moving Items</th>
              <th data-field="name">Quantities Sold</th>
          </tr>
        </thead>

        <tbody>
          <tr>
            <td>RH</td>
            <td>145</td>
          </tr>
          <tr>
            <td>Arvince</td>
            <td>69</td>
          </tr>
          <tr>
            <td>Half Pack</td>
            <td>45</td>
          </tr>
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


                            <!-- Weekly End -->
  

    <div id="test3" class="col s12">                    <!-- Monthly -->
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
              <th data-field="id">Top 3 Fast Moving Items</th>
              <th data-field="name">Quantities Sold</th>
          </tr>
        </thead>

        <tbody>
          <tr>
            <td>RH</td>
            <td>145</td>
          </tr>
          <tr>
            <td>Arvince</td>
            <td>69</td>
          </tr>
          <tr>
            <td>Half Pack</td>
            <td>45</td>
          </tr>
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
    </div>                                               <!-- Monthly End -->

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
                                    ->orderBy('product_quantity', 'ASC')
                                    ->paginate(100);
                        ?>
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
                                 <!-- Stocks End -->


    <div id="test5" class="col s12">           <!-- Shelf life -->
      <table class="bordered striped highlight">
        <thead>
          <tr>
              <th data-field="id">Product Name</th>
              <th data-field="name">Expiration Date</th>     
              <th data-field="name">Product Status</th>    
          </tr>
        </thead>
                     <?php
                        $products= DB::table('product')
                                    ->orderBy('product_expiration', 'ASC')
                                    ->where('product_type', '=','1')
                                    ->paginate(100);            
                        ?>
        <tbody>   
          <tr>  
             @foreach ($products as $product)
             <?php 
                          $convert = $product->product_expiration;
                         $expi = Carbon::parse($convert);
                          $datenow = Carbon::now();
                          $diffInDays = $datenow->diffInDays($expi , false);
             ?>
             @if ($diffInDays <= 0)
                <td>{{ $product->product_name}} </td> 
                <td>{{ $product->product_expiration}} </td> 
                <td style="color:grey;"> Expired </td>
              @elseif ($diffInDays < 15 and $diffInDays < 30 )
                <td>{{ $product->product_name}} </td> 
                <td>{{ $product->product_expiration}} </td> 
                <td style="color:red;"> Will expire in less than 2 weeks </td>
              @elseif ($diffInDays < 30 and $diffInDays < 60)
                <td>{{ $product->product_name}} </td> 
                <td>{{ $product->product_expiration}} </td> 
                <td style="color:red;"> Will Expired in less than 1 month </td> 
              @elseif ($diffInDays < 60 and $diffInDays < 90)
                <td>{{ $product->product_name}} </td> 
                <td>{{ $product->product_expiration}} </td> 
                <td style="color:red;"> Will Expired in less than 2 month </td> 
              @elseif ($diffInDays < 90)
                <td>{{ $product->product_name}} </td> 
                <td>{{ $product->product_expiration}} </td> 
                <td style="color:red;"> Will Expired in less than 3 month </td> 
              @endif
   
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    </div>                         <!-- Shelf life end -->
  </div>
 </div>

<!-- END Dashboard Content -->

@stop