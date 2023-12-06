<?php include 'userheader.php';

extract($_GET);
$uid=$_SESSION['user_id'];

if (isset($_POST['submit'])) 
{
	extract($_POST);
	$g="insert into `tbl_rating` values(null,'$uid','$rating',curdate())"; 
	insert($g);
	alert('rating successfully added');
	return redirect('userviewauction.php');

}

?>

<!-- Header Start -->
        <div class="container-fluid header bg-white p-0">
            <div class="row g-0 align-items-center flex-column-reverse flex-md-row">
                <div class="col-md-6 p-5 mt-lg-5">
                    <h1 class="display-5 animated fadeIn mb-4"><span class="text-primary">Rating</span></h1>

 <form method="post">
 	
<table class="table" style="width: 500px;color: black">
	<tr>
		<th>Rating</th>
		<td>
			<div class="star-rating">
        <input type="radio" name="rating" value="1" id="star1">
        <label for="star1"></label>
        <input type="radio" name="rating" value="2" id="star2">
        <label for="star2"></label>
        <input type="radio" name="rating" value="3" id="star3">
        <label for="star3"></label>
        <input type="radio" name="rating" value="4" id="star4">
        <label for="star4"></label>
        <input type="radio" name="rating" value="5" id="star5">
        <label for="star5"></label>
			</div>

		</td>
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


<style type="text/css">
	
	.star-rating {
  display: inline-block;
}

.star-rating input[type="radio"] {
  display: none;
}

.star-rating label {
  font-size: 24px;
  color: #ccc;
  cursor: pointer;
}

.star-rating label:before {
  content: "\2605"; /* Unicode character for star */
}

.star-rating input[type="radio"]:checked ~ label {
  color: #ff9800; /* Change color for selected stars */
}

</style>

<?php include 'footer.php' ?>