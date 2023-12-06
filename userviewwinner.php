<?php include 'userheader.php';

extract($_GET);
$uid=$_SESSION['user_id'];
 ?>
      <!-- Header Start -->
        <div class="container-fluid header bg-white p-0">
            <div class="row g-0 align-items-center flex-column-reverse flex-md-row">
                <div class="col-md-6 p-5 mt-lg-5">
                    <h1 class="display-5 animated fadeIn mb-4"><span class="text-primary">Online Auction Winner</span> </h1>
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
	</tr>


	<?php 

// 	echo$g="
// SELECT * FROM tbl_bid INNER JOIN `tbl_user` USING(user_id) 
//  WHERE (STATUS='winner' OR STATUS='paid') and user_id='$uid' and auction_id='$waid'";

	$g="SELECT * FROM tbl_bid INNER JOIN `tbl_user` USING(user_id) WHERE (user_id!='$uid' AND auction_id='$waid' and `status`='winner') or(user_id='$uid' AND auction_id='$waid' and `status`='winner') or  (user_id='$uid' AND auction_id='$waid' and `status`='paid')";

	$res=select($g);
	$slno=1;


	foreach ($res as $key) {	

	 ?>
	 <tr>
	 	<td><?php echo $slno++ ?></td>
	 	<td><?php echo $key['firstname'] ?></td>
	 	<td><?php echo $key['Amount'] ?></td>
	 	<td><?php echo $key['date'] ?></td>
	 	<?php 
	 		$t="SELECT * , `tbl_bid`.status as bstatus FROM tbl_bid  inner join `tbl_auction` using(auction_id) inner join `tbl_product` using(product_id) inner join tbl_seller using(seller_id) where (`tbl_bid`.`status`='winner' and `auction_id`='$waid' and user_id='$uid') or (`tbl_bid`.`status`='paid' and `auction_id`='$waid' and user_id='$uid')";
	 		$xyz=select($t);

	 		foreach ($xyz as $key ) {	
	 	 ?>
	 	 <?php if ($key['bstatus']=='winner') {
	 	  ?>

	 	<td><a class="btn btn-success" href="usermakeauctionpayment.php?aid=<?php echo $key['auction_id'] ?>&amm=<?php echo $key['Amount'] ?>&uid=<?php echo $key['user_id'] ?>&nid=<?php echo $key['user_id'] ?>&sid=<?php echo $key['seller_id'] ?>">make payment</a></td>
	 <?php 
	}
	elseif ($key['bstatus']=='paid') {
	  ?>
	  <td><a class="btn btn-success" href="userwinnercanchat.php?sid=<?php echo $key['login_id'] ?>">chat</a></td>
	<?php } ?>

	 <?php } ?>

	 </tr>

	<?php } ?> 
</table> 
</center>

<?php include 'footer.php' ?>