<?php include 'publicheader.php';

if (isset($_POST['submit'])) {
	extract($_POST);

	$l="insert into `tbl_login` values(null,'$username','$password','user')";
	$uid=insert($l);

	$w="insert into `tbl_user` values(null,'$uid','$fname','$lname','$place','$phone','$email')"; 
	insert($w);
	alert("registration successfully completed");
 	return redirect("login.php");
}

 ?>

 <!-- Header Start -->
        <div class="container-fluid header bg-white p-0">
            <div class="row g-0 align-items-center flex-column-reverse flex-md-row">
                <div class="col-md-6 p-5 mt-lg-5">
                    <h1 class="display-5 animated fadeIn mb-4"><span class="text-primary">USER</span></h1>

	<form method="post">
		<table class="table" style="width: 500px;color: black">
			<tr>
				<th>First name</th>
				<td><input type="text" name="fname" pattern="[A-Za-z ]+$" class="form-control" required=""></td>
			</tr>
			<tr>
				<th>Last name</th>
				<td><input type="text" name="lname" pattern="[a-zA-Z ]+$" class="form-control" required=""></td>
			</tr>
			<tr>
				<th>Place</th>
				<td><input type="text"  class="form-control" pattern="[a-zA-Z ]+$" name="place" required=""></td>
			</tr>
			<tr>
				<th>Phone</th>
				<td><input type="text" pattern="[0-9]{10}" name="phone" class="form-control" maxlength="10" required=""></td>
			</tr>
			<tr>
				<th>Email</th>
				<td><input type="email" name="email" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}" class="form-control" required=""></td>
			</tr>
			<tr>
				<th>Username</th>
				<td><input type="text" name="username" class="form-control" required=""></td>
			</tr>
			<tr>
				<th>Password</th>
				<td><input type="password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
 				 title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters" class="form-control"required=""></td>
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


<?php include 'footer.php' ?>