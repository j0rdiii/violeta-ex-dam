<h1>Lista de Enigmas</h1>
<a href="{{ route('puzzles.create') }}">Añadir Enigma</a>

<ul>
    @foreach ($puzzles as $puzzle)
    <li>
        <strong>{{ $puzzle->title }} </strong> ({{ $puzzle->difficulty }})
        <a href="{{ route('puzzles.show', $puzzle->id) }}">Ver</a>
        <a href="{{ route('puzzles.edit', $puzzle->id) }}">Editar</a>
        <form action="{{ route('puzzles.destroy', $puzzle->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit">Eliminar</button>
        </form>
    </li>
    @endforeach
</ul>