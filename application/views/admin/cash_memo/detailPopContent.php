<style type="text/css">
    .validation {
        color: red;
    }

    .controls label {
        display: inline;
        /*color:red;*/
        margin-left: 10px;
        width: 200px !important;
        float: left !important;
        text-align: left !important;
    }

</style>
<?php
//Initial
//var_dump($cashmemoes);die;
$this->load->helper('html');
?>
<div>
    <ul class="breadcrumb">
        <li><a href="/admin/dashboard">Dashboard</a> <span class="divider">/</span></li>
        <li><a href="/admin/cash_memos">Cash Memo</a></li>
    </ul>
</div>

<div class="row-fluid sortable">

    <div class="box span12">

        <div class="box-header well" data-original-title>
            <h2><i class="icon-edit"></i> Edit Cash Memo</h2>
        </div>

        <div class="box-content">

            <form enctype="multipart/form-data" id="addcompany" class="form-horizontal" action="/admin/archives/add"
                  method="post">
                <input type="hidden" name="memo_id" value="<?php echo $cashmemoes->memo_id; ?>">

                <div class="control-group">
                    <label class="control-label add" for="company_id">Memo No</label>

                    <div class="controls">
                        <label class="control-label add myclass" for="company_id"><input type="hidden" name="memo_no"
                                                                                         value="<?php echo $cashmemoes->memo_no; ?>"><?php echo $cashmemoes->memo_no; ?>
                        </label>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label add" for="company_id">Company Name</label>

                    <div class="controls">
                        <label class="control-label add myclass" for="company_id"> <input type="hidden"
                                                                                          name="company_id"
                                                                                          value="<?php echo $cashmemoes->company_id; ?>"><?php echo $cashmemoes->company_name; ?>
                        </label>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label add">Project Name</label>

                    <div class="controls">
                        <label class="control-label add myclass"><input type="hidden" name="project_id"
                                                                        value="<?php echo $cashmemoes->project_id; ?>"><?php echo $cashmemoes->project_name; ?>
                        </label>
                    </div>

                </div>
                <div class="control-group">
                    <label class="control-label add" for="disburesed_by">Disbursed By</label>

                    <div class="controls">
                        <label class="control-label add" for="disburesed_by"><input type="hidden" name="disburesed_by"
                                                                                   value="<?php echo $cashmemoes->disbursed_by; ?>"><?php echo $cashmemoes->disbursed_first_name . ' ' . $cashmemoes->disbursed_last_name; ?>
                        </label>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label add" for="received_by">Received By</label>

                    <div class="controls">
                        <label class="control-label add" for="received_by"><input type="hidden" name="received_by"
                                                                                  value="<?php echo $cashmemoes->received_by; ?>"><?php echo $cashmemoes->received_first_name . ' ' . $cashmemoes->received_last_name; ?>
                        </label>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label add" for="amount">Amount in Taka</label>

                    <div class="controls">
                        <label class="control-label add" for="amount"><input type="hidden" name="amount"
                                                                             value="<?php echo $cashmemoes->amount; ?>"><?php echo $cashmemoes->amount; ?>
                        </label>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label add" for="amount_in_words">Amount in Words</label>

                    <div class="controls">
                        <label class="control-label add" for="amount_in_words"><input type="hidden"
                                                                                      name="amount_in_words"
                                                                                      value="<?php echo $cashmemoes->amount_in_words; ?>"><?php echo $cashmemoes->amount_in_words; ?>
                        </label>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label add" for="purpose">Perpose</label>

                    <div class="controls">
                        <label class="control-label add" for="purpose"><input type="hidden" name="purpose"
                                                                              value="<?php echo $cashmemoes->purpose; ?>"> <?php echo $cashmemoes->purpose; ?>
                        </label>
                    </div>
                </div>


                <div class="control-group">
                    <div class="controls">
                        <button class="btn btn-success" type="submit">
                            <i class="icon-trash icon-white"></i>
                            Archive
                        </button>
                    </div>
                </div>

            </form>
        </div>
    </div>

</div>
<!--/span-->

</div><!--/row-->