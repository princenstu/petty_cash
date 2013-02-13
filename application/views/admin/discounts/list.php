<div>
    <ul class="breadcrumb">
        <li><a href="/admin/dashboard">Dashboard</a> <span class="divider">/</span></li>
        <li><a href="/admin/discounts">Discounts</a></li>
    </ul>
</div>

<div class="row-fluid sortable">

    <div class="box span12">
        <center><b style="color:green;"><?php $this->load->view('message/message');?></b></center>
        <div class="box-header well" data-original-title>
            <h2>Discounts</h2>
            <a class="btn btn-primary" style="float:right;" href="/admin/discounts/add">Add</a>
        </div>

        <div class="box-content">

            <table class="table table-bordered table-striped table-condensed">

                <thead>
                <tr>
                    <th>Title</th>
                    <th>Amount</th>
                    <th>Expire Date</th>
                    <th>Enable</th>
                    <th>Discount Type</th>
                    <th></th>
                </tr>
                </thead>

                <tbody>
                <?php if(!empty($discounts)) { ?>
                    <?php foreach($discounts as $discount):?>

                    <tr>
                        <td><?php echo $discount['title']; ?></td>
                        <td><?php echo $discount['amount']; ?></td>
                        <td class="center"><?php echo $discount['expire_date'] ?></td>
                        <td class="center"><?php echo ($discount['is_enabled']=='yes')? 'Yes':'No' ?></td>
                        <td class="center"><?php echo ($discount['discount_type']=='percent')?'Percent':'Discount Amount' ?></td>
                        <td class="center">
                            <a class="btn btn-info" href="/admin/discounts/edit/<?php echo $discount['discount_id'] ?>">
                                <i class="icon-edit icon-white"></i>
                                Edit
                            </a>
                            <a class="btn btn-danger" href="/admin/discounts/remove/<?php echo $discount['discount_id'] ?>" onclick="return confirm('Are You Sure You Want To Delete The Discount?')">
                                <i class="icon-trash icon-white"></i>
                                Delete
                            </a>
                        </td>
                    </tr>

                        <?php endforeach; ?>
                    <?php }else{ ?>
                <tr> <td colspan="6"></td> No Discount Found </tr>
                    <?php } ?>
                </tbody>

            </table>

            <div  style="padding-left: 400px;">
                <?php echo $links; ?>
            </div>



        </div>

    </div>

</div>
