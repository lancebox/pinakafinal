@extends('template.admintemp')

@section('content')
<div class="container">
  <section>
    <div class="row">
          <div class="input-field col s3">
            <div class="collection">
                <a href="/dashboard/daily" class="collection-item active teal lighten-1 white-text center-align">Daily</a>
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
                <a href="/dashboard/shelflife" class="collection-item teal-text text-lighten-1 center-align">Shelf life</a>
            </div>        
          </div>
                      

    </div>
  </section>
</div>



<div class="container">
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
  </div>

<br><br>
<div class="container">
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
<div>


@stop