<?php

namespace App\Http\Controllers\GeneralContent;

use App\Http\Controllers\Controller;
use App\Http\Requests\GeneralContentRequest;
use App\Models\GeneralContent\GeneralContent;
use Illuminate\Http\Request;

class GeneralContentController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        // Buscar o primeiro registro da tabela
        $generalContent = GeneralContent::first() ?? new GeneralContent();

        // Retorna para a pagina INDEX com os dados do primeiro registro
        return view('admin.generalContent.index', compact('generalContent'));
    }

    /**
     * @param GeneralContentRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateOrCreate(GeneralContentRequest $request)
    {
        try {
            $generalContent = GeneralContent::first() ?? new GeneralContent();

            if ($request->hasFile('background_image') && $request->file('background_image')->isValid()){
                $generalContent->background_image = \Storage::disk('public')->putFile('general-content', $request->background_image);
            }
            $generalContent->spotlight_text = $request->spotlight_text;
            $generalContent->game_name = $request->game_name;
            $generalContent->phrase = $request->phrase;
            $generalContent->form_description = $request->form_description;
            $generalContent->save();

        } catch (\Exception $exception) {
            // Verifica se NÃO deu certo a atualização do CONTEÚDO (Redireciona de volta)
            return redirect()
                ->back()
                ->with('error', 'Erro ao atualizar o Conteúdo');
        }

        // Retorna a mensagem que deu certo a Atualização do CARD
        return redirect()
            ->route('generalContent.index')
            ->with('success', 'Conteúdo Atualizado com sucesso');
    }
}
