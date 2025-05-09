document.addEventListener('DOMContentLoaded', function () {
    const deleteModal = document.getElementById('confirmDeleteModal');
    deleteModal.addEventListener('show.bs.modal', function (event) {
        const button = event.relatedTarget;
        const userName = button.getAttribute('data-user-name');
        const deleteUrl = button.getAttribute('data-delete-url');

        // Atualiza o nome no modal
        deleteModal.querySelector('#modalUserName').textContent = userName;

        // Atualiza o formulário com a action certa
        deleteModal.querySelector('#deleteUserForm').setAttribute('action', deleteUrl);
    });
});
