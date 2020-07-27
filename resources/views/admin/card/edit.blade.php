{{-- Modal Edit --}}
<div class="modal fade bd-example-modal-lg"
     id="modalEditCard{{ $card->id }}" tabindex="-1"
     role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="card">
                <div class="card-header">
                    <h3>Atualizar Card</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('cards.update', $card->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                            <div class="form-group">
                                <label for="character_image">Imagem do Personagem</label>
                                <input type="file"
                                       class="form-control-file"
                                       name="character_image"
                                       value="{{ $card->character_image }}"
                                       id="character_image">
                            </div>
                            <div class="form-group">
                                <label for="description">Descrição</label>
                                <textarea name="description"
                                          id="description"
                                          class="form-control"
                                          cols="30"
                                          rows="3">{{ $card->description }}</textarea>
                            </div>

                        <div class="form-group col-lg-6">
                            <button type="submit" class="btn btn-success">
                                Atualizar
                            </button>
                            <a href="{{ route('cards.index') }}"
                               class="btn btn-secondary">Voltar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
