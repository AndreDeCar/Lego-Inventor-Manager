@extends('layouts.admin')

@section('title', 'LEGO® Inventor Manager - Boxes')
@section('page-header', 'Liste des boîtes')

@section('content')

<!-- Bouton ajouter -->
    <a href="{{ route('admin.boxes.create') }}" class="filter-button">
        Ajouter une boîte
    </a>

<div class="table-container">
    <table class="pieces-table">
            <thead>
                <tr>
                    <th>Action</th>
                    <th>N°Boîte</th>
                    <th>Taille de la boîte</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($boxes as $box)
                    <tr>
                        <td>
                            <div class="action-cell">
                                <form action="{{ route('admin.boxes.destroy', $box->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette boîte ?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-delete">
                                        Supprimer
                                    </button>
                                </form>
                            </div>
                        </td>

                        <td>{{ $box->number }}</td>
                        <td>{{ $box->size }}</td>
                    </tr>
                @endforeach
            </tbody>
    </table>
</div>

@endsection