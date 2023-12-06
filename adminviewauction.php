<?php include 'adminheader.php';

extract($_GET);


if (isset($_GET['acc'])) {
	extract($_GET);

	$t="update `tbl_auction` set status='accepted' where auction_id='$acc'";
	update($t);

	alert("accepted successfully");

}

if (isset($_GET['rej'])) {
	extract($_GET);

	$g="update `tbl_auction` set status='rejected' where auction_id='$rej'";
	update($g);

	alert("rejected successfully");
}

if (isset($_GET['str'])) {
	extract($_GET);


	$h="update `tbl_auction` set status='start' where auction_id='$str'";
	update($h);

	alert("started successfully");

}

if (isset($_GET['stp'])) {
	extract($_GET);


	// $y="update `tbl_auction` set status='stop' where auction_id='$stp'";
	// update($y);


	$t="SELECT * FROM `tbl_bid`  WHERE auction_id='$stp' order by amount desc";
	$res=select($t);

	if (sizeof($res)>0) {
		$bid=$res[0]['bid_id'];

	$k="update `tbl_auction` set status='stop' where auction_id='$stp'";
	 update($k);

	 $y="update `tbl_bid` set status='winner' where bid_id='$bid'";
	 update($y);
	}
	// alert("started successfully");
}

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

	$b="select * from `tbl_auction` inner join `tbl_product` using(product_id)";
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
	 	<?php if ($key['status']=='pending') {
	 	 ?>
	 	 <td><a class="btn btn-success" href="?acc=<?php echo $key['auction_id'] ?>">Accept</a></td>
	 	 <td><a class="btn btn-danger" href="?rej=<?php echo $key['auction_id'] ?>">Reject</a></td>
	 	<?php }elseif ($key['status']=='accepted') {
	 		?>
	 		<td><a class="btn btn-success" href="?str=<?php echo $key['auction_id'] ?>">Start</a></td>
		<?php }elseif ($key['status']=='start') {
			?>	
			<td><a class="btn btn-danger" href="?stp=<?php echo $key['auction_id'] ?>">Stop</a></td>
			<?php }else{ ?> 
				<td><?php echo $key['status'] ?></td>
			<?php } ?>
			<?php if ($key['status']=='paid') {
			 ?>	
			 <td><a class="btn btn-info" href="adminviewbidamount.php">View bid</a></td>
			<?php } ?>
	 </tr>

	<?php } ?>

	</table>
                

<?php include 'footer.php' ?>