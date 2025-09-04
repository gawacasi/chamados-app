<div class="col-md-4">
    <h4 class="text-center text-success">Finalizados</h4>
    <div class="kanban-column" data-status="FIN">
        @foreach ($chamados['FIN'] as $FIN)
            <div class="card mb-3 p-3 shadow-sm kanban-item" data-id="{{ $FIN->id }}" data-title="{{ $FIN->title }}"
                data-text="{{ $FIN->text }}">

                <div class="d-flex justify-content-between align-items-center mb-2">
                    <h5 class="mb-0">{{ $FIN->title }}</h5>
                    @include('partials.buttons', [
                        'id' => $FIN->id,
                    ])
                </div>

                <p class="text-muted text-truncate">{{ $FIN->text }}</p>

                <hr>

                <p class="text-muted" style="font-size:13px">Criado em : {{ $FIN->created_at->format('d/m/Y') }}</p>
            </div>
        @endforeach
    </div>
</div>
