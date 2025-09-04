@extends('layouts.main_layout')
@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col">
                <div class="row mb-3 align-items-center">

                    @include('partials.header_bar')
                    <div class="d-flex justify-content-end mb-3">
                        <a href="{{ route('createChamado') }}" class="btn btn-secondary px-3">
                            <i class="fa-regular fa-pen-to-square me-2"></i>Novo Chamado
                        </a>
                    </div>
                    <div class="row">
                        @include('partials.pendentes')
                        @include('partials.desenvolvimento')
                        @include('partials.finalizados')
                    </div>
                </div>
            </div>
            @include('partials.modal')
        @endsection
