@pastieorg | status | Running Blind Welcome to Pastie.
NEWSShareBrowseToolsHelpAbout
My brother Nate is fighting stage IV Hodgkin's lymphoma. He's just 31, with a wife and baby girl. They have no active income (unpaid FMLA), no insurance coverage, and cannot afford treatment. Nate and his family need your help. Thank you.

Josh Goebel, Pastie creator
Donate now Read Nate's story Hide this message I have donated
          A A A
Plain text   3 hours ago     Report abuse
1
2
3
4
5
6
7
8
9
10
11
12
13
14
15
16
17
18
19
20
21
22
23
24
25
26
27
28
29
30
31
32
33
34
35
36
37
38
39
40
41
42
43
44
45
46
47
48
49
50
51
52
53
54
55
56
57
58
59
60
61
62
63
64
65
66
67
68
69
70
71
72
73
74
75
76
77
78
79
80
81
82
83
84
85
86
87
88
89
90
91
92
93
94
95
96
97
98
99
100
101
102
103
104
105
106
107
108
109
110
111
112
113
114
115
116
117
118
119
120
121
122
123
124
125
126
127
128
129
130
131
132
133
134
135
136
137
138
139
140
141
142
143
144
145
146
147
148
149
150
151
152
153
154
155
156
157
158
159
160
161
162
163
164
165
166
167
168
169
170
171
172
173
174
175
176
177
178
179
180
181
182
183
184
185
186
187
188
189
190
191
192
193
194
195
196
197
198
199
200
201
202
203
204
205
206
207
208
209
210
211
212
213
214
215
216
217
218
219
220
221
222
223
224
225
226
227
228
229
230
231
232
233
234
235
236
237
238
239
240
241
242
243
244
245
246
247
248
249
<?php //var_dump($projects);die;?>
<div>
    <ul class="breadcrumb">
        <li><a href="/admin/dashboard">Dashboard</a> <span class="divider">/</span></li>
        <li><a href="/admin/cashmemoes">Cash Memo</a></li>
    </ul>
</div>
<div class="filter">
<form action="" id="filters">
    <div class="control-group check">
        <label class="control-label add" for="company">Company Name</label>

        <div class="controls box1">
            <select id="company" name="company_id" class="input">
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
            <select id="projects" name="project_id" class="input">
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
            <input type="text" name="birth_date"
                   value="" placeholder="DD/MM/YYYY"
                   class="date-input" required="required" id="from-date" style="width:90px"/>
        </div>
    </div>
    <div class="control-group check">
        <label class="control-label add" for="to">To Date</label>

        <div class="controls box1">
            <input type="text" name="birth_date"
                   value="" placeholder="DD/MM/YYYY"
                   class="date-input" required="required" id="to-date" style="width:90px"/>
        </div>
    </div>
<input type="submit" class="btn btn-primary" value="Filter">
</form>
</div>
<div class="row-fluid sortable">
    <center><b style="color:green;"><?php $this->load->view('message/message');?></b></center>

    <form action="/admin/cashmemoes/deleteCheckboxCashmemo" method="post">


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
                            <a href="#" rel="<?php echo $cashmemo->memo_id ?>" class="view btn btn-small">View</a>
                            <a class="btn btn-primary" href="/admin/cashmemoes/detail/<?php echo $cashmemo->memo_id ?>"
                               onclick="return confirm('Are You Sure You Want To Detail information of The Cash Memo?')">
                                <i class="icon-trash icon-white"></i>
                                Detail
                            </a>
                            <a class="btn btn-info" href="/admin/cashmemoes/edit/<?php echo $cashmemo->memo_id ?>">
                                <i class="icon-edit icon-white"></i>
                                Edit
                            </a>
                            <a class="btn btn-danger" href="/admin/cashmemoes/remove/<?php echo $cashmemo->memo_id ?>"
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

    <div id="pop-content"></div>
    <a href="#" id="close">Close</a>
</div>

<script  src="/assets/js/jquery-1.7.2.min.js"> </script>
<script  src="/assets/js/jquery.validate.min.js"></script>


<script type="text/javascript">

    $(document).ready(function () {
        $(".view").click(function () {

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
9026 characters / 249 lines
Advertising from Carbon:
Braintree: 2.9% and 30¢ per transaction. No minimums, no monthly fees.

 
All your pastes are belong to us. 
Legal Created by 
Josh Goebel Monitored by
CopperEgg and New Relic