
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- META -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="uisual" content="Made with Uisual (uisual.com)">
    <meta name="author" content="#">
    <meta name="description" content="#">
    <meta name="referrer" content="unsafe-url">
    <meta name="robots" content="index, follow">
    <!-- SPEED -->
    <link rel="preconnect" href="https://res.cloudinary.com">
    <link rel="dns-prefetch" href="https://res.cloudinary.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="dns-prefetch" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <!-- LINK -->
    <link rel="me" href="#">
    <link rel="canonical" href="#">
    <link rel="icon" type="image/png" href="#" sizes="48x48">
    <!-- PERFORMANCE -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap">
   <!--<link rel="preload" as="style" href="style.css">-->
    <link rel="stylesheet" href="form.css">

    <title>Заполнение формы</title>
  </head>
  <body>
    <header role="banner" class="ui-section-header newcolor">
      <div class="ui-layout-container">
        <div class="ui-section-header__layout ui-layout-flex">
          <!-- LOGO -->
          <a href="#" role="link" aria-label="#">
            
          </a>
          <!-- MENU -->
          <a href="main_page.php" role="link" aria-label="#" class="ui-component-button ui-component-button-normal ui-component-button-primary">Вернуться назад</a>
        </div>
      </div>
    </header>
    <main role="main">
      <section class="ui-section-hero newcolor">
        <div class="ui-layout-container">
          <!-- COPYWRITING -->
            <h1 class = "maintext">Десерт у Вас дома</h1>
            <p class="ui-text-intro">Закажите десерт на сайте и наши курьеры в кратчайшие сроки доставят его прямо Вам домой!</p>                  
        </div>
      </section>

      <section class="reservations" id="reservations">
        <div class="container">
            <div class="pic__container">          
                <img src="images/raf.jpeg" alt="dessert" class ="ui-image-half-left">
            </div>
            <div class="info">
                <h2 class="reservations__promo">
                    Форма для заказа
                </h2>
                <img src="images/footer-decoration.png" class="reservations__divider">
                    <p class="reservations__text first-paragraph">
                        Пожалуйста, введите все необходимые данные и мы свяжемся с Вами 
                    </p>
                    
                    <form class="reservations__form" method="post" onsubmit="">
                        <div class="input__container">
                            <label class="form__text">
                                Имя
                            </label>
                            <input name="order_name" class="reservations__input" type="text"  placeholder="your name *" required>
                        </div>
                        <div class="input__container">
                            <label class="form__text">
                                Email
                            </label>
                            <input name="order_email"  class="reservations__input" type="email" placeholder="your email *" required>
                        </div>     
                        <div class="input__container">
                            <label class="form__text">
                                Количество десертов
                            </label>                        
                            <select name="des_count" class="reservations__date" required>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>                               
                            </select>
                        </div>     
                        <div class="input__container">
                            <label class="form__text">
                                Десерт
                            </label>
                            <select name="des_name" class="reservations__select" required>
                                <option value="Наполеон">Наполеон</option>
                                <option value="Птифур">Птифур</option>
                                <option value="Макарони">Макарони</option>
                                <option value="Тарталетки">Тарталетки</option>
                                <option value="Тирамису">Тирамису</option>
                            </select>
                        </div>
                        <input type="submit" name="submit"  class="ui-component-button ui-component-button-normal ui-component-button-primary buttoncheck" value="Заказать!">
                       <!-- <a href="form.html" role="link" aria-label="#" class="ui-component-button ui-component-button-normal ui-component-button-primary buttoncheck">Заказать!</a>-->
                    </form>
            </div>
        </div>
    </section>


    </main>
    
  </body>
</html>
<?php  require_once('history.php'); require_once('email_send/form_script.php');
?>