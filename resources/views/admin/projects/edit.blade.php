@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mt-5">
                    <div class="card-header">
                        <h2>MODIFICA PROGETTO</h2>
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="list-unstyled mb-0">
                                    @foreach ($errors->all() as $error)
                                    <li><i class="fa-solid fa-triangle-exclamation"></i>{{ $error }}</li>    
                                    @endforeach                
                                </ul>
                            </div>
                        @endif
                        <form action="{{ route('admin.projects.update', $project->slug)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-4 row">
                                <label for="title" class="col-md-3 col-form-label text-md-right">Titolo</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" id="title" name="title" placeholder="Titolo" value="{{ old('title') ?? $project->title}}">
                                </div>
                            </div>
                            <div class="mb-4 row">
                                <label for="content" class="col-md-3 col-form-label text-md-right">Contenuto</label>
                                <div class="col-md-8">
                                    <textarea class="form-control" rows="5" name="content" id="content" placeholder="Contenuto">{{ $project->content }}</textarea>
                                </div>
                            </div>
                            <div class="mb-4 row">
                                <label for="title" class="col-md-3 col-form-label text-md-right">Tipologia</label>
                                <div class="col-md-8">
                                    <select class="form-control" name="type_id" id="type_id">
                                        <option value="">Seleziona una categoria</option>
                                        @foreach ($types as $type)
                                            <option value="{{ $type->id }}" 
                                                {{ $type->id == old('type_id', $project->type_id) ? 'selected' : ''}}>
                                                {{ $type->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="mb-4 row">
                                <label for="title" class="col-md-3 col-form-label text-md-right">Tecnologia</label>
                                <div class="col-md-8">
                                    <div class="row px-2" @error('technologies') is-invalid @enderror>
                                        @foreach ($technologies as $technology)
                                        <div class="form-check col-md-6" @error('technologies') is-invalid @enderror>
                                            <input type="checkbox" value="{{ $technology->id }}" name="technologies[]" {{ $project->technologies->contains($technology) ? 'checked' : ''}}>
                                            <label for="" class="form-check-label">{{ $technology->name }}</label>
                                            @error('technologies')
                                            <div class="invalid-feddback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="mb-4 row mb-0">
                                <div>
                                    <a class="btn btn-sm btn-primary" href="{{ route('admin.projects.index') }}">Indietro</a>
                                    <button class="btn btn-sm btn-success" type="submit">Aggiorna</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection