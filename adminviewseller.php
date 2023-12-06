<?php include 'adminheader.php';

extract($_GET);

if (isset($_GET['blk'])) {
	extract($_GET);

	 $y="update `tbl_login` set usertype='block' where `login_id`='$blk'";
	update($y);
	alert("Blocked successfully");
	return redirect('adminviewseller.php');

}

if (isset($_GET['unk'])) {
	extract($_GET);


	$h="update `tbl_login` set usertype='seller' where `login_id`='$unk'";
	update($h);
	alert("Unblocked successfully");
	return redirect('adminviewseller.php');
}


 ?>

        <!-- Header Start -->
        <div class="container-fluid header bg-white p-0">
            <div class="row g-0 align-items-center flex-column-reverse flex-md-row">
                <div class="col-md-6 p-5 mt-lg-5">
                    <h1 class="display-5 animated fadeIn mb-4"><span class="text-primary">Sellers</span> </h1>
                    <p class="animated fadeIn mb-4 pb-2"></p>
                   
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
        </div>
        <!-- Header End -->
<br>
<br>

<center>
	
	<table class="table" style="width: 500px;color: black">
	<tr>
		<th>slno</th>
		<th>Name</th>
		<th>Place</th>
		<th>Phone</th>
		<th>Email</th>
		<th>Block/Unblock</th>
	</tr>

	<?php 

		$p="select * from `tbl_seller` inner join `tbl_login` using(login_id)";
		$res=select($p);
		$slno=1;


		foreach ($res as $key) {
		
	 ?>

	 <tr>
	 	<td><?php echo $slno++ ?></td>
	 	<td><?php echo $key['sellername'] ?></td>
	 	<td><?php echo $key['place'] ?></td>
	 	<td><?php echo $key['phone'] ?></td>
	 	<td><?php echo $key['email'] ?></td>
	 	<?php if ($key['usertype']=='seller') {
	 	?>
	 	<td><a class="btn btn-danger" href="?blk=<?php echo $key['login_id'] ?>">Block</a></td>
	 <?php }elseif ($key['usertype']=='block') {
	  ?>
	  	<td><a class="btn btn-success" href="?unk=<?php echo $key['login_id'] ?>">Unblock</a></td>
	<?php } ?>
	 </tr>
	<?php } ?>
</table>

<?php include 'footer.php' ?>