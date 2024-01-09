<?php session_start(); ?>
<!DOCTYPE html>
<html lang="zxx">

<head>
  <title>IAIN PALANGKA RAYA</title>
  <!-- Meta tag Keywords -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="keywords"
    content="Scholarly web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
  <script type="application/x-javascript">
    addEventListener("load", function() {
      setTimeout(hideURLbar, 0);
    }, false);

    function hideURLbar() {
      window.scrollTo(0, 1);
    }
  </script>
  <!--// Meta tag Keywords -->
  <!-- css files -->
  <link rel="stylesheet" href="css/bootstrap.css"> <!-- Bootstrap-Core-CSS -->
  <link rel="stylesheet" href="css/style.css" type="text/css" media="all" /> <!-- Style-CSS -->
  <link rel="stylesheet" href="css/font-awesome.css"> <!-- Font-Awesome-Icons-CSS -->
  <link rel="stylesheet" href="css/swipebox.css">
  <link rel="stylesheet" href="css/roma.css">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" rel="stylesheet">
  <link rel="stylesheet" href="css/jquery-ui.css" />
  <!-- //css files -->
  <!-- online-fonts -->
  <link
    href="//fonts.googleapis.com/css?family=Exo+2:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;subset=cyrillic,latin-ext"
    rel="stylesheet">
  <link
    href="//fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;subset=latin-ext"
    rel="stylesheet">
  <!-- //online-fonts -->
</head>

<body>

  <?php include('navigasi.php'); ?>
  <div class="clearfix"> </div>
  <!-- Slideshoww -->
  <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
    <!-- Wrapper for slides -->
    <div class="">
      <img src="foto/depan.jpg" alt="" style="width:100%; height: 800px">
    </div>
  </div>


  <!-- //Slideshoww -->

  <!-- Event -->
  <div class="jumbotron">
    <div class="container">
      <center>
        <h2>IAIN PALANGKA RAYA</p>
          </align>
      </center>
      <!-- Thumbniell-->

      <div class="row margin-atas">
        <div class="col-sm-6 col-md-3">
          <div class="thumbnail">
            <img src="foto/berita1.jpg" alt="">
            <div class="caption">
              <a href="https://kampusitahnews.iain-palangkaraya.ac.id/berita/2024/01/05/meet-greet-4000-asn-gusmen-beri-dua-arahan-terkait-pemilu-2024/"
                <h3>
                MEET & GREET 4000 ASN, GUSMEN BERI DUA ARAHAN TERKAIT PEMILU 2024</h3> </a>

            </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-3">
          <div class="thumbnail">
            <img src="foto/berita2.jpg" alt="">
            <div class="caption">
              <a href="https://kampusitahnews.iain-palangkaraya.ac.id/berita/2024/01/04/ukur-kinerja-dan-tingkatkan-mutu-perguruan-tinggi-rektor-expose-hasil-kinerja/"
                <h3>UKUR KINERJA DAN TINGKATKAN MUTU PERGURUAN TINGGI, REKTOR EXPOSE HASIL KINERJA</h3> </a>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-3">
          <div class="thumbnail">
            <img src="foto/berita3.jpeg" alt="">
            <div class="caption">
              <a href="https://kampusitahnews.iain-palangkaraya.ac.id/berita/2024/01/03/kampus-iain-palangka-raya-segera-terapkan-aplikasi-e-kinerja/"
                <h3>KAMPUS IAIN PALANGKA RAYA SEGERA TERAPKAN APLIKASI E-KINERJA</h3></a>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-3">
          <div class="thumbnail">
            <img src="foto/berita4.jpg" alt="">
            <div class="caption">
              <a href="https://kampusitahnews.iain-palangkaraya.ac.id/berita/2024/01/03/peringatan-hab-kemenag-ke-78-ribuan-pegawai-kemenag-laksanakan-upacara/"
                <h3>PERINGATAN HAB KEMENAG KE-78, RIBUAN PEGAWAI KEMENAG LAKSANAKAN UPACARA</h3>
            </div>
          </div>
        </div>
      </div>
      <!-- //Thumbniell-->
    </div>
  </div>
  <a href="" <!-- footer -->

    <div class="w3layouts_copy_right">
      <div class="container">
        <!-- <p>© 2018 SMK TERPADU </p> -->
        <p>© 2024 IAIN PALANGKA RAYA
  </a></p>
  </div>
  </div>
  <!-- //footer -->

  <!-- js-scripts -->
  <!-- js-files -->
  <script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script> <!-- Necessary-JavaScript-File-For-Bootstrap -->
  <!-- //js-files -->
  <!-- Baneer-js -->


  <!-- smooth scrolling -->
  <script src="js/SmoothScroll.min.js"></script>
  <!-- //smooth scrolling -->
  <!-- stats -->
  <script type="text/javascript" src="js/numscroller-1.0.js"></script>
  <!-- //stats -->
  <!-- moving-top scrolling -->
  <script type="text/javascript" src="js/move-top.js"></script>
  <script type="text/javascript" src="js/easing.js"></script>
  <script type="text/javascript">
    jQuery(document).ready(function ($) {
      $(".scroll").click(function (event) {
        event.preventDefault();
        $('html,body').animate({
          scrollTop: $(this.hash).offset().top
        }, 1000);
      });
    });
  </script>
  <script type="text/javascript">
    $(document).ready(function () {
      /*
        var defaults = {
        containerID: 'toTop', // fading element id
        containerHoverID: 'toTopHover', // fading element hover id
        scrollSpeed: 1200,
        easingType: 'linear' 
        };
      */
      $().UItoTop({
        easingType: 'easeOutQuart'
      });
    });
  </script>
  <a href="#home" class="scroll" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;">
    </span></a>
  <!-- //moving-top scrolling -->
  <!-- gallery popup -->
  <script src="js/jquery.swipebox.min.js"></script>
  <script type="text/javascript">
    jQuery(function ($) {
      $(".swipebox").swipebox();
    });
  </script>
  <!-- //gallery popup -->
  <!--/script-->
  <script src="js/simplePlayer.js"></script>
  <script>
    $("document").ready(function () {
      $("#video").simplePlayer();
    });
  </script>
  <!-- //Baneer-js -->
  <!-- Calendar -->
  <script src="js/jquery-ui.js"></script>
  <script>
    $(function () {
      $("#datepicker").datepicker();
    });
  </script>
  <!-- //Calendar -->

  <!-- //js-scripts -->
</body>

</html>