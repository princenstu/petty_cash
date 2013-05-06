<style>
    #overlay_form {
        position: absolute;
        border: 2px solid gray;
        padding: 10px;
        background: white;
        width: 900px;
        height: 500px;
    }

    #pop {
        display: block;
        border: 1px solid gray;
        width: 65px;
        text-align: center;
        padding: 6px;
        border-radius: 5px;
        text-decoration: none;
        margin: 0 auto;
    }
</style>
<div>
    <ul class="breadcrumb">
        <li><a href="/admin/dashboard">Dashboard</a> <span class="divider">/</span></li>
        <li><a href="/admin/cash_memos">Cash Memo</a></li>
    </ul>
</div>


<div class="filter">
    <form action="" id="filters">
        <div class="control-group check">
            <label class="control-label add" for="company">Company Name</label>

            <div class="controls box1">
                <select id="company" name="company_id" class="input-medium">
                    <?php

                    foreach ($companies as $company) {
                        ?>
                        <option value="<?php echo $company->company_id; ?>"><?php echo $company->name; ?></option>
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
                <select id="projects" name="project_id" class="input">
                    <?php

                    foreach ($projects as $project) {
                        ?>
                        <option value="<?php echo $project->project_id; ?>"><?php echo $project->name; ?></option>
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
                <select id="disburse" name="disbursed_by" class="input">
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
                <select id="receive" name="received_by" class="input">
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
            <label class="control-label add" for="from">From Date</label>

            <div class="controls box1">
                <input type="text" name="from_date"
                       value="" placeholder="DD/MM/YYYY"
                       class="date-input" required="required" id="from-date" style="width:90px"/>
            </div>
        </div>
        <div class="control-group check">
            <label class="control-label add" for="to">To Date</label>

            <div class="controls box1">
                <input type="text" name="to-date"
                       value="" placeholder="DD/MM/YYYY"
                       class="date-input" required="required" id="to-date" style="width:90px"/>
            </div>
        </div>
        <input type="submit" class="btn btn-primary" value="Filter">
    </form>
</div>


<div class="row-fluid sortable">
    <center><b style="color:green;"><?php $this->load->view('message/message');?></b></center>

    <form action="/admin/cash_memos/deleteCheckboxCashmemo" method="post">


        <div class="box span12 spa">

            <div class="box-header well">
                <h2>Cash Memo</h2>
                <a class="btn btn-primary" style="float:right;" href="/admin/cash_memos/add">ADD</a>
                <input type="submit" class="btn btn-primary" style="float:right; margin-right:5px;"
                       value="Delete Selected">
            </div>
            <?php
            $i = 1;
            ?>
            <div class="box-content">

                  <table class="table table-bordered table-striped table-condensed sortable" id="data_table" >

                    <thead>
                    <tr>
                       <th class="sorttable_nosort"><input type="checkbox" class="chSel_all" name="row_sel[]"/></th>
                        <th>Memo No</th>
                        <th>Company Name</th>
                        <th>Project Name</th>
                        <th>Disbursed</th>
                        <th>Recieved</th>
                        <th class="sorttable_numeric">Amount</th>
                        <th>Create Date</th>
                         <th class="sorttable_nosort"></th>

                    </tr>

                    </thead>

                <tbody>
                    <?php  if (!empty($cashmemoes)) { ?>
                    <?php foreach ($cashmemoes as $cashmemo): ?>

                    <tr>
                        <td class="chb_col"><input type="checkbox" name="row_sel[]" id="row_sel<?php echo $i;?>"
                                                   class="inpt_c1" value="<?php echo $cashmemo->memo_id;?>"/></td>
                        <td><?php echo $cashmemo->memo_no; ?></td>
                        <td><?php echo $cashmemo->name; ?></td>
                        <td><?php echo $cashmemo->project_name; ?></td>
                        <td><?php echo $cashmemo->group_name; ?></td>
                        <td><?php echo $cashmemo->username; ?></td>
                        <td><?php echo $cashmemo->amount; ?></td>
                        <td><?php echo $cashmemo->create_date; ?></td>

                        <td class="center">
                            <a href="javascript:;" rel="<?php echo $cashmemo->memo_id ?>" class="view btn btn-small">View</a>
                            <a class="btn btn-primary"
                               href="/admin/cash_memos/getCashmemoById/<?php echo $cashmemo->memo_id ?>"
                               onclick="return confirm('Are You Sure You Want To Detail information of The Cash Memo?')">
                                <i class="icon-trash icon-white"></i>
                                Detail
                            </a>
                            <a class="btn btn-info" href="/admin/cash_memos/edit/<?php echo $cashmemo->memo_id ?>">
                                <i class="icon-edit icon-white"></i>
                                Edit
                            </a>
                            <a class="btn btn-danger" href="/admin/cash_memos/remove/<?php echo $cashmemo->memo_id ?>"
                               onclick="return confirm('Are You Sure You Want To Delete The Category?')">
                                <i class="icon-trash icon-white"></i>
                                Delete
                            </a>
                        </td>
                    </tr>
                        <?php $i++; ?>
                        <?php endforeach; ?>

                    <?php } else { ?>
                </tbody>
         <tr>
             <td colspan="6"></td>
             No Cash Memo Found
         </tr>
                    <?php } ?>
                </table>
                  <div  style="padding-left: 400px;">
                    <?php echo $links; ?>
                </div>

    </form>
</div>

</div>

</div>
<div id="overlay_form" style="display:none">
    <h2>Cash Memo Detail</h2>
    <?php //echo $detailCashmemo->memo_no; ?>
    <div id="pop-content"></div>
    <a href="#" id="close">Close</a>
</div>

<!-- <script  src="/assets/js/jquery-1.7.2.min.js"> </script>-->
<!--<script  src="/assets/js/jquery.validate.min.js"></script>-->

<script type="text/javascript">

    // alert('ok1');
    $(document).ready(function () {
//open popup
        //alert('ok2');
        $(".view").click(function () {


            //-------------
            var id = $(this).attr('rel');
            console.log(id);
            $.ajax({
                type:"post",
                url:"<?php echo base_url();?>admin/cash_memos/detailPopContent/",
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

</script>
    <SCRIPT type="text/javascript">
    var myTH = document.getElementsByTagName("th")[0];
    sorttable.innerSortFunction.apply(myTH, []);

</SCRIPT>


<!--<script type="text/javascript">-->
<!--    $(document).ready(function () {-->
<!---->
<!--        $("#report").submit(function () {-->
<!---->
<!--            $.ajax({-->
<!--                type:"POST",-->
<!--                url:"../admin/cash_memos/report",-->
<!--                data:$("#report").serialize(),-->
<!--                dataType:"json",-->
<!---->
<!--                success:function (msg) {-->
<!--                    if (msg.status == "404") {-->
<!---->
<!--                        console.log(msg.error);-->
<!--                    } else if (msg.status == "200") {-->
<!---->
<!--                        $("#value").text(msg.value);-->
<!--                    } else {-->
<!--                        $("#formResponse").addClass('error');-->
<!--                        $("#formResponse").html(msg.message);-->
<!--                    }-->
<!--                }-->
<!--            });-->
<!---->
<!--            return false;-->
<!---->
<!--        });-->
<!---->
<!--    });-->
<!--</script>-->
