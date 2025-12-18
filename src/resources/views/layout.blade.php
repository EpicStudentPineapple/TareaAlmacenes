<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventario Laravel</title>
</head>
<body>
    <header>
        <h1>Gestión de Inventario</h1>
        <nav>
            <ul>
                <li><a href="{{ route('categories.index') }}">Gestionar Categorías</a></li>
                <li><a href="{{ route('products.index') }}">Gestionar Productos</a></li>
                <li><a href="{{ route('warehouse.index') }}">Vista Integrada Almacén</a></li>
                <li><a href="{{ route('suppliers.index') }}">Proveedores</a></li>
                <li><a href="{{ route('profile.show') }}">👤 Juan Pérez (Perfil)</a></li>
            </ul>
        </nav>
        <hr>
    </header>

    <main>
        @if(session('error'))
            <p style="color: red;"><strong>Error:</strong> {{ session('error') }}</p>
        @endif
        
        @if(session('success'))
            <p style="color: green;"><strong>Éxito:</strong> {{ session('success') }}</p>
        @endif
        
        @yield('content')
    </main>

    <footer>
        <hr>
        <p>Proyecto CRUD Laravel Sin Estilos - Gestión de Almacén</p>
    </footer>
</body>
</html>