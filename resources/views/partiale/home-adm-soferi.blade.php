
<?php /*$_SESSION['pageAdm']='patru';*/ ?>
<x-title-adm title="Soferii:"/>
<?php
foreach ($errors->all() as $message) {
    //
    echo '<div class="alert alert-danger" role="alert">'.$message.'</div><br>';
}
?>
<div class="container wrapper">
@foreach($soferi as $user)
<div class="row mb-3">
<div class="card col-sm-12">
    <div class="card-body">
      <h5 class="card-title">{{$user->name}}</h5>
      <p class="card-text">{{$user->email}}</p>
    </div>
    <div class="card-footer">
    <form action="{{route('update_password', $user->id)}}" method="post">
            @csrf 
            @method("PUT")
            <!--@error('parolaNoua')
        <span class="alert alert-danger" role="alert">
             <strong>{{ $message }}</strong>
         </span>
        @enderror-->
       <input type="password" name="parolaNoua" placeholder="Parola noua"><br><br>
       <button type="submit" class="btn btn-primary" >Salveaza noua parola</button>
      </form>
      <br>
      <small>
        
         <?php
            echo 'Status sofer: '. $user->statusSoferAzi();
            echo ' <br> ';
            $com=$user->comenziFinalizateSoferAzi2Count;
            if (!isset($com)) {$nrcomfinaliz=0;}
            else {$nrcomfinaliz=$user->comenziFinalizateSoferAzi2Count;
            }
            echo 'Comenzi finalizate: <strong>'. $nrcomfinaliz.'</strong>';
            echo ' <br> ';
            echo 'Comenzi in curs (id & restaurant) create azi: ';
            $comenziInCursSofer=$user->comandaInCursSoferAzi2;
            if (isset($comenziInCursSofer))
            {
            forEach($comenziInCursSofer as $comanda)
            {
              
              echo '<div style="padding: 0 10px;margin-bottom:10px;" class="text-light ';
              ?>
              @include('partiale\script-culoare-comanda')
              <?php
              echo '">';
            
              echo '<br> id='.$comanda->id.' la restaurantul = <strong>'.
                   $comanda->restaurant->name.'</strong> cu status comanda= '.$comanda->status;
            
              echo '</div>';
            }
            }
            ?>
      </small>
      
    </div>
</div>
</div>
@endforeach
</div>


