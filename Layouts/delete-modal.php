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
                    <form action="routes.php?action=delete" method="post" id="confirm_delete_form">
                        <input type="hidden" id="id" name="id">
                        <button class="btn btn-danger" name="delete" type="submit" id="confirm_delete_btn">YES <img
                                src="images/spin.svg" class="hide_spinner"></button>
                        <button data-dismiss="modal" class="btn btn-primary">NO</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>