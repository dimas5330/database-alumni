@extends('pages.admin.layouts.auth')

@section('title', 'Login')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet"
        href="{{ asset('library/bootstrap-social/bootstrap-social.css') }}">
@endpush

@section('main')
    <div class="card card-primary">
        <div class="card-header">
            <h4>Login</h4>
        </div>

        <div class="card-body">
            <form method="POST"
                action="{{ route('authenticate')}}"
                class="needs-validation"
                novalidate="">
                @csrf
                <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email"
                        type="email"
                        class="form-control"
                        name="email"
                        tabindex="1"
                        required
                        autofocus>
                    <div class="invalid-feedback">
                        Please fill in your email
                    </div>
                </div>

                <div class="form-group">
                    <div class="d-block">
                        <label for="password" class="control-label">Password</label>
                    </div>
                    <div class="input-group">
                        <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                        <div class="input-group-append">
                            <span class="input-group-text" id="toggle-password" style="cursor: pointer;">
                                <i class="fas fa-eye"></i>
                            </span>
                        </div>
                    </div>
                    <div class="float-right">
                        <a href="" class="text-small">
                            Lupa Password?
                        </a>
                    </div>
                    <div class="invalid-feedback">
                        Mohon masukkan password
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit"
                        class="btn btn-primary btn-lg btn-block"
                        tabindex="4">
                        Masuk
                    </button>
                </div>
            </form>
        </div>
    </div>
    <div class="text-muted mt-5 text-center">
        Belum mempunyai akun? <a href="{{route('user.register')}}">Buat Akun</a>
    </div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const togglePassword = document.querySelector('#toggle-password');
        const password = document.querySelector('#password');

        togglePassword.addEventListener('click', function (e) {
            // Toggle the type attribute
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);

            // Toggle the eye icon
            this.querySelector('i').classList.toggle('fa-eye');
            this.querySelector('i').classList.toggle('fa-eye-slash');
        });
    });
</script>
    <!-- JS Libraies -->

    <!-- Page Specific JS File -->
@endpush
