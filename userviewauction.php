<?php include 'userheader.php';
extract($_GET);
$uid=$_SESSION['user_id'];
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

	$b="select * from `tbl_auction` inner join `tbl_product` using(product_id) ";
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
	 	<td><?php echo $key['rate'] ?></td>
	 	
	 	<?php if ($key['status']=='start') {
	 	 ?>
	 	<td><a class="btn btn-success" href="usermakebid.php?amm=<?php echo $key['rate'] ?>&aid=<?php echo $key['auction_id'] ?>">make bid</a></td>
	 <?php }else{ ?>

	 	<td><?php echo $key['status'] ?></td> 
	 <?php } ?>
	 <?php if ($key['status']=='stop' or $key['status']=='paid'){ ?>
	 
	 <td><a class="btn btn-info" href="userviewwinner.php?waid=<?php echo $key['auction_id'] ?>">view winner</a></td>

	<?php } ?>
	<?php if ($key['status']=='stop' or $key['status']=='paid'){ ?>
	 
	 <td><a class="btn btn-success" href="userrating.php?waid=<?php echo $key['auction_id'] ?>">rating</a></td>

	<?php } ?>
	 </tr>

	<?php } ?>

	</table>
</center>

<?php include 'footer.php' ?>