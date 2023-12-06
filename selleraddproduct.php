<?php include 'sellerheader.php';


extract($_GET);
$sid=$_SESSION['seller_id'];

if (isset($_POST['submit'])) {
	extract($_POST);


	$g="insert into `tbl_product` values(null,'$sid','$productname','$quantity','$details','$price')";
	insert($g);

	alert("product added");
	return redirect("selleraddproduct.php");
}

if (isset($_GET['did'])) {
	extract($_GET);


	$d="delete from `tbl_product` where product_id='$did'";
	delete($d);
	alert("deleted successfully");
}

if (isset($_GET['upd'])) {
	extract($_GET);

	$u="select * from `tbl_product` where product_id='$upd'";
	$res=select($u);

}
if (isset($_POST['update'])) {
		extract($_POST);

  echo	$r="update `tbl_product` set product='$productname',qty='$quantity',details='$details',rate='$price' where product_id='$upd'";
  	update($r);
  	alert("updated successfully");
  	return redirect('selleraddproduct.php');
}
 ?>

   <!-- Header Start -->
        <div class="container-fluid header bg-white p-0">
            <div class="row g-0 align-items-center flex-column-reverse flex-md-row">
                <div class="col-md-6 p-5 mt-lg-5">
                    <h1 class="display-5 animated fadeIn mb-4"><span class="text-primary">Add Product</span></h1>
                    


	<?php if (isset($_GET['upd'])) { ?>
<form method="post">
		<table class="table" style="width: 500px;color: black">
			<tr>
				<th>Product Name</th>
				<td><input type="text" pattern="[a-zA-Z ]+$" value="<?php echo $res[0]['product'] ?>" class="form-control" required="" name="productname"></td>
			</tr>
			<tr>
				<th>Quantity</th>
				<td><input type="number" class="form-control" value="<?php echo $res[0]['qty'] ?>"  min="1" required="" name="quantity"></td>
			</tr>
			<tr>
				<th>Details</th>
				<td><input type="text" class="form-control" value="<?php echo $res[0]['details'] ?>"  required="" name="details"></td>
			</tr>
				<tr>
				<th>price</th>
				<td><input type="number" class="form-control" value="<?php echo $res[0]['rate'] ?>"  required="" min="1" name="price"></td>
			</tr>
			<tr>
				<td align="center" colspan="2"><input type="submit" class="btn btn-success" name="update"></td>
			</tr>
		</table>
	</form>
<?php }else{ ?>
	<form method="post">
		<table class="table" style="width: 500px;color: black">
			<tr>
				<th>Product Name</th>
				<td><input type="text" pattern="[a-zA-Z ]+$" class="form-control" required="" name="productname"></td>
			</tr>
			<tr>
				<th>Quantity</th>
				<td><input type="number" class="form-control" min="1" required="" name="quantity"></td>
			</tr>
			<tr>
				<th>Details</th>
				<td><input type="text" class="form-control" required="" name="details"></td>
			</tr>
				<tr>
				<th>price</th>
				<td><input type="number" class="form-control" required="" min="1" name="price"></td>
			</tr>
			<tr>
				<td align="center" colspan="2"><input type="submit" class="btn btn-success" name="submit"></td>
			</tr>
		</table>
	</form>
<?php } ?>

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

<center>
	<table class="table" style="width: 500px;color: black">
	<tr>
		<th>slno</th>
		<th>Product Name</th>
		<th>Quantity</th>
		<th>Details</th>
		<th>Rate</th>
	</tr>

	<?php 

		$p="select * from `tbl_product` where `seller_id`='$sid'";
		$res=select($p);
		$slno=1;


		foreach ($res as $key) {
	 ?>

	 <tr>
	 	<td><?php echo $slno++ ?></td>
	 	<td><?php echo $key['product'] ?></td>
	 	<td><?php echo $key['qty'] ?></td>
	 	<td><?php echo $key['details'] ?></td>
	 	<td><?php echo $key['rate'] ?></td>
	 	<td><a class="btn btn-danger" href="?did=<?php echo $key['product_id'] ?>">Delete</a></td>
	 	<td><a class="btn btn-success" href="?upd=<?php echo $key['product_id'] ?>">Update</a></td>
	 	<td><a class="btn btn-success" href="sellerrequestforauction.php?pid=<?php echo $key['product_id'] ?>">Auction req</a></td>
	 </tr>

	<?php } ?>
</table>
</center>


<?php include 'footer.php' ?>