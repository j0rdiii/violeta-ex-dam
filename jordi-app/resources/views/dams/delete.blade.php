<h1>Eliminar asignatura</h1>

<p>¿Estas seguro que quieres eliminar la siguiente asignatura?</p>

<ul>
    <li><strong>Nota lenguaje de marcas:</strong> {{ $dam->lenguajes_marcas_grade }}</li>
    <li><strong>Nota sistemas informaticos:</strong> {{ $dam->sistemas_informaticos_grade }}</li>
    <li><strong>Numero de estudiantes en fol:</strong> {{ $dam->fol_student_count }}</li>
    <li><strong>Estado desarrollo de interfaces:</strong> {{ $dam->desarrollo_interfaces_status }}</li>
</ul>

<form action="{{ route('dams.destroy', $dam->id) }}" method="post">
    @csrf
    @method('DELETE')
    <input type="submit" value="Eliminar" onclick="return confirm('¿Estas seguro que quieres eliminar la siguiente asignatura?')">
    <a href="{{ route('dams.index') }}">Cancelar</a>
</form>