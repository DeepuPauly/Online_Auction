<?php include 'publicheader.php' ;


if (isset($_POST['login'])) 
{
	extract($_POST);
	$g="update tbl_login set password='$pwd' where username='$uname'";
	update($g);
	alert('password updated successfully');
	return redirect('login.php');
}




?>

  <!-- Header Start -->
        <div class="container-fluid header bg-white p-0">
            <div class="row g-0 align-items-center flex-column-reverse flex-md-row">
                <div class="col-md-6 p-5 mt-lg-5">
                    <h1 class="display-5 animated fadeIn mb-4"><span class="text-primary">Set New Password</span></h1>


<h1  style="color: white"><!-- Set New Password --></h1>
<form method="post" >
	<table class="table" style="width:500px;color: ">
		
		<tr>
			<th>User Name</th>
			<td ><input type="text"  required="" class="form-control" style="color: " name="uname"></td>
		</tr>
		<tr>
			<th>Enter Your New Password</th>
			<td><input type="password" required="" class="form-control" id="pwd" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"  name="pwd" style="color: "></td>
		</tr>
		<tr>
			<th>Confirm Password</th>
			<td><input type="password" required="" class="form-control" id="c_pwd" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" name="pwd" style="color: "></td>
		</tr>
		<tr>
		<td align="center" colspan="2"><input type="submit" onclick="myfunction(event);" name="login" value="submit" class="btn btn-success"></td>
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



<script type="text/javascript">
function myfunction(event) {
    var pa = document.getElementById('pwd').value;
    var cpa = document.getElementById('c_pwd').value;
    
    if (pa === cpa) {
        // Passwords match, continue with form submission
    } else {
        // Passwords don't match, prevent form submission and show an alert
        event.preventDefault();
        alert("Passwords do not match. Please check your password.");
    }
}

</script>

<?php include 'footer.php' ?>