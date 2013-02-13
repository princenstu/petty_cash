<?php //var_dump($payments);die;?>
			<div>
				<ul class="breadcrumb">
					<li>
						<a href="/admin/dashboard">Dashboard</a> <span class="divider">/</span>
					</li>
					<li>
						<a href="/admin/rentals">Rentals</a>
					</li>
				</ul>
			</div>

			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header well">
						<h2>Rental Information</h2>

					</div>
					<div class="box-content">
						<table class="table table-bordered table-striped table-condensed">
						  <thead>
							  <tr>
								  <th>First Name</th>
								  <th>Last Name</th>
								  <th>Skill</th>
								  <th>Height</th>
								  <th>Weight</th>
								  <th>Shoe Size</th>
								  <th>Start Date</th>
								  <th>End Date</th>
								  <th></th>
							  </tr>
						  </thead>

						  <tbody>
                          <?php foreach($rentals as $rental):?>
							<tr>
								<td><?php echo $rental->first_name ?></td>
								<td class="center"><?php echo $rental->last_name ?></td>
								<td class="center"><?php echo $rental->skill ?></td>
								<td class="center"><?php echo $rental->height ?></td>
								<td class="center"><?php echo $rental->weight ?></td>
								<td class="center"><?php echo $rental->shoe_size ?></td>
								<td class="center"><?php echo $rental->start_date ?></td>
								<td class="center"><?php echo $rental->end_date ?></td>
							</tr>
                            <?php endforeach; ?>


						  </tbody>
					  </table>
					</div>

                    <div class="box-content">
                       <h4>Rental Payment Information</h4>
                        <table class="table table-bordered table-striped table-condensed">
						  <thead>
							  <tr>
								  <th>Name</th>
								  <th>Address</th>
								  <th>Amount</th>
								  <th>Payment Date</th>
								  <th></th>
							  </tr>
						  </thead>

						  <tbody>
                          <?php foreach($payments as $payment):?>
							<tr>
								<td><?php echo $payment->first_name." ".$payment->mid_name." ".$payment->last_name ?></td>
								<td class="center"><?php echo $payment->address1." ".$payment->address2 ?></td>
								<td class="center"><?php echo $payment->amount ?></td>
								<td class="center"><?php echo $payment->payment_date ?></td>

							</tr>
                            <?php endforeach; ?>


						  </tbody>
					  </table>
					</div>

                    <div class="box-content">
                        <h4>Rental Product  Information</h4>
						<table class="table table-bordered table-striped table-condensed">
						  <thead>
							  <tr>
								  <th>Name</th>
								  <th>Product</th>
								  <th>Price(In CHF)</th>
							  </tr>
						  </thead>

						  <tbody>
                          <?php foreach($rentals as $rental):?>
							<tr>
								<td><?php echo $rental->first_name." ".$rental->last_name ?></td>
								<td class="center"><?php echo $rental->title?></td>
								<td class="center"><?php echo $rental->price ?></td>
							</tr>
                            <?php endforeach; ?>


						  </tbody>
					  </table>
					</div>
				</div>

			</div>

