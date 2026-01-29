@extends('layouts.user')

@section('title', 'LEGO® Inventor Manager - Builds')
@section('page-header', 'Liste de montages')

@section('content')

<!-- Grid Container -->
    <div class="kits-grid">
    @foreach ($builds as $build)
        <a href="{{ route('builds.show', $build) }}" class="kit-card">

            <div class="kit-image">
                @if($build->image_url)
                    <img src="{{ $build->image_url }}" alt="Build {{ $build->number }}">
                @else
                    <img src="{{ asset('images/default.png') }}" alt="Build par défaut">
                @endif
            </div>

            <div class="kit-name">
                {{ $build->name }}
            </div>

        </a>
    @endforeach
</div>

@endsection