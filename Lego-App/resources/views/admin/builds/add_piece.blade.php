@extends('layouts.admin')

@section('title', 'Ajouter une pièce existante au build')
@section('page-header', 'Ajouter une pièce au build : ' . $build->name)

@section('content')
<form action="{{ route('admin.builds.addPiece', $build->id) }}" method="POST">
    @csrf

    <div class="form-group mb-4">
        <label for="piece_id">Sélectionnez une pièce :</label>
        <select name="piece_id" id="piece_id" class="input input-bordered w-full" required>
            <option value="">-- Choisir une pièce --</option>
            @foreach($pieces as $piece)
                <option value="{{ $piece->id }}">
                    {{ $piece->number }} - {{ $piece->name }} ({{ $piece->color }})
                </option>
            @endforeach
        </select>
    </div>

    <div class="form-group mb-4">
        <label for="quantity">Quantité :</label>
        <input type="number" name="quantity" id="quantity" class="input input-bordered w-full" value="1" min="1" required>
    </div>

    <button type="submit" class="btn btn-primary w-full">
        Ajouter au build
    </button>
</form>
@endsection
