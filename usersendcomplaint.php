<?php include 'userheader.php';

	extract($_GET);
	$uid=$_SESSION['user_id'];

if (isset($_POST['submit'])) {
	extract($_POST);

	$f="insert into `tbl_complaint` values(null,'$uid','$complaints','pending',curdate())";
	insert($f);

	alert("complaint send successfully");
	return redirect('usersendcomplaint.php');
}



 ?>
<!-- Header Start -->
        <div class="container-fluid header bg-white p-0">
            <div class="row g-0 align-items-center flex-column-reverse flex-md-row">
                <div class="col-md-6 p-5 mt-lg-5">
                    <h1 class="display-5 animated fadeIn mb-4"><span class="text-primary">Complaints & Replys</span></h1>
	<form method="post">
	<table class="table" style="width: 500px;color: black">
		<tr>
			<th>Complaint</th>
			<td><input type="textbox" class="form-control" required=""  name="complaints"></td>
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


<center>
	<table class="table" style="width: 500px;color: black">
	<tr>
		<th>slno</th>
		<th>complaints</th>
		<th>reply</th>
		<th>date</th>
	</tr>

	<?php 

		$b="select * from `tbl_complaint` where user_id='$uid'";
		$res=select($b);
		$slno=1;


		foreach ($res as $key) {
		
	 ?>
	 <tr>
	 	<td><?php echo $slno++ ?></td>
	 	<td><?php echo $key['complaint'] ?></td>
	 	<td><?php echo $key['reply'] ?></td>
	 	<td><?php echo $key['date'] ?></td>
	 </tr>
	<?php } ?>
	</table>


<?php include 'footer.php' ?>