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

document.getElementById('pesquisa').addEventListener('input', function() {
    var filtro = this.value.toLowerCase();
    var linhas = document.querySelectorAll('.container-table tbody tr');
    var i=0
    linhas.forEach(function(linha) {
        var nome = linha.querySelector('td:nth-child(1)').innerText.toLowerCase();
        var data = linha.querySelector('td:nth-child(2)').innerText.toLowerCase();
        var hora = linha.querySelector('td:nth-child(3)').innerText.toLowerCase();
        var pessoas = linha.querySelector('td:nth-child(4)').innerText.toLowerCase();
        var aprovado = linha.querySelector('td:nth-child(5)').innerText.toLowerCase();
        var email = linha.querySelector('td:nth-child(6)').innerText.toLowerCase();

        if (nome==filtro || data==filtro || hora==filtro || pessoas==filtro || aprovado==filtro || email==filtro ||filtro == i) {
            linha.style.display = '';
        }
        else {
            linha.style.display = 'none';
        }

        i=i+1
    });
});

function excluirReserva(id) {
if (confirm('Tem certeza que deseja excluir esta reserva?')) {
var xhr = new XMLHttpRequest();
xhr.open('DELETE', '../../controllers/reservas.php', true);
xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
xhr.onreadystatechange = function() {
    if (xhr.readyState == 4 && xhr.status == 200) {
        console.log(xhr.responseText);
        
        alert("Eliminado com sucesso");
        
    }
};
xhr.send('id_reserva=' + id);
location.reload();
}
}

function aprovarReserva(id) {
if (confirm('Tem certeza que deseja aprovar esta reserva?')) {

var xhr = new XMLHttpRequest();
xhr.open('PUT', '../../controllers/reservas.php', true);
xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
xhr.onreadystatechange = function() {
    if (xhr.readyState == 4 && xhr.status == 200) {

        console.log(xhr.responseText);
        alert("Aprovada com sucesso");
    }
};
xhr.send('id_reserva=' + id);
location.reload();
}
}
