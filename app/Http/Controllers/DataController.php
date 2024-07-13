<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Http;

class DataController extends Controller
{
    public function addProduct()
    {
        $productData = [
            'name' => 'Unicorn tear', // Nome do produto
            'code' => '123',
            'unit' => '10.50'
        ];

        $company_domain = 'seu_domain_aqui'; // Substitua pelo domínio da sua empresa no Pipedrive
        $api_token = env('PIPEDRIVE_API_TOKEN');
        $url = 'https://' . $company_domain . '.pipedrive.com/api/v1/products?api_token=' . $api_token;

        $response = Http::post($url, $productData);

        $data = $response->json();

        return response()->json($data);
    }

    public function getProduct($id)
    {
        $company_domain = 'seu_domain_aqui'; // Substitua pelo domínio da sua empresa no Pipedrive
        $api_token = env('PIPEDRIVE_API_TOKEN');
        $url = 'https://' . $company_domain . '.pipedrive.com/api/v1/products/' . $id . '?api_token=' . $api_token;

        // Envio da requisição GET utilizando o HTTP Client do Laravel
        $response = Http::get($url);

        // Recebendo e retornando a resposta da API do Pipedrive
        $data = $response->json();

        return response()->json($data);
    }
}
