@extends('layouts.page')

@section('title', 'Conteúdo Geral')

@section('content_page')
    <h3>Conteúdo Geral</h3>
    <hr/>
    <img src="{{ url('storage/'. ($generalContent->background_image ?? "default/banner-default.jpg" )) }}" class="img-background-banner">

    <div class="card card-body">
        <form action="{{ route('generalContent.updateOrCreate', $generalContent->id) }}" autocomplete="off" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label>Imagem de background superior</label>
                <input type="file"
                       name="background_image"
                       class="form-control-file"
                    {{ is_null($generalContent->background_image) ? "required" : "" }}
                >
            </div>
            <div class="form-group row">
                <div class="col-6">
                    <label for="spotlight_text">Texto de Destaque</label>
                    <input type="text"
                           required
                           name="spotlight_text"
                           id="spotlight_text"
                           value="{{ $generalContent->spotlight_text }}"
                           class="form-control {{ ($errors->has('spotlight_text') ? 'is-invalid' : '') }}"
                           placeholder="Texto de Destaque">
                </div>
                <div class="col-6">
                    <label for="">Nome do Jogo</label>
                    <input type="text"
                           required
                           name="game_name"
                           value="{{ $generalContent->game_name }}"
                           class="form-control {{ ($errors->has('game_name') ? 'is-invalid' : '') }}"
                           placeholder="Nome do Jogo">
                </div>
            </div>
            <div class="form-group">
                <label for="phrase">Frase</label>
                <textarea name="phrase"
                          required
                          class="form-control {{ ($errors->has('phrase') ? 'is-invalid' : '') }}"
                          id="phrase"
                          cols="30"
                          rows="2">{{ $generalContent->phrase }}</textarea>
            </div>
            <div class="form-group">
                <label for="form_description">Descrição do Formulário</label>
                <textarea name="form_description"
                          required
                          class="form-control {{ ($errors->has('form_description') ? 'is-invalid' : '') }}"
                          id="form_description"
                          cols="30"
                          rows="3">{{ $generalContent->form_description }}</textarea>
            </div>
            <button type="submit" class="btn btn-success">Atualizar</button>
        </form>
    </div>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('css/general-content.css') }}">
@stop
