@extends('template.admintemp')

@section('content')


<div class="container">
  <section>
    <div class="row">

  <div class="input-field col s3">
            <div class="collection">
                <a href="daily" class="collection-item teal-text text-lighten-1 center-align">Daily</a>
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
               <a href="shelf life" class="collection-item active teal lighten-1 white-text center-align">Shelf life</a>
            </div>        
          </div>
                   
                      

    </div>
  </section>
</div>

<div class="container col s12 l12 m12">
    <div class="card material-table">
      <div class="table-header">
        <span class="table-title"><div class="teal-text text-lighten-1 flow-text"><strong>Shelf Life</strong></div></span>
        <div class="actions">
          <a href="#" class="search-toggle waves-effect btn-flat nopadding"><i class="material-icons">search</i></a>
        </div>
      </div>
      <table id="datatable">
        <thead>
          <tr>
              <th data-field="id">Product Name</th>
              <th data-field="name">Expiration Date</th>     
              <th data-field="name">Product Status</th>    
          </tr>
        </thead>
        <?php $products = Product::where('product_type','1')->paginate();?>
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
  </div>   

@stop