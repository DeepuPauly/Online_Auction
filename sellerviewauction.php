<?php include 'sellerheader.php';

extract($_GET);
$sid=$_SESSION['seller_id'];

?>
        <!-- Header Start -->
        <div class="container-fluid header bg-white p-0">
            <div class="row g-0 align-items-center flex-column-reverse flex-md-row">
                <div class="col-md-6 p-5 mt-lg-5">
                    <h1 class="display-5 animated fadeIn mb-4"><span class="text-primary">Online Auction</span> </h1>
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
		<th>Product name</th>
		<th>Quantity</th>
		<th>Date</th>
		<th>Time</th>
		<th>Amount</th>
		<th>Status</th>
	</tr>

	<?php 

	$b="SELECT * FROM `tbl_auction` INNER JOIN `tbl_product` USING(product_id) where `seller_id`='$sid'";
	$res=select($b);
	$slno=1;


	foreach ($res as $key) {
		
	 ?>

	 <tr>
	 	<td><?php echo $slno++ ?></td>
	 	<td><?php echo $key['product'] ?></td>
	 	<td><?php echo $key['quantity'] ?></td>
	 	<td><?php echo $key['date'] ?></td>
	 	<td><?php echo $key['time'] ?></td>
	 	<td><?php echo $key['amount'] ?></td>
	 	<td><?php echo $key['status'] ?></td>
	 	<?php if ($key['status']=='paid') {
	 	 ?>
	 	<td><a class="btn btn-info" href="sellerviewwinner.php?waid=<?php echo $key['auction_id'] ?>">View winner</a></td>
	 <?php } ?>
	 	<?php if ($key['status']=='stop' or $key['status']=='paid') {
	 	 ?>
		<td><a class="btn btn-info" href="sellerviewbid.php?aid=<?php echo $key['auction_id'] ?>">View bids</a></td>

	 	<?php }?>
	 	<?php if ($key['status']=='paid') {
	 	 ?>
		<td><a class="btn btn-info" href="sellerviewbidpayment.php?aid=<?php echo $key['auction_id'] ?>">Payment</a></td>
	 	<?php } ?>

	 	<?php if ($key['status']=='stop' or $key['status']=='paid') {
	 	 ?>
		<td><a class="btn btn-info" href="sellerviewrating.php?aid=<?php echo $key['auction_id'] ?>"> View Rating</a></td>

	 	<?php }?>

	 </tr>

	<?php } ?>

	</table>
</center>

<?php include 'footer.php' ?>