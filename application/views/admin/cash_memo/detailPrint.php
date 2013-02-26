<style type="text/css">
    #main{
        width:650px;
        height: 500px;
        margin: auto;
        font-size:14px;
    }
    #main-company{
        text-align:center;
        margin:auto;
        font-family: Arial;
    }
    #cash-memo{
        text-align:center;
        margin:auto;
    }
    .date{
        margin:10px 5px 0 0;
        float:right;
    }
    #information{
        float:left;
        margin:0 0 0 25px;
    }
    .Recieve-by{
        float: left;
        margin:150px 0 0 29px;
    }
    #signature{
        margin auto;
    }
</style>
<div id="main">
    <div class="date">date:<?php echo $detailCashmemo->create_date;?></div><br/><br/><br/>
    <div id="cash-memo">Cash Memo</div><br/>
    <div id="main-company">PUL/ESL/HPL/PUL/OTHERS</div><br/><br/>
    <div id="information">
        <table width="100%">
        <tr>
       <td>Receive By</td> <td><?php echo $detailCashmemo->username;?></td>
        </tr>
       <tr>
           <td>Company Name</td><td><?php echo $detailCashmemo->name;?></td>
        <tr>
        <tr>
            <td>Project Name</td><td><?php echo $detailCashmemo->project_name;?></td>
         </tr>
     <tr> <td>Purpose</td><td><?php echo $detailCashmemo->purpose;?></td>
         </tr>
            <tr>
       <td>Amount</td><td><?php echo $detailCashmemo->amount;?></td><td>Amount in Words:</td><td><?php echo $detailCashmemo->amount_in_words;?></td>
            </tr>

        </table>

        <div id="signature">
            <div class="Recieve-by">Receive</div>
            <div class="Recieve-by">Authorized Signature</div>
            <div class="Recieve-by">Control Office Signature</div>
        </div>
    </div>

</div>
 <div class="company-name"></div>



<script type="text/javascript">
    window.print();
</script>
