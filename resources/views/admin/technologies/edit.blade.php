@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mt-5">
                    <div class="card-header">
                        <h2>MODIFICA TECNOLOGIA</h2>
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
                        <form action="{{ route('admin.technologies.update', $technology->slug)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-4 row">
                                <label for="name" class="col-md-3 col-form-label text-md-right">Nome</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Nome" value="{{ old('name') ?? $technology->name}}">
                                </div>
                            </div>
                            <div class="mb-4 row mb-0">
                                <div>
                                    <a class="btn btn-sm btn-primary" href="{{ route('admin.technologies.index') }}">Indietro</a>
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