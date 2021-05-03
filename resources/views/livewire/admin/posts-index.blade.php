<div class="card">
    
    <div class="card-body">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th colspan="2">Acciones</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($posts as $post)
            <tr>
              <td scope="row">{{ $post->id }}</td>
              <td>{{ $post->name }}</td>
              <td width="10px">
                <a href="{{ route('admin.posts.edit', $post) }}" class="btn btn-primary btn-sm">Editar</a>
              </td>
              <td width="10px">
                <form action="{{ route('admin.posts.destroy', $post) }}" method="POST">
                  @csrf
                  @method('delete')

                  <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                </form>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>

    <div class="card-footer">
        {{ $posts->links() }}
    </div>
  </div>