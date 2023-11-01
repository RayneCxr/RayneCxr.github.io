<?php
    session_start();
    require "../aksi/koneksi.php";

    if (!isset($_SESSION['login'])) {
        header("Location: login.php");
    }

    if (isset($_POST['tambah'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];
        $foto = $_FILES['foto']['name'];

        $tanggal = date('Y-m-d h-i-s');
        $x = explode('.', $foto);
        $ekstensi = strtolower(end($x));

        $new_foto = "$tanggal.$name.$ekstensi";
        $tmp = $_FILES['foto']['tmp_name'];

        if (move_uploaded_file($tmp, "../img/".$new_foto)) {
            $result = mysqli_query($conn, "INSERT INTO posttest VALUES ('', '$name', '$email', '$subject', '$message', '$new_foto')");

            if ($result) {
                echo "
                <script>
                    alert('Data berhasil ditambahkan!');
                    document.location.href = 'komen.php';
                </script>";
            } else {
                echo "
                <script>
                    alert('Data gagal ditambahkan!');
                </script>";
            }

        } else {
            echo "
            <script>
                alert('Data gagal ditambahkan!');
            </script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- FAVICON -->
    <link rel="shortcut icon" href="">
    <!-- REMIXICON -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.4.0/remixicon.css" crossorigin="">
    <!-- CSS -->
    <link rel="stylesheet" href="../style.css">
    <title>Posttest 4</title>
</head>
<body>
    <!-- HEADER -->
    <header class="header" id="header">
        <nav class="nav container">
            <a href="#" class="nav__logo">
                <span class="nav__logo-circle"><img src="../gambar/logo.jpg" alt="logo"></span>
                <span class="nav__logo-name">ONE OK ROCK</span>
            </a>

            <div class="nav__menu" id="nav-menu">
                <span class="nav__title">MENU</span>

                <h3 class="nav__name">One Ok Rock</h3>

                <ul class="nav__list">
                    <li class="nav__item">
                        <a href="#home" class="nav__link">HOME</a>
                    </li>

                    <li class="nav__item">
                        <a href="#about" class="nav__link">ABOUT ME</a>
                    </li>

                    <li class="nav__item">
                        <a href="#albums" class="nav__link">ALBUMS</a>
                    </li>

                    <li class="nav__item">
                        <a href="#comment" class="nav__link nav__link-button">COMMENT</a>
                    </li>
                    
                    <li class="nav__item">
                        <a href="../file/login.php" class="nav__link nav__link-button">LOGIN</a>
                    </li>

                    <li class="nav__item">
                        <a href="logout.php" class="nav__link nav__link-button">LOGOUT</a>
                    </li>
                </ul>

                <!-- close btn -->
                <div class="nav__close" id="nav-close">
                    <i class="ri-close-line"></i>
                </div>
            </div>
            <div class="nav__buttons">
                <!-- theme button -->
                <i class="ri-moon-line change-theme" id="theme-button"></i>

                <!-- toggle btn -->
                <div class="nav__toggle" id="nav-toggle">
                    <i class="ri-menu-line"></i>
                </div>
            </div>
        </nav>
    </header>
    <!-- MAIN -->
    <main class="main">
        <!-- HOME -->
        <section class="home section" id="home">
            <div class="home__container container grid">
                <h1 class="home__name">
                    One Ok Rock
                </h1>

                <div class="home__perfil">
                    <div class="home__image">
                        <img src="../gambar/backgrd.png" alt="gambar" class="home__img">
                        <div class="home__shadow"></div>

                        <!-- <img src="taka.jpg" alt="" class="home__arrow">
                        <img src="taka.jpg" alt="" class="home__line">

                        <div class="geometric-box"></div> -->
                    </div>

                    <div class="home__social">
                        <a href="https://www.instagram.com/oneokrockofficial/" target="_blank" class="home__social-link">
                            <i class="ri-instagram-line"></i>
                        </a>

                        <a href="" target="_blank" class="home__social-link">
                            <i class="ri-link"></i>
                        </a>

                        <a href="" target="_blank" class="home__social-link">
                            <i class="ri-github-fill"></i>
                        </a>
                    </div>
                </div>

                <div class="home__info">
                    <p class="home__description">
                        <b>One Ok Rock</b> (Japanese: ワンオクロック, Hepburn: <i>Wan Oku Rokku</i>) (stylized in all caps as <b>ONE OK ROCK</b>) is a Japanese rock band, formed in Tokyo, Japan, in 2005. Originally five members, the band currently consists of vocalist Takahiro Moriuchi, guitarist and bandleader Toru Yamashita, bassist Ryota Kohama, and drummer Tomoya Kanki.
                    </p>

                    <a href="#about" class="home__scroll">
                        <div class="home__scroll-box">
                            <i class="ri-arrow-down-s-line"></i>
                        </div>

                        <span class="home__scroll-text">Scroll Down</span>
                    </a>
                </div>
            </div>
        </section>
        <!-- ABOUT -->
        <section class="about section" id="about">
            <div class="about__container container grid">
                <h2 class="section__title-1">
                    About Me.
                </h2>

                <div class="about__perfil">
                    <div class="about__image">
                        <img src="../gambar/wallpaperflare.com_wallpaper.jpg" alt="image" class="about__img">
                    </div>
                </div>

                <div class="about__info">
                    <p class="about__description">
                        KNow more about me
                    </p>

                    <div class="about__buttons">
                        <a href="https://www.instagram.com/___.me2___/" class="button">
                            <i class="ri-send-plane-line"></i>Contact Me
                        </a>
                        <a href="../file/index2.html" target="_blank" class="button__ghost">
                            <i class="ri-arrow-right-up-line"></i>Go
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <!-- SERVICE -->
        <section class="service section"></section>
        <!-- ALBUMS -->
        <section class="albums section" id="albums">
            <h2 class="section__title-1">
                <span>Albums.</span>
            </h2>

            <div class="albums__container container grid">
                <article class="albums__card">
                    <div class="albums__image">
                        <img src="../gambar/SY.jpg" alt="image" class="albums__img">

                        <a href="https://www.youtube.com/watch?v=YdWJmKSVf5c" class="albums__button button">
                            <i class="ri-arrow-right-up-line"></i>
                        </a>
                    </div>

                    <div class="albums__content">
                        <h3 class="albums__subtitle">ONE OK ROCK - Save Yourself Japanese Version [OFFICIAL MUSIC VIDEO]</h3>
                        <h2 class="albums__title">Luxury Disease</h2>

                        <p class="albums__description">
                            New Album “Luxury Disease” 9/9 Release
                            Japanese Version - https://OOR.lnk.to/LDJAW
                            International Version - https://oor.lnk.to/luxurydisease
                        </p>
                    </div>

                    <div class="albums__buttons">
                        <a href="https://open.spotify.com/artist/7k73EtZwoPs516ZxE72KsO?si=gtMHXNa4RQ-wVtKR5PU_Ag" target="_blank" class="albums__link">
                            <i class="ri-spotify-line"></i> View
                        </a>

                        <a href="https://www.youtube.com/@ONEOKROCK" target="_blank" class="albums__link">
                            <i class="ri-youtube-line"></i> View
                        </a>
                    </div>
                </article>

                <article class="albums__card">
                    <div class="albums__image">
                        <img src="../gambar/SOFI.jpg" alt="image" class="albums__img">

                        <a href="https://www.youtube.com/watch?v=IGInsosP0Ac" class="albums__button button">
                            <i class="ri-arrow-right-up-line"></i>
                        </a>
                    </div>

                    <div class="albums__content">
                        <h3 class="albums__subtitle">ONE OK ROCK: Stand Out Fit In [OFFICIAL VIDEO]</h3>
                        <h2 class="albums__title">Eye Of The Storm</h2>

                        <p class="albums__description">
                            ONE OK ROCK's official video for 'Stand Out Fit In'.
                            Directed By Peter Huang
                        </p>
                    </div>

                    <div class="albums__buttons">
                        <a href="https://open.spotify.com/artist/7k73EtZwoPs516ZxE72KsO?si=gtMHXNa4RQ-wVtKR5PU_Ag" target="_blank" class="albums__link">
                            <i class="ri-spotify-line"></i> View
                        </a>

                        <a href="https://www.youtube.com/@ONEOKROCK" target="_blank" class="albums__link">
                            <i class="ri-youtube-line"></i> View
                        </a>
                    </div>
                </article>

                <article class="albums__card">
                    <div class="albums__image">
                        <img src="../gambar/WA.jpg" alt="image" class="albums__img">

                        <a href="https://www.youtube.com/watch?v=nU307tV32B0" class="albums__button button">
                            <i class="ri-arrow-right-up-line"></i>
                        </a>
                    </div>

                    <div class="albums__content">
                        <h3 class="albums__subtitle">ONE OK ROCK: We Are [OFFICIAL VIDEO]</h3>
                        <h2 class="albums__title">Ambitions</h2>

                        <p class="albums__description">
                            ONE OK ROCK's official video for "We are" from their upcoming album
                            Ambitions available January 13th on 
                            Fueled By Ramen/A-Sketch.
                        </p>
                    </div>

                    <div class="albums__buttons">
                        <a href="https://open.spotify.com/artist/7k73EtZwoPs516ZxE72KsO?si=gtMHXNa4RQ-wVtKR5PU_Ag" target="_blank" class="albums__link">
                            <i class="ri-spotify-line"></i> View
                        </a>

                        <a href="https://www.youtube.com/@ONEOKROCK" target="_blank" class="albums__link">
                            <i class="ri-youtube-line"></i> View
                        </a>
                    </div>
                </article>

                <article class="albums__card">
                    <div class="albums__image">
                        <img src="../gambar/CO.jpg" alt="image" class="albums__img">

                        <a href="https://www.youtube.com/watch?v=JWSRqWpWPzE" class="albums__button button">
                            <i class="ri-arrow-right-up-line"></i>
                        </a>
                    </div>

                    <div class="albums__content">
                        <h3 class="albums__subtitle">ONE OK ROCK - Cry out [Official Music Video]</h3>
                        <h2 class="albums__title">35xxxv</h2>

                        <p class="albums__description">
                            7th Album - 35xxxv
                            Feb. 11, 2015 on sale
                            Download "35xxxv" on iTunes
                            http://smarturl.it/35xxxv
                            ONE OK ROCK Official Website
                            http://www.oneokrock.com/
                        </p>
                    </div>

                    <div class="albums__buttons">
                        <a href="https://open.spotify.com/artist/7k73EtZwoPs516ZxE72KsO?si=gtMHXNa4RQ-wVtKR5PU_Ag" target="_blank" class="albums__link">
                            <i class="ri-spotify-line"></i> View
                        </a>

                        <a href="https://www.youtube.com/@ONEOKROCK" target="_blank" class="albums__link">
                            <i class="ri-youtube-line"></i> View
                        </a>
                    </div>
                </article>
            </div>
        </section>
        <!-- COMMENT -->
        <section class="comment section" id="comment">
            <div class="comment__container grid">
                <div class="comment__data">
                    <h2 class="section__title-2">
                        <span>Comment.</span>
                    </h2>

                    <p class="comment__description-1">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus voluptatum earum veritatis, maiores qui fugit in adipisci aut doloribus laborum commodi non. Blanditiis quae natus necessitatibus earum at veniam molestiae.
                    </p>

                    <p class="comment__description-2">
                        Don't use toxic word!
                    </p>
                </div>

                <div class="comment__mail">
                    <h2 class="comment__title">
                        Send A Message
                    </h2>

                    <form action=""  method="post" enctype="multipart/form-data" class="comment__form" id="comment-form">
                        <div class="comment__group">
                            <div class="comment__box">
                                <input type="text" name="name" class="comment__input" id="name" required placeholder="Name">
                                <label for="" class="comment__label">Name</label>
                            </div>

                            <div class="comment__box">
                                <input type="email" name="email" class="comment__input" id="email" required placeholder="Email">
                                <label for="email" class="comment__label">Email</label>
                            </div>
                        </div>

                        <div class="comment__box">
                            <input type="text" name="subject" class="comment__input" id="subject" required placeholder="Subject">
                            <label for="subject" class="comment__label">Subject</label>
                        </div>

                        <div class="comment__box">
                            <input type="file" name="foto" class="comment__input" id="foto" required placeholder="Foto">
                            <label for="foto" class="comment__label">Foto</label>
                        </div>

                        <div class="comment__box comment__area">
                            <input type="text" name="message" id="message"  class="comment__input" required placeholder="Message"></input>
                            <label for="message" class="comment__label">Message</label>
                        </div>

                        <input type="submit" name="tambah" value="Send Message" class="comment__button button">
                    </form>
                </div>

                </div>
            </div>
        </section>
    </main>
    <!-- FOOTER -->
    <footer class="footer">
        <div class="footer__container container grid">
            <ul class="footer__links">
                <li>
                    <a href="#home" class="footer__link">Home</a>
                </li>

                <li>
                    <a href="../file/komen.php" class="footer__link">Comments</a>
                </li>
                
                <li>
                    <a href="#about" class="footer__link">About</a>
                </li>

                <li>
                    <a href="#albums" class="footer__link">Albums</a>
                </li>
            </ul>

            <span class="footer__copy">
                &#169; All Rights Reserved By
                <a href="">ONE OK ROCK.</a>
            </span>
        </div>
    </footer>
    <!-- SCROLL UP -->

    <!-- SCROLL REVEAL -->
    <script src=""></script>

    <!-- EMAIL JS -->

    <!-- MAIN JS -->
    <script src="../javascript.js"></script>
</body>
</html>