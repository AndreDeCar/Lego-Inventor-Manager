@extends('layouts.user')

@section('title', 'LEGO® Inventor Manager - Build ' . $build->name)
@section('page-header', 'Liste de pièces du montage : ' . $build->name)

@section('content')

<div class="pieces-table-container">
    <table class="pieces-table">
        <thead>
            <tr>
                <th>Image</th>
                <th>Nom de Pièce</th>
                <th>N°Pièce</th>
                <th>Quantité</th>
                <th>N°Boîte</th>
                <th>N°Armoire</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($build->pieces as $piece)
                <tr>
                    <td>
                        <div class="table-image">
                            @if($piece->image_url)
                                <img src="{{ $piece->image_url }}" alt="Pièce {{ $piece->number }}">
                            @else
                                <img src="{{ asset('images/default.png') }}" alt="Image par défaut">
                            @endif
                        </div>
                    </td>

                    <td>{{ $piece->name }}</td>
                    <td>{{ $piece->number }}</td>
                    <td>{{ $piece->quantity }}</td>
                    <td>{{ $piece->box->number ?? '—' }}</td>
                    <td>{{ $piece->box->cupboard->number ?? '—' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection