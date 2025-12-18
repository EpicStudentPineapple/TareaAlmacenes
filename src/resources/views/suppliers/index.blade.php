@extends('layout')

@section('content')
    <h2>Listado de Proveedores y sus Productos</h2>
    
    @if($suppliers->count() > 0)
        @foreach($suppliers as $supplier)
            <div style="border: 1px solid #000; padding: 15px; margin-bottom: 20px;">
                <h3>{{ $supplier->name }}</h3>
                <p><strong>Email:</strong> {{ $supplier->email ?? 'No especificado' }}</p>
                <p><strong>Teléfono:</strong> {{ $supplier->phone ?? 'No especificado' }}</p>
                <p><strong>Dirección:</strong> {{ $supplier->address ?? 'No especificada' }}</p>
                
                <h4>Productos que suministra:</h4>
                @if($supplier->products->count() > 0)
                    <table border="1" cellpadding="5">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Categoría</th>
                                <th>Precio</th>
                                <th>Stock</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($supplier->products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->category->name }}</td>
                                <td>{{ $product->price }}</td>
                                <td>{{ $product->stock }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p>Este proveedor no suministra ningún producto actualmente.</p>
                @endif
            </div>
        @endforeach
    @else
        <p>No hay proveedores registrados.</p>
    @endif
    
    <br>
    <a href="{{ route('categories.index') }}">Volver al inicio</a>
@endsection