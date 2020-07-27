<!-- Modal Delete -->
<div class="modal fade" id="cardDelete{{ $card->id }}"
     tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h5 class="modal-title">Excluir Card</h5>
                <button type="button" class="close" data-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <b>Deseja excluir esse registro?</b>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary"
                        data-dismiss="modal">Cancelar
                </button>
                <button class="btn btn-success">Confirmar</button>
            </div>
        </div>
    </div>
</div>
