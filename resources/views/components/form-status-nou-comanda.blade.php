<form method="post" action="/modifica_status_comanda">
            @csrf
            <div class="form-group">
              <label for="statusnou">Status nou</label>
              <select class="form-control form-select" name='statusnou' id="statusnou">
                <option <?php if ($comanda->status=='Comanda preluata') { echo 'selected';} ?>>
                Comanda preluata</option>
                <option <?php if ($comanda->status=='Pe drum spre restaurant 1') { echo 'selected';} ?>>
                Pe drum spre restaurant 1</option>
                <option <?php if ($comanda->status=='La restaurant 1') { echo 'selected';} ?>>
                La restaurant 1</option>
                <option <?php if ($comanda->status=='Pe drum spre client') { echo 'selected';} ?>>
                Pe drum spre client</option>
                <option <?php if ($comanda->status=='La client - Comanda predata') { echo 'selected';} ?>>
                La client - Comanda predata</option>
                <option <?php if ($comanda->status=='La client - Comanda returnata') { echo 'selected';} ?>>
                La client - Comanda returnata</option>
                <option <?php if ($comanda->status=='Pe drum spre restaurant 2') { echo 'selected';} ?>>
                Pe drum spre restaurant 2</option>
                <option <?php if ($comanda->status=='La restaurant 2') { echo 'selected';} ?>>
                La restaurant 2</option>
                <option <?php if ($comanda->status=='Comanda finalizata') { echo 'selected';} ?>>
                Comanda finalizata</option>
              </select>
            </div>
            <input type="hidden" name="comid" id="comid" value='{{$comanda->id}}'>
            <br>
            <button type="submit" class="btn btn-primary <?php if ($disableBtn==true) echo 'disabled'; ?>"> Modifica status comanda</button>
         </form>  