<?php require_once('history.php')?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet1" href="style.css">
    <title>Кондитерская-пекарня Пончик</title>

     <!-- META -->
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <meta name="uisual" content="Made with Uisual (uisual.com)">
     <meta name="author" content="#">
     <meta name="description" content="#">
     <meta name="referrer" content="unsafe-url">
     <meta name="robots" content="index, follow">

     <link rel="preconnect" href="https://res.cloudinary.com">
     <link rel="dns-prefetch" href="https://res.cloudinary.com">
     <link rel="preconnect" href="https://fonts.googleapis.com">
     <link rel="dns-prefetch" href="https://fonts.googleapis.com">
     <link rel="preconnect" href="https://fonts.gstatic.com">
     <link rel="dns-prefetch" href="https://fonts.gstatic.com">

     <link rel="me" href="#">
     <link rel="canonical" href="#">
     <link rel="icon" type="image/png" href="#" sizes="48x48">

     <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap">
     <link rel="preload" as="style" href="style.css">
     <link rel="stylesheet" href="style.css">

   </head>
   <body>

     <header role="banner" class="ui-section-header">
       <div class="ui-layout-container">
         <div class="ui-section-header__layout ui-layout-flex">
           <input type="checkbox" id="ui-section-header--menu-id">
           <label for="ui-section-header--menu-id" class="ui-section-header--menu-icon"></label>
           <h1 class="logo__header"> Пончик </h1>
           <nav role="navigation" class="ui-section-header--nav ui-layout-flex">
             <a href="menu.php" role="link" aria-label="#" class="ui-section-header--nav-link">Меню</a>
             <a href="vacance.php" role="link" aria-label="#" class="ui-section-header--nav-link">Вакансии</a>
             <a href="delivery.php" role="link" aria-label="#" class="ui-section-header--nav-link">Доставка</a>
             <a href="admin/authdb.php" role="link"  class="ui-section-header--nav-link">Администратор</a>
           </nav>
         </div>
       </div>
     </header>
     <main role="main">
       <section class="ui-section-hero">
         <div class="ui-layout-container">
           <div class="ui-section-hero__layout ui-layout-grid ui-layout-grid-2">
             <div>
               <h2>Побалуйте себя сладеньким</h2>
               <p class="ui-text-intro">Пончик — это не только пекарня, но и кафе во французском стиле. Сюда можно прийти на обед, а также посидеть с друзьями за чашкой кофе с десертом.</p>

               <div class="ui-component-cta ui-layout-flex">
                 <a href="form.php" role="link" aria-label="#" class="ui-component-button ui-component-button-normal ui-component-button-primary">Сделать заказ</a>
                 <p class="ui-text-note"><small>Бесплатный десерт в день рождения!</small></p>
               </div>
             </div>

             <img src="images/chocolat-chaud-thermomix-1024x682.jpg" loading="lazy" alt="#" class="ui-image-half-left">
           </div>
         </div>
       </section>
       <section class="ui-section-customer">
         <div class="ui-layout-container">
           <div class="ui-section-customer__layout ui-layout-flex">
             <img src="https://res.cloudinary.com/uisual/image/upload/assets/logos/facebook.svg" alt="#" class="ui-section-customer--logo">
             <img src="https://res.cloudinary.com/uisual/image/upload/assets/logos/pinterest.svg" alt="#" class="ui-section-customer--logo">
             <img src="https://res.cloudinary.com/uisual/image/upload/assets/logos/stripe.svg" alt="#" class="ui-section-customer--logo ui-section-customer--logo-str">
             <img src="https://res.cloudinary.com/uisual/image/upload/assets/logos/dribbble.svg" alt="#" class="ui-section-customer--logo">
             <img src="https://res.cloudinary.com/uisual/image/upload/assets/logos/behance.svg" alt="#" class="ui-section-customer--logo ui-section-customer--logo-bhn">
           </div>
         </div>
       </section>
       <section class="ui-section-feature">
         <div class="ui-layout-container">
           <div class="ui-section-feature__layout ui-layout-grid ui-layout-grid-3">
             <div class="ui-component-card ui-component-card--feature">
               <img src="images/bulochka1.jpg" alt="#" loading="lazy">
               <div class="ui-component-card--feature-content">
                 <h4 class="ui-component-card--feature-title">Только свежая выпечка</h4>
                 <p>Каждое утро мы печем для Вас вкуснейшие булочки</p>
               </div>
             </div>
             <div class="ui-component-card ui-component-card--feature">
               <img src="images/ptifur.jpg" alt="#" loading="lazy">
               <div class="ui-component-card--feature-content">
                 <h4 class="ui-component-card--feature-title">Вы всегда найдете что-то новое</h4>
                 <p>Мы постоянно экспериментируем и создаем для Вас особенные десерты. Они сочетают традиции и новые нотки</p>
               </div>
             </div>
             <div class="ui-component-card ui-component-card--feature">
               <img src="images/americano.jpg" alt="#" loading="lazy">
               <div class="ui-component-card--feature-content">
                 <h4 class="ui-component-card--feature-title">Уютные кофейни и вежливый персонал</h4>
                 <p>Насладитесь десертом с чашечкой кофе в уютной кофейне</p>
               </div>
             </div>
           </div>
         </div>
       </section>
       <section class="ui-section-testimonial">
         <div class="ui-layout-container">
           <div class="ui-layout-column-4 ui-layout-column-center">
             <img src="images/tartlets.jpg" alt="#" class="ui-section-testimonial--avatar">
             <p class="ui-section-testimonial--quote ui-text-intro">&ldquo;Часть секрета успеха в жизни - это есть то, что вам нравится, и позволить еде сражаться внутри вас&rdquo;</p>
             <p class="ui-section-testimonial--author"><strong>Марк Твен</strong></p>
           </div>
         </div>
       </section>     
       
       
     </main>
     <footer class="footer" id="footer">
        <div class="container">
            <div class="footer-item about__footer">
                <h2 class="item-name__footer">О нас</h2>
                <img src="images/footer-decoration.png" alt="decor" class="footer-decoration">
                <p class="footer-text">
                    <span class="newLine">В нашем кафе вежливый и быстрый персонал, а выпечка самая вкусная. 
                    </span>
                    <span class="newLine">Одна из лучших кофеен в городе!</span>
                </p>
            </div>
  
            <div class="footer-item time__footer">
                <h2 class="item-name__footer">График работы</h2>
                <img src="images/footer-decoration.png" alt="decor">
                <p class="footer-text">
                    <span class="newLine"><span class="footer-text-OpenSansBold">Пн - Чт:</span> 7:00-20:00</span> 
                    <span class="newLine"><span class="footer-text-OpenSansBold">Пт - Вс:</span> 8:00-21:00</span> 
                </p>
                
            </div>
            <div class="footer-item place__footer">
                <h2 class="item-name__footer">
                    Наше расположение
                </h2>
                <img src="images/footer-decoration.png" alt="decor">
                <address class="footer-text address-text">
                    <span class="newLine footer-text-OpenSansBold">Минск, ул.Комсомольская 12</span>                     
                </address>                
            </div>
        </div>
    </footer>    
   </body>
</head>

</html>