
<x-title-adm title="Restaurantele:"/>

<?php
foreach ($errors->all() as $message) {
    //
    echo '<div class="alert alert-danger" role="alert">'.$message.'</div><br>';
}
?>

<div class="container wrapper">
@foreach($restaurante as $user)
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
            <div class="col-md-6">
            <input type="password" name="parolaNoua" placeholder="Parola noua"> <br><br>
                         
           </div>
       <button type="submit" class="btn btn-primary" >Salveaza noua parola</button>
      </form>
      <br>
      <small>
         <?php
            echo 'Comenzi nefinalizate restaurant (id & status comanda & sofer) create azi: ';
            $comenziInCursRestaurant=$user->comenziNefinalizateRestaurantAzi2;
            if (isset($comenziInCursRestaurant))
            {
            forEach($comenziInCursRestaurant as $comanda)
            {
                echo '<div style="padding: 0 10px;margin-bottom:10px;" class="text-light ';
                ?>
                @include('partiale\script-culoare-comanda')
                <?php
                echo '">';
                echo '<br> id='.$comanda->id.
                ' cu statusul = '.$comanda->status. ' - sofer alocat: ';
                if (isset($comanda->sofer)) {echo '<strong>'. $comanda->sofer->name.'</strong>';}
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