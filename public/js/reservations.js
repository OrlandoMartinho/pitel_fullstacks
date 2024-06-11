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


function excluirReserva(id) {
    if (confirm('Tem certeza que deseja excluir esta reserva?')) {
        // Envie uma solicitação AJAX para excluir o registro com base no ID
        var xhr = new XMLHttpRequest();
        xhr.open('DELETE', '../../controllers/reservas.php', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                // Resposta recebida do arquivo excluir_contato.php
                console.log(xhr.responseText);
                // Atualize a tabela ou faça qualquer outra ação necessária
                location.reload(); // Atualiza a página após a exclusão
            }
        };
        xhr.send('id_reserva=' + id);
     alert("Eliminado com sucesso")
     
    }
}

function aprovarReserva(id) {
    if (confirm('Tem certeza que deseja aprovar esta reserva?')) {
        // Envie uma solicitação AJAX para excluir o registro com base no ID
        var xhr = new XMLHttpRequest();
        xhr.open('PUT', '../../controllers/reservas.php', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                // Resposta recebida do arquivo excluir_contato.php
                console.log(xhr.responseText);
                // Atualize a tabela ou faça qualquer outra ação necessária
                location.reload(); // Atualiza a página após a exclusão
            }
        };
        xhr.send('id_reserva=' + id);
     alert("Aprovada com sucesso")
     
    }
}