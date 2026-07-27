<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class QuestionController extends Controller
{
    public function create()
    {
        return view('question.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'question' => 'required|string',
        ]);

        $validated['ticket_code'] = 'TKT-' . strtoupper(Str::random(8));
        $validated['status'] = 'pending';

        Question::create($validated);

        return back()->with('success', 'Pertanyaan Anda berhasil dikirim dengan Kode Tiket: ' . $validated['ticket_code']);
    }
}
