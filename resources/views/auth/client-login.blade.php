<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AWC Care | Clinic portal sign in</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Manrope:wght@600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/login.css?v={{ filemtime(public_path('assets/css/login.css')) }}">
</head>
<body class="clinic-login">
    <div id="alert-container" class="alert-container"></div>
    <main class="clinic-login__layout">
        <a class="clinic-brand" href="{{ url('/') }}" aria-label="AWC Care home"><span>+</span><div><strong>AWC Care</strong><small>Clinic network portal</small></div></a>
        <section class="clinic-login__welcome">
            <p class="clinic-kicker"><i></i> One secure workspace</p>
            <h1>Care, connected<br>across every clinic.</h1>
            <p>Securely manage your clinic, staff and patient services from one place.</p>
            <div class="clinic-trust"><b>✓</b><span><strong>Protected access</strong><br>Built for healthcare teams</span></div>
        </section>
        <section class="clinic-login__card" aria-labelledby="login-title">
            <p class="clinic-kicker clinic-kicker--dark"><i></i> Member access</p>
            <h2 id="login-title">Welcome back</h2>
            <p class="clinic-login__subtext">Sign in to continue to your workspace.</p>
            <form id="loginform" method="POST" class="clinic-form">
                @csrf
                <div class="clinic-field">
                    <label for="email">Email address</label>
                    <div><span aria-hidden="true">@</span><input type="email" name="email" id="email" placeholder="you@clinic.com" autocomplete="email" required></div>
                </div>
                <div class="clinic-field">
                    <div class="clinic-label-row"><label for="password">Password</label><a href="#">Forgot password?</a></div>
                    <div><span aria-hidden="true">●</span><input type="password" name="password" id="password" placeholder="Enter your password" autocomplete="current-password" required></div>
                </div>
                <button type="submit">Sign in securely <b aria-hidden="true">→</b></button>
            </form>
            <p class="clinic-support">Need help accessing your account? <a href="mailto:support@aryawebinnovations.com">Contact support</a></p>
        </section>
    </main>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>var adminLoginUrl = "{{ route('panel.logins') }}"; var adminIndexUrl = "{{ route('panel.index') }}";</script>
    <script src="/assets/js/login.js"></script>
</body>
</html>