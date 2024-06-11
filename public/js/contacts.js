let notification = document.querySelector('.notification-icon')
let notificationContent = document.querySelector('.notification')
let notificationClose = document.querySelector('.notification-close')

//open modal
notification.addEventListener('click',()=>{
    notificationContent.classList.add('on')
})

//close modal
notificationClose.addEventListener('click',()=>{
    notificationContent.classList.remove('on')
})


function excluirContato(id) {
    if (confirm('Tem certeza que deseja excluir este registro?')) {
        // Envie uma solicitação AJAX para excluir o registro com base no ID
        var xhr = new XMLHttpRequest();
        xhr.open('DELETE', '../../controllers/contactos.php', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                // Resposta recebida do arquivo excluir_contato.php
                console.log(xhr.responseText);
                // Atualize a tabela ou faça qualquer outra ação necessária
                location.reload(); // Atualiza a página após a exclusão
            }
        };
        xhr.send('id_contato=' + id);
     alert("Eliminado com sucesso")
     
    }
}

function mostrarMensagem(mensagem,email,data_do_contato){

    document.querySelector('.content .title-messages').innerText = email;
    document.querySelector('.content .date-send-message').innerText = data_do_contato;
    document.querySelector('.content .messagecontent').innerText = mensagem;


}

document.getElementById('pesquisa').addEventListener('input', function() {
    var filtro = this.value.toLowerCase();
    var containers = document.querySelectorAll('.messages-container');
    var i=0
    containers.forEach(function(container) {
        var email = container.getAttribute('data-email');
        var message = container.getAttribute('data-message');

        if (email.includes(filtro) || message.includes(filtro)||filtro == i) {
            container.style.display = '';
        } else {
            container.style.display = 'none';
        }
        i=i+1
    });
});