<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Apply Form - <?php echo $_GET['subject']; ?></title>

    <!-- Bootstrap core CSS -->
<link href="./css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="./css/features.css" rel="stylesheet">
  </head>
  <body>
<main>
    <a href="./"><< Back</a>
  <h1 class="visually-hidden">Apply Form - <?php echo "Apply for " . $_GET['subject']; ?></h1>

  <div class="container px-4 py-5" id="custom-cards">
    <h2 class="pb-2 border-bottom"><?php echo "Form Pendaftaran untuk Posisi " . $_GET['subject']; ?></h2>
    <form class="form-horizontal" action="./apply.php" method="POST">
        <div class="mb-3">
            <label for="namalengkap" class="form-label">Nama Lengkap*</label>
            <input type="text" class="form-control" id="namalengkap" name="namalengkap" placeholder="Nama Lengkap" required>
        </div>
        <div class="mb-3">
        <div class="mb-3">
            <label for="nomorhp" class="form-label">Nomor HP*</label>
            <input type="phone" class="form-control" id="nomorhp" name="nomorhp" placeholder="Nomor HP" required>
        </div>
        <div class="mb-3">
            <label for="nomorwa" class="form-label">Nomor WA*</label>
            <input type="text" class="form-control" id="nomorwa" name="nomorwa" placeholder="Nomor WA" required>
        </div>
            <label for="formGroupExampleInput2" class="form-label">Posisi yang dilamar</label>
            <input type="text" class="form-control" id="jobtitle" name="jobtitle" placeholder="Posisi yang Dilamar" value="<?php echo $_GET['subject']; ?>" readonly>
        </div>
        
        <div class="form-group">        
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-primary" name="daftar" onclick="return confirm('Anda yakin ingin mengirim data sesuai form?');">Daftar</button>
            </div>
        </div>
    </form>
  </div>

</main>

  </body>
</html>

<?php
	// connect to database
	$conn = mysqli_connect('192.168.1.110', 'sambtest', 'sambtest123', 'samb_test');

    	// REGISTER USER
	if (isset($_POST['daftar'])) {
		// receive all input values from the form
		$jobtitle = mysqli_real_escape_string($conn, $_POST['jobtitle']);
		$namalengkap = mysqli_real_escape_string($conn, $_POST['namalengkap']);
		$nomorhp = mysqli_real_escape_string($conn, $_POST['nomorhp']);
		$nomorwa = mysqli_real_escape_string($conn, $_POST['nomorwa']);

		// register user if there are no errors in the form
		//if (count($errors) == 0) {
		//	$password = md5($password_1);//encrypt the password before saving in the database
			$query = "INSERT INTO pendaftar (jobtitle, namalengkap, nomorhp, nomorwa) 
			VALUES('$jobtitle', '$namalengkap', '$nomorhp', '$nomorwa')";
			mysqli_query($conn, $query);
			
			echo '<script type="text/javascript">'; 
			echo 'alert("Data Anda telah dimasukkan ke database. Silahkan login untuk mengakses.");'; 
			echo 'window.location.href = "index.php";';
			echo '</script>';
			
		//}

	}


?>