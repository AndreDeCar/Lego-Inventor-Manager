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

    <a href="/admin/kits" class="{{ request()->routeIs('admin/kits.*') ? 'active' : '' }}">
               <img src="{{ asset('icons/kit-icon.svg') }}" alt="Kit icon" class="menu-icon">
        Kits
    </a>

    <a href="/admin/builds" class="{{ request()->routeIs('admin/builds.*') ? 'active' : '' }}">
               <img src="{{ asset('icons/build-icon.svg') }}" alt="Build icon" class="menu-icon">
        Build
    </a>

    <a href="/admin/storages" class="{{ request()->routeIs('admin/storages.*') ? 'active' : '' }}">
               <img src="{{ asset('icons/storage-icon.svg') }}" alt="Storage icon" class="menu-icon">
        Stockage
    </a>

    <a href="/admin/boxes" class="{{ request()->routeIs('admin/boxes.*') ? 'active' : '' }}">
               <img src="{{ asset('icons/boxes-icon.svg') }}" alt="Boxes icon" class="menu-icon">
        Boites
    </a>

    <a href="/admin/cupboards" class="{{ request()->routeIs('admin/cupboards.*') ? 'active' : '' }}">
               <img src="{{ asset('icons/cupboard-icon.svg') }}" alt="Cupboard icon" class="menu-icon">
        Armoires
    </a>

    <a href="/admin/classrooms" class="{{ request()->routeIs('admin/classrooms.*') ? 'active' : '' }}">
               <img src="{{ asset('icons/location-icon.svg') }}" alt="Location icon" class="menu-icon">
        Localisation
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