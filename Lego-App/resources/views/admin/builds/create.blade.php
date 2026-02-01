@extends('layouts.admin')

@section('title', 'LEGO® Inventor Manager - Builds')
@section('page-header', 'Ajouter un montage')

@section('content')

<form action="{{ route('admin.builds.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="form-container">
        <input type="text" placeholder="Nom du montage" name="name" required>
        <input type="text" placeholder="Lien de l'image" name="image_url" required>
        <button class="btn-save" type="submit">Enregistrer</button>
    </div>
</form>
@endsection