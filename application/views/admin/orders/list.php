<div>
    <ul class="breadcrumb">
        <li>
            <a href="/admin/dashboard">Dashboard</a> <span class="divider">/</span>
        </li>
        <li>
            <a href="/admin/orders">Orders</a>
        </li>
    </ul>
</div>
<div class="span5" style="float:right;">
    <form action="/admin/orders/search" method="post" name="search">
        <input type="submit" class="btn" style="float:right;" value="Search">
        <input type="text" class="search-query" name="orders_search" style="float:right;" >
    </form>
</div>
<div class="row-fluid sortable">
    <div class="box span12">
        <center><b style="color:green;"><?php $this->load->view('message/message');?></b></center>
        <div class="box-header well" data-original-title>
            <h2>Orders</h2>

        </div>
        <div class="box-content">
            <table class="table table-bordered table-striped table-condensed">
              <thead>
                  <tr>
                      <th>Order Code</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>City</th>
                      <th>Country</th>
                      <th>Location</th>
                      <th>Total Amount</th>
                      <th>Status</th>
                      <th>Date</th>
                      <th></th>
                  </tr>
              </thead>

              <tbody>
              <?php if(!empty($orders)): ?>
              <?php foreach($orders as $order):?>
                <tr>
                    <td class="center"><?php echo $order['order_code'] ?></td>
                    <td class="center"><?php echo $order['full_name'] ?></td>
                    <td class="center"><?php echo $order['email'] ?></td>
                    <td class="center"><?php echo $order['city'] ?></td>
                    <td class="center"><?php echo $order['country'] ?></td>
                    <td class="center"><?php echo $order['location'] ?></td>
                    <td class="center"><?php echo $order['total_amount'] ?></td>
                    <td class="center"><?php echo ucfirst($order['status']) ?></td>
                    <td class="center"><?php echo date( 'd-m-Y', strtotime( $order['order_date'] ) ); ?></td>
                    <td class="center">
                        <a class="btn btn-success" href="/admin/orders/detail/<?php echo $order['order_id'] ?>">View</a>
                    </td>
                </tr>
                <?php endforeach; ?>
                <?php endif; ?>
              </tbody>

          </table>
                            <div  style="padding-left: 400px;">
                                 <?php echo $links; ?>

                            </div>

        </div>
    </div>

</div>

