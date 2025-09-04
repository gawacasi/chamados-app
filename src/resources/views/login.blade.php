@extends('layouts.main_layout')
@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6 col-sm-8">
                <div class="card p-5">

                    @if($errors->any())
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </div>
                    @endif
                     
                    @if(session('loginError'))
                        <div class="alert alert-danger">
                           <li>{{ session('loginError') }}</li>
                        </div>
                    @endif

                        <div class="text-center p-3">
                            <img src="assets/images/logo.png" alt="Chamados-Logo">
                        </div>

                        <div class="row justify-content-center">
                            <div class="col-md-10 col-12">
                                <form action="/loginSub" method="post" novalidate>
                                    @csrf
                                    <div class="mb-3">
                                        <label for="text_username" class="form-label">Username</label>
                                        <input type="email" class="form-control bg-dark text-info" name="text_username"
                                            value="{{ old('text_username') }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="text_password" class="form-label">Password</label>
                                        <input type="password" class="form-control bg-dark text-info" name="text_password"
                                            value="{{ old('text_password') }}">
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" class="btn btn-secondary w-100">LOGIN</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="text-center text-secondary mt-3">
                            <small>&copy; <?= date('Y') ?> Chamados-App</small>
                        </div>

                </div>
            </div>
        </div>
    </div>
@endsection
