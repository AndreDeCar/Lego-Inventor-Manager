@extends('layouts.user')

@section('title', 'LEGO® Inventor Manager - Kit ' . $kit->number)
@section('page-header', 'Liste de pièces du Kit #' . $kit->number)

@section('content')

    <!-- Pieces Grid -->
<div class="pieces-grid">
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
        </div>
    @endforeach
</div>
@endsection
