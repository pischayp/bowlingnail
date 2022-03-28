<!-- รีวิวช่างทำเล็บ 1 -->
<div class="modal fade" id="review1<?php echo $row['bd_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header" id="del-cart">
                    <h4 class="modal-title" id="myModalLabel"><i class="bi bi-bag-x"></i> &nbsp;รีวิวช่างทำเล็บ</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

            </div>
            <div class="modal-body">
                <?php
                    $review = mysqli_query($conn, "select * from book_nail_detail 
                     join booking on booking.book_id = book_nail_detail.book_id
                     join customer on customer.cus_id = booking.cus_id
                    where bd_id='" . $row['bd_id'] . "'");
                    $row = mysqli_fetch_array($review);
                ?>
                
	      		<h4 class="text-center mt-2 mb-4">
	        		<i class="fas fa-star star-light submit_star mr-1" id="submit_star_1" data-rating="1"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_2" data-rating="2"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_3" data-rating="3"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_4" data-rating="4"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_5" data-rating="5"></i>
	        	</h4>
	        	<div class="form-group">
	        		<input type="text" name="user_name" id="user_name" value="<?php echo $row['username']; ?>" class="form-control" />
	        	</div>
	        	<div class="form-group">
	        		<textarea name="user_review" id="user_review" class="form-control" placeholder="ความคิดเห็น.."></textarea>
	        	</div>
	        	<div class="form-group text-center mt-4">
	        		<button type="button" class="btn btn-primary" id="save_review">ยืนยันการรีวิว</button>
	        	</div>
	      	</div>
            
        </div>
        </div>
    </div>
</div>

<!-- รีวิวช่างทำเล็บ 2 -->
<div class="modal fade" id="review2<?php echo $row['bd_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header" id="del-cart">
                    <h4 class="modal-title" id="myModalLabel"><i class="bi bi-bag-x"></i> &nbsp;รีวิวช่างทำเล็บ</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

            </div>
            <div class="modal-body">
                <?php
                    $review2 = mysqli_query($conn, "select * from book_nail_detail 
                     join booking on booking.book_id = book_nail_detail.book_id
                     join customer on customer.cus_id = booking.cus_id
                    where bd_id='" . $row['bd_id'] . "'");
                    $row = mysqli_fetch_array($review2);
                ?>
                
	      		<h4 class="text-center mt-2 mb-4">
	        		<i class="fas fa-star star-light submit_star mr-1" id="submit_star_1" data-rating="1"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_2" data-rating="2"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_3" data-rating="3"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_4" data-rating="4"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_5" data-rating="5"></i>
	        	</h4>
	        	<div class="form-group">
	        		<input type="text" name="user_name" id="user_name" class="form-control" placeholder="Enter Your Name" />
	        	</div>
	        	<div class="form-group">
	        		<textarea name="user_review" id="user_review" class="form-control" placeholder="Type Review Here"></textarea>
	        	</div>
	        	<div class="form-group text-center mt-4">
	        		<button type="button" class="btn btn-primary" id="save_review">ยืนยันการรีวิว</button>
	        	</div>
	      	</div>
            
        </div>
        </div>
    </div>
</div>