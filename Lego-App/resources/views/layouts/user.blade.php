<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LEGO® Inventor Manager - Kits</title>
    @vite (['resources/css/style.css', 'resources/js/app.js'])
</head>
<body>
    
<!-- Sidebar -->
<div class="sidebar">
    <div class="logo-container">
        <img src="images/logo-lego-final.png" alt="logo">
    </div>
    <a href="/kits" class="active">
               <img src="icons/kit-icon.svg" alt="Build icon" class="menu-icon">
        Kits
    </a>
    <a href="/builds">
               <img src="icons/build-icon.svg" alt="Build icon" class="menu-icon">
        Build
    </a>
</div>

<!-- Main Content -->
<div class="main-content">
    <!-- Search Bar -->
    <div class="search-container">
        <input type="text" class="search-input" id="searchInput" placeholder="Que cherchez-vous ?" onkeyup="filterTable()">
        <button class="btn-search" onclick="filterTable()">Rechercher</button>
    </div>

    <!-- Page Header -->
    <div class="page-header">Liste de kits</div>

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
</div>

</body>
</html>