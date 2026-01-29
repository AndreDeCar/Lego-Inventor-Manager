@extends('layouts.user')

@section('title', 'LEGO® Inventor Manager - Kits')
@section('page-header', 'Liste de kits')

@section('content')

<!-- Grid Container -->
    <div class="kits-grid">
    @foreach ($kits as $kit)
        <div class="kit-card"
             onclick="window.location.href='{{ route('kits.show', $kit) }}'">

            {{-- Image du kit --}}
            <div class="kit-image">
                @if($kit->image)
                    <img src="{{ asset('images/kits/' . $kit->image) }}" alt="Kit {{ $kit->number }}">
                @else
                    <img src="{{ asset('images/default.png') }}" alt="Kit par défaut">
                @endif
            </div>

            {{-- Nom / numéro du kit --}}
            <div class="kit-name">
                {{ $kit->name ?? 'Lego ' . $kit->number }}
            </div>


       </div>
    @endforeach
</div>

@endsection