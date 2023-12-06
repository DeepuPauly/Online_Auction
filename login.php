<?php include 'publicheader.php';

if (isset($_POST['submit'])) {
	extract($_POST);

	$q="select * from `tbl_login` where `username`='$username' and `password`='$password' ";
	$res=select($q);

	if (sizeof($res)>0) {
		
		$_SESSION['login_id']=$res[0]['login_id'];
		$lid=$_SESSION['login_id'];
		if ($res[0]['usertype']=="admin")
		 {
			return redirect("adminhome.php");
		}
		elseif ($res[0]['usertype']=="user")
		 {
			
			$a="select * from `tbl_user` where login_id='$lid'";
			$res=select($a);
			if (sizeof($res)>0)
			 {
				$_SESSION['user_id']=$res[0]['user_id'];
				$uid=$_SESSION['user_id'];
				return redirect("userhome.php");
			}
		}
		elseif ($res[0]['usertype']=="seller") 
		{

			$b="select * from `tbl_seller` where login_id='$lid'";
			$res=select($b);
			if (sizeof($res)>0) 
			{
				$_SESSION['seller_id']=$res[0]['seller_id'];
				$sid=$_SESSION['seller_id'];
				return redirect("sellerhome.php");
			}
		}

		}


	alert("login successfully");
 	return redirect("login.php");
	}

 ?>

       <!-- Header Start -->
        <div class="container-fluid header bg-white p-0">
            <div class="row g-0 align-items-center flex-column-reverse flex-md-row">
                <div class="col-md-6 p-5 mt-lg-5">
                    <h1 class="display-5 animated fadeIn mb-4"><span class="text-primary">LOGIN</span></h1>
                    
         


	<form method="post">
		<table class="table" style="width: 500px;color: black">			
			<tr>
				<th>User name</th>
				<td><input type="text" name="username" class="form-control" required=""></td>
			</tr>
			<tr>
				<th>Password</th>
				<td><input type="Password" name="password" class="form-control" required=""  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"></td>
			</tr>
			<tr>
				<td align="center" colspan="2"><input type="submit" name="submit" class="btn btn-success"></td>
			</tr>
			<tr>
		<td align="center" colspan="2"><a style="color: red;" href="forgotten_password.php">Forgotten Password</a></td>
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