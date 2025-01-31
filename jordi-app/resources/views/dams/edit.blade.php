<h1> Editar asignatura </h1>

<form action="{{ route('dams.update', $dam->id) }}" method="post">

@csrf
@method('PUT')

    <label for="lenguajes_marcas_grade">Nota de lenguaje de marcas:</label>
    <input type="number" name="lenguajes_marcas_grade" id="lenguajes_marcas_grade" value="{{ $dam->lenguajes_marcas_grade }}"><br>

    <label for="sistemas_informaticos_grade">Nota de sistemas informaticos:</label>
    <input type="number" name="sistemas_informaticos_grade" id="sistemas_informaticos_grade" value="{{ $dam->sistemas_informaticos_grade }}"><br>

    <label for="fol_student_count">Numero de estudiantes:</label>
    <input type="number" name="fol_student_count" id="fol_student_count" value="{{ $dam->fol_student_count }}"><br>

    <label for="desarrollo_interfaces_status">Status de Desarrollo de Interficies: 'pending', 'completed' o 'in_progress'</label>
    <input type="text" name="desarrollo_interfaces_status" id="desarrollo_interfaces_status" value="{{ $dam->desarrollo_interfaces_status }}"><br>

    <input type="submit" value="Actualizar">
</form>