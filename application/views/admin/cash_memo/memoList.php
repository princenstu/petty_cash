<?php //var_dump($projects);die;?>
<style type="text/css">
    .pagination .current{
        background-color: green;
    }
</style>
<div>
    <ul class="breadcrumb">
        <li><a href="/admin/dashboard">Dashboard</a> <span class="divider">/</span></li>
        <li><a href="/admin/cashmemoes">Cash Memo</a></li>
    </ul>
</div>
<div class="filter">
<form action="" id="form1">
    <div class="control-group check">
        <label class="control-label add" for="company">Company Name</label>

        <div class="controls box1">
            <select id="company" name="filter_value" class="input">
                <option value="any">Any</option>
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
    <div class="control-group check">
        <label class="control-label add" for="company">Project Name</label>
        <div class="controls box1">
            <select id="projects" name="filter_value1" class="input">
                <option value="any">Any</option>
                <?php

                foreach ($projects as $project) {
                    ?>
                    <option value="<?php echo $project->project_id ; ?>"><?php echo $project->name; ?></option>
                    ";
                    <?php
                }
                ?>
            </select>
            </div>
    </div>
    <div class="control-group check">
        <label class="control-label add" for="company">Disbursed</label>

        <div class="controls box1">
            <select id="disburse" name="filter_value2" class="input">
                <option value="any">Any</option>
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
    <div class="control-group check">
        <label class="control-label add" for="company">Received By</label>

        <div class="controls box1">
            <select id="receive" name="filter_value3" class="input">
                <option value="any">Any</option>
                <?php

                foreach ($recives as $receive) {
                    ?>
                    <option value="<?php echo $receive->id; ?>"><?php echo $receive->username; ?></option>
                    ";
                    <?php
                }
                ?>
            </select>
        </div>
    </div>
    <div class="control-group check">
        <label class="control-label add" for="from">Company Or Project</label>

        <select name="field">
            <option value="any">Any</option>
            <option value="company_name">Company Name</option>
            <option value="project_name">Project Name</option>
        </select>
        <input type="text" name="value">

    </div>
    <div class="control-group check">
        <label class="control-label add" for="from">From Date</label>
        <input type="text" name="date_start"
               placeholder="DD/MM/YYYY" readonly="" class="date-input" required="required" id="date-start"/>


    </div>
    <div class="control-group check">
        <label class="control-label add" for="to">To Date</label>
        <input type="text" name="date1">

    </div>
<input type="submit" class="btn btn-primary filter-btn" value="Filter" id="find">
</form>
</div>
<div class="row-fluid sortable">
    <center><b style="color:green;"><?php $this->load->view('message/message');?></b></center>

    <form action="/admin/cashmemoes/deleteCheckboxCashmemo" method="post" id="form2">


        <div class="box span12 spa">

            <div class="box-header well">
                <h2>Cash Memo</h2>
                <a class="btn btn-primary" style="float:right;" href="/admin/cashmemoes/add">ADD</a>
                <input type="submit" class="btn btn-primary" style="float:right; margin-right:5px;"
                       value="Delete Selected">
            </div>
            <?php
            $i = 1;
            ?>
            <div class="box-content">
                <table class="table table-bordered table-striped table-condensed" id="pan" >
                <?php $this->load->view('admin/cashmemos/memoListSub',$items); ?>
                </table>
            </div>

    </form>

</div>

</div>

</div>
<div id="overlay_form" style="display:none">
    <h2>Cash Memo Detail</h2>

    <div id="pop-content"></div>
    <a href="#" id="close">Close</a>
</div>

<script  src="/assets/js/jquery-1.7.2.min.js"> </script>
<script  src="/assets/js/jquery.validate.min.js"></script>


<script type="text/javascript">

    $(document).ready(function () {

        $(".view").live("click",function () {

            var id = $(this).attr('rel');
            console.log(id);
            $.ajax({
                type:"post",
                url:"<?php echo base_url();?>admin/cashmemoes/detailPopContent/",
                data:"ag=" + id,
                cache:false,
                success:function (response) {
                    $("#pop-content").empty();
                    $("#pop-content").html(response);
                }
            });
            //-------------
            $("#overlay_form").fadeIn(1000);
            positionPopup();
            return false;
        });

//close popup
        $("#close").click(function () {
            $("#overlay_form").fadeOut(500);
        });

        $(".pagination a").live("click",function(){
            var redir_url = $(this).attr('href');
            run_ajax(redir_url);
            return false;
        });

        $(".sort").live("click",function(){
            console.log('sfdsds');
            var redir_url = $(this).attr('href');
            run_ajax(redir_url);
            return false;
        });

        $("#find").live("click",function(){
            var redir_url = '<?php echo base_url();?>admin/cashmemoes/memoList/1';
            run_ajax(redir_url);
            return false;
        });

        $("#filter_value").live("change",function(){
            console.log($(this).find('option:selected').text());
            $("#hdn_filter_value").val($(this).find('option:selected').text());
        });
    });

    //position the popup at the center of the page
    function positionPopup() {
        if (!$("#overlay_form").is(':visible')) {
            return;
        }
        $("#overlay_form").css({
            left:($(window).width() - $('#overlay_form').width()) / 2,
            top:($(window).width() - $('#overlay_form').width()) / 7,
            position:'absolute'
        });
    }

    //maintain the popup at center of the page when browser resized
    $(window).bind('resize', positionPopup);

    function run_ajax(redir_url)
    {
        var form_data = $("#form1").serialize();
        //------------------------------
        $.ajax({
            url: redir_url,
            type: 'post',
            data: form_data,
            error: function(){
                alert('Error loading XML document');
            },
            success: function(data){
                $("#pan").empty();
                $("#pan").html(data);
            }
        });
        //------------------------------
    }
</script>


