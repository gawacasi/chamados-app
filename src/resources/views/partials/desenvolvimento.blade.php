<div class="col-md-4">
    <h4 class="text-center text-info">Em Desenvolvimento</h4>
    <div class="kanban-column" data-status="DEV">
        @foreach ($chamados['DEV'] as $DEV)
            <div class="card mb-3 p-3 shadow-sm kanban-item" data-id="{{ $DEV->id }}" data-title="{{ $DEV->title }}"
                data-text="{{ $DEV->text }}"">

                <div class="d-flex justify-content-between align-items-center mb-2">
                    <h5 class="mb-0">{{ $DEV->title }}</h5>
                    @include('partials.buttons', [
                        'id' => $DEV->id,
                    ])
                </div>

                <p class="text-muted text-truncate">{{ $DEV->text }}</p>

                <hr>

                <p class="text-muted" style="font-size:13px">Criado em : {{ $DEV->created_at->format('d/m/Y') }}</p>
            </div>
        @endforeach
    </div>
</div>
