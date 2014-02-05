<script type="text/javascript" charset="utf-8">
    $(document).ready(function () {
        $('#example').dataTable({
            "bProcessing": true,
            "bServerSide": true,
            "bJQueryUI": true,
            "sAjaxSource": "<?php echo SITE_URL ;?>administrator/quiz_metadata/?ajax=1",
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

    function showCode() {
        $('#showtextbox').css('display', 'block');
        $('#upload').css('display', 'none');

    }
    function showUpload() {
        $('#showtextbox').css('display', 'none');
        $('#upload').css('display', 'block');

    }
</script>

<div id="titlediv">
    <div class="clearfix container" id="pattern">
        <div class="row">
            <div class="col_12">
                <h1>Quiz Data</h1>
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
                <h2>Quiz Info</h2>


                <div class="widget_inside"><br/>

                    <div class="col_12">
                        <table cellpadding="0" width="100%" cellspacing="0" border="0" class="dataTable" id="example">
                            <thead>
                            <tr>
                                <th width="10%">S.No</th>


                                <th width="10%">Points</th>
                                <th width="10%">Time</th>
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