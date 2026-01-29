@extends('layouts.user')

@section('title', 'LEGO® Inventor Manager - Builds')
@section('page-header', 'Liste de montages')

@section('content')

<!-- Grid Container -->
    <div class="kits-grid">
    @foreach ($builds as $build)
        <a href="{{ route('builds.show', $build) }}" class="kit-card">

            {{-- Image du kit --}}
            <div class="kit-image">
                @if($build->image)
                    <img src="{{ asset('images/' . $build->image) }}" alt="Kit {{ $kit->number }}">
                @else
                    <img src="{{ asset('images/default.png') }}" alt="Kit par défaut">
                @endif
            </div>

            {{-- Nom / numéro du kit --}}
            <div class="kit-name">
                {{ $build->name }}
            </div>

        </a>
    @endforeach
</div>

@endsection