<script type="text/javascript" charset="utf-8">
    $(document).ready(function () {
        $('#example').dataTable({
            "bProcessing": true,
            "bServerSide": true,
            "bJQueryUI": true,
            "sAjaxSource": "<?php echo SITE_URL ;?>administrator/category/?ajax=1",
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
    function update_category(id, name,teacher) {
        $('#addcategory').css('display', 'none');
        $('#editcategory').css('display', 'block');
        $('#id').val(id);
        $('#edit_name').val(name);
        $('#edit_teacher').val(teacher);

    }


    //for Cancel Edit
    function cancel() {
        $('#addcategory').css('display', 'none');
        $('#editcategory').css('display', 'none');

    }

    function n() {
        $('#addcategory').css('display', 'none');
        $('#editcategory').css('display', 'none');

    }
    function add() {
        $('#addcategory').css('display', 'block');
        $('#editcategory').css('display', 'none');

    }
    //for Delete Category
    function delete_category(id) {
        var answer = confirm("Are you sure you want to delete this ?");
        <?php ?>if (answer) {
            window.top.location = "<?php echo SITE_URL;?>administrator/deletecategoryById/" + id + "/<?php echo time();?>";
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
                <h1>Category</h1>
            </div>
        </div>
    </div>
</div>
<?php ?>
<div id="msg" <?php echo $display; ?>>
    <span <?php echo $class; ?> > <?php echo $Msg; ?> </span>
</div>
<div id="addcategory" style=" padding-left:0px; padding-right:0px; padding-top:0px; margin-top:50px; display: none;">
    <div class="row clearfix">
        <div class="col_12">
            <div class="widget clearfix">
                <h2>Add New Category</h2>

                <div class="widget_inside"><br/>

                    <div class="col_12">
                        <form class="form" id="form2" action="<?php echo SITE_URL; ?>administrator/saveCategory"
                              method="post">
                            <div class="clearfix">
                                <div class="input">
                                    <label style="width:51.6em;"> Name : <input type="text" name="name" id="name"
                                                                                class="validate[required]" value=""/>
                                </div>

                                <div class="input">
                                    <label style="width:51.6em;"> Teacher :<select id="teacher" name="teacher">
                                                                <?php

                                                                echo '<option value="" ><---Select---> </option>';
                                                                $result = mysql_query('SELECT * from teacher') or die(mysql_error());
                                                                while ($row = mysql_fetch_assoc($result)) {

                                                                    echo '<option value="' . $row['name'] . '">' . $row['name'] . '</option>';

                                                                }

                                                                ?>
                                                            </select>
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

<div id="editcategory" style="padding-left:0px; padding-right:0px; padding-top:0px; margin-top:50px; display:none;">
    <div class="row clearfix">
        <div class="col_12">
            <div class="widget clearfix">
                <h2>Edit Category</h2>

                <div class="widget_inside">category<br/>

                    <div class="col_12">
                        <form class="form" id="form2" action="<?php echo SITE_URL; ?>administrator/editcategory"
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

                            <div class="clearfix">
                                <div class="input">
                                    <label style="width:51.6em;"> Teacher :<select id="edit_teacher" name="edit_teacher">
                                                                                                                  <?php
                                              echo '<option value="" ><---Select---> </option>';
                                             $result = mysql_query('SELECT * from teacher') or die(mysql_error());
                                             while ($row = mysql_fetch_assoc($result)) {
                                                  echo '<option value="' . $row['name'] . '">' . $row['name'] . '</option>';
                                              }
                                              ?>
                                                                                                             </select>
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
                <h2>category Info</h2>

                <h2 style="float:right; margin=0px 35px 0px 0px; " onclick="add();">Add</h2>

                <div class="widget_inside"><br/>

                    <div class="col_12">
                        <table cellpadding="0" width="100%" cellspacing="0" border="0" class="dataTable" id="example">
                            <thead>
                            <tr>
                                <th width="20%">S.No</th>
                                <th width="20%">Name</th>
                                <th width="20%">Teacher</th>

                                <th width="20%">Added Date</th>
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