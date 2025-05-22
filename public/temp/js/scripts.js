document.querySelectorAll(".delAd").forEach(element => {
    element.addEventListener('click', function (e) {
        e.preventDefault();
        const confirmed = window.confirm('Tem certeza de que quer deletar o anúncio?');
        if (confirmed) {
            window.location.href = this.href;
        }
    });
});


const whatsApp = document.querySelector('#whatsApp_btn')

if (whatsApp) {

    whatsApp.addEventListener('click', () => {
        const number = whatsApp.getAttribute('data-contact')
        const message = whatsApp.getAttribute('data-message')
        window.open(`https://wa.me/55${number}?text=${message}`, '_blank')
    })
}


document.addEventListener('click', function (event) {
    const el = event.target.closest('.pagination a');
    if (el) {
        event.preventDefault();
        const url = new URL(el.href);
        const page = url.searchParams.get('page');
        if (page) {
            Livewire.emit('gotoPage', page);
        }
    }
});
