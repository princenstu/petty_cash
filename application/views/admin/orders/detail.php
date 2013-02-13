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

<div class="row-fluid sortable">
    <div class="box span12">

        <div class="box-header well" data-original-title>
            <h2>Orders Details</h2>

        </div>
        <div class="box-content">
            <table class="table table-bordered table-striped table-condensed">

                <tr>
                    <td>Order Code</td>
                    <td><?php echo $order_detail->order_code ?></td>
                </tr>
                <tr>
                    <td>Name</td>
                    <td><?php echo $order_detail->full_name ?></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><?php echo $order_detail->email ?></td>
                </tr>
                <tr>
                    <td>City</td>
                    <td><?php echo $order_detail->city ?></td>
                </tr>
                <tr>
                    <td>Country</td>
                    <td><?php echo $order_detail->country ?></td>
                </tr>
                <tr>
                    <td>Location</td>
                    <td><?php echo $order_detail->location ?></td>
                </tr>
                <tr>
                    <td>Total Amount</td>
                    <td><?php echo $order_detail->total_amount ?></td>
                </tr>
                <tr>
                    <td>Order Date</td>
                    <td><?php echo date('d-m-Y', strtotime($order_detail->order_date)); ?></td>
                </tr>


            </table>
        </div>
        <span style="padding-left: 5px;"><strong>Rental Detail</strong></span>
        <div class="box-content">
            <table class="table table-bordered table-striped table-condensed">
              <thead>
                  <tr>
                      <th>Name</th>
                      <th>Birth Date</th>
                      <th>Skill</th>
                      <th>Height</th>
                      <th>Weight</th>
                      <th>Shoe Size</th>
                      <th>Notes</th>
                      <th>Date Start</th>
                      <th>Date End</th>
                      <th>Theft Insurance</th>
                      <th>Cancellation Insurance</th>
                      <th>Rental Type</th>
                  </tr>
              </thead>

              <tbody>
              <?php if(!empty($rental_detail)): foreach($rental_detail as $value):?>
                <tr>
                    <td class="center"><?php if(!empty($value['first_name'])) : echo $value['first_name'];  endif ?>&nbsp;<?php if(!empty($value['last_name'])) :echo $value['last_name']; endif  ?></td>
                    <td class="center"><?php if(!empty($value['birth_date'])) :echo $value['birth_date']; endif ?></td>
                    <td class="center"><?php if(!empty($value['skill'])) : echo $value['skill']; endif  ?></td>
                    <td class="center"><?php if(!empty($value['height'])) : echo $value['height']; endif ?></td>
                    <td class="center"><?php if(!empty($value['weight'])) : echo $value['weight']; endif ?></td>
                    <td class="center"><?php if(!empty($value['shoe_size'])) : echo $value['shoe_size']; endif ?></td>
                    <td class="center"><?php if(!empty($value['notes'])) : echo $value['notes']; endif ?></td>
                    <td class="center"><?php if(!empty($value['date_start'])) : echo date('d-m-Y', strtotime($value['date_start'])); endif ?></td>
                    <td class="center"><?php if(!empty($value['date_end'])) : echo date('d-m-Y', strtotime($value['date_end'])); endif ?></td>
                    <td class="center"><?php echo ($value['theft_insurance'] ==1) ?  'Yes' :  'No';?></td>
                    <td class="center"><?php echo ($value['cancellation_insurance'] ==1) ?  'Yes' :  'No';?></td>
                    <td class="center"><?php echo $value['type'] ?></td>
                </tr>
                <?php endforeach; endif?>
              </tbody>

          </table>

        <span style="padding-left: 5px;"><strong>Rental Products</strong></span>
        <div class="box-content">
            <table class="table table-bordered table-striped table-condensed">
              <thead>
                  <tr>
                      <th>Name</th>
                      <th>Title</th>
                      <th>Price</th>
                      <th>Image</th>
                  </tr>
              </thead>

              <tbody>
               <?php if(!empty($rental_detail)): foreach($rental_detail as $key => $detail):?>
              <?php if(!empty($rental_detail[$key]['products'])): foreach($rental_detail[$key]['products'] as $value):?>
                <tr>
                    <td class="center"><?php if(!empty($detail['first_name'])) : echo $detail['first_name'];  endif ?>&nbsp;<?php if(!empty($detail['last_name'])) :echo $detail['last_name']; endif  ?></td>
                    <td class="center"><?php if(!empty($value['title'])) : echo $value['title'];  endif ?></td>
                    <td class="center"><?php if(!empty($value['price'])) : echo $value['price']; endif ?></td>
                    <td class="center"><img src="/uploads/<?php echo $value['image']; ?>" /></td>

                </tr>
                <?php endforeach; endif?>
                <?php endforeach; endif?>
              </tbody>

          </table>

    </div>

</div>

