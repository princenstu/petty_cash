<div>
    <ul class="breadcrumb">
        <li><a href="/admin/dashboard">Dashboard</a> <span class="divider">/</span></li>
        <li><a href="/admin/products">Products</a></li>
    </ul>
</div>

<div class="row-fluid sortable">

    <div class="box span12">
        <center><b style="color:green;"><?php $this->load->view('message/message');?></b></center>
        <div class="box-header well" data-original-title>
            <h2>Products</h2>
            <a class="btn btn-primary" style="float:right;" href="/admin/products/add">Add</a>
        </div>

        <div class="box-content">

            <table class="table table-bordered table-striped table-condensed">

            <thead>
                <tr>
                    <th>Title</th>
                    <th>Image</th>
                    <th>Price Day One(in CHF)</th>
                    <th>Class/Size</th>
                    <th>Status</th>
                    <th><?php  echo $this->lang->line('name');?></th>
                </tr>
            </thead>

            <tbody>
		    <?php if(!empty($products)) { ?>
                <?php foreach($products as $product):?>

                <tr>
                    <td><?php echo $product['title']; ?></td>
                    <td style="text-align: center;"><?php if (!empty($product['image'])): ?><img style="height: 50%" src="/uploads/<?php echo $product['image']; ?>" /></span><?php endif; ?></td>
                    <td class="center"><?php echo $product['price_1'] ?></td>
                    <td class="center"><?php echo $product['class'] ?></td>
                    <td class="center"><?php echo $product['status'] ?></td>
                    <td class="center">
                        <a class="btn btn-info" href="/admin/products/edit/<?php echo $product['product_id'] ?>">
                            <i class="icon-edit icon-white"></i>
                            Edit
                        </a>
                        <a class="btn btn-danger" href="/admin/products/remove/<?php echo $product['product_id'] ?>" onclick="return confirm('Are You Sure You Want To Delete The Product?')">
                            <i class="icon-trash icon-white"></i>
                            Delete
                        </a>
                    </td>
                </tr>

                <?php endforeach; ?>
                <?php }else{ ?>
                <tr> <td colspan="6"></td> No Products Found </tr>
		<?php } ?>
              </tbody>

          </table>

                            <div  style="padding-left: 400px;">
                                 <?php echo $links; ?>
                            </div>



        </div>

    </div>

</div>
