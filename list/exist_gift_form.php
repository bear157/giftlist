<form method="POST" action="update_gift.php" enctype="multipart/form-data">
    <?php
    if($is_owner)
    {
    ?>
    <div class="d-flex">
        <button class="btn btn-success btn-sm ml-3" type="submit">Save</button>
        <button class="btn btn-danger btn-sm ml-2" type="reset" onclick="$('image_preview0').attr('src','')">Cancel</button>
    </div>

    <?php
    } // end if
    ?>
    <fieldset <?= ($is_owner) ? "" : "disabled"; ?>>
    <input type="hidden" name="gift_id" value="<?= $gift_id ?>" />
    <input type="hidden" name="list_id" value="<?= $list_id; ?>" />
    <div class="mt-3 row">
        <div class="col-8">
            <div class="form-group row">
                <label class="col-3 text-right" for="gift_name<?= $gift_id; ?>">Gift name:</label>
                <div class="col-7">
                    <input class="form-control form-control-sm" type="text" name="gift_name" id="gift_name<?= $gift_id; ?>" value="<?= $gift_name; ?>" />
                </div>
            </div>

            <div class="form-group row">
                <label class="col-3 text-right" for="quantity<?= $gift_id; ?>">Quantity:</label>
                <div class="col-3 input-group input-group-sm">
                    <div class="input-group-prepend">
                        <button class="input-group-text" type="button" onclick="minusQuantity($(this).parents('.input-group-prepend').siblings('input.quantity'))"><i class="fas fa-minus"></i></button>
                    </div>
                    <input class="form-control form-control-sm text-center quantity" type="text" name="quantity" value="<?= $quantity; ?>" id="quantity<?= $gift_id; ?>" onchange="checkQuantity($(this))" required />
                    <div class="input-group-append">
                        <button class="input-group-text" type="button" onclick="addQuantity($(this).parents('.input-group-append').siblings('input.quantity'))"><i class="fas fa-plus"></i></button>
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-3 text-right" for="price<?= $gift_id; ?>">Price:</label>
                <div class="col-7">
                    <input class="form-control form-control-sm" type="text" name="price" value="<?= $price; ?>" id="price<?= $gift_id; ?>" required />
                </div>
            </div>

            <div class="form-group row">
                <label class="col-3 text-right" for="ranking<?= $gift_id; ?>">Ranking:</label>
                <div class="col-7">
                    <input class="star_ranking rating-loading" type="text" name="ranking" id="ranking<?= $gift_id; ?>" value="<?= $ranking; ?>" required <?= ($is_owner) ? "" : "data-display-only='true'"; ?> />
                </div>
            </div>

            <div class="form-group row">
                <label class="col-3 text-right" for="where_to_buy<?= $gift_id; ?>">Where to buy:</label>
                <div class="col-7">
                    <input class="form-control form-control-sm" type="text" name="where_to_buy" value="<?= $where_to_buy; ?>" id="where_to_buy<?= $gift_id; ?>" required />
                </div>
            </div>

            <div class="form-group row">
                <label class="col-3 text-right" for="detail<?= $gift_id; ?>">Detail:</label>
                <div class="col-7">
                    <textarea class="form-control form-control-sm noresize" type="text" name="detail" id="detail<?= $gift_id; ?>"><?= $detail; ?></textarea>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-3 text-right" for="website_link<?= $gift_id; ?>">Website link:</label>
                <div class="col-7">
                    <input class="form-control form-control-sm" type="text" name="website_link" value="<?= $website_link; ?>" id="website_link<?= $gift_id; ?>" />
                </div>
            </div>
        </div>

        <div class="col-3">
            <?php
            if($is_owner)
            {
            ?>
            <label for="image0">Select image:</label>
            <input class="form-control form-control-sm" type="file" name="image" id="image<?= $gift_id; ?>" onchange="readURL(this, 'image_preview<?= $gift_id; ?>')" accept="image/*" />
            <hr class="my-2">
            <?php
            } // end if
            ?>
            <p class="m-0 mb-1">Image preview: </p>
            <img class="mx-auto border" src="/giftlist/<?= $gift_image."?d=".date("YmdHis"); ?>" id="image_preview<?= $gift_id; ?>" height="200" width="140">
        </div>
        
    
    </div>
    </fieldset>

</form>
