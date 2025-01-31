<h1>Añadir Enigma</h1>
<form action="{{ route('puzzles.store') }}" method="POST">
    @csrf
    <label>Título:</label>
    <input type="text" name="title" required><br><br>
    <label>Descripción:</label>
    <textarea type="name" name="description" required></textarea><br><br>
    <label>Dificultad: </label>
    <select name="difficulty">
        <option value="easy">Fácil</option>
        <option value="medium" selected>Mediano</option>
        <option value="hard">Difícil</option>
    </select><br><br>
    <label>Solución:</label>
    <input type="text" name="solution" required><br><br>
    <button type="submit">Guardar</button>
</form>