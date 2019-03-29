<?php $active=1; ?>
	<?php include "header.php"; ?>
		<div class="container-fluid">
	        <div class="container">
				<div class="row home-srvs-section">
                	<?php
                	$qry = "select * from app_data where id='".$_REQUEST['id']."'";
                	$result = mysqli_query($conn, $qry);
                	$data = mysqli_fetch_array($result);
               		?>
               		<div class="col-md-12 col-xs-12 col-sm-6 custom_des">
               			<div class="row">
							<div class="col-md-2">
								<div class="feature_content-inner">
									<div class="pic">
										<img src="<?php echo $data['image']; ?>" border="0" alt="<?php echo $data['title']; ?>" title="<?php echo $data['title']; ?>" class="img-responsive" />
									</div>
								</div>
							</div>
							<div class="col-md-9">
								<h1><?php echo $data['title']; ?></h1><br>
								<h2><?php echo $data['sub_title']; ?></h2>
								<a href="details.php?id=<?php echo $data['id']; ?>"><button class="blue-btn" style="margin-bottom: 20px; margin-top: 30px;">Install</button></a>
								<p><?php echo base64_decode($data['description']); ?></p>
							</div>
						</div>
                    </div>
	            </div>
			</div>
		</div>