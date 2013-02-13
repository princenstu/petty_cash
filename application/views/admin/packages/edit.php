<div>
    <ul class="breadcrumb">
        <li>
            <a href="/admin/dashboard">Dashboard</a> <span class="divider">/</span>
        </li>
        <li>
            <a href="/admin/packages/edit">Edit Package</a>
        </li>
    </ul>
</div>

<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header well" data-original-title>
            <h2><i class="icon-edit"></i> Edit Package</h2>

            <div class="box-icon">
                <a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
                <a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
                <a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
            </div>
        </div>
        <div class="box-content">
            <form class="form-horizontal" action="" method="post" name="addpackage" enctype="multipart/form-data">
                <input type="hidden" name="package_id" value="<?php echo $package['package_id'];?>">

                <div class="control-group">
                    <label class="control-label add" for="title">Title</label>

                    <div class="controls">
                        <input type="text" id="title" name="title" value="<?php echo $package['title'];?>" class="input-xxlarge">
                        <span class="help-inline validation"> <?php echo form_error('title'); ?></span>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label add" for="description">Description</label>
                    <div class="controls">
                        <textarea rows="3" cols="3" id="description" name="description" placeholder="Write something about your package"><?php echo $package['description'];?></textarea>
                        <span class="help-inline validation"><?php echo form_error('description'); ?></span>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label add" for="price">Price</label>

                    <div class="controls">
                        <input type="text" id="price" name="price" value="<?php echo $package['price']; ?>">
                        <span class="help-inline validation"><?php echo form_error('price'); ?></span>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label add" for="price">Status</label>
                    <div class="controls">

                        <select name="status" id="status">
                            <option value="draft" <?php echo ($package['status']=='draft')? 'selected="selected"':''?>>Draft</option>
                            <option value="published" <?php echo ($package['status']=='published')? 'selected="selected"':''?>>Published</option>
                        </select>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label add" for="price">product</label>
                    <div class="controls">

                        <select name="product_id" id="product_id">

                            <?php

                            foreach($packages as $value)
                            {?>

                                <option value="<?php echo $value['product_id'];?> |<?php echo $value['title'];?>"><?php echo $value['title'];?></option>
                                <?php
                            }
                            ?>

                        </select>

                        <button class="btn" type="button" id="additem" onclick="addtogrid()">
                            <span>Add</span>
                        </button>
                        <div class="sepH_b" id="selecteditems">
                            <label for="quantity" class="lbl_a"></label>
                            <table border="0" width="50%" id="itemtable">
                                <tr><td align="left"></td>
                                </tr>
                                <?php foreach($products as $product): ?>
                                <tr><td><input type="hidden" class="product_name" name="product[]" value="<?php echo $product['product_id']; ?>"><?php echo $product['title']; ?></td>
                                    <td><input type="button" value="Remove" class="drec" onclick="deleterecord()"/></td>
                                </tr>

                                <?php endforeach;?>

                            </table>
                        </div>
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
                        <?php if (!empty($package['image'])):  ?>

                        <span><img src="/uploads/<?php echo ThumbHelper::getThumb($package['image']); ?>" /></span>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="control-group">
                    <div class="controls">
                        <button type="submit" class="btn btn-primary">Update Package</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!--/span-->

</div><!--/row-->


<script type="text/javascript">
    jQuery(document).ready(function($){
        $('#searchproduct').autocomplete({source:'admin/products/detail', minLength:2});
    });
</script>


<script type="text/javascript" language="javascript">
    function deleterecord(){
        $('.drec').click(function(){
            $(this).parent().parent().remove();
        });
    }

    function addtogrid(){
        $('#selecteditems').show();
        var item=$('#product_id').val();
        var spl=item.split('|');

        var matches=[];
        $(".product_name").each(function () {
            matches.push($(this).val());
        });
        if($.inArray(spl[0], matches) != -1)
        {
            alert('This Product is already taken')
        }
        else
        {
            $('#itemtable tr:last').after('<tr><td><input type="hidden" class="product_name"  name="product[]" size="30px" value="'+spl[0]+'" />'+spl[1] +'</td> ' +
                '<td><input type="button" value="Remove" class="drec" onclick="deleterecord()"/></td></tr>');
            $('#product_id').val('');
        }

    }
</script>