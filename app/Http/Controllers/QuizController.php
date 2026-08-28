<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class QuizController extends Controller
{
    public function index()
    {
        $categories = [];
        $questions = [];
        $categoryError = null;
        $questionError = null;
        $selectedCategory = request()->query('category', 'programming');
        $currentPage = max(1, (int) request()->query('page', 1));
        $perPage = 5;
        $offset = ($currentPage - 1) * $perPage;
        $total = 0;
        $lastPage = 1;

        try {
            $categoryResponse = Http::acceptJson()->get('https://quizapi.io/api/v1/categories');

            if ($categoryResponse->successful()) {
                $categoryPayload = $categoryResponse->json();

                foreach (data_get($categoryPayload, 'data', []) as $topic) {
                    foreach (($topic['categories'] ?? []) as $category) {
                        $slug = $category['slug'] ?? null;

                        if (!$slug) {
                            continue;
                        }

                        $categories[] = [
                            'topic' => $topic['name'] ?? 'General',
                            'name' => $category['name'] ?? Str::headline($slug),
                            'slug' => $slug,
                            'quiz_count' => $category['quizCount'] ?? 0,
                        ];
                    }
                }
            } else {
                $categoryError = 'Categories abhi load nahi ho pa rahi hain.';
            }
        } catch (\Throwable $th) {
            $categoryError = 'Category service temporarily unavailable hai.';
        }

        try {
            $questionResponse = Http::withToken(env('QUIZ_API_TOKEN', 'qa_sk_ad51eaf014230a89ed9c33211ca1dc3049f3fe1d'))
                ->acceptJson()
                ->get('https://quizapi.io/api/v1/questions', [
                    'category' => $selectedCategory,
                    'limit' => $perPage,
                    'offset' => $offset,
                ]);

            if ($questionResponse->successful()) {
                $questionPayload = $questionResponse->json();
                $questions = data_get($questionPayload, 'data', []);
                $total = (int) data_get($questionPayload, 'meta.total', count($questions));
                $lastPage = max(1, (int) data_get($questionPayload, 'meta.lastPage', ceil(max($total, 1) / $perPage)));
                $currentPage = min($currentPage, $lastPage);
            } else {
                $questionError = 'Selected category ke questions abhi load nahi ho pa rahe.';
            }
        } catch (\Throwable $th) {
            $questionError = 'Question service temporarily unavailable hai.';
        }

        return view('pages.quiz', [
            'page' => [
                'title' => 'Quiz Exam Portal | Arya Web Coding',
                'meta_description' => 'Exam-style quiz portal with category filters, instant answer feedback, and paginated question sets.',
                'canonical' => route('quiz.index'),
            ],
            'categories' => $categories,
            'questions' => $questions,
            'categoryError' => $categoryError,
            'questionError' => $questionError,
            'selectedCategory' => $selectedCategory,
            'currentPage' => $currentPage,
            'perPage' => $perPage,
            'total' => $total,
            'lastPage' => $lastPage,
        ]);
    }
}
