@extends('layouts.admin')

@section('title', 'LEGO® Inventor Manager - Boxes')
@section('page-header', 'Ajouter une boîte')

@section('content')

<form action="{{ route('admin.boxes.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="form-container">
        <input type="text" placeholder="Numéro de la boîte" name="number" required>
        <select name="size" placeholder="Taille de la boîte" required>
            <option value="" disabled selected>-- Sélectionnez une taille --</option>
            <option value="small">Petite</option>
            <option value="medium">Moyenne</option>
            <option value="big">Grande</option>
        </select>
        <select name="cupboard_id" placeholder="Armoire" required>
            <option value="" disabled selected>-- Sélectionnez une armoire --</option>
            @foreach($cupboards as $cupboard)
                <option value="{{ $cupboard->id }}">{{ $cupboard->number }}</option>
            @endforeach
        </select>
        <button class="btn-save" type="submit">Enregistrer</button>
    </div>
</form>
@endsection