<?php 
      if (!isset($comanda->status)) { echo 'bg-danger danger1';}
      else if ($comanda->status=='Comanda noua') 
     {
         if (!isset($comanda->sofer)) {echo 'bg-primary';} else {echo 'bg-danger danger2';}
     } 
     else if (
     ($comanda->status=='Comanda preluata') || ($comanda->status=='Pe drum spre restaurant 1') 
     || ($comanda->status=='La restaurant 1') || ($comanda->status=='Pe drum spre client')
     || ($comanda->status=='La client - Comanda predata') || ($comanda->status=='La client - Comanda returnata') 
     || ($comanda->status=='Pe drum spre restaurant 2') || ($comanda->status=='La restaurant 2')
     )
     {
      if (isset($comanda->sofer)) {echo 'bg-success';} else {echo 'bg-danger danger3';}
     }
     else if ($comanda->status=='Comanda finalizata') 
     {
      if (isset($comanda->sofer)) {echo 'bg-dark';} else {echo 'bg-danger danger4';}
     }
     else  {echo 'bg-danger danger5';} 
     ?>