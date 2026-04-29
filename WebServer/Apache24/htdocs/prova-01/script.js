
document.addEventListener('DOMContentLoaded', () => {

    const form = document.querySelector('.contact-form');

    if (form) {
        form.addEventListener('submit', function (event) {
            event.preventDefault(); 

            const nome = form.querySelector('input[type="text"]').value.trim();
            const email = form.querySelector('input[type="email"]').value.trim();

            if (nome && email) {
                alert("✅ Contato enviado com sucesso! Responderemos em breve. Avante Desbravadores!");

                form.reset();
            } else {
                alert("❌ Por favor, preencha todos os campos obrigatórios (Nome e E-mail).");
            }
        });
    }


    const botaoTroca = document.getElementById('trocarImagemBtn');
    const cabecalho = document.querySelector('.cabecalho');

    const imagemClube = 'url(imagens/clube.jpeg)';
    const imagemBandeira = 'url(imagens/bandeira.jpg)';

    let isClube = true;

    if (botaoTroca && cabecalho) {
        botaoTroca.addEventListener('click', function () {
            if (isClube) {
                cabecalho.style.backgroundImage = imagemBandeira;
                botaoTroca.textContent = 'Trocar para a Foto do Clube';
            } else {
                cabecalho.style.backgroundImage = imagemClube;
                botaoTroca.textContent = 'Trocar para a Bandeira';
            }

            isClube = !isClube;
        });
    }
});
