@extends('layouts.user')

@section('title', 'LEGO® Inventor Manager - Kits')
@section('page-header', 'Liste de kits')

@section('content')

<!-- Grid Container -->
    <div class="kits-grid">
    @foreach ($kits as $kit)
        <a href="{{ route('kits.show', $kit) }}" class="kit-card">

            <div class="kit-image">
                @if($kit->image)
                    <img src="{{ asset('images/kits/' . $kit->image) }}" alt="Kit {{ $kit->number }}">
                @else
                    <img src="{{ asset('images/default.png') }}" alt="Kit par défaut">
                @endif
            </div>

            <div class="kit-name">
                {{ $kit->name ?? 'Lego ' . $kit->number }}
            </div>

        </a>
    @endforeach
</div>

@endsection