<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="../css/styles-login-register copy.css" />


    <link rel="stylesheet" href="../css/fonts.css">
    <?php include '../includes/fonts.php'; ?>
</head>

<body>
    <!-- HEADER-->


    <section class="login-register">
        <div class="login-register__container">

            <div class="login-register__info">

                <div class="register-form-1">
                    <h2>Registro</h2>
                    <form action="../forms/register.php" method="post">
                        <input type="email" name="email" placeholder="correo" required> <br><br>
                        <input type="password" name="password" placeholder="contrasena" required><br><br>
                        <button type="submit" onclick="">Registrar</button>
                    </form>
                    
                </div>

                <div class="register-form-2">
                    <h2>Registro</h2>
                    <form action="../forms/register-2.php" method="post">
                        <input type="text" name="nombre" placeholder="Nombre"><br><br>
                        <input type="text" name="Ap" placeholder="Apellido Paterno"><br><br>
                        <input type="text" name="Am" placeholder="Apellido Materno"><br><br>
                        <input type="text" name="nacionalidad" placeholder="nacionalidad"><br><br>
                        <input type="text" name="edad" placeholder="edad"><br><br>
                        <button type="submit">registrarse</button>
                    </form>
                    
                </div>
            </div>






            <div class="login-register__image-slider">
                <div class="slider-container">
                    <img src="../assets/image/1.png" alt="Imagen 1" class="slider-image active">

                    <img src="../assets/image/2.png" alt="Imagen 2" class="slider-image">
                    <img src="../assets/image/3.png" alt="Imagen 3" class="slider-image">
                </div>
            </div>
    </section>





    <script>
        document.addEventListener('DOMContentLoaded', function() {
           

            // Manejar el slider
            const sliderImages = document.querySelectorAll('.slider-image');
            let currentImageIndex = 0;

            function changeSliderImage() {
                sliderImages.forEach((img, index) => {
                    img.classList.remove('active');
                });
                sliderImages[currentImageIndex].classList.add('active');
            }

            function nextImage() {
                currentImageIndex = (currentImageIndex + 1) % sliderImages.length;
                changeSliderImage();
            }

            // Cambiar la imagen cada 5 segundos automáticamente
            setInterval(nextImage, 5000);

            // Eventos para alternar entre login y registro
            document.querySelector('.login-form .btn-toggle').onclick = function() {
                showForm('.register-form-1'); // Muestra el primer paso del registro
            };

            document.querySelector('.register-form-1 button').onclick = function(e) {
                e.preventDefault(); // Prevenir el envío del formulario para fines de demostración
                showForm('.register-form-2'); // Muestra el segundo paso del registro
            };

            document.querySelector('#btn-back-login').onclick = function() {
                showForm('.login-form'); // Vuelve al login
            };

            document.querySelector('.register-form-2 .btn-toggle').onclick = function() {
                showForm('.register-form-1'); // Vuelve al primer paso del registro
            };

            document.querySelector('.register-form-2 button').onclick = function() {
                alert('Registro completado'); // Aquí puedes agregar la lógica de registro completo
            };
        });
    </script>

</body>

</html>