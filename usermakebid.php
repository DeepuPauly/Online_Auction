<?php include 'userheader.php';

extract($_GET);

  $uid=$_SESSION['user_id'];

 ?>
<?php 
if (isset($_POST['bids'])) {
  
  extract($_POST);
  if ($amm> $bamot) {
    alert(" Please raise your bid amount");
  return redirect("userviewauction.php");

  }
  else{
  $q="insert into tbl_bid values (NULL,'$aid','$uid','$bamot',curdate(),'pending')";
  insert($q);
  alert(" successfully");
  return redirect("userviewauction.php");

}
}

 ?>
 

 <script type="text/javascript">
 	
 	var check = function() {
 		
  if (parseInt(document.getElementById('elm').value) >= parseInt(document.getElementById('elms').value)) {
    document.getElementById('message').style.color = 'red';
    document.getElementById('bids').style.visibility = "hidden";
    document.getElementById('message').innerHTML = 'Please enter value greater than above amount';
  }
  else{
  	document.getElementById('message').style.color = 'green';
  	document.getElementById('bids').style.visibility = "visible";
    document.getElementById('message').innerHTML = 'ok';
  }
}


 </script>

<<!-- Header Start -->
        <div class="container-fluid header bg-white p-0">
            <div class="row g-0 align-items-center flex-column-reverse flex-md-row">
                <div class="col-md-6 p-5 mt-lg-5">
                    <h1 class="display-5 animated fadeIn mb-4"><span class="text-primary">Make Bid</span></h1>
	<form method="post">
		<table class="table" style="width: 500px;color: black">
<tr>
      <th>starting Amount</th>
                        <td style="color: black"><input type="text" class="form-control" value="<?php echo $amm; ?>" id="" readonly name="samt"></td>
    </tr>

        <?php 

        $q="select * from tbl_bid where auction_id='$aid' order by bid_id desc";

         $rs=select($q);
       if(sizeof($rs)>0)
       {
        ?>
		
		<tr>
			<th>Base/ Last Amount</th>
                        <td style="color: black"><input type="text" class="form-control" value="<?php echo $rs[0]['Amount'] ?>" id="elm" name="bamo"></td>
		</tr>
                <?php
              }
               ?>
 

               <!-- 
                <h3><a class="btn btn-danger" style="font-size: 1em">Note:Starting Amount=<?php echo $amm; ?></a></h3>
		<tr> -->
       
			<th>Bid Amount</th>
                <br>
                <td style="color: black"><input type="text"  class="form-control" name="bamot" id="elms" onchange ='check();'><span id='message'></span></td>
		</tr>
		<tr>
			<th align="center" colspan="2"><input type="submit" name="bids" id="bids" class="btn btn-success" value="submit"></th>
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