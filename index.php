<?php $active=1; ?>
	<?php include "header.php"; ?>
		<div class="container-fluid">
	        <div class="container">
				<div class="row home-srvs-section">
	                <div class="text-center">
	                	<?php
	                	$qry = "select * from app_data order by id asc";
	                	$result = mysqli_query($conn, $qry);

	                	if(mysqli_num_rows($result)>0){
	                		$count = 1;
	                		while ($row = mysqli_fetch_assoc($result)){
	                			
	                			echo '<div class="col-md-3 col-xs-12 col-sm-6">
										<div class="feature_content">
											<div class="pic">
												<img src="'.$row['image'].'" border="0" alt="'.$row['title'].'" width="62" height="53" title="'.$row['title'].'" />
											</div>
											<p>
												<h4 style="height:50px;">'.$row['title'].'</h4><br>
												'.$row['sub_title'].'
											</p>
											<a href="details.php?id='.$row['id'].'"><button class="blue-btn">Details</button></a>
										</div>
				                    </div>
				                
				                    ';
	                		}
	                	}
	               		?>
	                </div>
	            </div>
			</div>
		</div>
