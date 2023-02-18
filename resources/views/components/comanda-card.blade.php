<div>
    <!-- Waste no more time arguing what a good man should be, be one. - Marcus Aurelius -->

      <p class="card-title"><strong>Comanda:</strong> {{$comanda->id}}</p>
      <p class="card-text p-3 text-light @include('partiale/script-culoare-comanda')
     ">
     @if($showRestaurantName==true)
     <span class="labelSpan">Restaurant:</span> {{$comanda->restaurant->name}}<br>
     @endif
     <small>
     <span class="labelSpan">Status:</span> {{$comanda->status}}<br>
       <?php
            echo '<span class="labelSpan">Sofer alocat:</span> ';
            if (isset($comanda->sofer)) {echo $comanda->sofer->name;}
            else {echo 'Fara sofer';}
         ?>
       <br>  
       
       <span class="labelSpan">Descriere:</span> {{$comanda->descriere}}
       </small>

</div>