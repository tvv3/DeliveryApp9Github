
<x-title-adm title="Comenzile create pana azi inclusiv:"/>
<div class="container wrapper">
@foreach($comenzi as $comanda)

<div class="row mb-3">
<div class="card col-sm-12">
<div class="card-body">
<x-comandaCard :comanda="$comanda"/>
</div>
</div>
</div>
@endforeach
</div>