<?php
include('koneksi.php');
$page = isset($_GET['page']) ? $_GET['page'] : 1;
?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>IAIN Palangka Raya</title>
    <meta charset="UTF-8">

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Ambil elemen textbox, tombol search, dan tombol reset
            var keywordInput = document.getElementById('keyword');
            var searchButton = document.getElementById('btn-search');

            // Tambahkan event listener untuk tombol search
            searchButton.addEventListener('click', function () {
                var keyword = keywordInput.value;
                // Redirect ke halaman pencarian dengan mengirimkan parameter query
                window.location.href = 'alumni.php?keyword=' + keyword;
            });
        });

        function deleteSelected() {
            var selectedItems = document.getElementsByName('selectedItems[]');
            var selectedData = [];

            for (var i = 0; i < selectedItems.length; i++) {
                if (selectedItems[i].checked) {
                    selectedData.push(selectedItems[i].value);
                }
            }

            if (selectedData.length > 0) {
                // Redirect ke halaman penghapusan dengan mengirimkan data yang dipilih
                window.location.href = 'hapus_multiple_alumni.php?selectedData=' + selectedData.join(',');
            } else {
                alert('Pilih setidaknya satu data untuk dihapus.');
            }
        }
    </script>

    <!-- Meta tag Keywords -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="SMK TERPADU" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!--// Meta tag Keywords -->
    <!-- css files -->
    <link rel="stylesheet" href="css/bootstrap.css"> <!-- Bootstrap-Core-CSS -->
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all" /> <!-- Style-CSS -->
    <link rel="stylesheet" href="css/font-awesome.css"> <!-- Font-Awesome-Icons-CSS -->
    <link rel="stylesheet" href="css/swipebox.css">
    <link rel="stylesheet" href="css/jquery-ui.css" />
    <link rel="stylesheet" href="css/roma.css" />
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
    <div id="penduduk">
        <div class="container">
            <h3 class="w3l-title"> Data Alumni </h3>
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Pencarian..." id="keyword">
                <span class="input-group-btn">
                    <button class="btn btn-primary" type="button" id="btn-search">SEARCH</button>
                    <a href="" class="btn btn-warning">RESET</a>
                </span>
            </div>

            <a href="tambah_alumni.php"> <button class="btn"> Tambah data alumni </button> </a>
            <a href="pdf.php"> <button class="btn">Download PDF </button> </a>
            <div>
                <div>
                    <label>Filter Tanggal</label>
                    <div class="input-group">
                        <input type="date" name="tgl_awal" value="<?= @$_GET['tgl_awal'] ?>"
                            class="form-control tgl_awal" placeholder="Tanggal Awal">
                        <span class="input-group-addon">s/d</span>
                        <input type="date" name="tgl_akhir" value="<?= @$_GET['tgl_akhir'] ?>"
                            class="form-control tgl_akhir" placeholder="Tanggal Akhir">
                    </div>
                    <button type="submit" name="filter" value="true" class="btn btn-primary">TAMPILKAN</button>
                    <?php
                    if (isset($_GET['filter'])) // Jika user mengisi filter tanggal, maka munculkan tombol untuk reset filter
                        echo '<a href="index.php" class="btn btn-default">RESET</a>';
                    ?>
                    </form>
                    <?php
                    // Load file koneksi.php
                    include "koneksi.php";
                    $tgl_awal = @$_GET['tgl_awal']; // Ambil data tgl_awal sesuai input (kalau tidak ada set kosong)
                    $tgl_akhir = @$_GET['tgl_akhir']; // Ambil data tgl_awal sesuai input (kalau tidak ada set kosong)
                    if (empty($tgl_awal) or empty($tgl_akhir)) { // Cek jika tgl_awal atau tgl_akhir kosong, maka :
                        // Buat query untuk menampilkan semua data transaksi
                        $query = "SELECT * FROM naufal2";
                        $url_cetak = "print.php";
                        $label = "Semua Data Transaksi";
                    } else { // Jika terisi
                        // Buat query untuk menampilkan data transaksi sesuai periode tanggal
                        $query = "SELECT * FROM naufal2 WHERE (tgl BETWEEN '" . $tgl_awal . "' AND '" . $tgl_akhir . "')";
                        $url_cetak = "print.php?tgl_awal=" . $tgl_awal . "&tgl_akhir=" . $tgl_akhir . "&filter=true";
                        $tgl_awal = date('d-m-Y', strtotime($tgl_awal)); // Ubah format tanggal jadi dd-mm-yyyy
                        $tgl_akhir = date('d-m-Y', strtotime($tgl_akhir)); // Ubah format tanggal jadi dd-mm-yyyy
                        $label = 'Periode Tanggal ' . $tgl_awal . ' s/d ' . $tgl_akhir;
                    }
                    ?>
                </div>
                <div>
                    <a href="excel.php"> <button class="btn">input excel </button> </a>
                    <a href="export_excel.php"> <button class="btn">export excel </button> </a>
                </div>
                <div>
                    <button class="btn btn-danger" onclick="deleteSelected()">Delete Selected</button>
                </div>

                <table class="table table-bordered text-center">
                    <tr>

                        <td><input type="checkbox" id="check-all"></td>
                        <td> Foto </td>
                        <td> Nim </td>
                        <td> Nama </td>
                        <td> Jenis Kelamin </td>
                        <td> Asal Kota </td>
                        <td> Fakultas</td>
                        <td> Prodi</td>
                        <td colspan="2"><b> Aksi </td>
                    </tr>

                    <?php
                    $limit = 4; // Jumlah data per halaman
                    $start = ($page - 1) * $limit;
                    $keyword = isset($_GET['keyword']) ? mysqli_real_escape_string($koneksi, $_GET['keyword']) : '';

                    $tampil = "SELECT * FROM `naufal2` 
                           WHERE nama LIKE '%$keyword%' 
                              OR jenis_kelamin LIKE '%$keyword%'
                              OR asal_kota LIKE '%$keyword%'
                              OR nim LIKE '%$keyword%'
                              OR fakultas LIKE '%$keyword%'
                              -- Add more columns as needed
                           LIMIT $start, $limit";

                    $hasil = mysqli_query($koneksi, $tampil);

                    while ($data = mysqli_fetch_array($hasil)) {
                        if ($data['fakultas'] == "FTIK") {
                            $fakultas = "FTIK";
                        } elseif ($data['fakultas'] == "FUAD") {
                            $fakultas = "FUAD";
                        } elseif ($data['fakultas'] == "FEBI") {
                            $fakultas = "FEBI";

                        }

                        echo "<tr>
                            <td><input type='checkbox' class='check-item' name='foto[]' value='" . $data['foto'] . "'></td>
                            <td><img src='foto/" . $data['foto'] . "' width='100' height='100'></td>
                            <td> $data[nim] </td>
                            <td class='text-left'> $data[nama] </td>
                            <td class='text-left'> $data[jenis_kelamin] </td>
                            <td class='text-left'> $data[asal_kota] </td>                            
                            <td> $fakultas </td>
                            <td> $data[prodi] </td>
                            <td width='100'><a href='alumni_edit.php?kode=$data[nim]'> Edit </a></td>
                            <td width='100'><a href='hapus_alumni.php?kode=$data[nim]'> Hapus </a></td>
                        </tr>";
                    }
                    ?>
                </table>
            </div>
            <ul class="pagination">

                <?php
                if ($page == 1) {
                    ?>
                    <li class="disabled"><a href="#">First</a></li>
                    <li class="disabled"><a href="#">&laquo;</a></li>
                    <?php
                } else {
                    $link_prev = ($page > 1) ? $page - 1 : 1;
                    ?>
                    <li><a href="alumni.php?page=1">First</a></li>
                    <li><a href="alumni.php?page=<?php echo $link_prev; ?>">&laquo;</a></li>
                    <?php
                }
                ?>
                <?php




                $sql2 = mysqli_query($koneksi, "SELECT COUNT(*) AS jumlah FROM naufal2");
                $get_jumlah = mysqli_fetch_assoc($sql2);
                $jumlah_page = ceil($get_jumlah['jumlah'] / $limit);
                $jumlah_number = 3;
                $start_number = ($page > $jumlah_number) ? $page - $jumlah_number : 1;
                $end_number = ($page < ($jumlah_page - $jumlah_number)) ? $page + $jumlah_number : $jumlah_page;
                for ($i = $start_number; $i <= $end_number; $i++) {
                    $link_active = ($page == $i) ? ' class="active"' : '';
                    ?>
                    <li<?php echo $link_active; ?>><a href="alumni.php?page=<?php echo $i; ?>">
                            <?php echo $i; ?>
                        </a></li>
                        <?php
                }
                ?>
                    <?php

                    if ($page == $jumlah_page) {
                        ?>
                        <li class="disabled"><a href="#">&raquo;</a></li>
                        <li class="disabled"><a href="#">Last</a></li>
                        <?php
                    } else {
                        $link_next = ($page < $jumlah_page) ? $page + 1 : $jumlah_page;
                        ?>
                        <li><a href="alumni.php?page=<?php echo $link_next; ?>">&raquo;</a></li>
                        <li><a href="alumni.php?page=<?php echo $jumlah_page; ?>">Last</a></li>
                        <?php
                    }
                    ?>
                    <div class="clearfix margin-bawah"></div>
        </div>
    </div>


    <div class="w3layouts_copy_right">
        <div class="container">
            <p>© 2024 IAIN Palangka Raya </a></p>
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
                $('html,body').animate({ scrollTop: $(this.hash).offset().top }, 1000);
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
            $().UItoTop({ easingType: 'easeOutQuart' });
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