<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gamer Theme</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body, html {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #000;
            color: #fff;
        }

        header {
            position: relative;
            text-align: center;
            padding: 20px;
            background: #0a0a0a;
        }

         #logo {
            cursor: pointer;
            display: inline-block;
            transition: transform 0.3s ease;
            z-index: 102;
            position: absolute;
            background-color: #6A6E85;
            border: none;
            color: white;
            padding: 10px 20px; /* Kurangi padding */
            text-align: center;
            font-size: 14px; /* Kurangi ukuran font */
            width: 180px; /* Ukuran lebar logo */
            border-radius: 6px;
            clip-path: polygon(0 0, 100% 0, 80% 100%, 20% 100%);
            top: -60px; /* Geser ke atas jika diperlukan */
            left: 50%;
            transform: translateX(-50%);
        
        }

        #nav-menu {
            display: none;
            justify-content: space-between;
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 100;
            animation: slideDown 0.5s ease forwards;
            transform: translateY(-100%);
        }

        @keyframes slideDown {
            to {
                transform: translateY(0);
            }
        }

        .left-menu, .right-menu {
            list-style: none;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 50%;
            height: 100%;
            transition: transform 0.3s ease;
        }

        .left-menu {
            transform: translateY(100%);
        }

        .right-menu {
            transform: translateY(100%);
        }

        .icon-large {
            width: 80px;
            height: 80px;
        }

        .hero {
            position: relative;
            text-align: center;
            padding: 100px 20px;
        }

        .hero img {
            width: 100%;
            height: auto;
            opacity: 0.3;
            z-index: -1;
        }

        .hero .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.6);
            z-index: 1;
        }

        .hero h1 {
            position: absolute;
            top: 40%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 3em;
            background-color: rgba(255, 0, 0, 0.7);
            display: inline-block;
            padding: 10px 20px;
            z-index: 2;
        }

        .hero .btn {
            position: relative;
            top: -400px; /* Menggeser tombol ke atas */
            padding: 15px 30px;
            text-decoration: none;
            font-weight: bold;
            transition: background-color 0.3s ease;
            z-index: 2;
            background-color: #ff0000; /* Red color */
            border: none;
            color: white;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            width: 200px;
            border-radius: 6px;
            clip-path: polygon(0 0, 100% 0, 80% 150%, 20% 150%);
                }

        .hero .btn:hover {
            background-color: #cc0000;
        }

        .partners {
            text-align: center;
            padding: 50px 20px;
            background-color: #0a0a0a;
            display: flex;
            justify-content: center;
            gap: 30px;
            animation: float 10s infinite alternate;
        }

        .partners img {
            vertical-align: middle;
        }

        @keyframes float {
            0% { transform: translateX(-10px); }
            100% { transform: translateX(10px); }
        }

        .description {
            text-align: center;
            padding: 50px 20px;
            background-color: #1a1a1a;
        }

        .description h2 {
            font-size: 2em;
            margin-bottom: 10px;
        }

        .description hr {
            width: 50%;
            border: 1px solid #fff;
            margin: 20px auto;
        }

        .description p {
            font-size: 1em;
            line-height: 1.5em;
            max-width: 600px;
            margin: 0 auto;
        }

        .menu-item {
            color: white;
            margin-left: 20px;
            font-size: 1.5em;
            text-decoration: none;
        }

       

        #nav-menu.active .welcome-message {
            display: none;
        }
    </style>
</head>
<body>

  <header>
    <div id="logo" onclick="toggleMenu()"> 
        <img src="https://picsum.photos/50" alt="Logo">
    </div>
    <nav id="nav-menu">
        <ul class="left-menu">
            <li><a href="#" class="menu-item">Search</a></li>
            <li><a href="#" class="menu-item">Home</a></li>
            <li><a href="#" class="menu-item">Game</a></li>
        </ul>
        <ul class="right-menu">
            <li><a href="#"><img src="profile-icon.png" alt="Profile" class="icon-large"></a></li>
        </ul>
    </nav>
</header>


    <section class="hero">
        <img src="https://picsum.photos/800/400" alt="Background Banner">
        <div class="overlay"></div>
        <h1>REPEL THE INVADERS!</h1><br>
        <a href="#" class="btn">join now</a>
    </section>

    <section class="partners">
        <img src="https://picsum.photos/200" alt="SteelSeries">
        <img src="https://picsum.photos/200" alt="Razer">
        <img src="https://picsum.photos/200" alt="Roccat">
        <img src="https://picsum.photos/200" alt="Gunnar">
    </section>

    <section class="description">
        <h2>An OP Theme Just for Gamers</h2>
        <hr>
        <p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit...</p>
    </section>

    <script>
    let isOpen = false;

    function toggleMenu() {
        const navMenu = document.getElementById('nav-menu');
        const leftMenu = document.querySelector('.left-menu');
        const rightMenu = document.querySelector('.right-menu');
      
        if (!isOpen) {
            // Menu terbuka, 
            navMenu.style.display = 'flex';
            leftMenu.style.transform = 'translateY(0)';
            rightMenu.style.transform = 'translateY(0)';
                 } else {
            // Menu tertutup, 
            leftMenu.style.transform = 'translateY(-100%)';
            rightMenu.style.transform = 'translateY(-100%)';
            setTimeout(() => {
                navMenu.style.display = 'none';
            }, 300); // Tunggu hingga animasi selesai
        }
        
        isOpen = !isOpen;
    }

    </script>
</body>
</html>
