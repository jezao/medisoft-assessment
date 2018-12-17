<?php

namespace App\Http\Controllers;

use App\Services\PhraseService;
use Illuminate\Http\Request;

class PhraseController extends Controller
{
    private $phraseService;

    public function __construct(PhraseService $phraseService)
    {
        $this->phraseService = $phraseService;
    }

    public function index()
    {
        return view('phrases');
    }

    public function analyze(Request $request)
    {
        $this->validate(
            $request,
            [
                    'phrase' => 'required|max:255'
            ]
        );

        return response(collect($this->phraseService->analyze($request->phrase)));
    }
}
