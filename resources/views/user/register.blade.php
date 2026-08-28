<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>User || Register</title>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('assets/css/login.css') }}">
</head>

<body class="min-h-screen overflow-x-hidden px-3 py-4 text-slate-200 lg:px-4 lg:py-5">
    <main class="mx-auto flex min-h-[calc(100vh-2rem)] w-full max-w-5xl items-center justify-center">
        <section class="auth-shell glass-panel relative w-full overflow-hidden rounded-[28px]">
            <div class="relative z-10 p-4 sm:p-5">
                <div class="mb-5 flex flex-wrap items-center justify-between gap-3">
                    <div>
                        <p
                            class="mb-2 inline-flex rounded-full border border-sky-400/30 bg-sky-400/10 px-3 py-1 text-xs font-semibold uppercase tracking-[0.25em] text-sky-200">
                            AryaWeb Innovations
                        </p>

                        <h1 class="text-2xl font-bold text-white sm:text-3xl">
                            Create your account
                        </h1>

                        <p class="mt-2 max-w-xl text-sm leading-6 text-slate-300">
                            Create an account to access the dashboard, purchase projects, and manage your downloads.
                        </p>
                    </div>

                    <a href="{{ route('user.login') }}"
                        class="inline-flex items-center justify-center rounded-full border border-slate-600 px-4 py-2 text-sm font-medium text-white transition hover:border-sky-400 hover:bg-sky-400/10">
                        Back to login
                    </a>
                </div>

                <div class="grid gap-4 lg:grid-cols-[minmax(0,420px)_minmax(0,1fr)]">
                    <div class="guide-card rounded-[24px] border border-white/10 bg-white/5 p-5">
                        <p class="text-xs font-semibold uppercase tracking-[0.3em] text-sky-200">
                            Why Join
                        </p>

                        <h2 class="mt-2 text-2xl font-semibold text-white">
                            Your project space, all in one place
                        </h2>

                        <p class="mt-3 text-sm leading-6 text-slate-300">
                            After registration, you can track your purchases, view invoices, and easily access premium
                            resources.
                        </p>

                        <div class="mt-6 space-y-4">
                            <div class="relative pl-10">
                                <span
                                    class="step-badge absolute left-0 top-0 flex h-8 w-8 items-center justify-center rounded-full text-sm font-bold text-white">
                                    1
                                </span>

                                <div class="step-line"></div>

                                <h3 class="text-sm font-semibold text-white">
                                    Fast registration
                                </h3>

                                <p class="mt-1 text-sm leading-5 text-slate-300">
                                    Your account can be created in just a few seconds with basic details.
                                </p>
                            </div>

                            <div class="relative pl-10">
                                <span
                                    class="step-badge absolute left-0 top-0 flex h-8 w-8 items-center justify-center rounded-full text-sm font-bold text-white">
                                    2
                                </span>

                                <div class="step-line"></div>

                                <h3 class="text-sm font-semibold text-white">
                                    Secure access
                                </h3>

                                <p class="mt-1 text-sm leading-5 text-slate-300">
                                    Your account will remain password protected, allowing projects and invoices to be
                                    managed safely.
                                </p>
                            </div>

                            <div class="relative pl-10">
                                <span
                                    class="step-badge absolute left-0 top-0 flex h-8 w-8 items-center justify-center rounded-full text-sm font-bold text-white">
                                    3
                                </span>

                                <h3 class="text-sm font-semibold text-white">
                                    Instant next step
                                </h3>

                                <p class="mt-1 text-sm leading-5 text-slate-300">
                                    Once registration is complete, you can log in and start your purchase journey
                                    immediately.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="login-card glass-panel rounded-[24px] p-5">
                        <div class="mb-5 flex items-start justify-between gap-3">
                            <div>
                                <span
                                    class="inline-flex rounded-full border border-white/10 bg-white/5 px-3 py-1 text-[11px] font-semibold uppercase tracking-[0.24em] text-slate-300">
                                    New Account
                                </span>

                                <h2 class="mt-3 text-xl font-semibold text-white">
                                    Sign up details
                                </h2>

                                <p class="mt-1 text-sm text-slate-300">
                                    Enter your name, email, and password.
                                </p>
                            </div>

                            <div class="flex gap-2">
                                <span class="h-2.5 w-2.5 rounded-full bg-sky-400/80"></span>
                                <span class="h-2.5 w-2.5 rounded-full bg-white/35"></span>
                                <span class="h-2.5 w-2.5 rounded-full bg-white/20"></span>
                            </div>
                        </div>

                        <form action="{{ route('user.register-save') }}" method="POST" class="space-y-4">
                            @csrf

                            <div class="grid gap-4 sm:grid-cols-2">
                                <div class="sm:col-span-2">
                                    <label for="name" class="mb-2 block text-sm font-medium text-slate-200">
                                        Full name
                                    </label>

                                    <input type="text" name="name" id="name" value="{{ old('name') }}"
                                        placeholder="Enter your full name"
                                        class="w-full rounded-xl border border-slate-700 bg-slate-950/60 px-4 py-2.5 text-white placeholder:text-slate-500 focus:border-sky-400 focus:outline-none focus:ring-2 focus:ring-sky-400/40"
                                        required>

                                    @error('name')
                                        <p class="mt-2 text-sm text-rose-300">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="sm:col-span-2">
                                    <label for="email" class="mb-2 block text-sm font-medium text-slate-200">
                                        Email address
                                    </label>

                                    <input type="email" name="email" id="email" value="{{ old('email') }}"
                                        placeholder="name@company.com"
                                        class="w-full rounded-xl border border-slate-700 bg-slate-950/60 px-4 py-2.5 text-white placeholder:text-slate-500 focus:border-sky-400 focus:outline-none focus:ring-2 focus:ring-sky-400/40"
                                        required>

                                    @error('email')
                                        <p class="mt-2 text-sm text-rose-300">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="sm:col-span-2">
                                    <label for="password" class="mb-2 block text-sm font-medium text-slate-200">
                                        Password
                                    </label>

                                    <input type="password" name="password" id="password"
                                        placeholder="Create a strong password"
                                        class="w-full rounded-xl border border-slate-700 bg-slate-950/60 px-4 py-2.5 text-white placeholder:text-slate-500 focus:border-sky-400 focus:outline-none focus:ring-2 focus:ring-sky-400/40"
                                        required>

                                    @error('password')
                                        <p class="mt-2 text-sm text-rose-300">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <button type="submit"
                                class="w-full rounded-xl bg-gradient-to-r from-sky-500 to-blue-600 px-4 py-2.5 text-sm font-semibold text-white shadow-lg shadow-blue-900/30 transition duration-200 hover:from-sky-400 hover:to-blue-500">
                                Create account
                            </button>

                            <p class="text-center text-sm text-slate-400">
                                Already have an account?

                                <a href="{{ route('user.login') }}"
                                    class="font-medium text-sky-300 transition hover:text-sky-200">
                                    Sign in here
                                </a>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>
</body>

</html>