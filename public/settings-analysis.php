<?php
use App\Model\Settings\SettingsAnalysisModel;

require_once "../vendor/autoload.php";

if (isset($_POST['save'])) {

    $data = (object)$_POST['formData'];
    SettingsAnalysisModel::processForm($data, 'save');
}


Helper::head();
Helper::css('css/setting-analysis.css');
Helper::js('js/settings/settings-analysis.js');
Helper::endHead();


Helper::body();
Helper::header();
Helper::navigation();
Helper::subNavigation();

?>


<!--website header ends here
==============================-->
<div class="hero container-fluid">
    <div class="row text-center">
        <h1>SETTINGS > <span class="h3">ANALYSIS LIST</span></h1>
    </div>
</div>

<!--website main content starts here
==============================-->
<main class="container">
    <div class="row">
        <div class="col-xs-12 buton">
            <button data-toggle="modal" data-target="#new_analysis_modal" class="btn btn-primary"><b>NEW +</b></button>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th class="text-center">REFERENCE</th>
                        <th class="text-center">NAME</th>
                        <th class="text-center">OPTIONS</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php
                    $analysis_list = SettingsAnalysisModel::findAll();
                    foreach ($analysis_list as $list_item):
                        ?>
                        <tr id="analysis_list">
                            <td class="reference text-center"><?= $list_item->reference; ?></td>
                            <td class="name"><?= $list_item->name; ?></td>
                            <td class="text-center">
                                <button data-toggle="modal" data-analysisid="<?= $list_item->analysis_id ?>"
                                        data-userid="<?= $list_item->user_id ?>" class="btn btn-primary edit_btn">EDIT
                                </button>
                                <button data-toggle="modal" data-analysisid="<?= $list_item->analysis_id ?>"
                                        data-userid="<?= $list_item->user_id ?>" class="btn btn-primary delete_btn">
                                    DELETE
                                </button>
                            </td>
                        </tr>
                    <?php endforeach; ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

</main>
<!--website main content ends here
==============================-->


<!--confirm modal starts here
======================================-->

<div class="modal fade" id="confirm_modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header danger">
                <button class="close" data-dismiss="modal">&times;</button>
                <h3>CONFIRM</h3>
            </div>
            <div class="modal-body">
                <br><br>
                <p class="lead text-center"><b>ARE YOU SURE YOU WANT TO DELETE THIS RECORD ?</b></p>


                <div class="form-group modal_buttons text-right">
                    <button class="btn btn-danger" id="confirm_delete_btn">YES</button>
                    <button data-dismiss="modal" class="btn btn-primary">NO</button>
                </div>

            </div>
        </div>
    </div>
</div>


<!--confirm modal ends here
======================================-->


<!--new modal starts here
========================================-->

<div class="modal fade" id="new_analysis_modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" data-dismiss="modal">&times;</button>
                <h3>NEW ANALYSIS</h3>
            </div>

            <div class="modal-body clearfix">
                <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">

                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <div class="col-xs-5">
                                <label for="reference">REFERANCE</label>
                            </div>
                            <div class="col-xs-7">
                                <input type="text" autofocus class="form-control" id="reference"
                                       name="formData[reference]">
                            </div>

                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <div class="col-xs-5">
                                <label for="name">NAME</label>
                            </div>
                            <div class="col-xs-7">
                                <input type="text" class="form-control" id="name" name="formData[name]">
                            </div>
                        </div>
                    </div>
                    <!--first two fields ends here
===============================-->

                    <div class="form-group modal_buttons text-right">
                        <button type="submit" name="save" class="btn btn-primary">ADD</button>
                        <button data-dismiss="modal" class="btn btn-primary">CLOSE</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<!--new modal ends here
========================================-->


<!--edit modal starts here
========================================-->

<div class="modal fade" id="analysis_edit_modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" data-dismiss="modal">&times;</button>
                <h3>EDIT ANALYSIS</h3>
            </div>

            <div class="modal-body clearfix">
                <form action="<?php echo $_SERVER['PHP_SELF'] ?>" id="analysis_update_form">

                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <div class="col-xs-5">
                                <label for="reference">REFERENCE</label>
                            </div>
                            <div class="col-xs-7">
                                <input type="text" class="form-control" id="reference" name="formData[reference]">
                            </div>

                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <div class="col-xs-5">
                                <label for="name">NAME</label>
                            </div>
                            <div class="col-xs-7">
                                <input type="text" class="form-control" id="name" name="fromData[name]">
                            </div>
                        </div>
                    </div>

                    <div class="form-group modal_buttons text-right">
                        <button type="submit" class="btn btn-primary">UPDATE</button>
                        <button data-dismiss="modal" class="btn btn-primary">CLOSE</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<!--edit modal ends here
========================================-->


<!--website footer starts here
==============================-->
<footer class="container-fluid">
    <div class="row text-center">
        <small>COPYRIGHT SIMPLE ACCOUNTS &copy; ALL RIGHTS RESERVED.</small>
    </div>
</footer>
<!--website footer ends here
==============================-->
</body>

</html>