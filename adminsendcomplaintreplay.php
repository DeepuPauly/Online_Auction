<?php include 'adminheader.php';

extract($_GET);

if (isset($_POST['submit'])) {
	extract($_POST);


	$h="update `tbl_complaint` set reply='$reply' where complaint_id='$rly'";  
	update($h);
	alert("replyed successfully");
	return redirect("adminviewcomplaint.php");
}

 ?>
  <!-- Header Start -->
        <div class="container-fluid header bg-white p-0">
            <div class="row g-0 align-items-center flex-column-reverse flex-md-row">
                <div class="col-md-6 p-5 mt-lg-5">
                    <h1 class="display-5 animated fadeIn mb-4"><span class="text-primary">Reply</span></h1>

	<form method="post">
	<table class="table" style="width: 500px;color: black">
		<tr>
			<th>Reply</th>
			<td><input type="text" name="reply" class="form-control" required=""></td>
		</tr>
		<tr>
			<td align="center" colspan="2"><input type="submit" name="submit" class="btn btn-success"></td>
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