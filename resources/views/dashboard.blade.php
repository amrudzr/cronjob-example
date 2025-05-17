@extends('components/layout', [
    'title' => 'Dashboard',
])

@section('content-section')
    <div class="container py-4">
        <header class="pb-3 mb-4 border-bottom d-flex justify-content-between align-items-center">
            <a href="/dashboard" class="d-flex align-items-center text-body-emphasis text-decoration-none">
                <span class="fs-4">{{ env('APP_NAME') }}</span>
            </a>
            <form action="/logout" method="GET">
                <button class="btn btn-outline-danger" type="submit">Logout</button>
            </form>
        </header>

        <div class="p-5 mb-4 bg-body-tertiary rounded-3 shadow-sm">
            <div class="container-fluid py-5">
                <h1 class="display-5 fw-bold">
                    Hello, {{ auth()->user()->name }}
                    <span class="badge text-bg-{{ auth()->user()->status === 'premium' ? 'primary' : 'secondary' }}">
                        {{ strtoupper(auth()->user()->status) }}
                    </span>
                </h1>

                @if (auth()->user()->status === 'basic')
                    <p class="col-md-8 fs-5 mt-3">
                        Akun kamu dapat akses gratis selama 30 detik untuk menjadi premium.
                    </p>
                    <form action="/subscribe" method="POST" class="mt-3">
                        @csrf
                        <button type="submit" class="btn btn-primary btn-lg">Upgrade to Premium</button>
                    </form>
                @else
                    <p class="col-md-8 fs-5 mt-3">Selamat, akun kamu sudah berstatus
                        <strong>{{ auth()->user()->status }}</strong>!</p>
                @endif
            </div>
        </div>

        <div class="row align-items-md-stretch">
            <div class="col-md-6 mb-3">
                <div class="h-100 p-5 text-bg-dark rounded-3">
                    <h2>Customize Appearance</h2>
                    <p>Swap background colors and text utilities to personalize the dashboard's look and feel.</p>
                    <button class="btn btn-outline-light" type="button">Try It</button>
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="h-100 p-5 bg-body-tertiary border rounded-3">
                    <h2>Other Features</h2>
                    <p>Explore more dashboard components or add links to features like billing, analytics, or settings.</p>
                    <button class="btn btn-outline-primary" type="button">Learn More</button>
                </div>
            </div>
        </div>

        <footer class="pt-4 mt-4 text-center text-body-secondary border-top">
            &copy; {{ date('Y') }} {{ env('APP_NAME') }}
        </footer>
    </div>
@endsection
