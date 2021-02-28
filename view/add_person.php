<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add a Person</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form method="post" action="/home">
            <div class="modal-body">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">First name:</label>
                        <input type="text" name="f_name" class="form-control" id="recipient-name" required>
                        <div class="invalid-feedback" style="display: block; color:#fff">
                            <?=$error['f_name'] ?? null?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Last name:</label>
                        <input type="text" name="l_name" class="form-control" id="recipient-name" required>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Email:</label>
                        <input type="email" name="email" class="form-control" id="recipient-name" required>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Addreess:</label>
                        <input type="address" name="address" class="form-control" id="recipient-name" required>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Phone:</label>
                        <input type="phone" name="phone" class="form-control" id="recipient-name" required>
                    </div>
                    <div class="form-group text-center">
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" name="group" value="family" id="customRadioInline1" name="customRadioInline1" class="custom-control-input" required>
                            <label class="custom-control-label" for="customRadioInline1">Family</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" name="group" value="friend" id="customRadioInline2" name="customRadioInline2" class="custom-control-input" required>
                            <label class="custom-control-label" for="customRadioInline2">Friend</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" name="group" value="businness" id="customRadioInline3" name="customRadioInline3" class="custom-control-input" requireds>
                            <label class="custom-control-label" for="customRadioInline3">Businness</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Notes:</label>
                        <textarea name="notes" class="form-control" id="message-text" required></textarea>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-close" data-dismiss="modal">Close</button>
                <button type="submit" name="add" class="btn btn-save">Save</button>
            </div>
        </form>
        </div>
    </div>
</div>