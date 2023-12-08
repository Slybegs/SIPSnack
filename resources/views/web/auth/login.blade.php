@extends('web.layouts.auth')

@section('content')
    <div class="container">
        <div class="row mb-5">
            <div class="col-6">
                <div class="d-flex flex-column align-items-center" style="padding-right: 80px;">
                    <img class="img-fluid" src="{{ asset('images/login.svg')}}">
                    <h3 class="mt-5 mb-3">Beli Snack Hanya di SIPSnack</h3>
                    <p class="text-muted">Gabung dan transaksi di SIPSnack<p>
                </div>
            </div>
            <div class="col-6">
                <div class="card px-5 bg-white shadow-lg rounded border-0 mt-4" style="margin-left: 50px; padding: 24px 40px 32px; width: 400px;">
                    <form method="POST" action="login" class="card-body">
                        @csrf
                        <h3 class="card-title text-center">Masuk</h5>
                        <p class="card-text text-center mb-5">Belum punya akun? <a href="register">Daftar</a></p>
                        <div class="mb-3">
                            <label for="email-input" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="email-input" placeholder="name@example.com">
                        </div>
                        <div class="mb-4">
                            <label for="password-input" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password-input">
                        </div>
                        <div class="d-grid gap-2">
                            <button class="btn btn-primary">Masuk</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-12">
                <p class="text-muted text-center mt-5">© 2023, SIPSnack</p>
        
            </div>
        </div>
    </div>
@endsection