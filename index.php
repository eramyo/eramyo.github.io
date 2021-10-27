<?php>

    $error = '';
    $name = '';
    $email = '';
    $message = '';

    function clean_text($string){
        $string = trim($string);
        $string = stripslashes($string);
        $string = htmlspecialchars($string);
        return $string;
    }

    if(isset($_POST["submit"])){

        if(empty($_POST["name"])){

            $error .= '<p><label class = "text-danger">Please enter your name</label></p>';

        }else{

            $name = clean_text($_POST["name"]);

            if(!preg_match("/^[a-zA-Z]*$/",$string)){
                $error .= '<p><label class = "text-danger">Only letters allowed for name</label></P>';
            }

        }

        if(empty($_POST["email"])){
            
            $error .= '<p><label class = "text-danger">Please enter your email</label></P>';

        }else{

            $email = clean_text($_POST["email"]);
            if(!filter_var($string, FILTER_VALIDATE_EMAIL)){
                $error .= '<p><label class = "text-danger">Please enter a valid email</label></P>';
            }

        }

        if(empty($_POST["message"])){

            $error .= '<p><label class = "text-danger">Please enter your message</label></P>';

        }else{

            $message = clean_text($_POST["message"]);

        }

        if($error != ''){

            require 'class/PHPMailer.php';
            require 'class/SMTP.php'; 

            $mail = new PHPMailer(true);

            try{
            $mail ->SMTPDebug = SMTP::DEBUG_SERVER;
            $mail -> IsSMTP();
            $mail ->Host = 'smtp.gmail.net';
            $mail ->Port = '465';
            $mail ->SMTPAuth = 'true';
            $mail ->Username = 'calvineromio@gmail.com';
            $mail ->Password = 'caniuseyou2@gmail.com';
            $mail ->SMTPSecure = 'PHPMailer::ENCRYPTION_SMTPS';
            $mail ->setFrom = $_POST["email"];
            $mail ->FromName = $_POST["name"];
            $mail ->AddAdress('calvineromio@gmail.com','Calvin');
            $mail-> addReplyTo($_POST["email"]);
            $mail ->AddCC($_POST["email"], $_POST["name"]);
            $mail ->wordwrap = 50;
            $mail ->isHTML(true);
            $mail ->Subject = 'About eratech';
            $mail ->Body = $_POST["message"];

            if($mail->Send()){
                $error = '<p><label class = "text-success">Thank you for contacting Me</label></P>';
            }else{
                $error .= '<p><label class = "text-danger">Sorry! an error occured</label></P>';
            }
        }catch(Exception $e){
            echo "Message could not be sent. Mailer Error:{$mail->ErrorInfo}";
        }
            $name ='';
            $email = '';
            $message = '';

        }

    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eramyo Calvin-Portfolio</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="css/font.css">
</head>
<body data-spy="scroll" data-target="#navbarResponsive">
  <!--Header section-->
  <header id="home">
    <nav class="navbar navbar-expand-lg navbar-expand-md navbat-expand-sm navbar-dark bg-black fixed-top ">
        <div class="container">
         
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav mx-auto ">
              <li class="nav-item">
                <a class="nav-link " aria-current="page" href="#home">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#About">About</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="#services">Services</a>
              </li>

              <li class="nav-item">
                <a class="nav-link " href="#contact" >Contact</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>  

     
    <!--  Banner section -->  
      <div class="background">
        <img src="images/backgroundpro.jpg" alt="background photo" class="img-fluid image" width="100%" height="500px">
      </div>
      <div class="heading-content text-center">
        <h5>Hello, I am</h5>
        <h1>Eramyo Calvin</h1>
        <p>Welcome To My World</p>
      </div>

      <!--ABOUT ME-->
      <div class = "offset container mt-3 pb-5" id = "About">
        <div class = "post-heading text-center"> 
          <h3 class="display-4 font-weight-bold">About Me</h3>
          <hr class="w-50 mx-auto" style="color: red;">
        </div>

        <figure class="text-center quote" id="quote">
          <blockquote class="blockquote">
            <p style="color: rebeccapurple;">logic will take you from A to B, Imagination will take you every where.</p>
          </blockquote>
          <figcaption class="blockquote-footer">
            Albert Eintein <cite title="Source Title"></cite>
          </figcaption>
        </figure>

        <div class="row mt-5">
          <div class="col-lg-6 col-md-12 col-12 mb-3">
            <img src="images/slide1.jpg" alt="coding illustration" class="img-fluid">
          </div>
          <div class="col-lg-6 col-md-12 col-12 About-Me">
            <h2>Who is Eramyo Calvin ?</h2>
            <hr>
            <p>I am a dreamer, passionate programmer & Tech enthusiate with a wide imagination. I am currently persuing a Bachelors degree in Software Engineering at Makerere University.
              I learn quick and I love to apply every skill I get in real world problems. I give extraordinary attention to all my projects and I love a challenge.
              I am always welcome to constractive feedback.</p>
              <a href="About.html" class="btn btn-primary">Know More</a>
          </div>
        </div>
      </div>

      <!--Services section-->
      <div class="offset container mt-3 pb-5" id="services">
        <div class = "post-heading text-center"> 
          <h3 class="display-4 font-weight-bold">Services</h3>
          <hr class="w-50 mx-auto">
        </div>

        <div class = "row">
          <div class="col-lg-4 col-md-6 col-12 pb-5">
            <div class="card card1">
              <img src="images/service4.jpg" class="card-img-top" alt="..." height="241">
              <div class="card-body">
                <h5 class="card-title" style="color: rebeccapurple;">web design</h5>
                <p class="card-text">Are you in need of a website for your Business? I design highly responsive websites on a professional level.</p>
                <a href="webDesign.html" class="btn btn-primary" style="font-size: 1rem;">Check out</a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 col-12 pb-5">
            <div class="card card2">
              <img src="images/service3.jpg" class="card-img-top" alt="..."  height="241">
              <div class="card-body">
                <h5 class="card-title" style="color: rebeccapurple;">Mobile App development</h5>
                <p class="card-text">Bring your business close to your customers through mobile apps. contact me to get started with your mobile applications.</p>
                <a href="mobileApp.html" class="btn btn-primary">Check out</a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 col-12 pb-5">
            <div class="card card3">
              <img src="images/service5.jpg" class="card-img-top" alt="..." height="241">
              <div class="card-body">
                <h5 class="card-title" style="color: rebeccapurple;">Desktop Applications</h5>
                <p class="card-text">Automate processes in your business for maximum efficiency. I build custom made desktop applications for different systems</p>
                <a href="desktopdev.html" class="btn btn-primary">Check out</a>
              </div>
            </div>
          </div>
         
         </div>

         <button class ="button btn w-50 mb-3">
          <a href="">More</a>
        </button>

      </div>

      <!--contact section-->
      <div class="offset container mt-5 mb-5 w-50" id="contact">
        <div class = "post-heading text-center"> 
          <h3 class="display-4 font-weight-bold">Contact Me</h3>
          <hr class="w-50 mx-auto">
        </div>

        <form>
          <div class="form-group mb-3">
            <label for="exampleInputEmail1" class="form-label">Full name</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
          </div>
         
          <div class="form-group mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
          </div>

          <div class="form-group mb-3">
            <label for="exampleInputEmail1" class="form-label">Message</label>
           <textarea name="" id="Message"  class="form-control"></textarea>
          </div>
         
          <button type="submit" class="btn btn-primary">Send</button>
        </form>

      </div>

      <!-- Footer -->
<footer class="page-footer font-small unique-color-dark" id="footer"> 

  <div style="background-color: #6351ce;">
    <div class="container">

      <!-- Grid row-->
      <div class="row py-4 d-flex align-items-center">

        <!-- Grid column -->
        <div class="col-md-6 col-lg-5 text-center text-md-left mb-4 mb-md-0 link-up">
          <h6 class="mb-0">Link Up With Me!</h6>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-6 col-lg-7 text-center text-md-right">

          <!-- Facebook -->
          <a class="fb-ic">
            <i class="fab fa-facebook-f white-text mr-5" style="color: #fff;"> </i>
          </a>
          <!-- Twitter -->
          <a class="tw-ic">
            <i class="fab fa-twitter white-text mr-5" style="color: #fff;"> </i>
          </a>
          <!-- Google +-->
          <a class="gplus-ic">
            <i class="fab fa-google-plus-g white-text mr-5" style="color: #fff;"> </i>
          </a>
          <!--Linkedin -->
          <a class="li-ic">
            <i class="fab fa-linkedin-in white-text mr-5" style="color: #fff;"> </i>
          </a>
          <!--Instagram-->
          <a class="ins-ic">
            <i class="fab fa-instagram white-text" style="color: #fff;"> </i>
          </a>

        </div>
        <!-- Grid column -->

      </div>
      <!-- Grid row-->

    </div>
  </div>

  <!-- Footer Links -->
  <div class="container text-center text-md-left mt-5">

    <!-- Grid row -->
    <div class="row mt-3">

      <!-- Grid column -->
      <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">

        <!-- Content -->
        <h6 class="text-uppercase font-weight-bold">ERATECH</h6>
        <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
        <p>Next generation company here to solve all your tech problems and needs for a better world.</p>

      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">

        <!-- Links -->
        <h6 class="text-uppercase font-weight-bold">Products</h6>
        <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
        <p>
          <a href="#!">Commercial Websites</a>
        </p>
        <p>
          <a href="#!">Portfolios</a>
        </p>
        <p>
          <a href="#!">Blogs</a>
        </p>
        <p>
          <a href="#!">Mobile Apps</a>
        </p>

      </div>
      <!-- Grid column -->

      

      <!-- Grid column -->
      <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">

        <!-- Links -->
        <h6 class="text-uppercase font-weight-bold">Contact</h6>
        <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
        <p>
          <i class="fas fa-home mr-3"></i> Kampala Uganda</p>
        <p>
          <i class="fas fa-envelope mr-3"></i> calvineromio@gmail.com</p>
        <p>
          <i class="fas fa-phone mr-3"></i> +256 777984085</p>
        <p>
          <i class="fas fa-print mr-3"></i> +256 702266969</p>

      </div>
      <!-- Grid column -->

    </div>
    <!-- Grid row -->

  </div>
  <!-- Footer Links -->

  <!-- Copyright -->
  <section class="copyright">
    <div class="footer-copyright text-center py-3"  style="background-color: #1f1844;">
      <p>© 2021 Copyright: <a href=""> eratech.com</a> </p>
      
    </div>
</section>
  <!-- Copyright -->

</footer>
<!-- Footer -->

    <script src = "index.js"></script>
    <script src = "js/bootstrap.min.js"></script>
</body>
</html>
