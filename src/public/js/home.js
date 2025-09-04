document.querySelectorAll('.kanban-item').forEach(card => {
    card.addEventListener('click', function () {
        const title = this.dataset.title;
        const text = this.dataset.text;
        const created = this.dataset.created;

        document.getElementById('chamadoModalLabel').textContent = title;
        document.getElementById('chamadoTitle').textContent = text;

        const taskModal = new bootstrap.Modal(document.getElementById('chamadoModal'));
        taskModal.show();
    });
});

document.querySelectorAll('.kanban-item a, .kanban-item form button').forEach(el => {
    el.addEventListener('click', function(e){
        e.stopPropagation();
    });
});
