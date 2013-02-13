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
            <h2><i class="icon-edit"></i> Edit Product</h2>
        </div>

<div class="box-content">

    <form enctype="multipart/form-data" id="editproduct" class="form-horizontal" action="" method="post">

        <input type="hidden" name="product_id" value="<?php echo $product['product_id'] ?>"/>

<fieldset style="border: 1px solid #CCCCCC; border-radius: 3px 3px 3px 3px; margin-bottom: 5px">
    <legend style="border: 1px solid #CCCCCC; padding-left: 20px; border-radius: 3px 3px 3px 3px;">English</legend>

    <div class="control-group">
        <label class="control-label add" for="title">Title</label>

        <div class="controls">
            <input type="text" id="title" name="title" class="input-xxlarge" value="<?php echo $product['title'] ?>">
            <span class="help-inline validation"> <?php echo form_error('title'); ?></span>
        </div>
    </div>

    <div class="control-group">
        <label class="control-label add" for="description">Description</label>

        <div class="controls">
            <textarea rows="10" cols="3" id="description" name="description" class="input-xxlarge"><?php echo $product['description']; ?></textarea>
            <span class="help-inline validation"><?php echo form_error('description'); ?></span>
        </div>
    </div>

</fieldset>

<fieldset style="border: 1px solid #CCCCCC; border-radius: 3px 3px 3px 3px; margin-bottom: 5px">
    <legend style="border: 1px solid #CCCCCC; padding-left: 20px; border-radius: 3px 3px 3px 3px;">German</legend>

    <div class="control-group">
        <label class="control-label add" for="title">Title</label>

        <div class="controls">
            <input type="text" id="title_de" name="title_de"  class="input-xxlarge" value="<?php echo (!empty($productLang->title)) ? $productLang->title: ''; ?>">
            <span class="help-inline validation"> <?php echo form_error('title_de'); ?></span>
        </div>
    </div>

    <div class="control-group">
        <label class="control-label add" for="description">Description</label>

        <div class="controls">
            <textarea rows="10" cols="3" id="description_de" name="description_de"
                      placeholder="Write something about your product" class="input-xxlarge"><?php echo (!empty($productLang->description)) ? $productLang->description : '' ; ?></textarea>
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
                        <td><input type="text" class="input-medium" name="price_1" value="<?php echo $product['price_1']?>"></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td><input type="text" class="input-medium" name="price_2" value="<?php echo $product['price_2']?>"></td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td><input type="text" class="input-medium" name="price_3" value="<?php echo $product['price_3']?>"></td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td><input type="text" class="input-medium" name="price_4" value="<?php echo $product['price_4']?>"></td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td><input type="text" class="input-medium" name="price_5" value="<?php echo $product['price_5']?>"></td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <td><input type="text" class="input-medium" name="price_6" value="<?php echo $product['price_6']?>"></td>
                    </tr>
                    <tr>
                        <td>7</td>
                        <td><input type="text" class="input-medium" name="price_7" value="<?php echo $product['price_7']?>"></td>
                    </tr>
                    </tbody>
                </table>
            </div>


            <div class="controls">

                <span class="help-inline validation"><?php echo form_error('price'); ?></span>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label add" for="price">Price Increment</label>

            <div class="controls">
                <input type="text" id="price_increment"  name="price_increment" placeholder="Price" value="<?php echo $product['price_increment']?>">
                <span class="help-inline validation"><?php echo form_error('price_increment'); ?></span>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label add" for="Class">Class</label>

            <div class="controls">
                <input type="text" id="Class" name="class" placeholder="Class"
                       value="<?php echo $product['class'] ?>">
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

                        <option value="<?php echo $category->category_id; ?>"<?php echo ($category->category_id == $product['category_id']) ? 'selected="selected"' : '' ?>><?php echo $category->name; ?></option>
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
                    <option value="draft" <?php echo ($product['status'] == 'draft') ? 'selected="selected"' : '' ?>>
                        Draft
                    </option>
                    <option value="published" <?php echo ($product['status'] == 'published') ? 'selected="selected"' : '' ?>>
                        Published
                    </option>
                    <option value="hidden" <?php echo ($product['status'] == 'hidden') ? 'selected="selected"' : '' ?>>
                        Package Only
                    </option>
                </select>
                <span class="help-inline validation"><?php echo form_error('status'); ?></span>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label add" for="image">Image</label>

            <div class="controls">
                <input type="file" id="image" name="image"> <br/><br/>
                <?php if (!empty($product['image'])): ?>
                <div class="product-image"><img src="/uploads/<?php echo $product['image']; ?>"/></div>
                <?php endif; ?>
            </div>
        </div>

        <div class="control-group">
            <div class="controls">
                <button type="submit" class="btn btn-primary">Save Product</button>

            </div>
        </div>

    </form>

</div>

</div>
<!--/span-->

</div><!--/row-->
