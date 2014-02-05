<script type="text/javascript" charset="utf-8">
    $(document).ready(function () {
        $('#example').dataTable({
            "bProcessing": true,
            "bServerSide": true,
            "bJQueryUI": true,
            "sAjaxSource": "<?php echo SITE_URL ;?>administrator/teacher/?ajax=1",
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
    // for update teacher
    function update_teacher(id, name,designation,email,description) {
        $('#addteacher').css('display', 'none');
        $('#editteacher').css('display', 'block');
        $('#id').val(id);
        $('#edit_name').val(name);
        $('#edit_designation').val(designation);
        $('#edit_email').val(email);
        $('#edit_description').val(description);

    }


    //for Cancel Edit
    function cancel() {
        $('#addteacher').css('display', 'none');
        $('#editteacher').css('display', 'none');

    }

    function n() {
        $('#addteacher').css('display', 'none');
        $('#editteacher').css('display', 'none');

    }
    function add() {
        $('#addteacher').css('display', 'block');
        $('#editteacher').css('display', 'none');

    }
    //for Delete teacher
    function delete_teacher(id) {
        var answer = confirm("Are you sure you want to delete this ?");
        <?php ?>if (answer) {
            window.top.location = "<?php echo SITE_URL;?>administrator/deleteteacherById/" + id + "/<?php echo time();?>";
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
                <h1>teacher</h1>
            </div>
        </div>
    </div>
</div>
<?php ?>
<div id="msg" <?php echo $display; ?>>
    <span <?php echo $class; ?> > <?php echo $Msg; ?> </span>
</div>
<div id="addteacher" style=" padding-left:0px; padding-right:0px; padding-top:0px; margin-top:50px; display: none;">
    <div class="row clearfix">
        <div class="col_12">
            <div class="widget clearfix">
                <h2>Add New teacher</h2>

                <div class="widget_inside"><br/>

                    <div class="col_12">
                        <form class="form" id="form2" action="<?php echo SITE_URL; ?>administrator/saveteacher"
                              method="post">
                            <div class="clearfix">
                                <div class="input">
                                    <label style="width:51.6em;"> Name : <input type="text" name="name" id="name"
                                                                                class="validate[required]" value=""/>
                                </div>
                                <div class="input">
                                </div>
                            </div>
                            <br>

                            <div class="clearfix">
                                <div class="input">
                                    <label style="width:51.6em;"> Designation : <input type="text" name="designation" id="designation"
                                                                                class="validate[required]" value=""/>
                                </div>
                                <div class="input">
                                </div>
                            </div>
                            <br>

                            <div class="clearfix">
                                <div class="input">
                                    <label style="width:51.6em;"> Email : <input type="text" name="email" id="email"
                                                                                class="validate[required]" value=""/>
                                </div>
                                <div class="input">
                                </div>
                            </div>
                            <br>

                            <div class="clearfix">
                                <div class="input">
                                    <label style="width:51.6em;"> Description : <input type="text" name="description" id="description"
                                                                                class="validate[required]" value=""/>
                                </div>
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

<div id="editteacher" style="padding-left:0px; padding-right:0px; padding-top:0px; margin-top:50px; display:none;">
    <div class="row clearfix">
        <div class="col_12">
            <div class="widget clearfix">
                <h2>Edit teacher</h2>

                <div class="widget_inside">teacher<br/>

                    <div class="col_12">
                        <form class="form" id="form2" action="<?php echo SITE_URL; ?>administrator/editteacher"
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
                            </div>
                            <br><div class="clearfix">
                                <div class="input">
                                    <label style="width:53.7em;">Designation : <input type="text"
                                       name="edit_designation"
                                       id="edit_designation"
                                       class="validate[required]"
                                       value=""/>&nbsp;</label>

                                </div>
                            </div>
                            <br><div class="clearfix">
                                <div class="input">
                                    <label style="width:53.7em;">Email : <input type="text"
                                       name="edit_email"
                                       id="edit_email"
                                       class="validate[required]"
                                       value=""/>&nbsp;</label>

                                </div>
                            </div>
                            <br><div class="clearfix">
                                <div class="input">
                                    <label style="width:53.7em;">Description : <input type="text"
                                       name="edit_description"
                                       id="edit_description"
                                       class="validate[required]"
                                       value=""/>&nbsp;</label>

                                </div>
                            </div>
                            <br>
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
                <h2>teacher Info</h2>

                <h2 style="float:right; margin=0px 35px 0px 0px; " onclick="add();">Add</h2>

                <div class="widget_inside"><br/>

                    <div class="col_12">
                        <table cellpadding="0" width="100%" cellspacing="0" border="0" class="dataTable" id="example">
                            <thead>
                            <tr>
                                <th width="20%">S.No</th>
                                <th width="20%">Name</th>
                                <th width="20%">Designation</th>
                                <th width="20%">Email</th>

                                <th width="20%">Description</th>
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