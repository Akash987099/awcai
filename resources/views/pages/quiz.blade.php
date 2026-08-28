@extends('layout.app')

@section('title', $page['title'])
@section('meta_description', $page['meta_description'])
@section('canonical', $page['canonical'])

@section('content')
    <style>
        #chatToggle,
        #chatWindow,
        .social-widget {
            display: none !important;
        }

        .exam-shell {
            min-height: 100vh;
            background:
                radial-gradient(circle at top left, rgba(14, 165, 233, 0.16), transparent 22%),
                linear-gradient(180deg, #e2e8f0 0%, #f8fafc 22%, #eef2ff 100%);
        }

        .exam-wrap {
            width: min(1380px, calc(100% - 1.5rem));
            margin: 0 auto;
        }

        .exam-layout {
            display: grid;
            gap: 1rem;
            grid-template-columns: 280px minmax(0, 1fr);
            align-items: start;
        }

        .exam-sidebar,
        .exam-panel {
            border: 1px solid rgba(148, 163, 184, 0.18);
            background: rgba(255, 255, 255, 0.96);
            box-shadow: 0 14px 36px rgba(15, 23, 42, 0.07);
        }

        .exam-sidebar {
            position: sticky;
            top: 6rem;
            overflow: hidden;
        }

        .exam-sidebar-head {
            background: linear-gradient(135deg, #020617 0%, #0f172a 52%, #155e75 100%);
        }

        .exam-category-link {
            display: block;
            border: 1px solid rgba(226, 232, 240, 0.9);
            border-radius: 1rem;
            padding: 0.95rem 1rem;
            transition: 0.2s ease;
        }

        .exam-category-link:hover {
            border-color: rgba(14, 165, 233, 0.4);
            background: rgba(240, 249, 255, 0.9);
            transform: translateY(-1px);
        }

        .exam-category-link.is-active {
            border-color: rgba(8, 145, 178, 0.4);
            background: linear-gradient(135deg, rgba(8, 145, 178, 0.12), rgba(14, 116, 144, 0.06));
            box-shadow: inset 0 0 0 1px rgba(8, 145, 178, 0.08);
        }

        .exam-topbar {
            background: linear-gradient(135deg, #020617 0%, #111827 48%, #1d4ed8 100%);
        }

        .exam-question-card {
            border: 1px solid rgba(148, 163, 184, 0.16);
            background: linear-gradient(180deg, rgba(255, 255, 255, 0.98), rgba(248, 250, 252, 0.96));
            box-shadow: 0 18px 40px rgba(15, 23, 42, 0.07);
        }

        .exam-option {
            width: 100%;
            border: 1px solid #dbe4ee;
            background: #fff;
            transition: 0.18s ease;
        }

        .exam-option:hover:not(:disabled) {
            border-color: #38bdf8;
            background: #f0f9ff;
        }

        .exam-option.is-correct {
            border-color: #10b981;
            background: #ecfdf5;
            color: #065f46;
        }

        .exam-option.is-wrong {
            border-color: #ef4444;
            background: #fef2f2;
            color: #991b1b;
        }

        .exam-option.is-muted {
            opacity: 0.7;
        }

        .exam-progress-track {
            background: rgba(148, 163, 184, 0.2);
        }

        .exam-progress-bar {
            background: linear-gradient(90deg, #06b6d4 0%, #2563eb 100%);
        }

        .exam-feedback-correct {
            border: 1px solid rgba(16, 185, 129, 0.22);
            background: #ecfdf5;
            color: #065f46;
        }

        .exam-feedback-wrong {
            border: 1px solid rgba(239, 68, 68, 0.22);
            background: #fef2f2;
            color: #991b1b;
        }

        @media (max-width: 1023.98px) {
            .exam-layout {
                grid-template-columns: 1fr;
            }

            .exam-sidebar {
                position: static;
            }
        }
    </style>

    <div class="exam-shell pt-20 pb-6"
        x-data="examPlayer({
            questions: {{ \Illuminate\Support\Js::from($questions) }},
            currentPage: {{ $currentPage }},
            lastPage: {{ $lastPage }},
            selectedCategory: {{ \Illuminate\Support\Js::from($selectedCategory) }},
            total: {{ $total }}
        })">
        <div class="exam-wrap">
            <div class="exam-layout">
                <aside class="exam-sidebar rounded-[1.5rem]">
                    <div class="exam-sidebar-head px-5 py-5 text-white">
                        <p class="text-xs font-semibold uppercase tracking-[0.28em] text-cyan-100">Category Panel</p>
                        <h2 class="mt-2 text-xl font-bold">Choose Exam Topic</h2>
                        <p class="mt-2 text-sm leading-6 text-slate-200">
                            Left sidebar se category change karo. Har change par fresh API call ke saath naye 5 questions load honge.
                        </p>
                    </div>

                    <div class="max-h-[70vh] space-y-2 overflow-y-auto p-3">
                        @forelse ($categories as $category)
                            <a href="{{ route('quiz.index', ['category' => $category['slug'], 'page' => 1]) }}"
                                class="exam-category-link {{ $selectedCategory === $category['slug'] ? 'is-active' : '' }}">
                                <div class="text-xs font-semibold uppercase tracking-[0.22em] text-cyan-700">{{ $category['topic'] }}</div>
                                <div class="mt-1.5 text-[15px] font-bold text-slate-900">{{ $category['name'] }}</div>
                            </a>
                        @empty
                            <div class="rounded-2xl border border-amber-200 bg-amber-50 px-4 py-4 text-sm text-amber-900">
                                {{ $categoryError ?: 'Categories available nahi hain.' }}
                            </div>
                        @endforelse
                    </div>
                </aside>

                <main class="space-y-5">
                    <section class="exam-topbar rounded-[1.5rem] px-5 py-5 text-white md:px-6">
                        <div class="flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">
                            <div>
                                <p class="text-xs font-semibold uppercase tracking-[0.28em] text-cyan-100">Exam Mode</p>
                                <h1 class="mt-2 text-2xl font-bold md:text-3xl">
                                    {{ \Illuminate\Support\Str::headline($selectedCategory) }} Practice Test
                                </h1>
                                <p class="mt-2 max-w-3xl text-sm leading-6 text-slate-200">
                                    Ek time par ek hi question show hoga. Answer select karte hi sahi ya wrong feedback dikhega, fir next question button se agla question milega.
                                </p>
                            </div>

                            <div class="grid gap-2 sm:grid-cols-3">
                                <div class="rounded-2xl bg-white/10 px-4 py-3">
                                    <div class="text-xs uppercase tracking-[0.22em] text-slate-200">API Page</div>
                                    <div class="mt-1 text-xl font-bold">{{ $currentPage }}/{{ $lastPage }}</div>
                                </div>
                                <div class="rounded-2xl bg-white/10 px-4 py-3">
                                    <div class="text-xs uppercase tracking-[0.22em] text-slate-200">Loaded</div>
                                    <div class="mt-1 text-xl font-bold">{{ count($questions) }}</div>
                                </div>
                                <div class="rounded-2xl bg-white/10 px-4 py-3">
                                    <div class="text-xs uppercase tracking-[0.22em] text-slate-200">Total</div>
                                    <div class="mt-1 text-xl font-bold">{{ $total }}</div>
                                </div>
                            </div>
                        </div>
                    </section>

                    @if ($questionError)
                        <div class="rounded-[1.8rem] border border-amber-200 bg-amber-50 px-6 py-5 text-sm font-medium text-amber-900">
                            {{ $questionError }}
                        </div>
                    @elseif (empty($questions))
                        <div class="rounded-[1.8rem] border border-slate-200 bg-white px-6 py-5 text-sm font-medium text-slate-700">
                            Is category me abhi questions available nahi hain.
                        </div>
                    @else
                        <section class="exam-panel rounded-[1.5rem] p-4 md:p-5">
                            <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                                <div>
                                    <div class="text-xs font-semibold uppercase tracking-[0.22em] text-cyan-700">
                                        Question <span x-text="currentIndex + 1"></span> of <span x-text="questions.length"></span>
                                    </div>
                                    <div class="mt-2 text-sm text-slate-600">
                                        Current API page me 5 questions aate hain. Complete hone par next API page load kar sakte ho.
                                    </div>
                                </div>
                                <div class="min-w-[220px]">
                                    <div class="exam-progress-track h-3 rounded-full">
                                        <div class="exam-progress-bar h-3 rounded-full transition-all duration-300"
                                            :style="`width: ${progress}%`"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="exam-question-card mt-4 rounded-[1.5rem] p-5 md:p-6" x-show="activeQuestion" x-cloak>
                                <div class="flex flex-col gap-3 md:flex-row md:items-center md:justify-between">
                                    <div class="flex flex-wrap gap-3 text-xs font-semibold uppercase tracking-[0.18em]">
                                        <span class="rounded-full bg-cyan-50 px-3 py-2 text-cyan-700" x-text="activeQuestion?.difficulty || 'Question'"></span>
                                        <span class="rounded-full bg-slate-100 px-3 py-2 text-slate-700" x-text="activeQuestion?.type || 'Type'"></span>
                                    </div>
                                </div>

                                <h2 class="mt-4 text-xl font-bold leading-tight text-slate-900 md:text-2xl" x-text="activeQuestion?.text"></h2>

                                <div class="mt-5 space-y-3">
                                    <template x-for="answer in normalizedAnswers" :key="answer.id">
                                        <button type="button"
                                            class="exam-option rounded-[1.25rem] px-5 py-4 text-left"
                                            :class="optionClass(answer)"
                                            :disabled="answered"
                                            @click="selectAnswer(answer)">
                                            <div class="flex items-start gap-4">
                                                <div class="mt-0.5 flex h-8 w-8 items-center justify-center rounded-full bg-slate-100 text-sm font-bold text-slate-700"
                                                    x-text="answer.label"></div>
                                                <div class="flex-1">
                                                    <div class="text-base font-semibold" x-text="answer.text"></div>
                                                </div>
                                            </div>
                                        </button>
                                    </template>
                                </div>

                                <div class="mt-4" x-show="answered" x-cloak>
                                    <div class="rounded-[1.4rem] px-5 py-4"
                                        :class="isSelectedCorrect ? 'exam-feedback-correct' : 'exam-feedback-wrong'">
                                        <div class="text-sm font-bold uppercase tracking-[0.18em]"
                                            x-text="isSelectedCorrect ? 'Sahi Answer' : 'Wrong Answer'"></div>
                                        <p class="mt-2 text-sm leading-7"
                                            x-text="isSelectedCorrect ? `Correct answer: ${correctAnswerText}` : `Correct answer: ${correctAnswerText}`"></p>
                                        <p class="mt-3 text-sm leading-7" x-show="activeQuestion?.explanation" x-text="activeQuestion?.explanation"></p>
                                    </div>
                                </div>

                                <div class="mt-5 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                                    <div class="text-sm text-slate-500">
                                        Attempted: <span class="font-bold text-slate-900" x-text="attemptedCount"></span> / <span x-text="questions.length"></span>
                                    </div>

                                    <div class="flex flex-wrap gap-3">
                                        <button type="button"
                                            class="rounded-2xl border border-slate-200 bg-white px-5 py-3 text-sm font-semibold text-slate-700 transition hover:border-cyan-300 hover:text-cyan-700"
                                            @click="restartPage()">
                                            Restart This Page
                                        </button>

                                        <button type="button"
                                            class="rounded-2xl bg-slate-950 px-5 py-3 text-sm font-semibold text-white transition hover:bg-cyan-700"
                                            x-show="answered && hasNextQuestion"
                                            x-cloak
                                            @click="nextQuestion()">
                                            Next Question
                                        </button>

                                        <button type="button"
                                            class="rounded-2xl bg-slate-950 px-5 py-3 text-sm font-semibold text-white transition hover:bg-cyan-700 disabled:cursor-not-allowed disabled:bg-slate-300"
                                            :disabled="!canSubmit"
                                            @click="submitExam()">
                                            Final Submit
                                        </button>

                                        @if ($currentPage < $lastPage)
                                            <a href="{{ route('quiz.index', ['category' => $selectedCategory, 'page' => $currentPage + 1]) }}"
                                                class="rounded-2xl bg-emerald-500 px-5 py-3 text-sm font-semibold text-slate-950 transition hover:bg-emerald-400"
                                                x-show="finalSubmitted"
                                                x-cloak>
                                                Next 5 Questions
                                            </a>
                                        @endif

                                        @if ($currentPage > 1)
                                            <a href="{{ route('quiz.index', ['category' => $selectedCategory, 'page' => $currentPage - 1]) }}"
                                                class="rounded-2xl border border-slate-200 bg-white px-5 py-3 text-sm font-semibold text-slate-700 transition hover:border-cyan-300 hover:text-cyan-700">
                                                Previous 5
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="mt-4 rounded-[1.5rem] border border-slate-200 bg-slate-50 p-5" x-show="finalSubmitted" x-cloak>
                                <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                                    <div>
                                        <div class="text-xs font-semibold uppercase tracking-[0.22em] text-cyan-700">Final Result</div>
                                        <h3 class="mt-2 text-2xl font-bold text-slate-900">Your Score Summary</h3>
                                        <p class="mt-2 text-sm leading-6 text-slate-600">
                                            Har correct answer par `+1` aur har wrong answer par `-1` count hua hai.
                                        </p>
                                    </div>
                                    <div class="rounded-2xl bg-slate-950 px-5 py-4 text-white">
                                        <div class="text-xs uppercase tracking-[0.2em] text-slate-300">Net Score</div>
                                        <div class="mt-1 text-3xl font-bold" x-text="score"></div>
                                    </div>
                                </div>

                                <div class="mt-4 grid gap-3 sm:grid-cols-3">
                                    <div class="rounded-2xl bg-emerald-50 px-4 py-4 text-emerald-800">
                                        <div class="text-xs font-semibold uppercase tracking-[0.2em]">Correct</div>
                                        <div class="mt-1 text-2xl font-bold" x-text="correctCount"></div>
                                    </div>
                                    <div class="rounded-2xl bg-rose-50 px-4 py-4 text-rose-800">
                                        <div class="text-xs font-semibold uppercase tracking-[0.2em]">Wrong</div>
                                        <div class="mt-1 text-2xl font-bold" x-text="wrongCount"></div>
                                    </div>
                                    <div class="rounded-2xl bg-sky-50 px-4 py-4 text-sky-800">
                                        <div class="text-xs font-semibold uppercase tracking-[0.2em]">Attempted</div>
                                        <div class="mt-1 text-2xl font-bold" x-text="attemptedCount"></div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    @endif
                </main>
            </div>
        </div>
    </div>

    <script>
        function examPlayer(config) {
            return {
                questions: (config.questions || []).map((question, index) => ({
                    ...question,
                    localIndex: index,
                })),
                currentIndex: 0,
                answered: false,
                selectedAnswerId: null,
                answeredMap: {},
                finalSubmitted: false,
                init() {
                    this.currentIndex = 0;
                },
                get activeQuestion() {
                    return this.questions[this.currentIndex] || null;
                },
                get normalizedAnswers() {
                    const answers = Array.isArray(this.activeQuestion?.answers) ? this.activeQuestion.answers : [];

                    return answers.map((answer, index) => ({
                        ...answer,
                        label: String.fromCharCode(65 + index),
                    }));
                },
                get correctAnswer() {
                    return this.normalizedAnswers.find(answer => !!answer.isCorrect) || null;
                },
                get correctAnswerText() {
                    return this.correctAnswer ? this.correctAnswer.text : 'Not available';
                },
                get isSelectedCorrect() {
                    return this.selectedAnswerId && this.correctAnswer && this.selectedAnswerId === this.correctAnswer.id;
                },
                get hasNextQuestion() {
                    return this.currentIndex < this.questions.length - 1;
                },
                get attemptedCount() {
                    return Object.keys(this.answeredMap).length;
                },
                get correctCount() {
                    return Object.values(this.answeredMap).filter(item => item.isCorrect).length;
                },
                get wrongCount() {
                    return Object.values(this.answeredMap).filter(item => !item.isCorrect).length;
                },
                get score() {
                    return this.correctCount - this.wrongCount;
                },
                get canSubmit() {
                    return this.attemptedCount === this.questions.length && this.questions.length > 0;
                },
                get progress() {
                    if (!this.questions.length) {
                        return 0;
                    }

                    return ((this.currentIndex + 1) / this.questions.length) * 100;
                },
                selectAnswer(answer) {
                    if (this.answered) {
                        return;
                    }

                    this.selectedAnswerId = answer.id;
                    this.answered = true;
                    this.answeredMap[this.activeQuestion.id] = {
                        answerId: answer.id,
                        isCorrect: !!answer.isCorrect,
                    };
                },
                optionClass(answer) {
                    if (!this.answered) {
                        return '';
                    }

                    if (answer.isCorrect) {
                        return 'is-correct';
                    }

                    if (this.selectedAnswerId === answer.id && !answer.isCorrect) {
                        return 'is-wrong';
                    }

                    return 'is-muted';
                },
                nextQuestion() {
                    if (!this.hasNextQuestion) {
                        return;
                    }

                    this.currentIndex += 1;
                    this.answered = false;
                    this.selectedAnswerId = null;
                },
                submitExam() {
                    if (!this.canSubmit) {
                        return;
                    }

                    this.finalSubmitted = true;
                },
                restartPage() {
                    this.currentIndex = 0;
                    this.answered = false;
                    this.selectedAnswerId = null;
                    this.answeredMap = {};
                    this.finalSubmitted = false;
                }
            };
        }
    </script>
@endsection
