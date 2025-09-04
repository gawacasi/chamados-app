@extends('layouts.main_layout')
@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col">
                <div class="row mb-3 align-items-center">
                    @include('partials.header_bar')
                    <div class="row">
                        <div class="col">
                            <p class="display-6 mb-0">Novo Chamado</p>
                        </div>
                        <div class="col text-end">
                            <a href="{{ route('home') }}" class="btn btn-outline-danger">
                                <i class="fa-solid fa-xmark"></i>
                            </a>
                        </div>
                    </div>
                    @if($errors->any())
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </div>
                    @endif
                    <form action="{{ route('editSubmit') }}" method="post">
                        @csrf
                        <input type="hidden" name="chamado_id" value="{{ Crypt::encrypt($chamado->id) }}">
                        <div class="row mt-3">
                            <div class="col">
                                <div class="mb-3">
                                    <label class="form-label">Chamado Title</label>
                                    <input type="text" class="form-control bg-primary text-white" value="{{ $chamado->title }}" name="text_title">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Chamado Text</label>
                                    <textarea class="form-control bg-primary text-white"  name="text_chamado"  rows="5">{{ $chamado->text }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col text-end">
                                <a href="{{ route('home') }}" class="btn btn-primary px-5"><i
                                        class="fa-solid fa-ban me-2"></i>Cancel</a>
                                <button type="submit" class="btn btn-info px-5"><i
                                        class="fa-regular fa-circle-check me-2"></i>Save Changes</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    @endsection
