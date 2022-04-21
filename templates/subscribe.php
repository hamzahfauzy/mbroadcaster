<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Email Subscripe Pelanggan | Applesecondstuff</title>
    <link rel="shortcut icon" href="register-assets/images/fav.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="register-assets/images/fav.jpg">
    <link rel="stylesheet" href="register-assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="register-assets/css/all.min.css">
    <link rel="stylesheet" href="register-assets/css/animate.css">
    <link rel="stylesheet" href="register-assets/plugins/slider/css/owl.carousel.min.css">
    <link rel="stylesheet" href="register-assets/plugins/slider/css/owl.theme.default.css">
    <link rel="stylesheet" type="text/css" href="register-assets/css/style.css" />
</head>

    <body class="form-login-body"> 
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 mx-auto login-desk">
                       <div class="row">
                            <div class="col-md-7 detail-box">
                                <img class="logo" src="register-assets/images/logo.png" alt=""> 
                                <div class="detailsh">
                                     <img class="help" src="register-assets/images/help.png" alt="">
                                    <h3> <strong>AppleSecondStuff</strong></h3>
                                    <p>Silahkan isi email anda untuk mendapatkan informasi terkini</p>
                                </div>
                            </div>
                            <div class="col-md-5 loginform">
                                <form action="" method="POST">
                                 <h4>EMAIL SUBSCRIBE PELANGGAN</h4>                   
                                 <p>Silahkan isi data anda</p>
                                 <?php if($success_msg): ?>
                                <div class="alert alert-success"><?=$success_msg?></div>
                                <?php endif ?>
                                 <div class="login-det">
                                    <div class="form-row">
                                         <label for="">Masukkan Nama Lengkap</label>
                                             <div class="input-group mb-3">
                                              <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">
                                                    <i class="far fa-user"></i>
                                                </span>
                                              </div>
                                              <input type="text" name="name" class="form-control" placeholder="Isi Nama Lengkap" aria-label="Username" aria-describedby="basic-addon1">
                                         </div>
                                    </div>
                                     <div class="form-row">
                                         <label for="">Masukkan Email</label>
                                             <div class="input-group mb-3">
                                              <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">
                                                    <i class="fas fa-lock"></i>
                                                </span>
                                              </div>
                                              <input type="text" name="email" class="form-control" placeholder="Isi Email" aria-label="Username" aria-describedby="basic-addon1">
                                         </div>
                                    </div>
                                    
                                    
                                    <button class="btn btn-sm btn-danger">KLIK BERLANGGANAN</button>
                                    
                                 </div>
                                 </form>
                            </div>
                       </div>
                      
                    </div>
                </div>
            </div>
    </body>

    <script src="register-assets/js/jquery-3.2.1.min.js"></script>
    <script src="register-assets/js/popper.min.js"></script>
    <script src="register-assets/js/bootstrap.min.js"></script>
    <script src="register-assets/plugins/scroll-fixed/jquery-scrolltofixed-min.js"></script>
    <script src="register-assets/plugins/slider/js/owl.carousel.min.js"></script>
    <script src="register-assets/js/script.js"></script>
</html>