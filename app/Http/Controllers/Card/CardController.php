<?php

namespace App\Http\Controllers\Card;

use App\Http\Controllers\Controller;
use App\Http\Requests\CardRequest;
use App\Models\Card\Card;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class CardController extends Controller
{

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        // Busca tods os CARDS e envia para a variável
        $cards = Card::all();

        // Retorna um Array com todos os CARDS
        return view('admin.card.index', compact('cards'));
    }

    /**
     * @param CardRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CardRequest $request)
    {
        try {
            // Verifica se informou o arquivo e se é válido
            if ($request->hasFile('character_image') && $request->file('character_image')->isValid()) {
                $card = new Card();
                $card->character_image = \Storage::disk('public')->putFile('cards', $request->character_image);
                $card->description = $request->description;
                $card->save();
            }
        } catch (\Exception $exception) {
            // Verifica se NÃO deu certo o cadastro do CARD (Redireciona de volta)
            return redirect()
                ->back()
                ->with('error', 'Erro cadastrar card');
        }

        // Retorna a mensagem que deu certo o cadastro do CARD
        return redirect()
            ->route('cards.index')
            ->with('success', 'Card cadastrado com sucesso');
    }


    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function edit($id)
    {
        try {
            // Encontra o card pelo ID passado
            $card = Card::find($id);
        } catch (\Exception $exception) {
            return redirect()
                ->back()
                ->with('error', 'Erro ao encontrar Card');
        }

        // Retorna a View com os dados do ID passado
        return view('admin.card.edit', compact('card'));
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        try {
            $card = Card::findOrFail($id);
            if ($request->hasFile('character_image') && $request->file('character_image')->isValid()) {
                $card->character_image = \Storage::disk('public')->putFile('cards', $request->character_image);
            }
            $card->description = $request->description;
            $card->save();
        } catch (\Exception $exception) {
            // Verifica se NÃO deu certo a atualização do CARD (Redireciona de volta)
            return redirect()
                ->back()
                ->with('error', 'Erro ao atualizar Card');
        }

        // Retorna a mensagem que deu certo a Atualização do CARD
        return redirect()
            ->route('cards.index')
            ->with('success', 'Card Atualizado com sucesso');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        try {
            $card = Card::find($id);
            $card->delete();
        } catch (\Exception $exception) {
            return redirect()
                ->back()
                ->with('error', 'Erro ao excluir Card');
        }

        // Retorna a mensagem que deu certo a exclusão do CARD
        return redirect()
            ->route('cards.index')
            ->with('success', 'Card excluído com sucesso');
    }
}
