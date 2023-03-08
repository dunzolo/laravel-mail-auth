@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 mt-5">
                <div class="d-flex justify-content-between">
                    <div>
                        <h2>DETTAGLIO PROGETTO</h2>
                    </div>
                    <div>
                        <a class="btn btn-sm btn-primary" href="{{ route('admin.projects.index') }}">Torna all'elenco</a>
                    </div>
                </div>
                <hr>
            </div>
            <div class="row d-flex">
                <div class="col-3">
                    <label class="d-block"><strong>Copertina</strong></label>
                    <img src="{{asset('storage/'.$project->cover_image)}}" alt="{{$project->title}}" class="w-100">
                </div>
                <div class="col-9">
                    <label class="d-block"><strong>Titolo</strong></label>
                    <p>{{ $project->title }}</p>
                    <label class="d-block"><strong>Descrizione</strong></label>
                    <p>{{ $project->content }}</p>
                    <label class="d-block"><strong>Tipologia</strong></label>
                    <p>{{ $project->type ? $project->type->name : 'Tipologia non definita' }}</p>
                    <label class="d-block"><strong>Tecnologie</strong></label>
                    <ul>
                        @forelse ($project->technologies as $technology)
                        <li>{{ $technology->name }}</li>
                        @empty
                        <li>Nessuna tecnologia assocciata al progetto</li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection