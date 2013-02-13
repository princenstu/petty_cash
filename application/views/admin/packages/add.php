<div>
    <ul class="breadcrumb">
        <li>
            <a href="/admin/dashboard">Dashboard</a> <span class="divider">/</span>
        </li>
        <li>
            <a href="/admin/packages/add">Add Package</a>
        </li>
    </ul>
</div>

<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header well" data-original-title>
            <h2><i class="icon-edit"></i> Add Package</h2>
        </div>
        <div class="box-content">
            <form class="form-horizontal" action="../packages/add" method="post" name="addproduct" enctype="multipart/form-data">

                <input type="hidden" name="package_id">
                <div class="control-group">
                    <label class="control-label add" for="title" >Title</label>
                    <div class="controls">
                        <input type="text" id="title" name="title" placeholder="Package Title" class="input-xxlarge">
                        <span class="help-inline validation" > <?php echo form_error('title'); ?></span>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label add" for="description">Description</label>
                    <div class="controls">
                        <textarea rows="3" cols="3" id="description" name="description" placeholder="Write something about your package"></textarea>
                        <span class="help-inline validation"><?php echo form_error('description'); ?></span>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label add" for="price">Price</label>
                    <div class="controls">
                        <input type="text" id="price" name="price" placeholder="Package price">
                        <span class="help-inline validation"><?php echo form_error('price'); ?></span>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label add" for="price">Status</label>
                    <div class="controls">

                        <select name="status" id="status">

                            <option value="draft">Draft</option>
                            <option value="published">Published</option>
                        </select>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label add" for="price">product</label>
                    <div class="controls">

                        <select name="product_id" id="product_id">

                            <?php

                            foreach($packages as $package)
                            {
                            ?>
                                <option value="<?php echo $package->product_id; ?>| <?php echo $package->title ;?>"><?php echo $package->title ;?></option>

                            <?php
                            }
                            ?>
                        </select>  <span class="help-inline validation"><?php echo form_error('product_id'); ?> </span>

                        <button class="btn" type="button" id="additem" onclick="addtogrid()">
                            <span>Add</span>
                        </button>
                        <div class="sepH_b" id="selecteditems">
                            <label for="quantity" class="lbl_a"></label>
                            <table border="0" width="50%" id="itemtable">

                                <tr><td align="left"></td>
                                </tr>
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
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </div>
                <div id="addproduct_errorloc" class="error_strings">

                </div>
            </form>

        </div>

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



