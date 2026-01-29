@extends('layouts.user')

@section('title', 'LEGO® Inventor Manager - Kits')
@section('page-header', 'Liste de kits')

@section('content')

<!-- Grid Container -->
    <div class="kits-grid">
        <div class="kit-card" onclick="window.location.href='kits_detail.html'">
            <div class="kit-image"></div>
            <div class="kit-name">Vaisseau Maison (Kit 8757K2)</div>
            <div class="kit-code">7851 Pieces</div>
        </div>
        <div class="kit-card" onclick="window.location.href='kits_detail.html'">
            <div class="kit-image"></div>
            <div class="kit-name">Avion robotisé 53863</div>
            <div class="kit-code">7650 Pieces</div>
        </div>
        <div class="kit-card" onclick="window.location.href='kits_detail.html'">
            <div class="kit-image"></div>
            <div class="kit-name">Petite Apollo 3mm Y (Kit KE376)</div>
            <div class="kit-code">1967 Pieces</div>
        </div>
        <div class="kit-card" onclick="window.location.href='kits_detail.html'">
            <div class="kit-image"></div>
            <div class="kit-name">Chateau de Poudlard (Kit 75419)</div>
            <div class="kit-code">7628 Pieces</div>
        </div>
        <div class="kit-card" onclick="window.location.href='kits_detail.html'">
            <div class="kit-image"></div>
            <div class="kit-name">Dom Vacation (Kit 8757KN2)</div>
            <div class="kit-code">7851 Pieces</div>
        </div>
        <div class="kit-card" onclick="window.location.href='kits_detail.html'">
            <div class="kit-image"></div>
            <div class="kit-name">Petite Apollo Telcon V (Kit776)</div>
            <div class="kit-code">7967 Pieces</div>
        </div>
    </div>

@endsection