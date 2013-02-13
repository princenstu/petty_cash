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
					<div class="box-header well" data-original-title>
						<h2><i class="icon-user"></i> Rental Information</h2>
<!--                        <a class="btn btn-primary" style="float:right;" href="/admin/rentals/add">Add</a>-->
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
                                <td class="center">
                                    <a class="btn btn-success" href="/admin/rentals/detail/<?php echo $rental->rental_id ?>">
                                        <i class="icon-zoom-in icon-white"></i>
                                        Detail
                                    </a>

                                </td>
							</tr>
                            <?php endforeach; ?>


						  </tbody>
					  </table>

                        <div class="pagination pagination-centered">
						  <ul>
							<li><a href="#">Prev</a></li>
							<li class="active"><a href="#">1</a></li>
							<li><a href="#">2</a></li>
							<li><a href="#">Next</a></li>
						  </ul>
						</div>
					</div>
				</div>

			</div>

