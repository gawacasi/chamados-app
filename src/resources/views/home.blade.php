@extends('layouts.main_layout')
@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col">
                <div class="row mb-3 align-items-center">
                    <div class="col">
                        <img src="assets/images/zebra.png" style="max-width: 70px" alt="Notes logo">
                    </div>

                    @include('header_bar')

                    @if (count($chamados) == 0)
                        <div class="row mt-5">
                            <div class="col text-center">
                                <p class="display-6 mb-5 text-secondary opacity-50">Sem chamados disponiveis!</p>
                                <a href={{ route('createChamado') }} class="btn btn-secondary btn-lg p-3 px-5">
                                    <i class="fa-regular fa-pen-to-square me-3"></i>Crie um Chamado
                                </a>
                            </div>
                        </div>
                        <hr class="my-5">
                    @else
                        <div class="d-flex justify-content-end mb-3">
                            <a href="#" class="btn btn-secondary px-3">
                                <i class="fa-regular fa-pen-to-square me-2"></i>Novo Chamado
                            </a>
                        </div>

                        <div class="row">

                            {{-- Coluna PEN --}}
                            <div class="col-md-4 border-end">
                                <h4 class="text-center text-warning">Pendentes</h4>
                                <div class="kanban-column" data-status="PEN">
                                    @foreach ($chamados['PEN'] as $PEN)
                                        <div class="card mb-3 p-3 shadow-sm kanban-item" data-id="{{ $PEN->id }}">
                                            <h5>{{ $PEN->title }}</h5>
                                            <p class="text-muted text-truncate">{{ $PEN->text }}</p>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            {{-- Coluna DEV --}}
                            <div class="col-md-4 border-end">
                                <h4 class="text-center text-info">Em Progresso</h4>
                                <div class="kanban-column" data-status="DEV">
                                    @foreach ($chamados['DEV'] as $DEV)
                                        <div class="card mb-3 p-3 shadow-sm kanban-item" data-id="{{ $DEV->id }}">
                                            <h5>{{ $DEV->title }}</h5>
                                            <p class="text-muted text-truncate">{{ $DEV->text }}</p>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            {{-- Coluna FIN --}}
                            <div class="col-md-4">
                                <h4 class="text-center text-success">Concluídos</h4>
                                <div class="kanban-column" data-status="FIN">
                                    @foreach ($chamados['FIN'] as $FIN)
                                        <div class="card mb-3 p-3 shadow-sm kanban-item" data-id="{{ $FIN->id }}">

                                            {{-- Linha do título + ícones --}}
                                            <div class="d-flex justify-content-between align-items-center mb-2">
                                                <h5 class="mb-0">{{ $FIN->title }}</h5>
                                                <div class="d-flex gap-1">
                                                    <!-- Ícone editar -->
                                                    <a href=""
                                                        class="text-secondary">
                                                        <i class="fa-regular fa-pen-to-square"></i>
                                                    </a>
                                                    <!-- Ícone deletar -->
                                                    <form action=""
                                                        method="POST" class="m-0 p-0">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn p-0 border-0 text-danger">
                                                            <i class="fa-regular fa-trash-can"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>

                                            {{-- Descrição do card --}}
                                            <p class="text-muted text-truncate">{{ $FIN->text }}</p>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                    @endif
                </div>
            </div>
        </div>
    @endsection
