@extends('template.admintemp')

@section('content')


<div class="container">
  <section>
    <div class="row">

  <div class="input-field col s3">
            <div class="collection">
                <a href="/dashboard/daily" class="collection-item teal-text text-lighten-1 center-align">Daily</a>
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
                <a href="/dashboard/stocks" class="collection-item teal-text text-lighten-1 center-align">Stocks</a>
            </div>        
          </div>

          <div class="input-field col s3">
            <div class="collection">
               <a href="/dashboard/shelflife" class="collection-item active teal lighten-1 white-text center-align">Shelf life</a>
            </div>        
          </div>
                   
                      

    </div>
  </section>
</div>

<div class="container">
	<section>
 <div id="test5" class="col s12">           <!-- Shelf life -->
      <table class="bordered striped highlight">
        <thead>
          <tr>
              <th data-field="id">Product Name</th>
              <th data-field="name">Expiration Date</th>     
          </tr>
        </thead>
                     <?php
                        $products= DB::table('product')
                                    ->orderBy('id', 'ASC')
                                    ->where('product_type', '=','1')
                                    ->paginate(4);
                        ?>
        <tbody>   
          <tr>  
             @foreach ($products as $product)
                <td>{{ $product->product_name}} </td> 
                <td>{{ $product->product_expiration}} </td> 
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    </div>                         <!-- Shelf life end -->
  </div>
 </div>

  
  </div>
</section>
</div>

@stop