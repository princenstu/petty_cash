<?php //var_dump($categories);die;?>
<div>
    <ul class="breadcrumb">
        <li><a href="/admin/dashboard">Dashboard</a> <span class="divider">/</span></li>
        <li><a href="/admin/products"> Product Categories </a></li>
    </ul>
</div>

<div class="row-fluid sortable">

    <div class="box span12">

        <div class="box-header well" data-original-title>
            <h2><i class="icon-edit"></i>Edit Categories</h2>
        </div>

        <div class="box-content">

            <form enctype="multipart/form-data" id="addproduct" class="form-horizontal" action="" method="post">
                    <input type="hidden" name="category_id" value="<?php echo $category['category_id'] ?>">
                <fieldset style="border: 1px solid #CCCCCC; border-radius: 3px 3px 3px 3px; margin-bottom: 5px; margin-right: 15px">
                    <legend style="border: 1px solid #CCCCCC; padding-left: 20px; border-radius: 3px 3px 3px 3px;">German</legend>
                <div class="control-group">
                    <label class="control-label add" for="title">Name</label>
                    <div class="controls">
                        <input type="text" id="title" name="name_de" placeholder="Category German" class="input-xxlarge" value="<?php echo (!empty($category_de->name)) ? $category_de->name : '' ;?>">
                        <span class="help-inline validation"> <?php echo form_error('name'); ?></span>
                    </div>
                </div>
</fieldset>
                <fieldset style="border: 1px solid #CCCCCC; border-radius: 3px 3px 3px 3px; margin-bottom: 5px; margin-right: 15px">
                    <legend style="border: 1px solid #CCCCCC; padding-left: 20px; border-radius: 3px 3px 3px 3px;">English</legend>
                <div class="control-group">
                    <label class="control-label add" for="title">Name</label>
                    <div class="controls">
                        <input type="text" id="title" name="name" placeholder="Category English" class="input-xxlarge" value="<?php echo $category['name'] ?>">
                        <span class="help-inline validation"> <?php echo form_error('name'); ?></span>
                    </div>
                </div>
</fieldset>
                <div class="control-group">
                    <label class="control-label add" for="image">Image</label>
                    <div class="controls">
                        <input type="file" id="image" name="image" required="1"> <br /><br />
                        <?php if (!empty($category['image'])):  ?>
                        <div class="product-image"><img src="/uploads/<?php echo $category['image']; ?>" /></div>
                        <?php endif; ?>
                    </div>

                </div>
                <div class="control-group">
                    <div class="controls">
                        <button type="submit" class="btn btn-primary">Save Category</button>
                    </div>
                </div>

            </form>

        </div>

    </div>
    <!--/span-->

</div><!--/row-->
