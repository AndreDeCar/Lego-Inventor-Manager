@extends('layouts.admin')

@section('title', 'LEGO® Inventor Manager - Kits')
@section('page-header', 'Liste de kits')

@section('content')

<!-- Bouton ajouter -->
    <a href="{{ route('admin.kits.create') }}" class="filter-button">
        Ajouter un kit
    </a>

<!-- Grid Container -->
<div class="kits-grid">
@foreach ($kits as $kit)

    <div class="kit-card-wrapper">

        <a href="{{ route('admin.kits.show', $kit) }}" class="kit-card">

            <div class="kit-image">
                @if($kit->image_url)
                    <img src="{{ $kit->image_url }}" alt="Kit {{ $kit->number }}">
                @else
                    <img src="{{ asset('images/lego.png') }}" alt="Kit par défaut">
                @endif
            </div>

            <div class="kit-name">
                {{ $kit->name ?? 'Lego ' . $kit->number }}
            </div>

        </a>

        <div class="kit-actions">
            <form action="{{ route('admin.kits.destroy', $kit) }}"
                  method="POST"
                  onsubmit="return confirm('Supprimer ce kit ?')">
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