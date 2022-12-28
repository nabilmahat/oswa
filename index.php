<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!--=============== FAVICON ===============-->
        <link rel="shortcut icon" href="assets/img/logoo.png" type="image/x-icon">

        <!--=============== REMIXICONS ===============-->
        <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">

        <!--=============== CSS ===============-->
        <link rel="stylesheet" href="assets/css/styles.css">

        <title>Online Survey Web Application</title>
    </head>
    <body>
        <!--==================== HEADER ====================-->
        <header class="header" id="header">
            <nav class="nav container"> 
                <a href="" class="nav__logo">
                    <img src="assets/img/logoo.png" alt="logo image">
                    OSWA
                </a>
                <div class="nav__menu" id="nav-menu">
                    <ul class="nav__list">
                        <li class="nav__item">
                            <a href="#home" class="nav__link active-link">Home</a>                      
                        </li>
                        <li class="nav__item">
                            <a href="#about" class="nav__link">About Us</a>                      
                        </li>
                        <li class="nav__item">
                            <a href="#popular" class="nav__link">Popular</a>                      
                        </li>
                        <li class="nav__item">
                            <a href="#recently" class="nav__link">Recently</a>                      
                        </li>
                        <li class="nav__item">
                            <a href="login.php" class="nav__link">Login</a>                      
                        </li>
                        <li class="nav__item">
                            <a href="register.php" class="nav__link">Register</a>                      
                        </li>
                    </ul>

                    <!-- Close Button -->
                    <div class="nav__close" id="nav-close">
                        <i class="ri-close-line"></i>
                    </div>
                    <img src="assets/img/leaf-branch-4.png" alt="nav image" class="nav__img-1">
                    <img src="assets/img/leaf-branch-3.png" alt="nav image" class="nav__img-2">
                </div>

                <div class="nav__buttons">
                    <!-- Theme change button -->
                    <i class="ri-moon-line change-theme" id="theme-button"></i> 

                    <!-- Toggle button -->
                    <div class="nav__toggle" id="nav-toggle">
                        <i class="ri-apps-2-line"></i>
                    </div>

                </div>
            </nav>
        </header>

        <!--==================== MAIN ====================-->
        <main class="main">
            <!--==================== HOME ====================-->
            <section class="home section" id="home">
                <div class="home__container container grid">
                    <img src="assets/img/home-online-survey.png" alt="home image" class="home__img">

                    <div class="home__data">
                        <h1 class="home__title">
                            Online Survey

                            <div>
                                <img src="assets/img/home-oswa-title.png" alt="home image">
                                Web App
                            </div>
                        </h1>

                        <p class="home__description">
                            Create beautiful surveys in a matter of minutes. Urban things, Survey Company thinks.
                        </p>

                        <a href="login.php" class="button">
                            Login Now<i class="ri-arrow-right-line"></i>
                        </a>
                    </div>
                </div>

                <img src="assets/img/leaf-branch-2.png" alt="home image" class="home__leaf-1">
                <img src="assets/img/leaf-branch-4.png" alt="home image" class="home__leaf-2">
            </section>

            <!--==================== ABOUT ====================-->
            <section class="about section" id="about">
                <div class="about__container container grid">
                    <div class="about__data">
                        <span class="section__subtitle">About Us</span>
                        <h2 class="section__title about__title">
                            <div>
                                We Provide
                                <img src="assets/img/about-oswa-title.png" alt="about image">
                            </div>

                            Simple and Beautiful <br> Data Visualizations
                        </h2>

                        <p class="about__description">
                            Easily create stunning survey visualizations with OSWA, the powerful platform for data visualization and storytelling.
                        </p>
                    </div>

                    <img src="assets/img/about-online-survey.png" alt="about image" class="about__img">
                </div>

                <img src="assets/img/leaf-branch-1.png" alt="about image" class="about__leaf">
            </section>

            <!--==================== POPULAR ====================-->
            <section class="popular section" id="popular">
                <span class="section__subtitle">The Best Features</span>
                <h2 class="section__title">Popular Features</h2>

                <div class="popular__container container grid">
                    <article class="popular__card">
                        <img src="assets/img/popular-drag-and-drop.png" alt="popular image" class="popular__img">

                        <h3 class="popular__name">Drag-and-Drop Editor</h3>
                        <span class="popular__description">You can choose the type of question you want to ask, drag it over into your 
                            survey, modify it the way you want, and the survey is done!</span>
                    </article>
                    <article class="popular__card">
                        <img src="assets/img/popular-analysis-req.png" alt="popular image" class="popular__img">

                        <h3 class="popular__name">Analysis Requirements</h3>
                        <span class="popular__description">You can simply add analysis requirement in the 
                            dashboard and ease your time to recognize data trends and patterns.</span>

                    </article>
                    <article class="popular__card">
                        <img src="assets/img/popular-add-survey.png" alt="popular image" class="popular__img">

                        <h3 class="popular__name">Add Survey on the Website</h3>
                        <span class="popular__description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</span>

                    </article>
                </div>
            </section>

            <!--==================== RECENTLY ====================-->
            <section class="recently section" id="recently">
               <div class="recently__container container grid">
                    <div class="recently_data">
                        <span class="section__subtitle">Recently Added</span>
                        <h2 class="section__title">
                            Show Reports <br>
                            in Real-Time
                        </h2>

                        <p class="recently__description">
                            Instant and simple survey report sharing helps acquire immediate reviews or feedback on data, resulting in a more thorough analysis
                        </p>

                        <img src="assets/img/logoo.png" alt="recently image" class="recently__data-img">
                    </div>

                    <img src="assets/img/recently-online-surveyy.png" alt="recently image" class="recently__img">
               </div> 

               <img src="assets/img/leaf-branch-2.png" alt="recently image" class="recently__leaf-1">
               <img src="assets/img/leaf-branch-3.png" alt="recently image" class="recently__leaf-2">
            </section>

            <!--==================== NEWSLETTER ====================-->
            <section class="newsletter section">
                <div class="newsletter__container container">
                    <div class="newsletter__content grid">
                        <img src="assets/img/newsletter-online-survey.png" alt="newsletter image" class="newsletter__img">
                        
                        <div class="newsletter__data">
                            <span class="section__subtitle">Newsletter</span>
                            <h2 class="section__title">
                                Subscribe For <br>
                                Offer Updates
                            </h2>

                            <form action="" class="newsletter__form">
                                <input type="email" placeholder="Enter email" class="newsletter__input">

                                <button class="button newsletter__button">
                                    Subscribe <i class="ri-send-plane-line"></i>
                                </button>
                            </form>
                        </div>
                    </div>

                    <img src="assets/img/logoo.png" alt="newsletter image" class="newsletter__spinach">
                </div>
            </section>
        </main>

        <!--==================== FOOTER ====================-->
        <footer class="footer">
            <div class="footer__container container grid">
                <div>
                    <a href="#" class="footer__logo">
                        <img src="assets/img/logoo.png" alt="logo image">
                        OSWA
                    </a>

                    <p class="footer__description">
                        Create beautiful surveys <br>
                        in a matter of minutes. <br>
                        Urban things, Survey Company thinks.
                    </p>
                </div>

                <div class="footer__content">
                    <div>
                        <h3 class="footer__title">Main Menu</h3>

                        <ul class="footer__links">
                            <li>
                                <a href="#about" class="footer__link">About</a>
                            </li>
                            <li>
                                <a href="#popular" class="footer__link">Popular</a>
                            </li>
                            <li>
                                <a href="#recently" class="footer__link">Recently</a>
                            </li>
                        </ul>
                    </div>

                    <div>
                        <h3 class="footer__title">Information</h3>

                        <ul class="footer__links">
                            <li>
                                <a href="#" class="footer__link">Contact</a>
                            </li>
                            <li>
                                <a href="#" class="footer__link">Order & Returns</a>
                            </li>
                            <li>
                                <a href="#" class="footer__link">Videos</a>
                            </li>
                            <li>
                                <a href="#" class="footer__link">Reservation</a>
                            </li>
                        </ul>
                    </div>

                    <div>
                        <h3 class="footer__title">Address</h3>

                        <ul class="footer__links">
                            <li class="footer__information">
                                Av. Hacienda 1234, <br>
                                Kulim, Kedah, Malaysia.
                            </li>
                            <li class="footer__information">
                                9AM - 11PM
                            </li>
                            
                        </ul>
                    </div>

                    <div>
                        <h3 class="footer__title">Social Media</h3>

                        <ul class="footer__social">
                            <a href="https://www.facebook.com/" target="_blank" class="footer__social-link">
                                <i class="ri-facebook-circle-fill"></i>
                            </a>
                            <a href="https://www.instagram.com/" target="_blank" class="footer__social-link">
                                <i class="ri-instagram-fill"></i>
                            </a>
                            <a href="https://twitter.com/" target="_blank" class="footer__social-link">
                                <i class="ri-twitter-fill"></i>
                            </a>
                        </ul>
                    </div>
                </div>

                <img src="assets/img/logoo.png" alt="footer image" class="footer__onion">
                <img src="assets/img/logoo.png" alt="footer image" class="footer__spinach">
                <img src="assets/img/leaf-branch-4.png" alt="footer image" class="footer__leaf">
            </div>

            <div class="footer__info container">
                <div class="footer__card">
                    <img src="assets/img/footer-card-1.png" alt="footer image">
                    <img src="assets/img/footer-card-2.png" alt="footer image">
                    <img src="assets/img/footer-card-3.png" alt="footer image">
                    <img src="assets/img/footer-card-4.png" alt="footer image">
                </div>

                <span class="footer__copy">
                    &#169; Copyright OSWA. All rights reserved
                </span>
            </div>
        </footer>

        <!--========== SCROLL UP ==========-->
        <a href="#" class="scrollup" id="scroll-up">
            <i class="ri-arrow-up-line"></i>
        </a>

        <!--=============== SCROLLREVEAL ===============-->
        <script src="assets/js/scrollreveal.min.js"></script>

        <!--=============== MAIN JS ===============-->
        <script src="assets/js/main.js"></script>
    </body>
</html>





