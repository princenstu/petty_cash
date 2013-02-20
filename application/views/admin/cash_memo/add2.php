<?php //var_dump($projects);die;?>

<style type="text/css">
    .validation{
        color:red;
    }

    .controls label{
        display: inline;
        color: red;
        margin-left:9px;
        text-transform: uppercase;
    }
</style>
<div id="content" class="span10">
    <div>
        <ul class="breadcrumb">
            <li>
                <a href="/admin/dashboard">Dashboard</a> <span class="divider"></span>
            </li>
            <li>
                <a href="/admin/">Add Cash Memo</a>
            </li>
        </ul>
    </div>

    <div class="row-fluid sortable">

        <div class="box span12">
            <div class="box-header well" data-original-title>
                <h2><i class="icon-edit"></i> Add Cash Memo</h2>
            </div>
            <div class="box-content">
                <form id="addcashmemo" class="form-horizontal" action=""
                      method="post" name="addcashmemo">

                    <div class="control-group">
                        <label class="control-label add" for="company">Company Name</label>

                        <div class="controls">
                            <select id="company" name="company_id" class="input-xlarge">
                                <?php

                                foreach ($companies as $company) {
                                    ?>
                                    <option value="<?php echo $company->company_id ; ?>"><?php echo $company->name; ?></option>
                                    ";
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label add" for="project">Project Name</label>

                        <div class="controls">
                            <select id="project" name="project_id" class="input-xlarge">
                                <option value="">select project</option>

                            </select>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label add" for="disburse">Disbursed By</label>

                        <div class="controls">
                            <select id="disburse" name="disbursed_by" class="input-xlarge">
                                <?php

                                foreach ($disburses as $disburse) {
                                    ?>
                                    <option value="<?php echo $disburse->id; ?>"><?php echo $disburse->name; ?></option>
                                    ";
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label add" for="receive">Received By</label>

                        <div class="controls">
                            <select id="receive" name="received_by" class="input-xlarge">
                                <?php

                                foreach ($receives as $receive) {
                                    ?>
                                    <option value="<?php echo $receive->id; ?>"><?php echo $receive->username; ?></option>
                                    ";
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>


                    <div class="control-group">
                        <label class="control-label add" for="amount">Amount</label>
                        <div class="controls">
                            <input type="text" id="amount" class="input-xlarge" name="amount"  value="<?php  echo set_value('amount')?>" placeholder="Amount" >
                            <span class="help-inline validation"> <?php echo form_error('amount'); ?></span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label add" for="amount_in_words">Amount in words</label>
                        <div class="controls">
                            <input type="text" id="amount_in_words" class="input-xlarge" name="amount_in_words"  value="<?php  echo set_value('amount_in_words')?>" placeholder="Amount" >
                            <span class="help-inline validation"> <?php echo form_error('amount_in_words'); ?></span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label add" for="amount">Perpose</label>
                        <div class="controls">
                            <textarea rows="10" cols="30" name="purpose"></textarea>

                            <span class="help-inline validation"> <?php echo form_error('purpose'); ?></span>
                        </div>
                    </div>


                    <div class="control-group">
                        <div class="controls">
                            <button name="save" value="save" type="submit" class="btn btn-primary">Save</button>
                            <button  name="saveprint" id="btn-saveprint" value="saveprint" type="submit" class="btn btn-primary">Save&Print</button>
                            <!--                            <a href="/admin/cashmemoes/savePrint" class="btn">Save & Print</a>-->
                            <a href="/admin/dashboard" class="btn">Cancel</a></div>
                    </div>
            </div>

            </form>
        </div>
    </div>
</div>
<script  src="/assets/js/jquery-1.7.2.min.js"> </script>
<script  src="/assets/js/jquery.validate.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){

        $('#company').change(function(){

            $('#project').html("<option>Fetching...</option>");
            var opt=$('#company').val();

            $.ajax({
                type:"post",
                url:"<?php echo base_url(); ?>admin/cash_memos/projectByid/",
                data:"ag="+opt,
                cache:false,
                success:function(html){
                    $('#project').html(html);
                }
            });
        });
    });

</script>
<script type="text/javascript">
    $("#addcashmemo").validate({

        rules:{
            amount:{
                required:true,
                number:true
            },
            amount_in_words:{
                required:true

            }

        }
    });
</script>