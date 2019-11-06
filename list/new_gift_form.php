<form method="POST" action="create_gift.php" enctype="multipart/form-data">
    <div class="d-flex">
        <h5 class="strong"><u>New Gift</u></h5>
        <button class="btn btn-success btn-sm ml-3" type="submit">Save</button>
        <button class="btn btn-danger btn-sm ml-2" type="reset" onclick="$('image_preview0').attr('src','')">Cancel</button>
    </div>
    
    <input type="hidden" name="gift_id" value="0" />
    <input type="hidden" name="list_id" value="<?= $list_id; ?>" />
    <div class="mt-3 row">
        <div class="col-8">
            <div class="form-group row">
                <label class="col-3 text-right" for="gift_name0">Gift name:</label>
                <div class="col-7">
                    <input class="form-control form-control-sm" type="text" name="gift_name" id="gift_name0" />
                </div>
            </div>

            <div class="form-group row">
                <label class="col-3 text-right" for="quantity0">Quantity:</label>
                <div class="col-3 input-group input-group-sm">
                    <div class="input-group-prepend">
                        <button class="input-group-text" type="button" onclick="minusQuantity($(this).parents('.input-group-prepend').siblings('input.quantity'))"><i class="fas fa-minus"></i></button>
                    </div>
                    <input class="form-control form-control-sm text-center quantity" type="text" name="quantity" value="1" id="quantity0" onchange="checkQuantity($(this))" required />
                    <div class="input-group-append">
                        <button class="input-group-text" type="button" onclick="addQuantity($(this).parents('.input-group-append').siblings('input.quantity'))"><i class="fas fa-plus"></i></button>
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-3 text-right" for="price0">Price:</label>
                <div class="col-7">
                    <input class="form-control form-control-sm" type="text" name="price" id="price0" required />
                </div>
            </div>

            <div class="form-group row">
                <label class="col-3 text-right" for="ranking0">Ranking:</label>
                <div class="col-7">
                    <input class="star_ranking rating-loading" type="text" name="ranking" id="ranking0" value="" required />
                </div>
            </div>

            <div class="form-group row">
                <label class="col-3 text-right" for="where_to_buy0">Where to buy:</label>
                <div class="col-7">
                    <input class="form-control form-control-sm" type="text" name="where_to_buy" id="where_to_buy0" />
                </div>
            </div>

            <div class="form-group row">
                <label class="col-3 text-right" for="detail0">Detail:</label>
                <div class="col-7">
                    <textarea class="form-control form-control-sm noresize" type="text" name="detail" id="detail0"></textarea>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-3 text-right" for="website_link0">Website link:</label>
                <div class="col-7">
                    <input class="form-control form-control-sm" type="text" name="website_link" id="website_link0" />
                </div>
            </div>
        </div>

        <div class="col-3">
            <label for="image0">Select image:</label>
            <input class="form-control form-control-sm" type="file" name="image" id="image0" onchange="readURL(this, 'image_preview0')" accept="image/*" />
            <hr class="my-2">
            <p class="m-0 mb-1">Image preview: </p>
            <img class="mx-auto border" src="" id="image_preview0" height="200" width="140">
        </div>
        
        
    </div>

</form>
