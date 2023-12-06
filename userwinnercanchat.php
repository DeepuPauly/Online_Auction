<?php include 'userheader.php';

extract($_GET);
$uid=$_SESSION['login_id'];


if (isset($_POST['submit'])) 
{
	extract($_POST);
	$k="insert into  `tbl_chat` values(null,'$uid','$sid','$message',curdate())";
	insert($k);
	// alert('success');
	// return redirect("police_chat_box.php?immi_id=$immi_id");
}

?>
   <!-- Header Start -->
        <div class="container-fluid header bg-white p-0">
            <div class="row g-0 align-items-center flex-column-reverse flex-md-row">
                <div class="col-md-6 p-5 mt-lg-5">
                    <h1 class="display-5 animated fadeIn mb-4"><span class="text-primary">Chat Box</span></h1>
	<form method="post">
		
	<div style="overflow-y: scroll; width: 500px; height: 500px;" >
	<table class="table" style="width: 100px;">

<?php  
$q="SELECT * FROM `tbl_chat`  where (sender_id='$uid' and receiver_id='$sid')  OR (sender_id='$sid' AND receiver_id='$uid')";
$data=select($q);
foreach ($data as $key ) 
{
	if ($key['sender_id']== $uid) 
	{ ?>
	
			<tr>
				<div style="color: green;" align="right" ><?php echo $key['chat'] ?></div>
			</tr>

	<?php }
	else
	{ ?>

			<tr>
				<div style="color: grey;" align="left" ><?php echo $key['chat'] ?></div>

			</tr>

	<?php }	
}

?>   
	</table>
	</div>
	<table class="table" style="width: 500px;color: black">
	<tr>
		<th><input type="text" class="form-control" name="message" required></th>
		<td><input class="btn btn-outline-info" type="submit" name="submit" value="SEND"></td>
		</tr>
	</table>
	</form><br><br><br><br>
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