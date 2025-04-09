document.querySelectorAll(".delAd").forEach(element => {
    element.addEventListener('click', function (e) {
        e.preventDefault();
        const confirmed = window.confirm('Está seguro?');
        if (confirmed) {
            window.location.href = this.href;
        }
    });
});
