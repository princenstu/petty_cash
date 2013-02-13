<?php //var_dump($categories);die;?>

<div>
    <ul class="breadcrumb">
        <li><a href="/admin/dashboard">Dashboard</a> <span class="divider">/</span></li>
        <li><a href="/admin/products">Categories</a></li>
    </ul>
</div>

<div class="row-fluid sortable">

    <div class="box span12">
        <center><b style="color:green;"><?php $this->load->view('message/message');?></b></center>
        <div class="box-header well" data-original-title>
            <h2>Categories</h2>
            <a class="btn btn-primary" style="float:right;" href="/admin/categories/add">Add</a>
        </div>

        <div class="box-content">

            <table class="table table-bordered table-striped table-condensed">

               <thead>
                    <tr>
                        <th>Title</th>
                        <th>Image</th>
                        <th></th>
                    </tr>

               </thead>

                <tbody>

                    <?php foreach($categories as $category):?>

                    <tr>
                            <td><?php echo $category->name; ?></td>
                            <td><?php if (!empty($category->image)):  ?>

                                <span style="margin-left:80px;"><img src="/uploads/<?php echo $category->image; ?>" /></span>
                                <?php endif; ?></td>
                            <td class="center">
                                <a class="btn btn-info" href="/admin/categories/edit/<?php echo $category->category_id ?>">
                                    <i class="icon-edit icon-white"></i>
                                    Edit
                                </a>
                                <a class="btn btn-danger" href="/admin/categories/remove/<?php echo $category->category_id ?>" onclick="return confirm('Are You Sure You Want To Delete The Category?')">
                                    <i class="icon-trash icon-white"></i>
                                    Delete
                                </a>
                            </td>
                    </tr>

                        <?php endforeach; ?>

                </tbody>

            </table>

            <div  style="padding-left: 400px;">
<!--                --><?php //echo $links; ?>
            </div>



        </div>

    </div>

</div>

