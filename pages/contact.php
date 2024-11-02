<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="../css/styles-contact.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/header.css">

    <link rel="stylesheet" href="../css/fonts.css">
  <?php include '../includes/fonts.php'; ?>
</head>

<body>
    <!-- HEADER-->
    <?php include '../includes/header.php'; ?>

    <!-- --------------CONTACT------------- -->

    <section class="contact-section">
        <div class="contact-container">
            <div class="contact-form">
                <h2>Contactanos</h2>
                <form action="#" method="POST">
                    <label for="name">Nombre</label>
                    <input type="text" id="name" name="name" placeholder="Tu nombre" required>

                    <div class="contact-details">
                        <div class="contact-detail">
                            <label for="email">Correo</label>
                            <input type="email" id="email" name="email" placeholder="Tu correo" required>
                        </div>
                        <div class="contact-detail">
                            <label for="phone">Numero de celular</label>
                            <input type="tel" id="phone" name="phone" placeholder="Tu numero de celular" required>
                        </div>
                    </div>

                    <label for="message">Mensaje</label>
                    <textarea id="message" name="message" placeholder="Tu mensaje" rows="5" required></textarea>

                    <button type="submit">Enviar</button>
                </form>
            </div>




            <div class="contact-info">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ratione accusamus repellat alias esse vel ullam </p>
                <ul>
                    <li>
                        <img src="phone-icon.png" alt="Phone Icon">
                        +591591519591
                    </li>
                    <li>
                        <img src="email-icon.png" alt="Email Icon">
                        jiwasa@turism.com
                    </li>
                    <li>
                        <img src="location-icon.png" alt="Location Icon">
                        calle#9124803 av3423
                    </li>
                </ul>
            </div>
        </div>
    </section>







    <!-- FOOTER -->
    <?php include '../includes/footer.php'; ?>
    <script src="../js/header.js"></script>
</body>

</html>