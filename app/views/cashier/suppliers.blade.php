@extends('template.cashiertemp')

@section('content')


<!-- Start -->
<div class="container">
  <section>
    <div class="row">
      
                                                      <!-- Search End -->     
  

<div class="container col col s12 l12 m12">
    <div class="card material-table">
      <div class="table-header">
        <span class="table-title"><div class="teal-text text-lighten-1 flow-text"><strong>Suppliers</strong></div></span>
        <div class="actions">
          <a href="#" class="search-toggle waves-effect btn-flat nopadding"><i class="material-icons">search</i></a>
        </div>
      </div>
      <table id="datatable">
        <thead>
              <tr>
                  <th data-field="brand">Name</th>
                  <th data-field="price">Email</th>
                  <th data-field="quantity">Mobile</th>
                  <th data-field="quantity">Address</th>
              </tr>
            </thead>

            <?php $suppliers = Supplier::all();?>
            <tbody>
                <form action="#"> 
                  <p>
                      <tr>
                        @foreach($suppliers as $supplier)
                        <td>{{$supplier->supplier_name}}</td>
                        <td>{{$supplier->supplier_email}}</td>
                        <td>{{$supplier->supplier_contactNo}}</td>
                        <td>{{$supplier->supplier_address}}</td>
                      </tr>   
                      @endforeach     
                  </p>
                </form>
                </tbody>
</table>
    </div>
  </div> 

@stop