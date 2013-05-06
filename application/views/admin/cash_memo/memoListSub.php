<?php
$i = 1;
?>
<thead>
<tr>
    <th class="sorttable_nosort"><input type="checkbox" class="chSel_all" name="row_sel[]"/></th>
    <th><a class="sort" href="<?php echo site_url($this->cashmemo->order_work($header_url, 'memo_id', 5, 7)); ?>">Memo
        ID</a></th>
    <th><a class="sort" href="<?php echo site_url($this->cashmemo->order_work($header_url, 'memo_no', 5, 7)); ?>">Memo
        No</a></th>
    <th><a class="sort" href="<?php echo site_url($this->cashmemo->order_work($header_url, 'name', 5, 7)); ?>">Company
        Name</a></th>
    <th><a class="sort" href="<?php echo site_url($this->cashmemo->order_work($header_url, 'project_name', 5, 7)); ?>">Project
        Name</a></th>
    <th><a class="sort" href="<?php echo site_url($this->cashmemo->order_work($header_url, 'group_name', 5, 7)); ?>">Disbursed</a>
    </th>
    <th><a class="sort" href="<?php echo site_url($this->cashmemo->order_work($header_url, 'username', 5, 7)); ?>">Recieved</a>
    </th>
    <th><a class="sort"
           href="<?php echo site_url($this->cashmemo->order_work($header_url, 'amount', 5, 7)); ?>">Amount</a></th>
    <th><a class="sort" href="<?php echo site_url($this->cashmemo->order_work($header_url, 'create_date', 5, 7)); ?>">Create
        Date</a></th>

</tr>
</thead>
<tbody>
<?php
if (!empty($items)):
    foreach ($items as $item):
        ?>
    <tr>
        <td class="chb_col"><input type="checkbox" name="row_sel[]" id="row_sel<?php echo $i;?>"
                                   class="inpt_c1" value="<?php echo $item->memo_id;?>"/></td>
        <td><?php echo $item->memo_id; ?></td>
        <td><?php echo $item->memo_no; ?></td>
        <td><?php echo $item->name; ?></td>
        <td><?php echo $item->project_name; ?></td>
        <td><?php echo $item->group_name; ?></td>
        <td><?php echo $item->username; ?></td>
        <td><?php echo $item->amount; ?></td>
        <td><?php echo $item->create_date; ?></td>
        <td>
            <a href="#" rel="<?php echo $item->memo_id ?>" class="view btn btn-success">View</a>
            <a class="btn btn-primary" href="/admin/cashmemoes/detail/<?php echo $item->memo_id ?>"
               onclick="return confirm('Are You Sure You Want To Detail information of The Cash Memo?')">
                <i class="icon-trash icon-white"></i>
                Detail
            </a>
            <a class="btn btn-info" href="/admin/cashmemoes/edit/<?php echo $item->memo_id ?>">
                <i class="icon-edit icon-white"></i>
                Edit
            </a>
            <a class="btn btn-danger" href="/admin/cashmemoes/remove/<?php echo $item->memo_id ?>"
               onclick="return confirm('Are You Sure You Want To Delete The Category?')">
                <i class="icon-trash icon-white"></i>
                Delete
            </a>
        </td>
    </tr>
        <?php $i++; ?>
        <?php
    endforeach;
    if (!empty($paging)):
        ?>
    <tfoot>
    <tr>
        <td colspan="3"><span class="pagination"><?php echo $paging; ?></span></td>
    </tr>
    </tfoot>
        <?php
    endif; else:
    ?>
<tr>
    <td colspan="9">No record found</td>
</tr>
    <?php
endif;
?>
</tbody>