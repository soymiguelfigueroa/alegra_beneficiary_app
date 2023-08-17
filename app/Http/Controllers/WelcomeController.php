<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Http;

class WelcomeController extends Controller
{
    public function index(): View
    {
        $response = Http::get(env('API_KITCHEN_ENDPOINT') . 'receipts');

        $receipts = $response->json();

        return view('welcome', compact('receipts'));
    }

    public function receipt($receipt_id): View
    {
        $response = Http::get(env('API_KITCHEN_ENDPOINT') . 'ingredients', [
            'receipt_id' => $receipt_id,
        ]);

        $receipt = $response->json()['receipt'];

        $ingredients = $response->json()['ingredients_receipt'];

        return view('receipt', compact('receipt', 'ingredients'));
    }
}
