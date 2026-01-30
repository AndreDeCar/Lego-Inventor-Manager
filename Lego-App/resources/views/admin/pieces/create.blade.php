@extends('layouts.admin')

@section('title', 'LEGO® Inventor Manager - Kits')
@section('page-header', 'Ajouter une pièce')

@section('content')

<form action="{{ route('admin.pieces.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="kit_id" value="{{ $kit->id }}">

    <div class="kit-container space-y-4">

        <!-- Numéro du kit -->
        <input 
            type="text" 
            name="number" 
            placeholder="Numéro de la pièce" 
            value="{{ old('number') }}" 
            class="input input-bordered w-full" 
            required
        >
        @error('number') <p class="text-error">{{ $message }}</p> @enderror

        <!-- Couleur de la pièce -->
        <input 
            type="text" 
            name="color" 
            placeholder="Couleur de la pièce" 
            value="{{ old('color') }}" 
            class="input input-bordered w-full" 
            required
        >
        @error('color') <p class="text-error">{{ $message }}</p> @enderror

        <!-- Nom de la pièce -->
        <input 
            type="text" 
            name="name" 
            placeholder="Nom de la pièce" 
            value="{{ old('name') }}" 
            class="input input-bordered w-full" 
            required
        >
        @error('name') <p class="text-error">{{ $message }}</p> @enderror

        <!-- Quantité -->
        <input 
            type="number" 
            name="quantity" 
            placeholder="Nombre de pièces" 
            value="{{ old('quantity') }}" 
            class="input input-bordered w-full" 
            required
        >
        @error('quantity') <p class="text-error">{{ $message }}</p> @enderror

        <!-- Lien de l'image -->
        <input 
            type="text" 
            name="image_url" 
            placeholder="Lien de l'image" 
            value="{{ old('image_url') }}" 
            class="input input-bordered w-full"
        >
        @error('image_url') <p class="text-error">{{ $message }}</p> @enderror

        <!-- Liste déroulante pour la boîte -->
        <select 
            name="box_id" 
            id="box_id" 
            class="input input-bordered w-full" 
            required
        >
            <option value="">-- Sélectionnez la boîte --</option>
            @foreach ($boxes as $box)
                <option 
                    value="{{ $box->id }}" 
                    {{ old('box_id') == $box->id ? 'selected' : '' }}
                >
                    {{ $box->number }} - {{ $box->name }}
                </option>
            @endforeach
        </select>
        @error('box_number') <p class="text-error">{{ $message }}</p> @enderror

        <!-- Bouton enregistrer -->
        <button type="submit" class="save-btn btn btn-primary w-full mt-2">
            Enregistrer
        </button>

    </div>
</form>

@endsection