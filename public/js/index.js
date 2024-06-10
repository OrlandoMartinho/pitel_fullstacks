// Seleciona o header e a imagem de referência
const header = document.querySelector('header');
const targetImage = document.querySelector('.information-img img');

// Função para verificar a posição de rolagem
function checkScroll() {
    // Obtém a posição da imagem em relação ao topo da página
    const imagePosition = targetImage.getBoundingClientRect().top + window.scrollY;
    
    // Se a posição de rolagem é maior que a posição da imagem, adiciona a classe de sombra
    if (window.scrollY > imagePosition) {
        header.classList.add('header-shadow');
    } else {
        header.classList.remove('header-shadow');
    }
}

// Adiciona o evento de rolagem para chamar a função checkScroll
window.addEventListener('scroll', checkScroll);
