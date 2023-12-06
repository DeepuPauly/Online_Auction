<?php include 'userheader.php';

extract($_GET);
$uid=$_SESSION['user_id'];
 ?>

<center>
	<h1>winner</h1>
	<table class="table" style="width: 500px;color: black">
	<tr>
		<th>slno</th>
		<th>name</th>
		<th>amount</th>
		<th>date</th>		
	</tr>


	<?php 

	echo $g="SELECT * FROM `tbl_bid` inner join `tbl_user` using(user_id) where (`status`='winner' and `auction_id`='$waid' and user_id='$uid') or (`status`='paid' and `auction_id`='$waid' and user_id='$uid')";
	$res=select($g);
	$slno=1;


	foreach ($res as $key) {	

	 ?>
	 <tr>
	 	<td><?php echo $slno++ ?></td>
	 	<td><?php echo $key['firstname'] ?></td>
	 	<td><?php echo $key['amount'] ?></td>
	 	<td><?php echo $key['date'] ?></td>
	 	
	 	 <?php if ($key['status']=='winner') {
	 	  ?>

	 	<td><a class="btn btn-success" href="usermakeauctionpayment.php?aid=<?php echo $key['auction_id'] ?>&amm=<?php echo $key['amount'] ?>&uid=<?php echo $key['user_id'] ?>">Make payment</a></td>
	 <?php 
	}
	elseif ($key['status']=='paid') {
	  ?>
	  <td><a class="btn btn-success" href="userwinnercanchat.php">Chat</a></td>
	<?php } ?>


	 </tr>

	<?php } ?>
</table> 
</center>

<?php include 'footer.php' ?>