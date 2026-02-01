@extends('layouts.admin')

@section('title', 'LEGO® Inventor Manager - Kit ' . $kit->number)
@section('page-header', 'Liste de pièces du Kit #' . $kit->number)

@section('content')

<a href="{{ route('admin.pieces.create', ['kit_id' => $kit->id]) }}" class="filter-button">
    Ajouter une pièce
</a>

<!-- Pieces Grid -->
<div class="pieces-grid mt-4">
    @foreach ($kit->pieces as $piece)
        <div class="piece-card">

            <div class="piece-image">
                @if($piece->image_url)
                    <img src="{{ $piece->image_url }}" alt="Pièce {{ $piece->number }}">
                @else
                    <img src="{{ asset('images/default.png') }}" alt="Piece default">
                @endif
            </div>

            <div class="piece-info">
                <div class="piece-info-row">
                    <span class="piece-info-label">Nom :</span>
                    <span class="piece-info-value">{{ $piece->name }}</span>
                </div>

                <div class="piece-info-row">
                    <span class="piece-info-label">N° :</span>
                    <span class="piece-info-value">{{ $piece->number }}</span>
                </div>

                <div class="piece-info-row">
                    <span class="piece-info-label">Quantité :</span>
                    <span class="piece-info-value">{{ $piece->quantity }}</span>
                </div>

                <div class="piece-info-row">
                    <span class="piece-info-label">Couleur :</span>
                    <span class="color-badge">{{ $piece->color }}</span>
                </div>
            </div>

            <div class="piece-actions">

                <a href="{{ route('admin.pieces.edit', $piece->id) }}" class="btn-modify">
                    Modifier
                </a>
                <form action="{{ route('admin.pieces.destroy', $piece->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette pièce ?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-delete">
                        Supprimer
                    </button>
                </form>
            </div>

        </div>
    @endforeach
</div>

@endsection