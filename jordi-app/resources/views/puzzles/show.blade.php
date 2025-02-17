<h1>Detalles del Enigma</h1>

<p><strong>Título:</strong> {{ $puzzle->title }}</p>
<p><strong>Descripción:</strong> {{ $puzzle->description }}</p>
<p><strong>Dificultad:</strong> {{ $puzzle->difficulty }}</p>
<p><strong>Estado:</strong> {{ $puzzle->is_solved ? 'Resuelto' : 'No resuelto' }}</p>
<p><strong>Solución:</strong> {{ $puzzle->solution}}</p>

<a href="{{ route('puzzles.index') }}">Volver a la lista</a>
<a href="{{ route('puzzles.edit', $puzzle->id ) }}">Editar</a>
<form action="{{ route('puzzles.destroy', $puzzle->id) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit">Eliminar</button>
</form>