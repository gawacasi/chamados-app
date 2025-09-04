document.addEventListener('DOMContentLoaded', function () {
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    document.querySelectorAll('.kanban-column').forEach(column => {
        new Sortable(column, {
            group: 'kanban',
            animation: 150,
            onAdd: async function(evt) {
                const item = evt.item;
                const chamadoId = item.getAttribute('data-id');
                const newStatus = evt.to.getAttribute('data-status');

                try {
                    const res = await fetch(`/chamados/${chamadoId}/status`, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': csrfToken,
                            'Content-Type': 'application/json',
                            'Accept': 'application/json'
                        },
                        body: JSON.stringify({ status: newStatus })
                    });

                    const data = await res.json();
                    console.log('Status atualizado:', data);
                } catch (err) {
                    console.error('Erro na requisição:', err);
                }
            }
        });
    });
});