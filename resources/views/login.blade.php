@extends('components/layout', [
    'title' => 'Login',
])

@section('content-section')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow rounded-4">
                    <div class="card-body p-5">
                        <h1 class="h3 mb-4 text-center fw-semibold">Please Sign In</h1>

                        <form action="/login" method="POST">
                            @csrf

                            <div class="form-floating mb-3">
                                <input type="email" name="email" class="form-control" id="floatingEmail"
                                    placeholder="name@example.com" required>
                                <label for="floatingEmail">Email address</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="password" name="password" class="form-control" id="floatingPassword"
                                    placeholder="Password" required>
                                <label for="floatingPassword">Password</label>
                            </div>

                            <div class="form-check text-start mb-4">
                                <input class="form-check-input" type="checkbox" name="remember" id="rememberMe">
                                <label class="form-check-label" for="rememberMe">Remember me</label>
                            </div>

                            <button class="btn btn-primary w-100 py-2" type="submit">Sign In</button>
                        </form>

                        <div class="text-center mt-4">
                            <small>
                                Don’t have an account? <a href="/register">Sign up here</a>.
                            </small>
                        </div>

                        <p class="mt-4 mb-0 text-center text-body-secondary">&copy; 2017–2025</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
