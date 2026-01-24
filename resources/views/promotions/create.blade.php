<form action="{{ route('promotions.store') }}" method="POST">
    @csrf

    <label for="title">Título del Anuncio:</label><br>
    <input type="text" name="title" id="title" value="{{ old('title') }}" required>
    <br><br>

    <label for="message">Mensaje / Contenido:</label><br>
    <textarea name="message" id="message" rows="4" cols="50" required>{{ old('message') }}</textarea>
    <br><br>

    <label for="start_date">Fecha de Inicio:</label><br>
    <input type="datetime-local" name="start_date" id="start_date" value="{{ old('start_date') }}" required>
    <br><br>

    <label for="end_date">Fecha de Fin:</label><br>
    <input type="datetime-local" name="end_date" id="end_date" value="{{ old('end_date') }}" required>
    <small>(Debe ser posterior al inicio)</small>
    <br><br>

    <button type="submit">Guardar Promoción</button>
</form>