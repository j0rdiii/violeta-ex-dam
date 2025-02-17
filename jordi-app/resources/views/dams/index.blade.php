<form action="{{ route('dams.store') }}" method="post">
    @csrf
    <h2>Crear una nueva asignatura</h2>
    <label for="lenguajes_marcas_grade">Nota de Lenguaje de Marcas:</label>
        <input type="number" name="lenguajes_marcas_grade" id="lenguajes_marcas_grade" placeholder="Número entre 1-10"><br>

        <label for="sistemas_informaticos_grade">Nota de Sistemas Informáticos:</label>
        <input type="number" name="sistemas_informaticos_grade" id="sistemas_informaticos_grade" placeholder="Número entre 1-10"><br>

        <label for="fol_student_count">Número de Estudiantes:</label>
        <input type="number" name="fol_student_count" id="fol_student_count"><br>

        <label for="desarrollo_interfaces_status">Estado de Desarrollo de Interfaces (pending, completed, in_progress):</label>
        <input type="text" name="desarrollo_interfaces_status" id="desarrollo_interfaces_status"><br>

        <input type="submit" value="Crear">
    </form>

    <hr>

    <h2>Asignaturas Registradas</h2>
    @if($dams->isEmpty())
        <p>No hay asignaturas registradas.</p>
    @else
        <table border="1" style="width: 100%; margin-top: 20px;">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nota Lenguaje de Marcas</th>
                    <th>Nota Sistemas Informáticos</th>
                    <th>Número de Estudiantes</th>
                    <th>Estado Desarrollo de Interfaces</th>
                    <th>Acciones</th>
                </tr>
            </thead> 
            <tbody>
                @foreach($dams as $dam)
                <tr>
                    <td>{{ $dam->id }}</td>
                    <td>{{ $dam->lenguajes_marcas_grade }}</td>
                    <td>{{ $dam->sistemas_informaticos_grade }}</td>
                    <td>{{ $dam->fol_student_count }}</td>
                    <td>{{ $dam->desarrollo_interfaces_status }}</td>
                    <td>
                        <a href="{{ route('dams.edit', $dam->id) }}">Editar</a>
                        <a href="{{ route('dams.delete', $dam->id) }}" onclick="return confirm('¿Estás seguro de eliminar esta asignatura?')">Eliminar</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif