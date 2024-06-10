<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pitéu</title>
    <link rel="stylesheet" href="public/css/style.css">
    <link rel="stylesheet" href="public/css/font.css">
    <link rel="shortcut icon" href="public/assets/icon/logo.svg" type="image/x-icon">
</head>
<body>
    <div class="loader-container">
        <img src="public/assets/img/loader.gif" alt="Loader" class="loader">
    </div>
    <header>
        <nav>
            <a href="#" class="logo">
                <img src="public/assets/icon/logo.svg" alt="Logo">
            </a>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#about">Sobre</a></li>
                <li><a href="#destaque">Destaque</a></li>
                <li><a href="#reserva">Reserva</a></li>
            </ul>
            <ul class="background-btn" style="cursor: pointer;">
                <a href="#contact" class="btn-header">Contactar-nos</a>
            </ul>
        </nav>
    </header>
    <div class="hero">
        <div class="information-hero">
            <h1>Faça a sua reserva:</h1>
            <h2>Sabores Únicos Esperam <br> por Você No <span>Pitéu</span>!</h2>
            <div class="cards">
                <div class="card">
                    <img src="public/assets/icon/icons8_vegan_food.png" alt="Culinária Autêntica">
                    <p>Culinária Autêntica</p>
                </div>
                <div class="card">
                    <img src="public/assets/icon/Grupo de máscara 1.png" alt="Ambiente Acolhedor">
                    <p>Ambiente Acolhedor</p>
                </div>
                <div class="card">
                    <img src="public/assets/icon/Grupo de máscara 2.png" alt="Serviço de Qualidade">
                    <p>Serviço de Qualidade</p>
                </div>
            </div>
        </div>
        <span class="onda">
            <img src="public/assets/icon/icons8_wave_lines.png" alt="Onda">
        </span>
        <span class="elipse1">
            <img src="public/assets/img/Elipse 2.png" alt="Elipse 1">
        </span>
        <span class="elipse2">
            <img src="public/assets/img/Elipse 3.png" alt="Elipse 2">
        </span>
        <span class="line">
            <img src="public/assets/img/line.png" alt="Linha">
        </span>
        <div class="information-img">
            <img src="public/assets/img/Grupo 76.png" alt="Informação">
        </div>
    </div>
    <div class="about" id="about">
        <div class="about-img">
            <img src="public/assets/img/aboutImg.png" alt="Sobre nós">
        </div>
        <div class="about-information">
            <div class="about-content">
                <h3>Sobre nós</h3>
                <p>Experimente a culinária angolana autêntica no Pitéu. <br>
                   Reserve sua mesa agora para uma experiência <br>
                   gastronômica única e memorável.
                </p>
            </div>
            <div class="about-content">
                <h3>Sobre nós</h3>
                <p>Experimente a culinária angolana autêntica no Pitéu. <br>
                   Reserve sua mesa agora para uma experiência <br>
                   gastronômica única e memorável.
                </p>
            </div>
            <div class="about-content">
                <h3>Sobre nós</h3>
                <p>Experimente a culinária angolana autêntica no Pitéu. <br>
                   Reserve sua mesa agora para uma experiência <br>
                   gastronômica única e memorável.
                </p>
            </div>
        </div>
    </div>
    <div class="main" id="destaque">
        <h3>Destaque</h3>
        <div class="main-cards">
            <div class="main-card">
                <img src="public/assets/img/prato01.png" alt="Arroz com carne">
                <p>Arroz com carne</p>
            </div>
            <div class="main-card">
                <img src="public/assets/img/prato02.png" alt="Arroz com feijão">
                <p>Arroz com feijão</p>
            </div>
            <div class="main-card">
                <img src="public/assets/img/prato01.png" alt="Arroz com batatas fritas">
                <p>Arroz com batatas fritas</p>
            </div>
            <div class="main-card">
                <img src="public/assets/img/prato03.png" alt="Arroz com feijão">
                <p>Arroz com feijão</p>
            </div>
        </div>
    </div>
    <div class="reserva" id="reserva">
        <h3>Reserva</h3>
        <div class="reservas-information">
            <div class="content-reservas">
                <img src="public/assets/img/image-fruits.png" alt="Reservas">
                <p>Garanta seu lugar e saboreie a autêntica culinária no Pitéu! <br>
                   Após reservar uma mesa, ela expirará depois de 10 min do <br>
                   horário definido!</p>
            </div>
            <form class="form" action="controllers/reservas.php" method="POST">
                <div class="input-content">
                    <label for="nome">Nome Completo</label>
                    <input type="text" id="nome" name="nome">
                </div>
                <div class="input-content">
                    <label for="data">Data</label>
                    <input type="date" id="data" name="data">
                </div>
                <div class="input-content">
                    <label for="hora">Hora</label>
                    <input type="time" id="hora" name="hora">
                </div>
                <div class="input-content">
                    <label for="pessoas">Total de pessoas</label>
                    <input type="number" id="pessoas" name="pessoas" min="1" max="10">
                </div>
                <div class="input-content">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email">
                </div>
                <input class="btn" type="submit" value="Reservar">
            </form>
        </div>
    </div>
    <div class="contacts" id="contact">
        <h3>Contactos</h3>
        <div class="contacts-form">
            <form action="controllers/contactos.php" method="POST">
                <div class="contacts-input">
                    <label for="contact-nome">Nome:</label>
                    <input type="text" id="contact-nome" name="nome">
                </div>
                <div class="contacts-input">
                    <label for="contact-email">Email:</label>
                    <input type="email" id="contact-email" name="email">
                </div>
                <div class="contacts-input description">
                    <label for="mensagem">Mensagem</label>
                    <textarea id="mensagem" name="mensagem" cols="30" rows="10"></textarea>
                </div>
                <button class="btn-contacts" type="submit">Enviar</button>
            </form>
        </div>
    </div>
    <footer>
        <div class="footer-information">
            <div class="contacts-footer">
                <h5>Contacto</h5>
                <div class="content-footer">
                    <img src="public/assets/icon/icons8_facebook_208px_2.png" alt="Facebook">
                    <p>facebook/piteu</p>
                </div>
                <div class="content-footer">
                    <img src="public/assets/icon/icons8_instagram_208px.png" alt="Instagram">
                    <p>@piteu</p>
                </div>
                <div class="content-footer">
                    <img src="public/assets/icon/icons8_twitter_208px.png" alt="Twitter">
                    <p>@piteu</p>
                </div>
            </div>
            <div class="links">
                <h5>Links úteis</h5>
                <nav>
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#about">Sobre</a></li>
                        <li><a href="#destaque">Destaque</a></li>
                        <li><a href="#reserva">Reserva</a></li>
                    </ul>
                </nav>
            </div>
            <div class="desc">
                <div class="desc-title">
                    <h5><span>P</span>itéu</h5>
                    <img src="public/assets/icon/lineFooter.png" alt="Line">
                </div>
                <p>Sabores autênticos da culinária angolana. Reserve sua mesa e experimente uma jornada <br>
                   gastronômica inesquecível. Atendimento excepcional em um ambiente acolhedor.
                </p>
            </div>
        </div>
    </footer>
    <script>
        window.addEventListener('load', function() {
            setTimeout(function() {
                document.querySelector('.loader-container').style.display = 'none';
            }, 500); 
        });
    </script>
    <script src="public/js/index.js"></script>
</body>
</html>
