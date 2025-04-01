@extends('client')

<style>
.divinicio{
    width: 100vw;
    height: 100vh; /* O ajusta la altura según necesidad */
}
</style>
@section('contenido')
<div class="row">
    <div class="container-fluid p-0">
        <div class="d-flex justify-content-center align-items-center vh-100 divinicio">
            <img src="{{ asset('storage/img/recurso11.png') }}" alt="Recurso 11">
            <img src="{{ asset('storage/img/recurso13.png') }}" alt="Recurso 121">            
            <h1 class="text-white">Bienvenido</h1>
        </div>
        <img src="{{ asset('storage/img/risa.png') }}" alt="Recurso 111">
    </div>
</div>
@endsection
