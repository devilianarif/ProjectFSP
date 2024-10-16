<!DOCTYPE html>

<?php
    require_once('class\member.php');
    $member = new member();
    session_start();
    session_unset();
?>

<?php
    if(isset($_GET['error'])){
        $message = "message";
        if($_GET['error'] == 1){
            $message = "Username or Password is incorrect";
        } else if($_GET['error'] == 2){
            $message = "Username or Password is empty";
        }
        echo "<script>alert('$message');</script>";
    }

    if(isset($_GET['pesan'])){
        echo "<script>alert('".$_GET['pesan']."');</script>";
    }
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login & Signup Form</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
            color: #fff;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: #25252b;
        }

        .container {
            position: relative;
            width: 750px;
            height: 450px;
            border: 2px solid #ff2770;
            box-shadow: 0 0 25px #ff2770;
            overflow: hidden;
        }

        .video-bg {
          position: fixed;
          right: 0;
          top: 0;
          width: 100%;
          height: 100%;
        }
        .video-bg video {
          width: 100%;
          height: 100%;
          -o-object-fit: cover;
             object-fit: cover;
        }

        .container .form-box {
            position: absolute;
            top: 0;
            width: 50%;
            height: 100%;
            display: flex;
            justify-content: center;
            flex-direction: column;
        }

        .form-box.Login {
            left: 0;
            padding: 0 40px;
        }

        .form-box.Login .animation {
            transform: translateX(0%);
            transition: .7s;
            opacity: 1;
            transition-delay: calc(.1s * var(--S));
        }

        .container.active .form-box.Login .animation {
            transform: translateX(-120%);
            opacity: 0;
            transition-delay: calc(.1s * var(--D));
        }

        .form-box.Register {
            right: 0;
            padding: 0 60px;
        }

        .form-box.Register .animation {
            transform: translateX(120%);
            transition: .7s ease;
            opacity: 0;
            filter: blur(10px);
            transition-delay: calc(.1s * var(--S));
        }

        .container.active .form-box.Register .animation {
            transform: translateX(0%);
            opacity: 1;
            filter: blur(0px);
            transition-delay: calc(.1s * var(--li));
        }

        .form-box h2 {
            font-size: 32px;
            text-align: center;
        }

        .form-box .input-box {
            position: relative;
            width: 100%;
            height: 50px;
            margin-top: 25px;
        }

        .input-box input {
            width: 100%;
            height: 100%;
            background: transparent;
            border: none;
            outline: none;
            font-size: 16px;
            color: #fff;
            font-weight: 600;
            border-bottom: 2px solid #fff;
            padding-right: 23px;
            transition: .5s;
        }

        .input-box input:focus,
        .input-box input:valid {
            border-bottom: 2px solid #ff2770;
        }

        .input-box label {
            position: absolute;
            top: 50%;
            left: 0;
            transform: translateY(-50%);
            font-size: 16px;
            color: #fff;
            transition: .5s;
        }

        .input-box input:focus ~ label,
        .input-box input:valid ~ label {
            top: -5px;
            color: #ff2770;
        }

        .btn {
            position: relative;
            width: 100%;
            height: 45px;
            background: transparent;
            border-radius: 40px;
            cursor: pointer;
            font-size: 16px;
            font-weight: 600;
            border: 2px solid #ff2770;
            overflow: hidden;
            z-index: 1;    
        }

        .btn::before {
            content: "";
            position: absolute;
            height: 300%;
            width: 100%;
            background: linear-gradient(#25252b, #ff2770, #25252b, #ff2770);
            top: -100%;
            left: 0;
            z-index: -1;
            transition: .5s;
        }

        .btn:hover:before {
            top: 0;
        }

        .regi-link {
            font-size: 14px;
            text-align: center;
            margin: 20px 0 10px;
        }

        .regi-link a {
            text-decoration: none;
            color: #b0a4ff;
            font-weight: 600;
        }

        .regi-link a:hover {
            text-decoration: underline;
        }

        .info-content {
            position: absolute;
            top: 0;
            height: 100%;
            width: 50%;
            display: flex;
            justify-content: center;
            flex-direction: column;
        }      
        .info-content.Login{
            right: 0;
            text-align: right;
            padding: 0 40px 60px 150px;
        }

        .info-content.Login .animation{
            transform: translateX(0);
            transition: .7s ease;
            transition-delay: calc(.1s * var(--S));
            opacity: 1;
            filter: blur(0px);
        }

        .container.active .info-content.Login .animation{
            transform: translateX(120%);
            opacity: 0;
            filter: blur(10px);
            transition-delay: calc(.1s * var(--D));
        }

        .info-content.Register{
            /* display: none; */
            left: 0;
            text-align: left;
            padding: 0 150px 60px 38px;
            pointer-events: none;
        }

        .info-content.Register .animation{
            transform: translateX(-120%);
            transition: .7s ease;
            opacity: 0;
            filter: blur(10PX);
            transition-delay: calc(.1s * var(--S));
        }

        .container.active .info-content.Register .animation{
            transform: translateX(0%);
            opacity: 1;
            filter: blur(0);
            transition-delay: calc(.1s * var(--li));
        }

        .info-content h2 {
            text-transform: uppercase;
            font-size: 36px;
            line-height: 1.3;
        }

        .info-content p {
            font-size: 16px;
        }

        /* New CSS for First Name and Last Name inputs */
        .name-container {
            display: flex;
            justify-content: space-between;
            width: 100%;
        }

        .name-container .input-box {
            width: 48%; /* Adjust width as needed */
        }


        .container .curved-shape {
            position: absolute;
            right: 0;
            top: -5px;
            height: 600px;
            width: 850px;
            background: linear-gradient(45deg, #25252b, #ff2770);
            transform: rotate(10deg) skewY(40deg);
            transform-origin: bottom right;
            transition: transform 1.5s ease, opacity 0.5s ease;
            opacity: 1; /* Tambahkan ini untuk memastikan bentuk terlihat */
        }

        .container.active .curved-shape {
            transform: rotate(0deg) skewY(0deg);
            transition-delay: 0.5s;
        }

        .container.active .curved-shape2 {
            right: 500px;
            top: -500px;
            transform: rotate(10deg) skewY(0deg);
            opacity: 1;
            transition-delay: 1.2s;
        }

        .container .curved-shape2 {
            position: absolute;
            right: -170px;
            top: 100px;
            height: 1000px;
            width: 850px;
            background: #242466;
            border-top: 3px solid #ff2770;
            transform: rotate(-40deg) skewY(0deg);
            transform-origin: bottom left;
            transition: transform 1.5s ease, opacity 0.5s ease, right 1.5s ease, top 1.5s ease;
            opacity: 1;
        }
    </style>
</head>
<body>

<?php //PHP FUNCTIONS
    
?>

   <div class="video-bg">
 <video width="320" height="240" autoplay loop muted>
  <source src="aset/video/back-highlight.mp4" type="video/mp4">

</video>
</div>
 
 <div class="container">

        <div class="curved-shape"></div>
        <div class="curved-shape2"></div>
        <div class="form-box Login">
            <h2 class="animation" style="--D:0; --S:21">Login</h2>
            
          <form action="Process/loginProcess.php" method="POST">
    <input type="hidden" name="urlAsal" value="<?php echo $_SERVER['REQUEST_URI']; ?>"> <!-- Menyimpan URL asal -->
    
    <div class="input-box animation" style="--D:1; --S:22">
        <input type="text" name="username" required>
        <label for="">Username</label>
    </div>

    <div class="input-box animation" style="--D:2; --S:23">
        <input type="password" name="password" required>
        <label for="">Password</label>
    </div>

    <div class="input-box animation" style="--D:3; --S:24">
        <button class="btn" type="submit">Login</button>
    </div>

    <div class="regi-link animation" style="--D:4; --S:25">
        <p>Don't have an account? <br> <a href="#" class="SignUpLink">Sign Up</a></p>
    </div>
</form>

       </div>

        <div class="info-content Login">
            <h2 class="animation" style="--D:0; --S:20">WELCOME BACK!</h2>
            <p class="animation" style="--D:1; --S:21">We are happy to have you with us again. If you need anything, we are here to help.</p>
        </div>

             <div class="form-box Register">
            <h2 class="animation" style="--li:17; --S:0">Register</h2>
            <form action="Process/regisProcess.php" method="POST">
                <div class="name-container">
                    <div class="input-box animation" style="--li:18; --S:1">
                        <input type="text" name="first_name" required>
                        <label for="">First Name</label>
                    </div>
                    <div class="input-box animation" style="--li:19; --S:2">
                        <input type="text" name="last_name" required>
                        <label for="">Last Name</label>
                    </div>
                </div>

                <div class="input-box animation" style="--li:20; --S:3">
                    <input type="text" name="username" required>
                    <label for="">Username</label>
                </div>

                <div class="input-box animation" style="--li:21; --S:4">
                    <input type="password" name="password" required>
                    <label for="">Password</label>
                </div>

                <div class="input-box animation" style="--li:22; --S:5">
                    <button class="btn" type="submit">Register</button>
                </div>

                <div class="regi-link animation" style="--li:23; --S:6">
                    <p>Already have an account? <br> <a href="#" class="SignInLink">Sign In</a></p>
                </div>
            </form>
        </div>

        <div class="info-content Register">
            <h2 class="animation" style="--li:17; --S:0">WELCOME!</h2>
            <p class="animation" style="--li:18; --S:1">We’re delighted to have you here. If you need any assistance, feel free to reach out.</p>
        </div>

    </div>

    <script>
        const container = document.querySelector('.container');
        const LoginLink = document.querySelector('.SignInLink');
        const RegisterLink = document.querySelector('.SignUpLink');

        RegisterLink.addEventListener('click', () => {
            container.classList.add('active');
        });

        LoginLink.addEventListener('click', () => {
            container.classList.remove('active');
        });
    </script>
</body>
</html>
