<div class="card">
  <div class="card-header">
    <input wire:model.debounce.800ms="search" type="text" class="form-control" placeholder="Ingrese el nombre o el correo electrónico del Usuario">
  </div>

  @if ($users->count())
    <div class="card-body">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Correo Electrónico</th>
            <th colspan="2">Acciones</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($users as $user)
            <tr>
              <td scope="row">{{ $user->id }}</td>
              <td>{{ $user->name }}</td>
              <td>{{ $user->email }}</td>
              <td width="10px">
                <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-primary btn-sm">Editar</a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>

    <div class="card-footer">
        {{ $users->links() }}
    </div> 
  @else
    <div class="card-body">
      <strong>No hay ningún registro</strong>
    </div>
  @endif
</div>