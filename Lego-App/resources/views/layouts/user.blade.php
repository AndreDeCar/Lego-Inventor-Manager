<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @vite (['resources/css/style.css', 'resources/js/app.js'])
</head>
<body>
    
<!-- Sidebar -->
<div class="sidebar">
    <div class="logo-container">
        <img src="{{ asset('images/logo-lego-final.png') }}" alt="logo">
    </div>

    <a href="/kits" class="{{ request()->routeIs('kits.*') ? 'active' : '' }}">
               <img src="{{ asset('icons/kit-icon.svg') }}" alt="Kit icon" class="menu-icon">
        Kits
    </a>

    <a href="/builds" class="{{ request()->routeIs('builds.*') ? 'active' : '' }}">
               <img src="{{ asset('icons/build-icon.svg') }}" alt="Build icon" class="menu-icon">
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
    <div class="page-header">@yield('page-header')</div>

    @yield('content')
</div>

</body>
</html>