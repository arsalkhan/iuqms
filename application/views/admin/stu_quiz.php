<script type="text/javascript" charset="utf-8">
    $(document).ready(function () {
        $('#example').dataTable({
            "bProcessing": true,
            "bServerSide": true,
            "bJQueryUI": true,
            "sAjaxSource": "<?php echo SITE_URL ;?>administrator/stu_quiz/?ajax=1",
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
                <h1>stu_quiz</h1>
            </div>
        </div>
    </div>
</div>
<?php ?>
<div id="msg" <?php echo $display; ?>
<span <?php echo $class; ?> > <?php echo $Msg; ?> </span>
</div>
<div class="container" id="actualbody">
    <div class="row clearfix">
        <div class="col_12">
            <div class="widget clearfix">
                <h2>stu_quiz Info</h2>



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