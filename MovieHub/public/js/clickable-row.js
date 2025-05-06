document.querySelectorAll('.clickable-row').forEach(row => {
    row.addEventListener('click', function() {
        window.location = this.dataset.href;
    });
});

document.querySelectorAll('.remove-favorite-form').forEach(form => {
    form.addEventListener('click', function(event) {
        event.stopPropagation(); 
    });
});
