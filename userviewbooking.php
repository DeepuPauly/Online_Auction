<?php include 'userheader.php';

extract($_GET);
$uid=$_SESSION['user_id'];

 ?>
      <!-- Header Start -->
        <div class="container-fluid header bg-white p-0">
            <div class="row g-0 align-items-center flex-column-reverse flex-md-row">
                <div class="col-md-6 p-5 mt-lg-5">
                    <h1 class="display-5 animated fadeIn mb-4"><span class="text-primary">Orders</span> </h1>
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
				<th>product name</th>
				<th>Amount</th>
				<th>Quantity</th>
			</tr>

<?php 
	$q="SELECT * FROM `tbl_booking` inner join `tbl_bookingchild` using(booking_id) INNER JOIN `tbl_product` USING(product_id) where user_id='$uid' and status='paid'";
	$res=select($q);
	$slno=1;

	foreach ($res as $key) {
	
 ?>

<tr>
	<td><?php echo $slno++ ?></td>
	<td><?php echo $key['product'] ?></td>
	<td><?php echo $key['amount'] ?></td>
	<td><?php echo $key['quantity'] ?></td>
</tr>

<?php } ?>
</table>
</center>
<?php include 'footer.php' ?>