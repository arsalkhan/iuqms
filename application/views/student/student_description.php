<script type="text/javascript" charset="utf-8">
    $(document).ready(function () {
        $('#example').dataTable({
            "bProcessing": true,
            "bServerSide": true,
            "bJQueryUI": true,
            "sAjaxSource": "<?php echo SITE_URL ;?>administrator/student/?ajax=1",
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
    // for update 
    function update_student(id, name, description, academic_performace,category) {
        $('#addstudent').css('display', 'none');
        $('#editstudent').css('display', 'block');
        $('#id').val(id);
        $('#edit_name').val(name);
        $('#edit_description').val(description);
        $('#edit_academic_performace').val(academic_performace);
        $('#edit_category').val(category);

    }


    //for Cancel Edit
    function cancel() {
        $('#addstudent').css('display', 'none');
        $('#editstudent').css('display', 'none');

    }

    function n() {
        $('#addstudent').css('display', 'none');
        $('#editstudent').css('display', 'none');

    }
    function add() {
        $('#addstudent').css('display', 'block');
        $('#editstudent').css('display', 'none');

    }
    //for Delete student
    function delete_student(id) {
        var answer = confirm("Are you sure you want to delete this ?");
        <?php ?>if (answer) {
            window.top.location = "<?php echo SITE_URL;?>administrator/deletestudentById/" + id + "/<?php echo time();?>";
        } else {
            return false;
        }
        <?php ?>
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
                <h1>Student</h1>
            </div>
        </div>
    </div>
</div>
<?php ?>
<div id="msg" <?php echo $display; ?>>
    <span <?php echo $class; ?> > <?php echo $Msg; ?> </span>
</div>
<div id="addstudent" style=" padding-left:0px; padding-right:0px; padding-top:0px; margin-top:50px; display: none;">
    <div class="row clearfix">
        <div class="col_12">
            <div class="widget clearfix">
                <h2>Add New student</h2>

                <div class="widget_inside"><br/>

                    <div class="col_12">
                        <form class="form" id="form2" action="<?php echo SITE_URL; ?>administrator/savestudent"
                              method="post">
                            <div class="clearfix">
                                <div class="input">
                                    <label style="width:51.6em;"> Name : <input type="text" name="name" id="name"
                                                                                class="validate[required]" value=""/>
                                </div>
                                <div class="input">
                                </div>
                            </div>
                            <div class="clearfix">
                                <div class="input">
                                    <label style="width:51.6em;"> Description : <input type="text" name="description"
                                                                                       id="description"
                                                                                       class="validate[required]"
                                                                                       value=""/>
                                </div>
                                <div class="input">
                                </div>
                            </div>
                            <div class="clearfix">
                                <div class="input">
                                    <label style="width:51.6em;"> Academic Description : <input type="text"
                                                                                                name="academic_performace"
                                                                                                id="academic_performace"
                                                                                                class="validate[required]"
                                                                                                value=""/>
                                </div>
                                <div class="input">
                                </div>
                            </div>

                            <div class="clearfix">
                                <div class="input">
                                    <label style="width:51.6em;"> Subject :
                                        <input type="hidden" name="sector" value="subject" >
                                        <select id="subject" name="subject[]" multiple="multiple">
                                            <?php
                                            echo '<option value="" ><---Select---> </option>';
                                            $result = mysql_query('SELECT * from category') or die(mysql_error());
                                            while ($row = mysql_fetch_assoc($result)) {
                                                echo '<option value="' . $row['name'] . '">' . $row['name'] . '</option>';
                                            }
                                            ?>
                                        </select></div>
                                <div class="input">
                                </div>
                            </div>
                            <br>

                            <div align="center" style="margin-left:50px;"><input type="submit" id="sub_btn" value="Add"
                                                                                 class="button blue"/>&nbsp;<input
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

<div id="editstudent" style="padding-left:0px; padding-right:0px; padding-top:0px; margin-top:50px; display:none;">
    <div class="row clearfix">
        <div class="col_12">
            <div class="widget clearfix">
                <h2>Edit student</h2>

                <div class="widget_inside">student<br/>

                    <div class="col_12">
                        <form class="form" id="form2" action="<?php echo SITE_URL; ?>administrator/editstudent"
                              method="post">
                            <input type="hidden" id="id" name="id"/>

                            <div class="clearfix">
                                <div class="input">
                                    <label style="width:53.7em;">Name : <input type="text"
                                                                               name="edit_name"
                                                                               id="edit_name"
                                                                               class="validate[required]"
                                                                               value=""/>&nbsp;</label>

                                </div>
                                <div class="input">
                                    <label style="width:53.7em;">Description : <input type="text"
                                                                                      name="edit_description"
                                                                                      id="edit_description"
                                                                                      class="validate[required]"
                                                                                      value=""/>&nbsp;</label>

                                </div>
                                <div class="input">
                                    <label style="width:53.7em;">Description : <input type="text"
                                                                                      name="edit_academic_performace"
                                                                                      id="edit_academic_performace"
                                                                                      class="validate[required]"
                                                                                      value=""/>&nbsp;</label>

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
                <h2>student Info</h2>

                <h2 style="float:right; margin=0px 35px 0px 0px; " onclick="add();">Add</h2>

                <div class="widget_inside"><br/>

                    <div class="col_12">
                        <table cellpadding="0" width="100%" cellspacing="0" border="0" class="dataTable" id="example">
                            <thead>
                            <tr>
                                <th width="20%">S.No</th>
                                <th width="20%">Name</th>
                                <th width="20%">Description</th>
                                <th width="20%">Academic Performace</th>
                                <th width="20%">Subject</th>

                                <th width="20%">Action</th>
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