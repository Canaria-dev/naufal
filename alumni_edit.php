<?php include "koneksi.php"; ?>
<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>IAIN PALANGKA RAYA</title>
	<!-- Meta tag Keywords -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="IAIN PALANGKA RAYA" />
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

	<?php include('navigasi2.php'); ?>

	<div class="clearfix"> </div>
	<!-- //Modal2 -->

	<!-- Edit Guru -->
	<div id="Edit_Akun">
		<div class="container">
			<h3 class="w3l-title cl"> Data Alumni Mahasiswa </h3>
			<div class="container margin-atas">

				<?php
				$Kode = $_GET['kode'];
				$query = mysqli_query($koneksi, "select * from naufal2 where nim='$Kode'");
				$data = mysqli_fetch_array($query);

				$tampil_akun = "SELECT * FROM `naufal2` ORDER BY `nim` ASC ";
				$hasil_akun = mysqli_query($koneksi, $tampil_akun);
				?>

				<form class="form-group" action="proses_edit_alumni.php" method="post"enctype="multipart/form-data" >
					<table class="table">

						<td> NIM : </td>
						<td> <input type="text" name="nim_lama" maxlength="20" size="20" <?php echo "value='$data[nim]'"; ?> Readonly> </td>
						</tr>
						<tr>
							<td> NIM Baru : </td>
							<td> <input type="text" name="nim" maxlength="20" size="20"
									onkeypress="return hanyaAngka(event)" <?php echo "placeholder='$data[nim]'"; ?>>
							</td>
						</tr>

						<tr>
							<td> Nama : </td>
							<td> <input type="text" name="nama" <?php echo "value='$data[nama]'"; ?>> </td>
						</tr>

						<tr>
							<td> Jenis Kelamin : </td>
							<td><select name="jenis_kelamin">
									<option value="Laki-Laki" selected> Laki-Laki </option>
									<option value="Perempuan"> Perempuan </option>
								</select>
							</td>
						</tr>
						<tr>
							<td> Asal Kota : </td>
							<td> <input type="text" name="asal_kota" <?php echo "value='$data[asal_kota]'"; ?>> </td>
						</tr>

						<tr>
							<td>
								<label for="facultyDropdown">Pilih Fakultas:</label>
							</td>
							<td>
								<select id="facultyDropdown" onchange="populateDepartments()" name= "fakultas">
									<option value="">Fakultas</option>
									<option value="FTIK">FTIK</option>
									<option value="FUAD">FUAD</option>
									<option value="FEBI">FEBI</option>
									<!-- Add more faculties as needed -->
								</select>
							</td>
						</tr>
						<tr>
							<td>
								<label for="departmentDropdown">Pilih Prodi:</label>
							</td>
							<td>
								<select name ="prodi" id="departmentDropdown" disabled>
									<option value="">Prodi</option>
									<!-- Department options will be populated by JavaScript -->
								</select>
							</td>
						</tr>



						<tr>
							<td>Foto</td>
							<td><input type="file" name="foto"></td>
						</tr>
						<tr>
					</table>



					<button class='btn btn-primary' id='Simpan'> Simpan </button>
				</form>

			</div>

			<div class="clearfix margin-bawah"></div>
		</div>
	</div>
	<script type="text/javascript">
		function hanyaAngka(evt) {
			var charCode = (evt.which) ? evt.which : event.keyCode
			if (charCode > 31 && (charCode < 48 || charCode > 57))

				return false;
			return true;
		}
	</script>
	<!-- //Admin Pannel -->

	<!-- footer -->

	<div class="w3layouts_copy_right">
		<div class="container">
			<p>© 2024 IAIN PALANGKA RAYA </p>
		</div>
	</div>
	<!-- //footer -->

	<!-- js-scripts -->

	<script>
		function populateDepartments() {
			var facultyDropdown = document.getElementById('facultyDropdown');
			var departmentDropdown = document.getElementById('departmentDropdown');

			// Reset department dropdown
			departmentDropdown.innerHTML = '<option value="">Pilih Prodi</option>';

			// Enable or disable department dropdown based on faculty selection
			departmentDropdown.disabled = (facultyDropdown.value === '');

			// If a faculty is selected, populate the department dropdown
			if (facultyDropdown.value === 'FTIK') {
				// For the 'FTIK' faculty
				var FTIKDepartments = ['Tadris Biologi', 'Tadris Fisika', 'Pendidikan Bahasa Arab','Tadris Bahasa Inggris','Pendidikan Agama Islam','Pendidikan Guru Madrasah Ibtidaiyah'];
				for (var i = 0; i < FTIKDepartments.length; i++) {
					var option = document.createElement('option');
					option.value = FTIKDepartments[i].toLowerCase().replace(' ', '_');
					option.text = FTIKDepartments[i];
					departmentDropdown.add(option);
				}
			} else if (facultyDropdown.value === 'FUAD') {
				// For the 'FUAD' faculty
				var FUADDepartments = ['Komunikasi dan Penyiaran Islam', 'Ilmu Quran dan Tafsir', 'Bimbingan dan Konseling Islam','Sejarah Peradaban Islam'];
				for (var j = 0; j < FUADDepartments.length; j++) {
					var option = document.createElement('option');
					option.value = FUADDepartments[j].toLowerCase().replace(' ', '_');
					option.text = FUADDepartments[j];
					departmentDropdown.add(option);
				}
			} else if (facultyDropdown.value === 'FEBI') {
				// For the 'FUAD' faculty
				var FEBIDepartments = ['Manajemen Zakat dan Wakaf', 'Perbankan Syariah', 'Ekonomi Syariah','Akuntansi Syariah'];
				for (var k = 0; k < FEBIDepartments.length; k++) {
					var option = document.createElement('option');
					option.value = FEBIDepartments[k].toLowerCase().replace(' ', '_');
					option.text = FEBIDepartments[k];
					departmentDropdown.add(option);
				}
			}
		}
	</script>







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