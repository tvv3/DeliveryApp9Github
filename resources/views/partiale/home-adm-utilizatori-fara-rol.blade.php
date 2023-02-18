

<x-title-adm title="Utilizatorii fara rol:"/>
<div class="container wrapper">
@foreach($usersNoRole as $user)
<div class="row mb-3">
<div class="card col-sm-12">
    <div class="card-body">
      <h5 class="card-title">{{$user->name}}</h5>
      <p class="card-text">{{$user->email}}</p>
    </div>
    <div class="card-footer">
      <small>
          <form method="post" action=" /create_role">
              @csrf
          <select class="form-select" aria-label="Rol utilizator" name="role">
            <option value="restaurant23">Restaurant</option>
            <option value="sofer23">Sofer</option>
            </select>
            <br>
          <input type="hidden" name="user_id" value='{{$user->id}}'>
          <button class="btn btn-primary" type="submit">Salveaza</button>
          </form>
      </small>
    </div>
  </div>
</div>
@endforeach
</div>
