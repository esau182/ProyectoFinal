<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        th, td {
            border: 1px solid #ddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f4f4f4;
        }
        h1 {
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>{{ $title }}</h1>
    <table>
        <thead>
            @if ($title === 'Reporte de Usuarios')
                <tr>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Fecha de Creación</th>
                </tr>
            @else
                <tr>
                    <th>Tipo de Delito</th>
                    <th>Usuario</th>
                    <th>Descripción</th>
                    <th>Fecha de Creación</th>
                    <th>Localización</th>
                </tr>
            @endif
        </thead>
        <tbody>
            @if ($title === 'Reporte de Usuarios')
                @foreach ($items as $usuario)
                    <tr>
                        <td>{{ $usuario->name }}</td>
                        <td>{{ $usuario->email }}</td>
                        <td>{{ $usuario->created_at }}</td>
                    </tr>
                @endforeach
            @else
                @foreach ($items as $delito)
                    <tr>
                        <td>{{ $delito->tipoDelito }}</td>
                        <td>{{ $delito->user->name }}</td> <!-- Ajusta según tu relación -->
                        <td>{{ $delito->descripcion }}</td>
                        <td>{{ $delito->created_at }}</td>
                        <td>{{ $delito->latitud }}, {{ $delito->longitud }}</td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
</body>
</html>