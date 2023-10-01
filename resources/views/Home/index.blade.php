@extends('layouts.app')

@section('titulo')
    
    Estamos en el menu principal

@endsection

@section('contenido')
    
    <x-listar_posts :posts="$posts"/>

@endsection
