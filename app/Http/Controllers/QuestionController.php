<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreQuestionRequest;
use App\Models\Question;
use Illuminate\Support\Facades\RateLimiter;

class QuestionController extends Controller
{
    public function create()
    {
        return view('question.create');
    }

    public function store(StoreQuestionRequest $request)
    {
        $key = 'question-submission:' . $request->ip();

        if (RateLimiter::tooManyAttempts($key, 3)) {
            $seconds = RateLimiter::availableIn($key);
            $minutes = ceil($seconds / 60);

            return back()
                ->withInput()
                ->with('error', "Terlalu banyak pengiriman pesan. Silakan coba lagi dalam {$minutes} menit.");
        }

        RateLimiter::hit($key, 600);

        Question::create($request->validated());

        return back()->with('success', 'Pertanyaan Anda berhasil dikirim. Terima kasih telah menghubungi Dinas Perhubungan Kabupaten Purbalingga. Apabila diperlukan tindak lanjut, jawaban resmi akan dikirim melalui alamat email yang Anda daftarkan. Pastikan email yang dimasukkan aktif dan dapat menerima pesan.');
    }
}
