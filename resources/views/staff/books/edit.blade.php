@extends('template.template')
@section('title', 'Biblioteco - Modifier un livre')

@section('content')
    <div class="container-fluid tm-container-content tm-mt-60">
        <div class="row mb-4">
            <div class="col-12">
                <h2 class="tm-text-primary">Modifier un livre</h2>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-8 col-md-10 col-12">
                <form action="{{ route('staff.books.update', $book->id) }}" method="POST" class="tm-bg-gray p-5">
                    @csrf
                    @method('PATCH')

                    <div class="form-group mb-4">
                        <label for="name">Titre</label>
                        <input type="text" name="name" id="name" class="form-control"
                               value="{{ old('name', $book->name) }}">
                        @error('name')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        <label for="author">Auteur</label>
                        <input type="text" name="author" id="author" class="form-control"
                               value="{{ old('author', $book->author) }}">
                        @error('author')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        <label for="status">Statut</label>
                        <select name="status" id="status" class="form-control">
                                <option value="AVAILABLE">
                                    AVAILABLE
                                </option>
                                <option value="BORROWED">
                                    BORROWED
                                </option>
                                <option value="INDISPOSED">
                                    INDISPOSED
                                </option>
                        </select>
                        @error('status')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        <label for="summary">Résumé</label>
                        <textarea name="summary" id="summary" rows="5" class="form-control">{{ old('summary', $book->summary) }}</textarea>
                        @error('summary')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                    <a href="{{ route('staff.dashboard') }}" class="btn btn-secondary">Retour</a>
                </form>
            </div>
        </div>
    </div>
@endsection
