@extends('template.cashiertemp')

@section('content')


<!-- Start -->
<div class="container">
  <section>
    <div class="row">
      <div class="input-field col s3">
        <select>
          <option value="" disabled selected>Category</option>
          <option value="1">Dog Food</option>
          <option value="2">Cat Food</option>
          <option value="3">Vitamins</option>
        </select>
      </div>
      <!-- Search -->
      <form>
        <div class="input-field col s3">
          <input placeholder="Search" type="text" id="search-field" maxlength="">
        </div>
      </form>                                      
      <br>
      <div class="row">
        <a class="btn-floating btn blue darken-4"><i class="material-icons">search</i></a>
      </div>        
                                                      <!-- Search End -->      
      <table class ="striped bordered centered">                            
        <div class="row">
          <div class="row">
            <thead>
              <tr>
                <th data-field="buttons"></th>
                <th data-field="id">Product</th>
                <th data-field="brand">Brand</th>
                <th data-field="supplier">Supplier</th>
                <th data-field="price">Item Price</th>
                <th data-field="quantity">Quantity</th>
                <th data-field="batch">Batch No.</th>
                <th data-field="expiration">Expiration Date</th>
              </tr>
            </thead>

            <tbody>
              <form action="#"> 
                <p>
                  <tr>
                    <td> 
                    <input  class=""name="group1" type="radio" id="test1" />
                    <label for="test1"></label>
                    </td>
                    <td>Dog Food</td>
                    <td>Alpo</td>
                    <td>Arvince</td>
                    <td>$7</td>
                    <td>150</td>
                    <td>0069</td>
                    <td>02/09/2016</td>
                  </tr>
                </p>
              </form>
            </tbody>
          </div>
        </div>
      </table>
      <!-- END Products Table -->                                    
    </div>
  </section>
</div>

@stop