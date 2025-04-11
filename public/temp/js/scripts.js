document.querySelectorAll(".delAd").forEach(element => {
    element.addEventListener('click', function (e) {
        e.preventDefault();
        const confirmed = window.confirm('Está seguro?');
        if (confirmed) {
            window.location.href = this.href;
        }
    });
});


const whatsApp = document.querySelector('#whatsApp_btn')

whatsApp.addEventListener('click', () => {
    const number = whatsApp.getAttribute('data-contact')
    const message = whatsApp.getAttribute('data-message')
    window.open(`https://wa.me/55${number}?text=${message}`, '_blank')
})
