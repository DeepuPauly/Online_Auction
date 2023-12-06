<?php include 'sellerheader.php';

extract($_GET);
$sid=$_SESSION['seller_id'];
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

	$g="SELECT * FROM tbl_bid INNER JOIN `tbl_user` USING(user_id)
			 WHERE (status='winner' AND `auction_id`='$waid') OR (status='paid' AND `auction_id`='$waid')";

	$res=select($g);
	$slno=1;


	foreach ($res as $key) {	

	 ?>
	 <tr>
	 	<td><?php echo $slno++ ?></td>
	 	<td><?php echo $key['firstname'] ?></td>
	 	<td><?php echo $key['Amount'] ?></td>
	 	<td><?php echo $key['date'] ?></td>
	 	 <td><a class="btn btn-success" href="sellercanchatwithwinner.php?uid=<?php echo $key['login_id'] ?>">Chat</a></td>



	 <?php } ?>
 </center>

<?php include 'footer.php' ?>