

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
        <div class="box-header well" data-original-title>
            <h2>Orders</h2>

        </div>
        <div class="box-content">
            <table class="table table-bordered table-striped table-condensed">
                <thead>
                <tr>
                    <th>Order Code</th>
                    <th>Name</th>
                    <th>City</th>
                    <th>Country</th>
                    <th>Location</th>
                    <th>Order Date</th>
                    <th></th>

                </tr>
                </thead>

                <tbody>

                <?php foreach($searchs as $search):?>
                <tr>
                    <td class="center"><?php echo $search['order_code'] ?></td>
                    <td class="center"><?php echo $search['name'] ?></td>
                    <td class="center"><?php echo $search['city'] ?></td>
                    <td class="center"><?php echo $search['country'] ?></td>
                    <td class="center"><?php echo $search['location'] ?></td>
                    <td class="center"><?php echo date( 'd-m-Y', strtotime( $search['order_date'] ) ); ?></td>
                    <td class="center">
                        <a class="btn btn-success" href="/admin/orders/detail/<?php echo $search['order_id'] ?>">View</a>
                    </td>
                </tr>
                    <?php endforeach; ?>



                </tbody>

            </table>
        </div>
    </div>

</div>

