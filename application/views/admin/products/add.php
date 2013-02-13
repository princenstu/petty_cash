<style type="text/css">
    .validation{
        color:red;
    }

</style>
<div>
<ul class="breadcrumb">
<li><a href="/admin/dashboard">Dashboard</a> <span class="divider">/</span></li>
<li><a href="/admin/products">Products</a></li>
</ul>
</div>

<div class="row-fluid sortable">

<div class="box span12">

<div class="box-header well" data-original-title>
<h2><i class="icon-edit"></i> Add Product</h2>
</div>

<div class="box-content">

<form enctype="multipart/form-data" id="addproduct" class="form-horizontal" action="" method="post">
 <fieldset style="border: 1px solid #CCCCCC; margin:0 15px 5px 0">
     <legend style="border: 1px solid #CCCCCC; padding-left: 20px;">English</legend>
<div class="control-group">
    <label class="control-label add" for="title">Title</label>

    <div class="controls">
        <input type="text" id="title" name="title" placeholder="Product Title" class="input-xxlarge">
        <span class="help-inline validation"> <?php echo form_error('title'); ?></span>
    </div>
</div>

<div class="control-group">
    <label class="control-label add" for="description">Description</label>

    <div class="controls">
        <textarea rows="10" cols="3" id="description" name="description"
                  placeholder="Write something about your product" class="input-xxlarge"></textarea>
        <span class="help-inline validation"><?php echo form_error('description'); ?></span>
    </div>
</div>

 </fieldset>
 <fieldset style="border: 1px solid #CCCCCC; margin:0 15px 5px 0">
     <legend style="border: 1px solid #CCCCCC; padding-left: 20px;">German</legend>
<div class="control-group">
    <label class="control-label add" for="title">Title</label>

    <div class="controls">
        <input type="text" id="title_de" name="title_de" placeholder="Product Title" class="input-xxlarge">
        <span class="help-inline validation"> <?php echo form_error('title_de'); ?></span>
    </div>
</div>

<div class="control-group">
    <label class="control-label add" for="description">Description</label>

    <div class="controls">
        <textarea rows="10" cols="3" id="description_de" name="description_de"
                  placeholder="Write something about your product" class="input-xxlarge"></textarea>
        <span class="help-inline validation"><?php echo form_error('description_de'); ?></span>
    </div>
</div>
 </fieldset>
    <div class="control-group">
        <label class="control-label add" for="price">Product Price</label>
        <div class="controls">
        <table>
            <thead>
                <tr>
                       <th>Day</th>
                       <th>Price</th>
                </tr>
            </thead>
            <tbody>
            <tr>
             <td>1</td>
             <td>
                 <input type="text" class="input-medium" name="price_1">
                 <span class="help-inline validation"><?php echo form_error('price_1'); ?></span>
             </td>
            </tr>
            <tr>
             <td>2</td>
             <td>
                 <input type="text" class="input-medium" name="price_2">
                 <span class="help-inline validation"><?php echo form_error('price_2'); ?></span>
             </td>
            </tr>
            <tr>
             <td>3</td>
             <td>
                 <input type="text" class="input-medium" name="price_3">
                 <span class="help-inline validation"><?php echo form_error('price_3'); ?></span>
             </td>
            </tr>
            <tr>
             <td>4</td>
             <td>
                 <input type="text" class="input-medium" name="price_4">
                 <span class="help-inline validation"><?php echo form_error('price_4'); ?></span>
             </td>
            </tr>
            <tr>
                <td>5</td>
                <td>
                    <input type="text" class="input-medium" name="price_5">
                    <span class="help-inline validation"><?php echo form_error('price_5'); ?></span>
                </td>
           </tr>
            <tr>
                <td>6</td>
                <td>
                    <input type="text" class="input-medium" name="price_6">
                    <span class="help-inline validation"><?php echo form_error('price_6'); ?></span>
                </td>
            </tr>
            <tr>
                <td>7</td>
                <td>
                    <input type="text" class="input-medium" name="price_7">
                    <span class="help-inline validation"><?php echo form_error('price_7'); ?></span>
                </td>
            </tr>
            </tbody>
        </table>
            </div>

    </div>

    <div class="control-group">
        <label class="control-label add" for="price">Price Increment</label>

        <div class="controls">
            <input type="text" id="price_increment" name="price_increment" placeholder="Price";>
            <span class="help-inline validation"><?php echo form_error('price_increment'); ?></span>
        </div>
    </div>

<div class="control-group">
    <label class="control-label add" for="Class">Class</label>

    <div class="controls">
        <input type="text" id="Class" name="class" placeholder="Class">
        <span class="help-inline validation"><?php echo form_error('class'); ?></span>
    </div>
</div>

<div class="control-group">
    <label class="control-label add" for="status">Category</label>

    <div class="controls">
        <select id="status" name="category_id">
            <?php

            foreach ($categories as $category) {
                ?>
                <option value="<?php echo $category->category_id; ?>"><?php echo $category->name; ?></option>
                ";
                <?php
            }
            ?>
        </select>
    </div>
</div>

<div class="control-group">
    <label class="control-label add" for="status">Status</label>

    <div class="controls">
        <select id="status" name="status">
            <option value="draft">Draft</option>
            <option value="published">Published</option>
            <option value="hidden">Package Only</option>
        </select>
        <span class="help-inline validation"><?php echo form_error('status'); ?></span>
    </div>
</div>

<div class="control-group">
    <label class="control-label add" for="image">Image</label>

    <div class="controls">
        <input type="file" id="image" name="image">
        <span class="help-inline validation"><?php //echo form_error('image'); ?> </span>
    </div>

</div>

<div class="control-group">
    <div class="controls">
        <button type="submit" class="btn btn-primary">Add Product</button>
    </div>
</div>

</form>

</div>

</div>
<!--/span-->

</div><!--/row-->

