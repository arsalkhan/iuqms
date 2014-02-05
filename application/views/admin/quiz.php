<script type="text/javascript" charset="utf-8">
    $(document).ready(function () {
        $('#example').dataTable({
            "bProcessing": true,
            "bServerSide": true,
            "bJQueryUI": true,
            "sAjaxSource": "<?php echo SITE_URL ;?>administrator/quiz/?ajax=1",
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
    function update_quiz(id, name, description,cat_name) {
        $('#addquiz').css('display', 'none');
        $('#editquiz').css('display', 'block');
        $('#id').val(id);
        $('#edit_name').val(name);
        $('#edit_description').val(description);

        $('#cat_name').val(cat_name);

    }
    //for Cancel Edit
    function cancel() {
        $('#addquiz').css('display', 'none');
        $('#editquiz').css('display', 'none');

    }
    function add() {
        $('#addquiz').css('display', 'block');
        $('#editquiz').css('display', 'none');

    }
    function n() {
        $('#addcategory').css('display', 'none');
        $('#editcategory').css('display', 'none');

    }

    //for Delete Category
    function delete_quiz(id) {
        var answer = confirm("Are you sure you want to delete this ?");
        <?php ?>if (answer) {
            window.top.location = "<?php echo SITE_URL;?>administrator/deletequizById/" + id + "/<?php echo time();?>";
        } else {
            return false;
        }

        }

          /*   function question(id, name, description, category) {
                    $('#addquiz').css('display', 'none');
                    $('#editquiz').css('display', 'block');
                    $('#id').val(id);
                    $('#edit_name').val(name);
                    $('#edit_description').val(description);
                    $('#category').val(description);

                }*/

    function showCode() {
        $('#showtextbox').css('display', 'block');
        $('#upload').css('display', 'none');

    }
    function showUpload() {
        $('#showtextbox').css('display', 'none');
        $('#upload').css('display', 'block');

    }
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
                <h1>Quiz</h1>
            </div>
        </div>
    </div>
</div>
<?php ?>
<div id="msg" <?php echo $display; ?>
<span <?php echo $class; ?> > <?php echo $Msg; ?> </span>
</div>
<div id="addquiz" style="padding-left:0px; padding-right:0px; padding-top:0px; margin-top:50px; display: none;">
    <div class="row clearfix">
        <div class="col_12">
            <div class="widget clearfix">
                <h2>Add New Quiz</h2>

                <div class="widget_inside"><br/>

                    <div class="col_12">
                        <form class="form" id="form2" action="<?php echo SITE_URL; ?>administrator/savequiz"
                              method="post" <!--onsubmit="return validateImage();-->" >
                            <div class="clearfix">
                                <div class="input">


                                    <label style="width:49.8em;">Subject:


                                        <select id="dropdown" name="cat_name">
                                            <?php
                                            echo '<option value="" ><---Select---> </option>';
                                            $result = mysql_query('SELECT * from category') or die(mysql_error());
                                            while ($row = mysql_fetch_assoc($result)) {

                                                echo '<option value="' . $row['name'] . '">' . $row['name'] . '</option>';
                                            }

                                            ?>
                                        </select>

                                        <label style="width:50.10em;">Title : <input type="text" name="title"
                                                                                    id="title"
                                                                                    class="validate[required]"
                                                                                    value=""/>



                                                <label style="width:36.8em; margin-top: 8px;">Description : </label>

                                                <div class="input"><textarea  style="margin-left: 429px; margin-top: -16px;" name="description"
                                                                             id="description" value=""></textarea></div>
                                            </div>
                                            </div>

                    </div>


                    <div align="center" style="margin-left:50px;"><input type="submit" id="sub_btn" value="Add" class="button blue"/>
                    &nbsp;<input type="button" value="Cancel" onClick="cancel();"
                                 class="button blue"/></label>

                </div>
                                      </form>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
<div id="editquiz" style="padding-left:0px; padding-right:0px; padding-top:0px; margin-top:50px; display:none;">
    <div class="row clearfix">
        <div class="col_12">
            <div class="widget clearfix">
                <h2>Edit Quiz</h2>

                <div class="widget_inside"><br/>

                    <div class="col_12">
                        <form class="form" id="form2" action="<?php echo SITE_URL; ?>administrator/editquiz"
                              method="post">
                            <input type="hidden" id="id" name="id"/>

                            <div class="clearfix">
                                <div class="input">
                                    <label style="width:55.8em;">
                                        Subject:

                                        <select id="cat_name" name="cat_name">
                                            <?php

                                            echo '<option value="" ><---Select---> </option>';
                                            $result = mysql_query('SELECT * from category') or die(mysql_error());
                                            while ($row = mysql_fetch_assoc($result)) {

                                                echo '<option value="' . $row['name'] . '">' . $row['name'] . '</option>';

                                            }

                                            ?>
                                        </select>

                                        <div class="input">
                                            <label style="width:54.6em;"> Title : <input type="text"
                                                                                         name="edit_name"
                                                                                         id="edit_name"
                                                                                         class="validate[required]"
                                                                                         value=""/></label>
                                        </div>

                                            <label style="width:42.8em; margin-top: 8px;">Description : </label>

                                            <div class="input"><textarea style="margin-left: 498px; margin-top: -16px;"  name="edit_description"
                                                                         id="edit_description" value=""></textarea></div>



                                </div>

                            </div>


                            <br>

                            <div style="width:54.8em ; margin-left:523px"><input
                                    type="submit" id="sub_btn" value="Update" class="button blue"/>&nbsp;<input
                                    type="button" value="Cancel" onClick="cancel();"
                                    class="button blue"/></label>
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
                <h2>Quiz Info</h2>

                <h2 style="float:right; margin=0px 35px 0px 0px; " onclick="add();">Add</h2>

                <div class="widget_inside"><br/>

                    <div class="col_12">
                        <table cellpadding="0" width="100%" cellspacing="0" border="0" class="dataTable" id="example">
                            <thead>
                            <tr>
                                <th width="10%">S.No</th>
                               <!-- <th width="14%">Product Name</th>-->

                                <th width="10%">Subject</th>

                                <th width="10%">Title</th>
                                <th width="10%">Description</th>


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