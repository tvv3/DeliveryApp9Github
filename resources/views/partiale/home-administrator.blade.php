<!--br> Hello from view administrator-->
<?php 

if (isset($_GET['doiSbm'])) {$_SESSION['pageAdm']='doi';}
if (isset($_GET['treiSbm'])) {$_SESSION['pageAdm']='trei';} 
if (isset($_GET['patruSbm'])) {$_SESSION['pageAdm']='patru';}
if (isset($_GET['unuSbm'])) {$_SESSION['pageAdm']='unu';} 
if (isset($_GET['cinciSbm'])) {$_SESSION['pageAdm']='cinci';}

?>
<br><br>
<nav>
  <div class="nav nav-tabs" id="nav-tab" role="tablist">

    <form method="get">
    <button name="doiSbm" class="nav-link <?php if ($_SESSION['pageAdm']=='doi') echo 'active';?>" id="nav-doi-tab" 
    data-bs-toggle="tab" data-bs-target="#nav-doi" type="submit" role="tab" 
    aria-controls="nav-doi" aria-selected="<?php if ($_SESSION['pageAdm']=='doi') echo 'false'; else echo 'true';?>">
    Comenzi</button>
    </form>

    <form method="get">
    <button name="treiSbm" class="nav-link <?php if ($_SESSION['pageAdm']=='trei') echo 'active';?>" id="nav-trei-tab" 
    data-bs-toggle="tab" data-bs-target="#nav-trei" type="submit" role="tab" 
    aria-controls="nav-trei" aria-selected="<?php if ($_SESSION['pageAdm']=='trei') echo 'false'; else echo 'true';?>">Restaurante</button>
    </form>
    
    <form method="get">
    <button name="patruSbm" class="nav-link <?php if ($_SESSION['pageAdm']=='patru') echo 'active';?>" id="nav-patru-tab" 
    data-bs-toggle="tab" data-bs-target="#nav-patru" type="submit" role="tab" 
    aria-controls="nav-patru" aria-selected="<?php if ($_SESSION['pageAdm']=='patru') echo 'false'; else echo 'true';?>">Soferi</button>
    </form>
    
    <form method="get">
    <button name="unuSbm" class="nav-link <?php if ($_SESSION['pageAdm']=='unu') echo 'active';?>" id="nav-unu-tab" 
    data-bs-toggle="tab" data-bs-target="#nav-unu" type="submit" role="tab" 
    aria-controls="nav-unu" aria-selected="<?php if ($_SESSION['pageAdm']=='unu') echo 'false'; else echo 'true';?>">Utilizatori fara rol</button>
</form>

<form method="get">
    <button name="cinciSbm" class="nav-link <?php if ($_SESSION['pageAdm']=='cinci') echo 'active';?>" id="nav-cinci-tab" 
    data-bs-toggle="tab" data-bs-target="#nav-cinci" type="submit" role="tab" 
    aria-controls="nav-cinci" 
     aria-selected="<?php if ($_SESSION['pageAdm']=='cinci') echo 'false'; else echo 'true';?>">Inregistreaza utilizator nou</button>
</form>
    </div>
</nav>
<div class="tab-content" id="nav-tabContent">

  <div class="tab-pane fade <?php if ($_SESSION['pageAdm']=='doi') echo 'show active';?>" id="nav-doi" role="tabpanel" aria-labelledby="nav-doi-tab"> <?php /*$_SESSION['pageAdm']='doi';*/ ?>  @include('/partiale/home-adm-comenzi')</div>
  <div class="tab-pane fade <?php if ($_SESSION['pageAdm']=='trei') echo 'show active';?>" id="nav-trei" role="tabpanel" aria-labelledby="nav-trei-tab">  @include('/partiale/home-adm-restaurante')</div>
  <div class="tab-pane fade <?php if ($_SESSION['pageAdm']=='patru') echo 'show active';?>" id="nav-patru" role="tabpanel" aria-labelledby="nav-patru-tab"> <?php /*$_SESSION['pageAdm']='patru';*/ ?>  @include('/partiale/home-adm-soferi')</div>
  <div class="tab-pane fade <?php if ($_SESSION['pageAdm']=='unu') echo 'show active';?>" id="nav-unu" role="tabpanel" aria-labelledby="nav-unu-tab"> <?php /*$_SESSION['pageAdm']='unu';*/ ?>  @include('/partiale/home-adm-utilizatori-fara-rol',['usersNoRole'=>$usersNoRole, 'comenzi'=>$comenzi,'restaurante'=>$restaurante,'soferi'=>$soferi])</div>
  <div class="tab-pane fade <?php if ($_SESSION['pageAdm']=='cinci') echo 'show active';?>" id="nav-cinci" role="tabpanel" aria-labelledby="nav-cinci-tab">
  <?php /*$_SESSION['pageAdm']='cinci';*/ ?>  
  @include('partiale/home-adm-register')
  </div>
 
</div>
<br><br>
