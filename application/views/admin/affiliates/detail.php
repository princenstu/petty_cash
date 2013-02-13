
<div>
    <ul class="breadcrumb">
        <li><a href="/admin/dashboard">Dashboard</a> <span class="divider">/</span></li>
        <li><a href="/admin/products">Affiliates</a></li>
    </ul>
</div>

<div class="row-fluid sortable">

    <div class="box span12">

        <div class="box-header well" data-original-title>
            <h2>Affiliates</h2>
        </div>

        <div class="box-content">

            <table class="table table-bordered table-striped table-condensed">

                <thead>
                <tr>
                    <th>Date</th>
                    <th>Order Amount</th>
                    <th>Discount</th>
                    <th></th>

                </tr>
                </thead>

                <tbody>
                <?php if(!empty($detail)) { ?>
                    <?php foreach($detail AS $data): ?>
                    <tr>
                        <td><?php echo date(("Y-m-d"),strtotime($data['order_date'])); ?></td>
                        <td class="center"><?php echo $data['total_amount'];?></td>
                        <td class="center"><?php echo $data['discount']; ?></td>
                    </tr>
                    <?php endforeach; ?>
                    <?php }else{ ?>
                <tr> <td colspan="6"></td>No affiliates earning yet. </tr>
                    <?php } ?>
                </tbody>

            </table>

            <div  style="padding-left: 400px;">

            </div>



        </div>

    </div>

</div>
