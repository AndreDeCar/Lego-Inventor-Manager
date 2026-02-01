@extends('layouts.admin')

@section('title', 'LEGO® Inventor Manager - Builds')
@section('page-header', 'Liste de montages')

@section('content')

<!-- Bouton ajouter -->
    <a href="{{ route('admin.builds.create') }}" class="filter-button">
        Ajouter un montage
    </a>

<!-- Grid Container -->
<div class="kits-grid">
@foreach ($builds as $build)

    <div class="kit-card-wrapper">

        <a href="{{ route('admin.builds.show', $build) }}" class="kit-card">
            <div class="kit-image">
                @if($build->image_url)
                    <img src="{{ $build->image_url }}" alt="Montage {{ $build->number }}">
                @else
                    <img src="{{ asset('images/lego.png') }}" alt="Montage par défaut">
                @endif
            </div>

            <div class="kit-name">
                {{ $build->name ?? 'Lego ' . $build->number }}
            </div>

        </a>

        <div class="kit-actions">
            <form action="{{ route('admin.builds.destroy', $build) }}"
                  method="POST"
                  onsubmit="return confirm('Supprimer ce montage ?')">
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