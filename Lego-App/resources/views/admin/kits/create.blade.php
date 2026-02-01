@extends('layouts.admin')

@section('title', 'LEGO® Inventor Manager - Kits')
@section('page-header', 'Ajouter un kit')

@section('content')

<form action="{{ route('admin.kits.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="form-container">
        <input type="text" placeholder="Numéro du kit LEGO" name="number" required>
        <button class="btn-save" type="submit">Enregistrer</button>
    </div>
</form>
@endsection