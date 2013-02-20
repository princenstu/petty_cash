
<div>
    <ul class="breadcrumb">
        <li><a href="/admin/dashboard">Dashboard</a> <span class="divider">/</span></li>
        <li><a href="/admin/archives">Archives</a></li>
    </ul>
</div>

<div class="row-fluid sortable">

    <div class="box span12">
        <center><b style="color:green;"><?php $this->load->view('message/message');?></b></center>
        <div class="box-header well" data-original-title>
            <h2>Archive</h2>
        </div>

        <div class="box-content">

            <table class="table table-bordered table-striped table-condensed">

                <thead>
                <tr>
                    <th>Memo No</th>
                    <th>Company Name</th>
                    <th>Project Name</th>
                    <th>Amount</th>
                    <th>Disbursed By</th>
                    <th>Received By</th>
                    <th></th>
                </tr>

                </thead>

                <tbody>

                <?php if(!empty($cashmemoes)){
                    foreach($cashmemoes as $cashmemo):?>

                    <tr>
                        <td><?php echo $cashmemo->memo_no; ?></td>
                        <td><?php echo $cashmemo->company_name; ?></td>
                        <td><?php echo $cashmemo->project_name; ?></td>
                        <td><?php echo $cashmemo->amount; ?></td>
                        <td><?php echo $cashmemo->disbursed_first_name.' ', $cashmemo->disbursed_last_name; ?></td>
                        <td><?php echo $cashmemo->received_first_name.' ', $cashmemo->received_last_name; ?></td>
                        <td class="center">
                            <a class="btn btn-info" href="/admin/cashmemoes/edit/<?php echo $cashmemo->memo_id ?>">
                                <i class="icon-edit icon-white"></i>
                                Unarchive
                            </a>

                        </td>
                    </tr>

                        <?php endforeach;
                } ?>

                </tbody>

            </table>

            <div  style="padding-left: 400px;">
                <!--                --><?php //echo $links; ?>
            </div>



        </div>

    </div>

</div>
