
<br> <!-- Hello from view sofer -->
<br><br>
<div class="container">
<p class="card-title"><strong>1. Status sofer:
<?php
$arr='[]';
$liber=false;
if (($comenziSofer==$arr)||(!isset($comenziSofer))) //aici ar trebui folosita functia status sofer din modelul User
   {echo ' Liber';
    $liber=true;}
else 
   {echo ' Comanda in curs';
   // echo $comenziSofer;
   $liber=false;}

echo ' </strong></p> ';
   echo '<p class="card-title"><strong>2. Comenzi finalizate: <strong>'. $nrcomfinaliz.'</strong></strong></p>';
  
?>

<p class="card-title"><strong>3. Comenzile create azi, preluate deja de soferul logat si nefinalizate:
</strong></p>
<br>
<div class="comenzi_wrapper">
<div class="row" style="flex-wrap:wrap!important;">
   @if (isset($comenziSofer))
   @foreach($comenziSofer as $comanda)
   
  <div class="col-sm-12 col-md-6 mr-3 mb-3">
    <div class="card" style="background-color:antiquewhite;">
      <div class="card-body">
        
        <x-comandaCard :comanda="$comanda"/><br>

         <x-form-status-nou-comanda :comanda="$comanda"/>  
           
      </div>
    </div>
  </div>

   @endforeach
   @endif
</div>
</div> <!--wrapper-->

<br><br>
<p class="card-title"><strong>4. Comenzile Noi create azi:</strong></p>
  <br>
<div class="comenzi_wrapper">
<div class="row" style="flex-wrap:wrap!important;">
   @if (isset($comenziNoi))
   @foreach($comenziNoi as $comanda)
   
  <div class="col-sm-12 col-md-6 mr-3 mb-3">
    <div class="card" style="background-color:antiquewhite;">
      <div class="card-body">
      <x-comandaCard :comanda="$comanda"/><br>
     
        <form method="post" action="/preia_comanda">
            @csrf
            <input type="hidden" name="comid" id="comid" value='{{$comanda->id}}'>
            <button type="submit" class="btn btn-primary  <?php if ($liber==false) echo 'disabled'; ?>">
            Preia comanda</button>
         </form>  
      
    
    </div>
    </div>
  </div>

   @endforeach
   @endif
</div>
</div> <!--wrapper-->

<br><br>
<p class="card-title"><strong>5.Comenzile create azi, preluate deja de soferul logat si finalizate:
   </strong></p>  
<br>
<div class="comenzi_wrapper">
<div class="row" style="flex-wrap:wrap!important;">
   @if (isset($comenziFinalizateSofer))
   @foreach($comenziFinalizateSofer as $comanda)
   
  <div class="col-sm-12 col-md-6 mr-3 mb-3">
    <div class="card" style="background-color:antiquewhite;">
      <div class="card-body">
        <x-comandaCard :comanda="$comanda"/><br>
        @if ($liber==false)   <x-form-status-nou-comanda :comanda="$comanda"  :disableBtn=true />  
        @else 
        <x-form-status-nou-comanda :comanda="$comanda"/> 
        @endif
      </div>
    </div>
  </div>

   @endforeach
   @endif
</div>
</div> <!--wrapper-->
</div><!--container-->