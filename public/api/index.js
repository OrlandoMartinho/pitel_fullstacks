fetch('http://localhost/pitel/controllers/reservas.php')
        .then(response => {
          if (!response.ok) {
            throw new Error('Erro na rede: ' + response.statusText);
          }
          return response.text();
        })
        .then(str => (new window.DOMParser()).parseFromString(str, "application/xml"))
        .then(data => {
          console.log('Resposta como XML:', data);

          const contactsList = document.getElementById('contactsList');
          contactsList.innerHTML = '';

          var contatos = data.getElementsByTagName('contato');
          for (var i = 0; i < contatos.length; i++) {
            var nome = contatos[i].getElementsByTagName('nome')[0].textContent;
            var email = contatos[i].getElementsByTagName('email')[0].textContent;
            var mensagem = contatos[i].getElementsByTagName('mensagem')[0].textContent;

            var contactItem = document.createElement('div');
            contactItem.textContent = `Nome: ${nome}, Email: ${email}, Mensagem: ${mensagem}`;
            contactsList.appendChild(contactItem);
          }
        })
        .catch(error => {
          console.error('Erro:', error);
          alert('Ocorreu um erro ao carregar os contatos: ' + error.message);
        });