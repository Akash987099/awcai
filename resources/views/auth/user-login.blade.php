<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>User || Login</title>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('assets/css/login.css') }}">
</head>

<body class="min-h-screen overflow-x-hidden px-3 py-4 text-slate-200 lg:px-4 lg:py-5" style="background:
        radial-gradient(circle at top left, rgba(59, 130, 246, 0.28), transparent 32%),
        radial-gradient(circle at bottom right, rgba(14, 165, 233, 0.22), transparent 28%),
        linear-gradient(135deg, #0f172a 0%, #111827 45%, #1e293b 100%);">
    <div id="alert-container" class="fixed bottom-5 right-5 space-y-3 z-50"></div>

    <main class="mx-auto flex min-h-[calc(100vh-2rem)] w-full max-w-5xl items-center justify-center">
        <section class="auth-shell glass-panel relative w-full overflow-hidden rounded-[28px]">
            <div class="relative w-full z-10 p-4 sm:p-5">
                <div class="mb-5 flex flex-wrap items-center justify-between gap-3">
                    <div>
                        <p
                            class="mb-2 inline-flex rounded-full border border-sky-400/30 bg-sky-400/10 px-3 py-1 text-xs font-semibold uppercase tracking-[0.25em] text-sky-200">
                            AryaWeb Innovations
                        </p>
                        <h1 class="text-2xl font-bold text-white sm:text-3xl">Welcome back</h1>
                        <p class="mt-2 max-w-xl text-sm leading-6 text-slate-300">
                            Log in to access your account, purchased projects, and dashboard.
                        </p>
                    </div>
                    <a href="{{ route('user.register') }}"
                        class="inline-flex items-center justify-center rounded-full border border-slate-600 px-4 py-2 text-sm font-medium text-white transition hover:border-sky-400 hover:bg-sky-400/10">
                        Create account
                    </a>
                </div>

                <div class="grid gap-4 grid-cols-2 md:grid-cols-5 lg:justify-center">
                    <div class="login-card col-span-1 md:col-span-3 glass-panel rounded-[24px] p-5">
                        <div class="mb-5 flex items-start justify-between gap-3">
                            <div>
                                <span
                                    class="inline-flex rounded-full border border-white/10 bg-white/5 px-3 py-1 text-[11px] font-semibold uppercase tracking-[0.24em] text-slate-300">
                                    Secure Login
                                </span>
                            </div>
                            <div class="flex gap-2">
                                <span class="h-2.5 w-2.5 rounded-full bg-sky-400/80"></span>
                                <span class="h-2.5 w-2.5 rounded-full bg-white/35"></span>
                                <span class="h-2.5 w-2.5 rounded-full bg-white/20"></span>
                            </div>
                        </div>

                        <h2 class="text-xl font-semibold text-white">Sign in to your account</h2>

                        <p class="mt-1 text-sm text-slate-300">
                            Enter your registered email and password.
                        </p>

                        <form class="mt-5 space-y-4" id="loginform" method="POST">
                            @csrf

                            <div>
                                <label for="email" class="mb-2 block text-sm font-medium text-slate-200">
                                    Your email
                                </label>

                                <input type="email" name="email" id="email" placeholder="name@company.com"
                                    class="w-full rounded-xl border border-slate-700 bg-slate-950/60 px-4 py-2.5 text-white placeholder:text-slate-500 focus:border-sky-400 focus:outline-none focus:ring-2 focus:ring-sky-400/40"
                                    required>
                            </div>

                            <div>
                                <div class="mb-2 flex items-center justify-between gap-3">
                                    <label for="password" class="block text-sm font-medium text-slate-200">
                                        Password
                                    </label>

                                    <a href="#" class="text-sm font-medium text-sky-300 transition hover:text-sky-200">
                                        Forgot password?
                                    </a>
                                </div>

                                <input type="password" name="password" id="password" placeholder="Enter your password"
                                    class="w-full rounded-xl border border-slate-700 bg-slate-950/60 px-4 py-2.5 text-white placeholder:text-slate-500 focus:border-sky-400 focus:outline-none focus:ring-2 focus:ring-sky-400/40"
                                    required>
                            </div>

                            <button type="submit"
                                class="w-full rounded-xl bg-gradient-to-r from-sky-500 to-blue-600 px-4 py-2.5 text-sm font-semibold text-white shadow-lg shadow-blue-900/30 transition duration-200 hover:from-sky-400 hover:to-blue-500">
                                Sign in
                            </button>

                            <p class="text-center text-sm text-slate-400">
                                New here?
                                <a href="{{ route('user.register') }}"
                                    class="font-medium text-sky-300 transition hover:text-sky-200">
                                    Create your account
                                </a>
                            </p>
                        </form>
                    </div>

                    <div class="guide-card col-span-1 md:col-span-2 rounded-[24px] border border-white/10 bg-white/5 p-5">
                        <p class="text-xs font-semibold uppercase tracking-[0.3em] text-sky-200">
                            Quick Guide
                        </p>

                        <h3 class="mt-2 text-lg font-semibold text-white">
                            Project purchase steps
                        </h3>

                        <div class="mt-4 space-y-4">
                            <div class="relative pl-10">
                                <span
                                    class="step-badge absolute left-0 top-0 flex h-8 w-8 items-center justify-center rounded-full text-sm font-bold text-white">
                                    1
                                </span>

                                <div class="step-line"></div>

                                <h4 class="text-sm font-semibold text-white">
                                    Create an account
                                </h4>

                                <p class="mt-1 text-sm leading-5 text-slate-300">
                                    First, create your account and then log in.
                                </p>
                            </div>

                            <div class="relative pl-10">
                                <span
                                    class="step-badge absolute left-0 top-0 flex h-8 w-8 items-center justify-center rounded-full text-sm font-bold text-white">
                                    2
                                </span>

                                <div class="step-line"></div>

                                <h4 class="text-sm font-semibold text-white">
                                    Go to Projects
                                </h4>

                                <p class="mt-1 text-sm leading-5 text-slate-300">
                                    Visit the dashboard or projects section and choose your required project.
                                </p>
                            </div>

                            <div class="relative pl-10">
                                <span
                                    class="step-badge absolute left-0 top-0 flex h-8 w-8 items-center justify-center rounded-full text-sm font-bold text-white">
                                    3
                                </span>

                                <div class="step-line"></div>

                                <h4 class="text-sm font-semibold text-white">
                                    Complete the payment
                                </h4>

                                <p class="mt-1 text-sm leading-5 text-slate-300">
                                    After selecting the project, make the payment and wait for the order confirmation.
                                </p>
                            </div>

                            <div class="relative pl-10">
                                <span
                                    class="step-badge absolute left-0 top-0 flex h-8 w-8 items-center justify-center rounded-full text-sm font-bold text-white">
                                    4
                                </span>

                                <h4 class="text-sm font-semibold text-white">
                                    Download the project
                                </h4>

                                <p class="mt-1 text-sm leading-5 text-slate-300">
                                    Once the payment is successful, you can download your project.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        var adminLoginUrl = "{{ route('user.userlogins') }}";
        var adminIndexUrl = "{{ route('user.index') }}";
    </script>
    <script src="{{ asset('assets/js/login.js') }}"></script>
</body>

</html>