<?php
use App\Helpers\Helper;
use App\Helpers\LayoutHelper;
use App\Model\Settings\SettingsAnalysisModel;

require_once "../vendor/autoload.php";

LayoutHelper::head();
LayoutHelper::css('css/setting-analysis.css');
LayoutHelper::js('js/settings/settings-analysis.js');
LayoutHelper::endHead();


LayoutHelper::body();
LayoutHelper::header();
LayoutHelper::navigation();
LayoutHelper::subNavigation();

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
            <button id="new_btn" data-toggle="modal" data-target="#new_analysis_modal" class="btn btn-primary"><b>NEW
                    +</b></button>
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
                    <tbody id="analysis_list_body">

                    <?php
                    $analysis_list = SettingsAnalysisModel::findAll();
                    foreach ($analysis_list as $list_item):
                        ?>
                        <tr id="analysis_list">
                            <td class="reference text-center"><?= Helper::number_format($list_item->analysis_id, 5) ?></td>
                            <td class="name"><?= $list_item->name; ?></td>
                            <td class="text-center">
                                <button data-toggle="modal"
                                        data-analysisid="<?= Helper::number_format($list_item->analysis_id, 5) ?>"
                                        class="btn btn-primary edit_btn">EDIT
                                </button>
                                <button data-toggle="modal" data-id="<?= $list_item->analysis_id ?>"
                                        class="btn btn-primary delete_btn">
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
                <form action="routes.php?action=save" method="post" id="new_analysis_form">

                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <div class="col-xs-5">
                                <label for="reference">REFERENCE</label>
                            </div>
                            <div class="col-xs-7">
                                <input type="text" disabled class="form-control" id="reference">
                            </div>

                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <div class="col-xs-5">
                                <label for="name">NAME</label>
                            </div>
                            <div class="col-xs-7">
                                <input type="text" autofocus class="form-control" minlength="3" id="name" name="name">
                            </div>
                        </div>
                    </div>
                    <!--first two fields ends here
===============================-->

                    <div class="form-group modal_buttons text-right">
                        <button type="submit" name="save" class="btn btn-primary">ADD <img class="hide_spinner"
                                                                                           src="images/spin.svg">
                        </button>
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
                <form action="routes.php?action=update" id="analysis_update_form" method="post">

                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <div class="col-xs-5">
                                <label for="reference">REFERENCE</label>
                            </div>
                            <div class="col-xs-7">
                                <input type="text" readonly class="form-control" id="analysis_id"
                                       name="analysis_id">
                            </div>

                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <div class="col-xs-5">
                                <label for="name">NAME</label>
                            </div>
                            <div class="col-xs-7">
                                <input type="text" autofocus class="form-control" id="name" name="name">
                            </div>
                        </div>
                    </div>

                    <div class="form-group modal_buttons text-right">
                        <button type="submit" name="update" class="btn btn-primary">UPDATE <img src="images/spin.svg"
                                                                                                class="hide_spinner">
                        </button>
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