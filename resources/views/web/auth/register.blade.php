@extends('web.layouts.auth')

@section('content')
    <div class="container">
        <div class="row mb-4">
            <div class="col-6">
                <div class="d-flex flex-column align-items-center mt-3" style="padding-right: 80px;">
                    <img class="img-fluid mt-5" src="{{ asset('images/register.svg')}}">
                    <h3 class="mt-5 mb-3">Beli Snack Hanya di SIPSnack</h3>
                    <p class="text-muted">Gabung dan transaksi di SIPSnack<p>
                </div>
            </div>
            <div class="col-6">
                <div class="card px-5 bg-white shadow-lg rounded border-0" style="margin-left: 50px; padding: 24px 40px 32px; width: 400px;">
                    <form method="POST" action="register" class="card-body">
                        @csrf
                        <h3 class="card-title text-center">Daftar Sekarang</h5>
                        <p class="card-text text-center mb-5">Sudah punya akun? <a href="login">Masuk</a></p>
                        <div class="mb-3">
                            <label for="name-input" class="form-label">Name</label>
                            <input type="name" name="name" class="form-control" id="name-input">
                        </div>
                        <div class="mb-3">
                            <label for="email-input" class="form-label">Email address</label>
                            <input type="email" name="email" class="form-control" id="email-input" placeholder="name@example.com">
                        </div>
                        <div class="mb-3">
                            <label for="password-input" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" id="password-input">
                        </div>
                        <div class="mb-4">
                            <label for="password-confirmation-input" class="form-label">Password Confirmation</label>
                            <input type="password" name="password_confirmation" class="form-control" id="password-confirmation-input">
                        </div>
                        <div class="d-grid gap-2">
                            <button class="btn btn-primary">Masuk</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <p class="text-muted text-center">© 2023, SIPSnack</p>
        
            </div>
        </div>
    </div>
@endsection