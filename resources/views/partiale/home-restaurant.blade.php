<br> <!--Hello from view restaurant-->

<div class="container">
<p class="card-title"><strong>1. Formular creare comanda noua:</strong></p>
<form method="post" action="/create_comanda">
    @csrf
    <div class="mb-3">
       <label for="descriere" class="form-label">Descriere (optional)</label>
         <textarea class="form-control" name="descriere" id="descriere" rows="3"></textarea>
     </div>
    <button type="submit" class="btn btn-primary">Creare comanda noua</button>
 </form>

 </div>

 <br><br>

 <div class="container comenzi-wrapper">

<p class="card-title"><strong>2. Comenzile create azi de restaurantul conectat:</strong></p>
<div class="row" style="flex-wrap:wrap!important;">
   @if (isset($comenzi))
   @foreach($comenzi as $comanda)
   
  <div class="col-sm-12 col-md-6 mr-3 mb-3">
    <div class="card" style="background-color:antiquewhite;">
      <div class="card-body">
        
         <x-comandaCard :comanda="$comanda" :showRestaurantName=false/><br>
         <form method="post" action="{{ route('delete_comanda', $comanda->id)}}" id= "{{'formDeleteComanda'.$comanda->id}}">
           @csrf
           @method("DELETE")
         <button type="button" class="@if($comanda->status!='Comanda noua') {{__('btn btn-primary disabled')}}
           @else {{__('btn btn-primary')}} @endif"
          onclick='check_sterge_comanda("{{$comanda->id}}")'
         
         >Sterge</button>
         </form>

      </div>
    </div>
  </div>

   @endforeach
   @endif
</div>
<script>
  function check_sterge_comanda(id_comanda)
  {
  let result = window.confirm("Doriti sa stergeti comanda cu id = "+id_comanda+" ? ");
  if (result)
  { 
   form1= document.getElementById("formDeleteComanda"+id_comanda);
   form1.submit();
  }
  }
</script>
</div> <!--wrapper-->
