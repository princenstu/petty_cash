<div>
<ul class="breadcrumb">
    <li>
        <a href="/admin/dashboard">Dashboard</a> <span class="divider">/</span>
    </li>
    <li>
        <a href="/admin/packages">Packages</a>
    </li>
</ul>
</div>

<div class="row-fluid sortable">
<div class="box span12">
    <center><b style="color:green;"><?php $this->load->view('message/message');?></b></center>
    <div class="box-header well" data-original-title>
        <h2><i class="icon-user"></i> Packages</h2>
        <a class="btn btn-primary" href="/admin/packages/add" style="float:right;">Add</a>
        <div class="box-icon">

        </div>
    </div>
    <div class="box-content">
        <table class="table table-bordered table-striped table-condensed">
            <thead>
            <tr>
                <th>Title</th>
                <th>Price</th>
                <th>Image</th>
                <th>Status</th>
                <th></th>
            </tr>
            </thead>

            <tbody>
            <?php foreach($packages as $package):?>
            <tr>
                <td class="center"><?php echo $package->title;?></td>
                <td class="center"><?php echo $package->price;echo '$'; ?></td>
                <td class="center"><?php if (!empty($package->image)):  ?>

                    <span style="margin-left:80px;"><img src="/uploads/<?php echo ThumbHelper::getThumb($package->image); ?>" width="100px" height="100px" /></span>
                    <?php endif; ?></td>
                <td class="center"><?php echo $package->status;?></td>
                <td class="center">
                    <a class="btn btn-info" href="/admin/packages/edit/<?php echo $package->package_id?>">
                        <i class="icon-edit icon-white"></i>
                        Edit
                    </a>
                    <a class="btn btn-danger" href="/admin/packages/remove/<?php echo $package->package_id ?>" onclick="return confirm('Are You Sure You Want To Delete The Package?')">
                        <i class="icon-trash icon-white"></i>
                        Delete
                    </a>
                </td>
            </tr>
                <?php endforeach; ?>


          </tbody>
      </table>

    </div>
</div>

</div>
