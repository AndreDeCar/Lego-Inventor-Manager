@extends('layouts.user')

@section('title', 'LEGO® Inventor Manager - Kits')
@section('page-header', 'Liste de kits')

@section('content')

<!-- Grid Container -->
    <div class="kits-grid">
    @foreach ($kits as $kit)
        <a href="{{ route('kits.show', $kit) }}" class="kit-card">

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
    @endforeach
</div>

@endsection