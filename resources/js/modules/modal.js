export function confirmDelete(formId, message) {
    document.getElementById('delete-modal-text').textContent = message;
    const modal = document.getElementById('delete-modal');
    modal.showModal();
    const confirmBtn = document.getElementById('delete-modal-confirm');
    confirmBtn.onclick = () => {
        document.getElementById(formId).submit();
    };
}

window.confirmDelete = confirmDelete;
