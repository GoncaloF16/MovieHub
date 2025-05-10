document.addEventListener('DOMContentLoaded', function () {
    const deleteModal = document.getElementById('confirmDeleteModal');
    if (deleteModal) {
        deleteModal.addEventListener('show.bs.modal', function (event) {
            const button = event.relatedTarget;
            const userName = button.getAttribute('data-user-name');
            const deleteUrl = button.getAttribute('data-delete-url');

            deleteModal.querySelector('#modalUserName').textContent = userName;

            deleteModal.querySelector('#deleteUserForm').setAttribute('action', deleteUrl);
        });
    }

    const updateModal = document.getElementById('confirmUpdateModal');
    const updateButton = document.getElementById('confirmUpdateButton');

    if (updateButton) {
        updateButton.addEventListener('click', function () {
            document.getElementById('updateMovieForm').submit();
        });
    }
});
