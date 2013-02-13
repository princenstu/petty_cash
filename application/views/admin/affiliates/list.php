<div>
    <ul class="breadcrumb">
        <li><a href="/admin/dashboard">Dashboard</a> <span class="divider">/</span></li>
        <li><a href="/admin/products">Affiliates</a></li>
    </ul>
</div>

<div class="row-fluid sortable">

    <div class="box span12">
        <center><b style="color:green;"><?php $this->load->view('message/message');?></b></center>
        <div class="box-header well" data-original-title>
            <h2>Affiliates</h2>
            <a class="btn btn-primary" style="float:right;" href="/admin/affiliates/add">Add</a>
        </div>

        <div class="box-content">

            <table class="table table-bordered table-striped table-condensed">

                <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Discount</th>
                    <th>Link</th>
                    <th></th>

                </tr>
                </thead>

                <tbody>
                <?php if(!empty($affiliates)) { ?>
                    <?php foreach($affiliates as $affiliate):?>

                    <tr>
                        <td><?php echo $affiliate['name']; ?></td>
                        <td class="center"><?php echo $affiliate['email'] ?></td>
                        <td class="center"><?php echo $affiliate['percentage'] ?></td>
                        <td class="center"><?php  echo base_url() ."affiliate/" .$affiliate['link'] ?></td>
                        <td class="center">
                            <a class="btn btn-info" href="/admin/affiliates/discount/<?php echo $affiliate['id'] ?>">
                                <i class="icon-edit icon-white"></i>
                                Discounts
                            </a>
                            <a class="btn btn-info" href="/admin/affiliates/edit/<?php echo $affiliate['id'] ?>">
                                <i class="icon-edit icon-white"></i>
                                Edit
                            </a>
                            <a class="btn btn-danger" href="/admin/affiliates/remove/<?php echo $affiliate['id'] ?>" onclick="return confirm('Are You Sure You Want To Delete The Affiliates?')">
                                <i class="icon-trash icon-white"></i>
                                Delete
                            </a>
                        </td>
                    </tr>

                        <?php endforeach; ?>
                    <?php }else{ ?>
                <tr> <td colspan="6"></td> No Affiliates Found </tr>
                    <?php } ?>
                </tbody>

            </table>

            <div  style="padding-left: 400px;">

            </div>



        </div>

    </div>

</div>
