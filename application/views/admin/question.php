<script type="text/javascript" charset="utf-8">
    $(document).ready(function () {
        $('#example').dataTable({
            "bProcessing": true,
            "bServerSide": true,
            "bJQueryUI": true,
            "sAjaxSource": "<?php echo SITE_URL ;?>administrator/question/?ajax=1",
            "sPaginationType": "full_numbers",
            "fnServerData": function (sUrl, aoData, fnCallback, oSettings) {
                oSettings.jqXHR = $.ajax({
                    "url": sUrl,
                    "data": aoData,
                    "success": fnCallback,
                    "dataType": "jsonp",
                    "cache": false
                });
            }
        });

    });


    // for update Category
    function update_question(id, quiz_name, question, points, time, question_type) {
        $('#addquestion').css('display', 'none');
        $('#editquestion').css('display', 'block');
        $('#id').val(id);
        $('#edit_quiz_name').val(quiz_name);
        $('#edit_question').val(question);
        $('#edit_points').val(points);
        $('#edit_time').val(time);
        $('#edit_question_type').val(question_type);

    }
    //for Cancel Edit
    function cancel() {
        $('#addquestion').css('display', 'none');
        $('#editquestion').css('display', 'none');

    }
    function add() {
        $('#addquestion').css('display', 'block');
        $('#editquestion').css('display', 'none');

    }
    function n() {
        $('#addquestion').css('display', 'none');
        $('#editquestion').css('display', 'none');

    }

    //for Delete Category
    function delete_question(id) {
        var answer = confirm("Are you sure you want to delete this ?");
        <?php ?>if (answer) {
            window.top.location = "<?php echo SITE_URL;?>administrator/deletequestionById/" + id + "/<?php echo time();?>";
        } else {
            return false;
        }

    }

</script>
<script>
    $(document).ready(function () {
        $("#a").click(function () {
            $("#new1").css("display", "block");
            $("#new2").css("display", "none");
        });
        $("#b").click(function () {
            $("#new2").css("display", "block");
            $("#new1").css("display", "none");

        });
    });
</script>
<script>
    $(document).ready(function () {
        $("#a1").click(function () {
            $("#new1").css("display", "block");
            $("#new2").css("display", "none");
        });
        $("#b1").click(function () {
            $("#new2").css("display", "block");
            $("#new1").css("display", "none");

        });
    });
</script>

<?php

//for message bar
$error = isset($error_msg) ? $error_msg : '';
if ($error == "e1") {

    $Msg = "Data Inserted Sucessfully...";
    $display = 'style="display:block;"';
    $class = 'class = "notification done"';
} else if ($error == "e2") {

    $Msg = "Update Data Sucessfully...";
    $display = 'style="display:block;"';
    $class = 'class = "notification done"';
} else if ($error == "e3") {

    $Msg = "Delete Data Sucessfully...";
    $display = 'style="display:block;"';
    $class = 'class = "notification undone"';
} else {

    $Msg = "";
    $display = 'style="display:none;"';
    $class = '';
}
?>
<div id="titlediv">
    <div class="clearfix container" id="pattern">
        <div class="row">
            <div class="col_12">
                <h1>Question</h1>
            </div>
        </div>
    </div>
</div>
<?php ?>
<div id="msg" <?php echo $display; ?>
<span <?php echo $class; ?> > <?php echo $Msg; ?> </span>
</div>
<div id="addquestion" style="padding-left:0px; padding-right:0px; padding-top:0px; margin-top:50px; display: none;">
    <div class="row clearfix">
        <div class="col_12">
            <div class="widget clearfix">
                <h2>Add New Question</h2>

                <div class="widget_inside"><br/>

                    <div class="col_12">
                        <form class="form" id="form2" action="<?php echo SITE_URL; ?>administrator/savequestion"
                              method="post"
                        <!--onsubmit="return validateImage();-->" >

                        <input type="hidden" id="id" name="quiz_name"/>

                        <div class="clearfix">
                            <div class="input">


                                <label style="width:49.8em;"> Subject:


                                    <select id="dropdown" name="quiz_name">
                                        <?php
                                        echo '<option value="" ><---Select---> </option>';
                                        $result = mysql_query('SELECT * from quiz') or die(mysql_error());
                                        while ($row = mysql_fetch_assoc($result)) {

                                            echo '<option value="' . $row['title'] . '">' . $row['title'] . '</option>';
                                        }

                                        ?>
                                    </select>

                                    <label style="width:50.10em;">Question : <textarea name="question"
                                                                                       id="question"
                                                                                       class="validate[required]"
                                                                                       value=""> </textarea>


                                        <label style="width:36.8em; margin-top: 8px;">Points : </label>

                                        <div class="input"><input type="number"
                                                                  style="margin-left: 429px; margin-top: -16px;"
                                                                  name="points"
                                                                  id="points" value=""/></div>

                                        <label style="width:36.8em; margin-top: 8px;">Time (In minutes): </label>

                                        <div class="input"><input type="number"
                                                                  style="margin-left: 429px; margin-top: -16px;"
                                                                  name="time"
                                                                  id="time" value=""/></div>


                                        <label style="width:18.8em; float:right">Question Type:


                                            <!-- <select id="dropdown" name="question_type">-->
                                            <select id="question_type" name="question_type">
                                                <option>----Selected-----</option>
                                                <option id="a" value="One answer (radio button)">One answer (radio
                                                    button)
                                                </option>

                                                <option id="b" value="Multi answer (checkbox)">Multi answer (checkbox)
                                                </option>

                                            </select>

                                            <!--   </select>-->

                                            <div id="new1" style="display:none;">
                                                <table>
                                                    <tr>
                                                        <td>
                                                            <input type="textbox" name="A" value=""/>
                                                        </td>
                                                        <td>
                                                            <input type="radio" name="rad" value=""/>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <input type="textbox" name="B" value=""/>
                                                        </td>
                                                        <td>
                                                            <input type="radio" name="rad" value=""/>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <input type="textbox" name="C" value=""/>
                                                        </td>
                                                        <td>
                                                            <input type="radio" name="rad" value=""/>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <input type="textbox" name="D" value=""/>
                                                        </td>
                                                        <td>
                                                            <input type="radio" name="rad" value=""/>
                                                    </tr>
                                                </table>


                                            </div>

                                            <div id="new2" style="display:none;">
                                                <table>
                                                    <tr>
                                                        <td>
                                                            <input type="textbox" name="A" value=""/>
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" name="ans_A" value=""/>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <input type="textbox" name="B" value=""/>
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" name="ans_B" value=""/>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <input type="textbox" name="C" value=""/>
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" name="ans_C" value=""/>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <input type="textbox" name="D" value=""/>
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" name="ans_D" value=""/>
                                                        </td>
                                                    </tr>
                                                </table>

                                            </div>
                            </div>

                        </div>
                    </div>
                </div>


                <div align="center" style="margin-left:50px;"><input type="submit" id="sub_btn" value="Add"
                                                                     class="button blue"/>
                    &nbsp;<input type="button" value="Cancel" onClick="cancel();"
                                 class="button blue"/></label>

                </div>


            </div>
            </form>
        </div>
    </div>
</div>
</div>
<div id="editquestion" style="padding-left:0px; padding-right:0px; padding-top:0px; margin-top:50px; display:none;">
    <div class="row clearfix">
        <div class="col_12">
            <div class="widget clearfix">
                <h2>Edit Quiz</h2>

                <div class="widget_inside"><br/>

                    <div class="col_12">
                        <form class="form" id="form2" action="<?php echo SITE_URL; ?>administrator/editquestion"
                              method="post">

                            <input type="hidden" id="id" name="edit_quiz_name"/>

                            <div class="clearfix">
                                <div class="input">
                                    <label style="width:55.8em;">
                                        Subject:

                                        <select id="edit_quiz_name" name="edit_quiz_name">
                                            <?php

                                            echo '<option value="" ><---Select---> </option>';
                                            $result = mysql_query('SELECT * from quiz') or die(mysql_error());
                                            while ($row = mysql_fetch_assoc($result)) {

                                                echo '<option value="' . $row['title'] . '">' . $row['title'] . '</option>';

                                            }

                                            ?>
                                        </select>

                                        <div class="input">
                                            <label style="width:54.6em;"> Question : <textarea
                                                    name="edit_question"
                                                    id="edit_question"
                                                    class="validate[required]"
                                                    value=""> </textarea> </label>
                                        </div>

                                        <label style="width:42.8em; margin-top: 8px;">Points : </label>

                                        <div class="input"><input type="number"
                                                                  style="margin-left: 498px; margin-top: -16px;"
                                                                  name="edit_points"
                                                                  id="edit_points" value=""></div>

                                        <label style="width:36.8em; margin-top: 8px;">Time : </label>

                                        <div class="input"><input type="number"
                                                                  style="margin-left: 429px; margin-top: -16px;"
                                                                  name="edit_time"
                                                                  id="edit_time" value=""/></div>

                                        <label style="width:18.8em; float:right">Question Type:

                                            <input type="hidden" id="id" name="question_type"/>

                             <select id="edit_question_type" name="edit_question_type">
                                 <option>----Selected-----</option>
                                 <option id="a1" value="One answer (radio button)">One answer (radio
                                     button)
                                 </option>

                                 <option id="b1" value="Multi answer (checkbox)">Multi answer (checkbox)
                                 </option>

                             </select>

                             <!--   </select>-->

                             <div id="new1" style="display:none;">
                                 <table>
                                     <tr>
                                         <td>
                                             <input type="textbox" name="A" value=""/>
                                         </td>
                                         <td>
                                             <input type="radio" name="rad" value=""/>
                                         </td>
                                     </tr>
                                     <tr>
                                         <td>
                                             <input type="textbox" name="B" value=""/>
                                         </td>
                                         <td>
                                             <input type="radio" name="rad" value=""/>
                                         </td>
                                     </tr>
                                     <tr>
                                         <td>
                                             <input type="textbox" name="C" value=""/>
                                         </td>
                                         <td>
                                             <input type="radio" name="rad" value=""/>
                                         </td>
                                     </tr>
                                     <tr>
                                         <td>
                                             <input type="textbox" name="D" value=""/>
                                         </td>
                                         <td>
                                             <input type="radio" name="rad" value=""/>
                                     </tr>
                                 </table>


                             </div>

                             <div id="new2" style="display:none;">
                                 <table>
                                     <tr>
                                         <td>
                                             <input type="textbox" name="A" value=""/>
                                         </td>
                                         <td>
                                             <input type="checkbox" name="ans_A" value=""/>
                                         </td>
                                     </tr>
                                     <tr>
                                         <td>
                                             <input type="textbox" name="B" value=""/>
                                         </td>
                                         <td>
                                             <input type="checkbox" name="ans_B" value=""/>
                                         </td>
                                     </tr>
                                     <tr>
                                         <td>
                                             <input type="textbox" name="C" value=""/>
                                         </td>
                                         <td>
                                             <input type="checkbox" name="ans_C" value=""/>
                                         </td>
                                     </tr>
                                     <tr>
                                         <td>
                                             <input type="textbox" name="D" value=""/>
                                         </td>
                                         <td>
                                             <input type="checkbox" name="ans_D" value=""/>
                                         </td>
                                     </tr>
                                 </table>

                             </div>
                 </div>

             </div>
     </div>
 </div>


                <div align="center" style="margin-left:50px;">
                                              <input
                                                  type="submit" id="sub_btn" value="Update" class="button blue"/>&nbsp;<input
                                                  type="button" value="Cancel" onClick="cancel();"
                                                  class="button blue"/>
                                          </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<div class="container" id="actualbody">
    <div class="row clearfix">
        <div class="col_12">
            <div class="widget clearfix">
                <h2>Question Info</h2>

                <h2 style="float:right; margin=0px 35px 0px 0px; " onclick="add();">Add</h2>

                <div class="widget_inside"><br/>

                    <div class="col_12">
                        <table cellpadding="0" width="100%" cellspacing="0" border="0" class="dataTable" id="example">
                            <thead>
                            <tr>
                                <th width="10%">S.No</th>
                                <!-- <th width="14%">Product Name</th>-->
                                <th width="10%">Quiz Title</th>
                                <th width="10%">Question</th>
                                <th width="10%">Points</th>
                                <th width="10%">Question Type</th>
                                <th width="10%">Time</th>
                                <th width="10%">Added Date</th>
                                <!-- <th width="14%">Questions</th>-->
                                <th width="10%">Action</th>

                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td colspan="3">loading data from server..</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>setNavigation('main_nav_', 30, 1, 'active');</script>