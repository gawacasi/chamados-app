<div class="col-md-4">
    <h4 class="text-center text-warning">Pendentes</h4>
    <div class="kanban-column" data-status="PEN">
        @foreach ($chamados['PEN'] as $PEN)
            <div class="card mb-3 p-3 shadow-sm kanban-item" data-id="{{ $PEN->id }}" data-title="{{ $PEN->title }}"
                data-text="{{ $PEN->text }}">

                <div class="d-flex justify-content-between align-items-center mb-2">
                    <h5 class="mb-0">{{ $PEN->title }}</h5>
                    @include('partials.buttons', [
                        'id' => $PEN->id,
                    ])
                </div>

                <p class="text-muted text-truncate">{{ $PEN->text }}</p>

                <hr>

                <p class="text-muted" style="font-size:13px">Criado em : {{ $PEN->created_at->format('d/m/Y') }}</p>
            </div>
        @endforeach
    </div>
</div>
