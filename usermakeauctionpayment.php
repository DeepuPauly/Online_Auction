<?php include 'userheader.php';

extract($_GET);
$uid=$_SESSION['user_id'];

if (isset($_POST['submit'])) {
	extract($_POST);


	$k="insert into `tbl_auctionpayment` values(null,'$aid','$uid','$amm',curdate())";
	insert($k);

	$s="update `tbl_bid` set status='paid' where auction_id='$aid' and status='winner'"; 
	update($s);

	$r="update `tbl_auction` set status='paid' where auction_id='$aid'"; 
	update($r);

	alert("payment successfull");
	return redirect("userviewauction.php");
}

 ?>

<!-- Header Start -->
        <div class="container-fluid header bg-white p-0">
            <div class="row g-0 align-items-center flex-column-reverse flex-md-row">
                <div class="col-md-6 p-5 mt-lg-5">
                    <h1 class="display-5 animated fadeIn mb-4"><span class="text-primary">Payment</span></h1>
	<style type="text/css">
td{background-color: transparent;font-weight: 2px;color: rgb(2, 2, 2)}
hr{border-color: orange}
#b {
	border: 1px solid grey; 
	padding: 10px;
}

</style>
<br>
    <!-- ======= Chefs Section ======= -->
    <section id="chefs" class="chefs">
		<div class="container">
						
	  <br><br><br>  <br><br><br>  
<div align="center">
<center> 
	<form method="post">
      

		<h2 style="color: rgb(0, 0, 0);"> Payment </h2><br>
	
	<table>

		<table style="width: 500px; border-radius: 5px;" class="table table-borderless" id="b"> 
			<tr> 
				<td>PAYMENT DETAILS</td> 
				<td colspan="2" align="right"><img src="images/payment.jpeg" style="width:70%"></td>
			</tr>  
			<tr> 
				<td colspan="2"> <small>CARD NUMBER</small><br> 
                    <input type="text" placeholder="CARD NUMBER"  class="form-control" required pattern="[0-9]{16}" title="Enter 16 digit CARD NUMBER number">
				</td> 
			</tr>
			<tr> 
				<td > <small>CVV</small><br> 
					<input type="text" placeholder="CVV"  class="form-control" required pattern="[0-9]{3}" title="Enter 3 digit CV number">
				</td> 
				<td> <small>EXPIRATION DATE</small><br> 
					<input type="text" placeholder="MM/YY"  class="form-control" required pattern="[0-9,/]{5}" name="edate" title="Enter month and year"> 
				</td>
			</tr>
			<tr> 
				<td colspan="2"> <small>CARD HOLDER</small><br> 
					<input type="text" placeholder="Name on card" pattern="[A-Za-z ]+$"  class="form-control" data-valid='only-text' required> 
				</td>
			</tr>
			<!-- <tr> 
				<td colspan="2" >
					<h6>Service Charge : {{pr}}</h6>
			
					<h6>Amount : {{total}}</h6>
				</td>
			</tr> -->
			<tr> 
				<td colspan="2" >
					<h6 style="color: rgb(0, 0, 0);font-size: 1em;"> Total :<?php echo $amm ?></h6>
				</td>
			</tr>
			<tr> 
				<td> 
					<input type="submit" value="PAY"  class="btn btn-success" style="width: 100%" name="submit">


				</td>
			</tr>
		</table>

	</div>
</form>
</div></section>
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