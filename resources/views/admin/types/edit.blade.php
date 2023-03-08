@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mt-5">
                    <div class="card-header">
                        <h2>MODIFICA TIPOLOGIA</h2>
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
                        <form action="{{ route('admin.types.update', $type->slug)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-4 row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Nome</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Titolo" value="{{ old('name') ?? $type->name}}">
                                </div>
                            </div>
                            <div class="mb-4 row">
                                <label for="description" class="col-md-4 col-form-label text-md-right">Descrizione</label>
                                <div class="col-md-6">
                                    <textarea class="form-control" rows="5" name="description" id="description" placeholder="Contenuto">{{ $type->description }}</textarea>
                                </div>
                            </div>
                            <div class="mb-4 row mb-0">
                                <div>
                                    <a class="btn btn-sm btn-primary" href="{{ route('admin.types.index') }}">Indietro</a>
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