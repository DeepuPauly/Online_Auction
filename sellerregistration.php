<?php include 'publicheader.php';

if (isset($_POST['submit'])) {
	extract($_POST);

	$l="insert into `tbl_login` values(null,'$username','$password','seller')";
	$sid=insert($l);

	$s="insert into `tbl_seller` values(null,'$sid','$name','$place','$phone','$email')";
	insert($s);
	alert("registration successfully completed");
 	return redirect("login.php");
}

 ?>

  <!-- Header Start -->
        <div class="container-fluid header bg-white p-0">
            <div class="row g-0 align-items-center flex-column-reverse flex-md-row">
                <div class="col-md-6 p-5 mt-lg-5">
                    <h1 class="display-5 animated fadeIn mb-4"><span class="text-primary">SELLER</span></h1>

	<form method="post">
		<table class="table" style="width: 500px;color: black">
			<tr>
				<th>Name</th>
				<td><input type="text" name="name" pattern="[a-zA-Z]+$" class="form-control" required=""></td>
			</tr>
			<tr>
				<th>Place</th>
				<td><input type="text" name="place" pattern="[a-zA-Z]+$" class="form-control" required=""></td>
			</tr>
			<tr>
				<th>Phone</th>
				<td><input type="text" name="phone" pattern="[0-9]{10}" class="form-control" maxlength="10" required="" ></td>
			</tr>
			<tr>
				<th>Email</th>
				<td><input type="text" name="email"  pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}" class="form-control" required=""></td>
			</tr>
			<tr>
			<th>Username</th>
			<td><input type="text" name="username" class="form-control" required=""></td>
			</tr>
			<tr>
			<th>Password</th>
			<td><input type="password" name="password" name="password"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" class="form-control" required=""></td>
			</tr>
			<tr>
			<td align="center" colspan="2"><input type="submit" class="btn btn-success" name="submit"></td>
			</tr>
		</table>
	</form>

</div>
                <div class="col-md-6 animated fadeIn">
                    <div class="owl-carousel header-carousel">
                        <div class="owl-carousel-item">
                            <img class="img-fluid" src="img/carousel-1.jpg" alt="">
                        </div>
                        <div class="owl-carousel-item">
                            <img class="img-fluid" src="img/carousel-2.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
        <!-- Header End -->

<?php include "footer.php" ?>