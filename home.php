<!DOCTYPE html>
<html lang="id">
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menyatukan Trapesium</title>
    <style>
    body {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: Arial, sans-serif; 
    overflow-x: hidden; /* Menghindari scroll horizontal */
    background: linear-gradient(to right, #0c1d37, #332949); /* Dari kiri ke kanan */
}
html {
    scroll-behavior: smooth;
}


header {
    position: sticky;
    top: 0;
    z-index: 102; /* Pastikan z-index lebih tinggi dari elemen lainnya */
    background: linear-gradient(to right, #322771, #1d1146); /* Background gradient */
    width: 100%;
}

#logo {
    cursor: pointer;
    display: inline-block;
    transition: transform 0.3s ease;
    z-index: 102;
    position: absolute;
   background: linear-gradient(to right, #322771, #1d1146); /* Dari kiri ke kanan */
    border: none;
    color: white;
    padding: 10px 20px;
    text-align: center;
    font-size: 14px;
    width: 150px; /* Ukuran logo diperbesar */
    height: 60px; /* Ukuran logo diperbesar */
    border-radius: 0;
    clip-path: polygon(0 0, 100% 0, 80% 100%, 20% 100%);
    top: 0;
    left: 50%;
    transform: translateX(-50%);
}

/* Styling umum untuk menu */
#nav-menu {
    display: none; /* Awalnya tersembunyi */
    justify-content: space-between;
    position: absolute;
    top: 30px;
    left: 0;
    right: 0;
    height: 100%;
    z-index: 100;
    transform: translateY(-100%);
    opacity: 0;
    transition: opacity 0.3s ease;
}

.left-menu, .right-menu {
    list-style: none;
    padding: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    width: 50%;
    height: 100%;
}

.menu-item {
    color: white; /* Ubah warna teks menjadi putih */
    margin-left: 0;
    font-size: 1.2em; /* Ukuran font default */
    text-decoration: none;
    display: flex;
    align-items: center;
    justify-content: center;
    height: 60px;
    width: 150px;
    background-color: #4239ad;
    clip-path: polygon(0% 0%, 80% 0%, 100% 100%, 0% 100%);
    position: relative;
    overflow: hidden;
    padding: 0 20px; /* Jarak antara ikon dan teks */
     transition: border-bottom 0.3s ease; /* Tambahkan transisi untuk border-bottom */
}

.menu-item i {
    margin-right: 10px; /* Jarak antara ikon dan teks */
    font-size: 1.2em; /* Ukuran ikon default */
}

/* Garis bawah merah saat di-hover atau di-active */
.menu-item:hover, .menu-item:focus {
    border-bottom: 3px solid red; /* Garis bawah merah */
}

/* Garis bawah merah saat item terpilih atau aktif */
.menu-item:active {
    border-bottom: 3px solid red; /* Garis bawah merah */
}

/* Responsif untuk tampilan tablet dan ponsel */
@media (max-width: 1024px) {
    #nav-menu {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
    }
    .left-menu, .right-menu {
        flex-direction: row;
        width: auto;
        height: auto;
    }
   .menu-item {
        font-size: 0.9em;
        height: 50px;
        width: auto;
        padding: 0 15px; /* Menyesuaikan jarak pada tampilan lebih kecil */
    }

    .menu-item i {
        font-size: 1em; /* Ukuran ikon pada tampilan lebih kecil */
    }
    
    
}

@media (max-width: 768px) {
    #nav-menu {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
    }
    .left-menu, .right-menu {
        flex-direction: row;
        width: auto;
        height: auto;
    }
   .menu-item {
        font-size: 0.8em;
        height: 50px;
        width: auto;
        padding: 0 10px; /* Menyesuaikan jarak pada tampilan lebih kecil */
    }

    .menu-item i {
        font-size: 0.8em; /* Ukuran ikon pada tampilan lebih kecil */
    }
    
 
}

@keyframes slideDown {
    to {
        transform: translateY(0);
        opacity: 1;
    }
}

@keyframes slideUp {
    from {
        transform: translateY(0);
        opacity: 1;
    }
    to {
        transform: translateY(-100%);
        opacity: 0;
    }
}

#nav-menu.show {
    display: flex;
    animation: slideDown 0.5s ease forwards;
}

#nav-menu.hide {
    animation: slideUp 0.5s ease forwards;
}
/* Trapesium shape adjustments */
.trapesium4, .trapesium3, .trapesium2, .trapesium1 {
    clip-path: polygon(0% 0%, 80% 0%, 100% 100%, 0% 100%);
}

/* Sesuaikan ukuran trapesium untuk menyesuaikan dengan teks dan ikon */
.menu-item.trapesium4 {
    clip-path: polygon(0% 0%, 85% 0%, 100% 100%, 0% 100%);
}

.menu-item.trapesium3 {
    clip-path: polygon(0% 0%, 85% 0%, 100% 100%, 15% 100%);
}

.menu-item.trapesium2 {
    clip-path: polygon(15% 0%, 100% 0%, 85% 100%, 0% 100%);
}

.menu-item.trapesium1 {
    clip-path: polygon(15% 0%, 100% 0%, 100% 100%, 0% 100%);
}

.hero {
    position: relative;
    margin-bottom: 0;
    overflow: hidden;
}

.hero-box {
    position: relative;
    width: 100%;
    height: 750px; /* Sesuaikan tinggi sesuai kebutuhan */
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
    background: #0c1d37; /* Background warna untuk fallback */
}
.hero-box img {
    position: absolute;
    top: 50%;
    left: 50%;
    width: 120%; /* Lebih besar dari container untuk efek parallax */
    height: auto;
    transform: translate(-50%, -50%) scale(1); /* Mulai tanpa zoom */
    object-fit: cover; /* Memastikan gambar menutupi seluruh area */
    z-index: 1;
    will-change: transform; /* Mengoptimalkan performa animasi */
    animation: zoom 20s infinite alternate; /* Menambahkan animasi zoom */
}

@keyframes zoom {
    0% {
        transform: translate(-50%, -50%) scale(1); /* Mulai dengan ukuran normal */
    }
    100% {
        transform: translate(-50%, -50%) scale(1.2); /* Zoom in */
    }
}

.dark-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.3);
    z-index: 2;
}

.hero-content {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    text-align: center;
    z-index: 3;
}

.hero-content h1 {
    font-size: 3em;
    background-color: rgba(29, 48, 79, 0.7);
    color:white;
    display: inline-block;
    padding: 10px 80px;
    margin: 0;
}
.scroll-down {
    display: inline-block;
    margin-top: 20px;
    font-size: 1.2em;
    color: #fff;
    text-decoration: none;
    padding: 10px 20px;
    border-radius: 5px;
    transition: opacity 0.3s ease;
    position: absolute;
    bottom: -95px; /* Jarak dari bagian bawah hero-box */
    left: 50%;
    transform: translateX(-50%);
    opacity: 0.8;
    cursor: pointer;
}

.scroll-down:hover {
    opacity: 1;
    color: #c23369; /* Warna border saat hover */
}

.scroll-down:after {
    content: '↓';
    display: block;
    font-size: 1.5em;
    margin-top: 5px;
}

@keyframes bounce {
    0%, 20%, 50%, 80%, 100% {
        transform: translateY(0);
    }
    40% {
        transform: translateY(-10px);
    }
    60% {
        transform: translateY(-5px);
    }
}

.hero-content .btn {
    display: inline-block;
    padding: 15px 30px;
    text-decoration: none;
    font-weight: bold;
    transition: background-color 0.3s ease;
    background-color: #c23369;
    border: none;
    color: white;
    text-align: center;
    font-size: 30px;
    margin-top: 20px;
    cursor: pointer;
    width: 200px;
    border-radius: 0;
    clip-path: polygon(0 0, 100% 0, 80% 150%, 20% 150%);
    position: relative;
    overflow: hidden;
}

.hero-content .btn:hover {
    background-color: #7f72d7;
}

.hero-content .btn::before {
    content: "";
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 0;
    height: 0;
    background-color: rgba(255, 255, 255, 0.5);
    border-radius: 50%;
    z-index: 1;
    transition: width 0.6s ease, height 0.6s ease;
}

.hero-content .btn:active::before {
    width: 300%;
    height: 300%;
    transition: width 0.6s ease, height 0.6s ease;
}

.hero-content .btn span {
    position: relative;
    z-index: 2;
}

/* Responsif */
@media (max-width: 1024px) {
    .hero-content h1 {
        font-size: 2.5em;
        padding: 10px 40px;
    }

    .hero-content .btn {
        font-size: 14px;
        width: 180px;
    }
}

@media (max-width: 768px) {
    .hero-content h1 {
        font-size: 2em;
        padding: 10px 20px;
    }

    .hero-content .btn {
        font-size: 12px;
        width: 150px;
        padding: 10px 20px;
    }
 
}

.partners {
    text-align: center;
    padding: 50px 20px;
    background: linear-gradient(to right, #0c1d37, #332949); /* Dari kiri ke kanan */
    
    display: flex;
    justify-content: center;
    gap: 20px;
    flex-wrap: wrap;
    
  /* Menambahkan garis hitam transparan di bawah */
    border-bottom: 5px solid rgba(0, 0, 0, 0.3); /* 50% transparansi */
}



.partners img {
    vertical-align: middle;
    max-width: 100%;
    height: auto;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    object-fit: cover;
    width: 200px;
    height: 200px;
}

@media (max-width: 768px) {
    .partners {
        flex-direction: row; /* Menyusun gambar dalam satu baris */
        flex-wrap: wrap; /* Mengizinkan pembungkusan ke baris berikutnya */
        gap: 10px;
        justify-content: center; /* Memastikan gambar tetap berada di tengah */
    }

    .partners img {
        width: calc(50% - 10px); /* Membagi gambar dalam dua kolom dengan sedikit jarak */
        height: auto; /* Menyesuaikan tinggi secara proporsional */
        max-width: 200px; /* Membatasi lebar maksimum agar tetap kotak */
    }
}
.description {
    text-align: center;
    padding: 50px 20px;
    background: linear-gradient(to right, #0c1d37, #332949); /* Dari kiri ke kanan */
}

.description h2 {
    font-size: 2em;
    margin-bottom: 10px;
    color: #fff; /* Warna teks default putih */
}

.description .highlight {
    color: rgba(255, 0, 0, 1); /* Warna merah dengan transparansi */
}


.description hr {
    width: 50%;
    border: 1px solid rgba(255, 0, 0, 1); /* Garis merah dengan transparansi */
    margin: 20px auto;
}

.description p {
    font-size: 1em;
    line-height: 1.5em;
    max-width: 600px;
    margin: 0 auto;
    color: #fff; /* Warna teks putih */
}


</style>
</head>
<body>
    <header>
        <div id="logo" onclick="toggleMenu()">
            <img width="90" height="80" src="aset/BLINC GAMES.png" alt="blinc Logo" alt="Logo">
        </div>
      <nav id="nav-menu">
    <ul class="left-menu">
        <li><a href="#" class="menu-item trapesium4"><i class="fas fa-search"> </i>Search </a></li>
        <li><a href="#" class="menu-item trapesium3"><i class="fas fa-home"> </i> Home </a></li>
    </ul>
    <ul class="right-menu">
        <li><a href="#" class="menu-item trapesium2"><i class="fas fa-gamepad"></i> Game </a></li>
        <li><a href="#" class="menu-item trapesium1"><i class="fas fa-sign-in"></i> Login </a></li>
    </ul>
</nav>

    </header>

<section class="hero">
    <div class="hero-box">
        <img src="aset/game3.jpg" alt="PUBG Mobile Logo">
        <div class="dark-overlay"></div>
        <div class="hero-content">
            <h1>Club e-Sport INFORMATICS</h1>
            <a href="#" class="btn">JOIN NOW</a>
              <!-- Scroll Down Text -->
             <div class="scroll-down" onclick="scrollToDescription()">
                Scroll Down
            </div>
    </div>
</section>
    <section class="partners">
        <img src="aset/logoRog.png" alt="logo asuz">
        <img src="aset/logoPredator.png" alt="logo acer">
        <img src="aset/logoLogitech.png" alt="logitect">
        <img src="aset/logoLegion.png" alt="logo legion">
        <img src="aset/logoEpic.png" alt="epic game">
        <img src="aset/logoDota.png" alt="logo dota">
        
    </section>
<section class="description">
<h2>
  An  <span class="highlight">OP</span> The Just for Gamers
</h2>

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
                // Menu terbuka
                navMenu.classList.remove('hide');
                navMenu.classList.add('show');
                leftMenu.style.transform = 'translateY(0)';
                rightMenu.style.transform = 'translateY(0)';
                navMenu.style.display = 'flex'; // Tampilkan menu
            } else {
                // Menu tertutup
                leftMenu.style.transform = 'translateY(-100%)';
                rightMenu.style.transform = 'translateY(-100%)';
                navMenu.classList.remove('show');
                navMenu.classList.add('hide');
                setTimeout(() => {
                    navMenu.style.display = 'none'; // Sembunyikan menu setelah animasi selesai
                }, 500); // Tunggu hingga animasi selesai
            }
            
            isOpen = !isOpen;
        }
        //scrolldown
      function scrollToDescription() {
    document.querySelector('.description').scrollIntoView({ behavior: 'smooth' });
}

    </script>
</body>
</html>
