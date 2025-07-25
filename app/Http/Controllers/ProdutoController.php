<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use App\Models\Produto;

class ProdutoController extends Controller
{
    //lê todos os produtos
    public function read(){
        $produtos = Produto::all();

        return response()->json($produtos);
    }

    //retorna apenas um produto específico
    public function show(Produto $produto){
        return response()->json($produto);
    }

    //cria um produto novo
    public function create(Request $request){
        // Valida os campos
        $data = $request->validate([
            'titulo' => 'required|string',
            'preco' => 'required|numeric',
            'descricao' => 'required|string',
            'imagem' => 'nullable|image|max:2048',
            'disponivel' => 'required|boolean',
        ]);
        //a ser revisado, por enquanto aceita o campo imagem ser null
        $imageUrl = null;

        // Upload da imagem para o Supabase se existir
        if ($request->hasFile('imagem')) { 
            $image = $request->file('imagem');
            $filename = Str::uuid() . '.' . $image->getClientOriginalExtension();

            $upload = Http::withHeaders([
                'apikey' => env('SUPABASE_KEY'),
                'Authorization' => 'Bearer ' . env('SUPABASE_KEY'),
                'Content-Type' => $image->getMimeType(),
            ])->put(
                env('SUPABASE_URL') . "/storage/v1/object/" . env('SUPABASE_BUCKET') . "/" . $filename,
                file_get_contents($image)
            );

            if (!$upload->successful()) { // Corrigido o typo (succesful -> successful)
                return response()->json(['error' => 'Erro ao fazer upload da imagem.'], 500);
            }

            // URL pública
            $imageUrl = env('SUPABASE_URL') . "/storage/v1/object/public/" . 
                    env('SUPABASE_BUCKET') . "/" . $filename;
        }

        // Salvar no banco
        $produto = Produto::create([
            'titulo' => $data['titulo'],
            'preco' => $data['preco'],
            'descricao' => $data['descricao'],
            'imagem_url' => $imageUrl,
            'disponivel' => $data['disponivel'],
        ]);

        return response()->json($produto, 201);
    }

    //edita um produto
    public function update(Produto $produto, Request $request){
        //valida os campos
        $data = $request->validate([
            'titulo' => 'required|string',
            'preco' => 'required|numeric',
            'descricao' => 'required|string',
            'imagem' => 'nullable|image|max:2048',
            'disponivel' => 'required|boolean',
        ]);

        if ($request->hasFile('imagem')) {
            // upload novo
            $image = $request->file('imagem');
            $filename = Str::uuid() . '.' . $image->getClientOriginalExtension();

            $upload = Http::withHeaders([
                'apikey' => env('SUPABASE_KEY'),
                'Authorization' => 'Bearer ' . env('SUPABASE_KEY'),
                'Content-Type' => $image->getMimeType(),
            ])->put(
                env('SUPABASE_URL') . "/storage/v1/object/" . env('SUPABASE_BUCKET') . "/" . $filename,
                file_get_contents($image)
            );

            if (!$upload->successful()) {
                return response()->json(['error' => 'Erro ao fazer upload da imagem.'], 500);
            }

            $produto->imagem_url = env('SUPABASE_URL') . "/storage/v1/object/public/" . env('SUPABASE_BUCKET') . "/" . $filename;
        }

        $produto->update([
            'titulo' => $data['titulo'],
            'preco' => $data['preco'],
            'descricao' => $data['descricao'],
            'disponivel' => $data['disponivel'],
            'imagem_url' => $produto->imagem_url, // mantém ou atualiza
        ]);

        return response()->json($produto);
    }


    //deleta um produto
    public function remove(Produto $produto){
        $produto->delete();
        return response()->json(['message' => 'Produto deletado com sucesso.']);
    }



}
