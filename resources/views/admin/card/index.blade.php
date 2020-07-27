@extends('layouts.page')

@section('title', 'Cards')

@section('content_page')
    <h3>Cards</h3>
    <hr>

    <div class="text-right">
        <p>
            <button class="btn btn-outline-primary" type="button"
                    data-toggle="collapse" data-target="#collapseAddCard"
                    aria-expanded="false" aria-controls="collapseAddCard">
                <i class="fas fa-plus-circle"></i>
                Cadastrar Novo Card
            </button>
        </p>
    </div>

    <div class="collapse" id="collapseAddCard">
        <div class="card card-body">

            <div class="form-group col-12">
                <form name="card" autocomplete="off" action="{{ route('cards.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="character_image">Imagem do Personagem</label>
                        <input type="file"
                               class="form-control-file"
                               name="character_image"
                               id="character_image">
                    </div>
                    <div class="form-group">
                        <label for="description">Descrição</label>
                        <textarea name="description"
                                  id="description"
                                  class="form-control {{ ($errors->has('description') ? 'is-invalid' : '') }}"
                                  cols="30"
                                  rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Cadastrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="row">
        @foreach($cards as $card)
        <div class="col-sm-3">
            <div class="card" style="width: 100%;">
                <img src="{{ url('storage/'.$card->character_image) }}" class="card-img mt-2" height="250">
                <div class="card-body">
                    <p class="card-text container-description-card">{{$card->description}}</p>
                    <hr>
                    <div class="d-flex justify-content-start">
                        <!-- Modal Edit -->
                        <a href="{{ route('cards.edit', $card->id) }}"
                           class="btn btn-warning mr-2"
                           data-toggle="modal"
                           data-target="#modalEditCard{{ $card->id }}" >
                            <i title="Editar" class="fas fa-edit"></i>
                        </a>
                        @include('admin.card.edit')

                        <form action="{{ route('cards.destroy', $card->id) }}"
                              method="POST">
                            @csrf
                            @method('DELETE')
                            <!-- Button trigger modal -->
                                <button type="button"
                                        class="btn btn-danger"
                                        data-toggle="modal"
                                        data-target="#cardDelete{{ $card->id }}">
                                    <i title="Excluir" class="fas fa-trash-alt"></i>
                                </button>

                            @include('admin.card.delete')
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('css/card.css') }}">
@stop
