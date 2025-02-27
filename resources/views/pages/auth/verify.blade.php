@extends('pages.admin.layouts.auth')

@section('title', 'Verify OTP')

@section('main')
    <div class="card card-primary">
        <div class="card-header">
            <h4>Verify OTP</h4>
        </div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('otp.verify.submit') }}">
                @csrf
                <div class="form-group">
                    <label for="otp">OTP</label>
                    <input type="text" class="form-control @error('otp') is-invalid @enderror" name="otp" required
                        autofocus>
                    @error('otp')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">
                        Verify OTP
                    </button>
                </div>
            </form>
            <form action="{{ route('otp.resend') }}" method="GET">
                <button id="resend-button" type="submit">Kirim Ulang OTP</button>
            </form>

            @if(session('success'))
                <p style="color: green;">{{ session('success') }}</p>
            @endif

            @if(session('error'))
                <p style="color: red;">{{ session('error') }}</p>
            @endif

            <script>
                document.addEventListener("DOMContentLoaded", function () {
                    // Ambil waktu terakhir pengiriman OTP dari session
                    let lastOtpTime = "{{ session('last_otp_sent_time') }}";
                    let resendButton = document.getElementById("resend-button");

                    if (lastOtpTime) {
                        let lastTime = new Date(lastOtpTime).getTime();
                        let currentTime = new Date().getTime();
                        let diff = Math.floor((currentTime - lastTime) / 1000); // Selisih dalam detik
                        let waitTime = 60 - diff; // Hitung sisa waktu

                        if (waitTime > 0) {
                            resendButton.disabled = true; // Disable tombol jika belum 1 menit

                            let countdown = setInterval(function () {
                                waitTime--;
                                resendButton.innerText = "Kirim Ulang OTP (" + waitTime + "s)";
                                if (waitTime <= 0) {
                                    clearInterval(countdown);
                                    resendButton.innerText = "Kirim Ulang OTP";
                                    resendButton.disabled = false;
                                }
                            }, 1000);
                        }
                    }
                });
            </script>
        </div>
    </div>
@endsection
