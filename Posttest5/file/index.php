<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posttest 3</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="container">
        <div class="nav-items">
            <!-- Your navigation here -->
            <img src="../pict/logo.jpg" class="logo" id="hero-gambar">
            <nav>
                <ul>
                    <li><a href="" onclick="alert('Menu Ini Belum Dapat Diakses!')">HOME</a></li>
                    <li><a href="./index2.php">ABOUT ME</a></li>
                    <li><a href="./tambah.php">POST</a></li>
                    <li><a href="https://en.wikipedia.org/wiki/One_Ok_Rock">ONE OK ROCK WIKI</a></li>
                    <li><input type="checkbox" id="darkModeToggle">
                        <label for="darkModeToggle">Dark Mode</label>
                    </li>
                </ul>
            </nav>
        </div>

        <div class="row">
            <div class="col">
                <h1>WELCOME</h1>
                <p id="quotes">When you get into rock 'n' roll myths, like that Rod Stewart blew his whole band and had to get his stomach pumped, <br> it's ridiculous, but everyone's heard it</p>
                <button type="button">MORE</button>
            </div>
            <div class="col">
                <div class="card">
                    <img src="../pict/taka.jpg" class="card card1" alt="">
                    <h5>TAKA</h5>
                    <p>VOCAL</p>
                </div>
                <div class="card card2">
                    <img src="../pict/toru1.jpg" class="card card2" alt="">
                    <h5>TORU</h5>
                    <p>GUITAR</p>
                </div>
                <div class="card card3">
                    <img src="../pict/ryota.jpg" class="card card3" alt="">
                    <h5>RYOTA</h5>
                    <p>BASS</p>
                </div>
                <div class="card card4">
                    <img src="../pict/tomo.jpg" class="card card4" alt="">
                    <h5>TOMOYA</h5>
                    <p>DRUMS</p>
                </div>
                <!-- Add your form here -->
            </div>
        </div>
    </div>
    <footer>
        <p>© 10969 INC. All Right Reserved.</p>
    </footer>
    <script>
        const darkModeToggle = document.getElementById('darkModeToggle');
        const body = document.body;

        darkModeToggle.addEventListener('change', () => {
            body.classList.toggle('dark-mode', darkModeToggle.checked);
        });
    </script>
    <script src="script.js"></script>
</body>
</html>
