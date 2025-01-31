<h1>Editar Enigma</h1>
<form action="{{ route('puzzles.update', $puzzle->id) }}" method="POST">
    @csrf
    @method('PUT')
    <label>Título:</label>
    <input type="text" name="title" value="{{ $puzzle->title }} " required><br><br>

    <label>Descripción:</label>
    <textarea name="description" required>{{ $puzzle->description }}</textarea><br><br>

    <label>Dificultad:</label>
    <select name="difficulty">
        <option value="easy" {{ $puzzle->difficulty == 'easy' ? 'selected' : ''}}>Fácil</option>
        <option value="medium" {{ $puzzle->difficulty == 'medium' ? 'selected' : ''}}>Mediano</option>
        <option value="hard" {{ $puzzle->difficulty == 'hard' ? 'selected' : ''}}>Difícil</option>
    </select><br><br>

    <label>Solución:</label>
    <input type="text" name="solution" value="{{ $puzzle->solution }}"required><br><br>

    <button type="submit">Guardar</button>
</form>