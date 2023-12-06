<?php include 'sellerheader.php';

extract($_GET);

if (isset($_POST['submit'])) {
	extract($_POST);

	$p="insert into `tbl_auction` values(null,'$pid','$quantity',curdate(),'$time','$amount','pending')";
	insert($p);
	alert("Auction request successfully send");
	return redirect("selleraddproduct.php");
}


 ?>


       <!-- Header Start -->
        <div class="container-fluid header bg-white p-0">
            <div class="row g-0 align-items-center flex-column-reverse flex-md-row">
                <div class="col-md-6 p-5 mt-lg-5">
                    <h1 class="display-5 animated fadeIn mb-4"><span class="text-primary">Auction Request</span></h1>

	<form method="post">
	<table class="table" style="width: 500px;color: black">
		<tr>
			<th>quantity</th>
			<td><input type="text" min="1" name="quantity" class="form-control" required=""></td>
		</tr>
		<tr>
			<th>date</th>
			<td><input type="date" name="date" class="form-control" required=""></td>
		</tr>
		<tr>
			<th>time</th>
			<td><input type="time" name="time" class="form-control" required=""></td>
		</tr>
		<tr>
			<th>amount</th>
			<td><input type="number" name="amount" class="form-control" required=""></td>
		</tr>
		<tr >
			<td align="center" colspan="2"><input class="btn btn-success" type="submit" name="submit"></td>
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



<?php include 'footer.php' ?>