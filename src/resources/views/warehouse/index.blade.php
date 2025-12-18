@extends('layout')

@section('content')
    <h2>Vista Integrada del Almacén</h2>
    
    <h3>Crear Nueva Categoría</h3>
    <form action="{{ route('warehouse.storeCategory') }}" method="POST">
        @csrf
        <label for="cat_name">Nombre:</label>
        <input type="text" id="cat_name" name="name" required>
        
        <label for="cat_desc">Descripción:</label>
        <textarea id="cat_desc" name="description"></textarea>
        
        <button type="submit">Crear Categoría</button>
    </form>
    
    <hr>
    
    <h3>Crear Nuevo Producto</h3>
    <form action="{{ route('warehouse.storeProduct') }}" method="POST">
        @csrf
        <label for="prod_cat">Categoría:</label>
        <select name="category_id" id="prod_cat" required>
            <option value="">-- Selecciona --</option>
            @foreach($allCategories as $cat)
                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
            @endforeach
        </select>
        
        <label for="prod_name">Nombre:</label>
        <input type="text" id="prod_name" name="name" required>
        
        <label for="prod_price">Precio:</label>
        <input type="number" step="0.01" id="prod_price" name="price" required>
        
        <label for="prod_stock">Stock:</label>
        <input type="number" id="prod_stock" name="stock" required>
        
        <button type="submit">Crear Producto</button>
    </form>
    
    <hr>
    
    @foreach($categories as $category)
        <div style="border: 1px solid #ccc; padding: 10px; margin-bottom: 20px;">
            <h3>{{ $category->name }}</h3>
            <p>{{ $category->description }}</p>
            
            <details>
                <summary>Editar Categoría</summary>
                <form action="{{ route('warehouse.updateCategory', $category) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <label>Nombre:</label>
                    <input type="text" name="name" value="{{ $category->name }}" required>
                    
                    <label>Descripción:</label>
                    <textarea name="description">{{ $category->description }}</textarea>
                    
                    <button type="submit">Actualizar</button>
                </form>
            </details>
            
            <form action="{{ route('warehouse.destroyCategory', $category) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('¿Eliminar categoría?')">Eliminar Categoría</button>
            </form>
            
            <hr>
            
            <h4>Productos en {{ $category->name }}</h4>
            @if($category->products->count() > 0)
                <table border="1" cellpadding="5">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Precio</th>
                            <th>Stock</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($category->products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->stock }}</td>
                            <td>
                                <details>
                                    <summary>Editar</summary>
                                    <form action="{{ route('warehouse.updateProduct', $product) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <label>Categoría:</label>
                                        <select name="category_id" required>
                                            @foreach($allCategories as $cat)
                                                <option value="{{ $cat->id }}" {{ $product->category_id == $cat->id ? 'selected' : '' }}>
                                                    {{ $cat->name }}
                                                </option>
                                            @endforeach
                                        </select><br>
                                        
                                        <label>Nombre:</label>
                                        <input type="text" name="name" value="{{ $product->name }}" required><br>
                                        
                                        <label>Precio:</label>
                                        <input type="number" step="0.01" name="price" value="{{ $product->price }}" required><br>
                                        
                                        <label>Stock:</label>
                                        <input type="number" name="stock" value="{{ $product->stock }}" required><br>
                                        
                                        <button type="submit">Actualizar</button>
                                    </form>
                                </details>
                                
                                <form action="{{ route('warehouse.destroyProduct', $product) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('¿Eliminar producto?')">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p>No hay productos en esta categoría.</p>
            @endif
        </div>
    @endforeach
@endsection