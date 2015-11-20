@extends('template.admintemp')

@section('content')

<!-- START Functions -->
<div class="container">
  <br>
  <div class="row">
    <div class="col s2 l2 m2">
      <div class="collection">
        <a href="sales" class="collection-item active teal lighten-1 white-text center-align">Sales</a>
      </div>
    </div>

    <div class="col s2 l2 m2">
      <div class="collection">
        <a href="returns" class="collection-item teal-text text-lighten-1 center-align">Returns</a>
      </div>
    </div>

<!-- END Functions -->

<div class="container col col s12 l12 m12">
    <div class="card material-table">
      <div class="table-header">
        <span class="table-title"><div class="teal-text text-lighten-1 flow-text"><strong>Sales</strong></div></span>
        <div class="actions">
          <a href="#" class="search-toggle waves-effect btn-flat nopadding"><i class="material-icons">search</i></a>
        </div>
      </div>
      <table id="datatable">
        <thead>
        <tr>
          <th data-field="id">Date</th>
          <th data-field="name">User</th>
          <th data-field="id">Invoice No.</th>
          <th data-field="name">Status</th>
          <th data-field="price">Total</th>
          <th data-field="name">Action</th>
        </tr>
      </thead>


      <tbody>
        <tr>
          <?php
            $sales = Sale::all();
            $detail = SaleDetail::all();
            $vat = 0.12;
          ?>
          @foreach($sales as $sale)
          <td>{{ $sale->sales_date }}</td>
          <td>{{ $sale->user_name }}</td>
          <td>{{ $sale->id }}</td>
          <!-- Status td -->
          <?php if ($sale->sales_status == 1): ?>
            <td>
              Closed<br>
              <a class="teal-text text-lighten-1 modal-trigger" data-toggle="modal" href="#changeStatus{{$sale->id}}">Change</button>
            </td>
          <?php elseif ($sale->sales_status == 0): ?>
            <td>
                Returned<br>
                <a class="teal-text text-lighten-1 modal-trigger" data-toggle="modal" href="#changeStatus{{$sale->id}}">Change</button>
            </td>  
          <?php endif; ?>
          <!-- Status td -->
          <td>{{ $sale->sales_finalTotal }}</td>
          <td><a class="teal-text text-lighten-1 modal-trigger" data-toggle="modal" href="#viewSaleDetail{{$sale->id}}">View</a></td>
        </tr>
        @endforeach 
                </tbody>
</table>
    </div>
  </div> 

@stop



<!--View Sale Modal-->
@foreach($sales as $sale)
<div id="viewSaleDetail{{$sale->id}}" class="modal modal-fixed-footer">
  <div class="modal-content">
    <div class="container">
      <div class="col s16 l12 m12 card white lighten-1">
        <div class="col s12 l10 m10 card-content black-text">
        
        <div>
          <br>
          <h6 class="center-align"><b>ASK A VET</b></h6>
          <h6 class="center-align">Animal Medical Hospital</h6>
          <br>
          <h4 class="center-align"><u>Invoice</u></h4>
        </div>

        <div>
          <h6 class="left-align">Invoice Number: {{ $sale->id }}</h6>
          <h6 class="left-align">Date: {{ $sale->created_at }}</h6>
          <h6 class="left-align">Cashier: {{ $sale->user_name }}</h6>
        </div>

        <div>
          <table class="bordered centered">
            <thead>
              <tr>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Price</th>
              </tr>
            </thead>

            <tbody>


             <tr>
                @foreach($detail as $d)
                @if($sale->id == $d->sales_id)
                <td>{{ $d->product_name }}</td>
                <td>{{ $d->product_quantity }}</td>
                <td>{{ $d->product_retailPrice }}</td>
              </tr>
                @endif
                @endforeach
      


       
  
            </tbody>

          </table>
        </div>

        <div class="right">
          <h6><b>Sub total:</b> {{ $sale->sales_cashTender }}</h6>
          <h6><b>VAT:</b>           12%</h6>
          <h6><b>Less VAT:</b>{{ $sale->sales_cashTender * $vat }}</h6>
          <br>
          <h6><b>Cash Rendered: </b>{{$sale->sales_cashTender}} </h6>
          <h6><b>Change: </b>{{ $sale->sales_cashTender - $sale->sales_finalTotal }}</h6>
          <br>
          <br>
          <br>
        </div>
 


        </div>
      </div>
    </div>
  </div>

  <!--Modal Footer-->
  <div class="modal-footer grey lighten-3">
    <a href="#!" class=" modal-action modal-close waves-effect waves-teal btn-flat">Back</a>
    <a href="#!" class=" modal-action modal-close waves-effect waves-teal btn-flat">Print</a>
  </div>
</div>
@endforeach
<!--View Sale Modal-->

<!-- Change Status Modal-->
@foreach($sales as $sale)          
<div id="changeStatus{{$sale->id}}" class="modal-2 fade modal-fixed-footer">
  <div class="modal-content">
    <h4>Change Status</h4>
    {{ Form::model($sale,['method' => 'PATCH','route'=>['changeSaleStatus.update',$sale->id]]) }}
    <div class="center">
      <div class="col-lg-8">
        <div class="row">
          <div class="col s12">

            <div>
              <div class="input-field col s12">
                {{ Form::select('sales_status', array('1' => 'Closed', '0' => 'Returned')); }}
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
<!-- Change Status Modal-->




