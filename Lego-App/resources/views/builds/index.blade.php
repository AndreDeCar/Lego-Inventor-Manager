@extends('layouts.user')

@section('title', 'LEGO® Inventor Manager - Builds')
@section('page-header', 'Liste de montages')

@section('content')

<!-- Grid Container -->
    <div class="kits-grid">
    @foreach ($builds as $build)
        <div class="kit-card"
             onclick="window.location.href='{{ route('builds.show', $build) }}'">

            {{-- Image du kit --}}
            <div class="kit-image">
                @if($build->image)
                    <img src="{{ asset('images/kits/' . $kit->image) }}" alt="Kit {{ $kit->number }}">
                @else
                    <img src="{{ asset('images/kits/default.png') }}" alt="Kit par défaut">
                @endif
            </div>

            {{-- Nom / numéro du kit --}}
            <div class="kit-name">
                {{ $build->name }}
            </div>


       </div>
    @endforeach
</div>

@endsection