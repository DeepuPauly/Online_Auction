<?php include 'adminheader.php';

// $uid=$_SESSION['user_id'];

extract($_GET);


if (isset($_GET['bid'])) {
	extract($_GET);

	$o="update `tbl_booking` set status='provided' where booking_id='$bid'";
	update($o);

	// alert("status updated");
}

 ?>

        <!-- Header Start -->
        <div class="container-fluid header bg-white p-0">
            <div class="row g-0 align-items-center flex-column-reverse flex-md-row">
                <div class="col-md-6 p-5 mt-lg-5">
                    <h1 class="display-5 animated fadeIn mb-4"><span class="text-primary">Online Auction Bookings</span> </h1>
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
<center>
	
		<table class="table" style="width: 500px;color: black">
			<tr>
				<th>Slno</th>
				<th>Name</th>
				<th>Amount</th>
				<th>Date</th>
				<th>Status</th>
			</tr>

<?php 
	$q="SELECT * FROM `tbl_booking` INNER JOIN `tbl_user` using (user_id)";
	$res=select($q);
	$slno=1;

	foreach ($res as $key) {
	
 ?>

<tr>
	<td><?php echo $slno++ ?></td>
	<td><?php echo $key['firstname'] ?></td>
	<td><?php echo $key['amount'] ?></td>
	<td><?php echo $key['date'] ?></td>
	<?php if ($key['status']=='paid') {
		 ?>
		 <td><a class="btn btn-success" href="?bid=<?php echo $key['booking_id'] ?>">Provide</a></td>
		<?php }else{ ?>

		<td><?php echo $key['status'] ?></td>	
		<?php } ?>
	<td><a class="btn btn-info" href="adminviewbookingdetails.php?bok=<?php echo $key['booking_id'] ?>">Booking details</a></td>
	
</tr>

<?php } ?>
</table>
</center>
<?php include 'footer.php' ?>