@extends('layout')

@section('content')
    <h2>Perfil de Usuario</h2>
    
    <h3>Información de Usuario</h3>
    <p><strong>Nombre:</strong> {{ $user->name }}</p>
    <p><strong>Email:</strong> {{ $user->email }}</p>
    
    <hr>
    
    @if($user->profile)
        <h3>Información de Perfil</h3>
        <p><strong>Teléfono:</strong> {{ $user->profile->phone ?? 'No especificado' }}</p>
        <p><strong>Dirección:</strong> {{ $user->profile->address ?? 'No especificada' }}</p>
        <p><strong>Ciudad:</strong> {{ $user->profile->city ?? 'No especificada' }}</p>
        <p><strong>Biografía:</strong> {{ $user->profile->bio ?? 'No especificada' }}</p>
    @else
        <p>No hay información de perfil disponible.</p>
    @endif
    
    <br>
    <a href="{{ route('categories.index') }}">Volver al inicio</a>
@endsection