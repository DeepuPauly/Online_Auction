<?php include 'userheader.php';

$uid=$_SESSION['user_id'];
extract($_GET);

if (isset($_POST['submit'])) {
	extract($_POST);

	$n="select * from `tbl_booking` where user_id='$uid' and status='pending'";
	$result=select($n);
	if (sizeof($result)>0) {
		

		$tamt=$result[0]['amount'];
		$tblbookingid=$result[0]['booking_id'];

		$s="select * from `tbl_bookingchild` where product_id='$pid' and booking_id='$tblbookingid'";
		$res=select($s);

		if (sizeof($res)>0) {
			$bdid=$res[0]['bookingchild_id'];


			$m="update `tbl_booking` set amount=amount+'$total' where booking_id='$tblbookingid'";
			update($m);

			$f="update `tbl_bookingchild` set `quantity`=quantity+'$quantity' where bookingchild_id='$bdid'";
			update($f);
			alert("buy successfully");
			return redirect("userviewcart.php");

		}else{


			$q="update `tbl_booking` set amount=amount+'$total' where booking_id='$tblbookingid'";
			update($q);

			$j="insert into tbl_bookingchild values(null,'$tblbookingid','$pid','$quantity','$pri')";
			insert($j);
		}

	}else{

	$m="insert into `tbl_booking` values(null,'$uid','$pri',curdate(),'pending')";
	$res=insert($m);


	$v="insert into `tbl_bookingchild` values(null,'$res','$pid','$quantity','$pri')";
	insert($v);

	alert("buy successfully");
	return redirect("userviewcart.php");
  
	}
}

 ?>


 <script type="text/javascript">
	function TextOnTextChange()
	{
		var x =document.getElementById("p_amount").value;
		var y =document.getElementById("p_qnty").value;
		
		document.getElementById("t_amount").value = x * y;
	}
   
</script>

<!-- Header Start -->
        <div class="container-fluid header bg-white p-0">
            <div class="row g-0 align-items-center flex-column-reverse flex-md-row">
                <div class="col-md-6 p-5 mt-lg-5">
                    <h1 class="display-5 animated fadeIn mb-4"><span class="text-primary">Add To Cart</span></h1>

	<form method="post" >

		<table class="table" style="width: 500px;color: black">
		<tr>
			<th>Product name</th>
			<td><input type="text"  required="" class="form-control" value="<?php echo $pnm ?>" name="productname" class="form-control" required=""></td>
		</tr>
		<tr>
			<th>Price</th>
			<td><input type="number" id="p_amount" readonly value="<?php echo $pri ?>" name="price" class="form-control" required=""></td>
		</tr>
		<tr>
			<th>Quantity</th>
			<td><input type="number"  onchange="TextOnTextChange()" id="p_qnty" class="form-control" required="" min="1" name="quantity"></td>
		</tr>
		<tr>
			<th>Total</th>
			<td><input type="text" readonly  id="t_amount" required="" name="total" class="form-control" required=""></td>
		</tr>
		<tr>
			<td align="center" colspan="2"><input type="submit" class="btn btn-success" name="submit"></td>
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