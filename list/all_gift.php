<h5>Gifts</h5>
<table class="table table-sm table-striped">
    <thead class="thead-light">
        <tr>
            <th>Rank</th>
            <th>Item</th>
            <th>Price</th>
            <th>Quantity</th>
            <th></th>
        </tr>
    </thead>
    <tbody id="accordion">
        <?php 
        $res = $list_class->getGift($list_id); 
        while($row = $res->fetch(PDO::FETCH_ASSOC)) 
        {   
            $gift_id = $row["gift_id"]; 
            $ranking = $row["ranking"];
            $gift_image = $row["gift_image"]; 
            $gift_name = $row["gift_name"];
            $price = $row["price"];
            $quantity = $row["quantity"]; 
            $where_to_buy = $row["where_to_buy"]; 
            $detail = $row["detail"]; 
            
            $website_link = $row["website_link"];
            $str_website = is_null($website_link) ? "" : "<a class='btn btn-info btn-sm py-0' href='//$website_link' target='_blank'>Website</a>" ;

        ?>
        <tr>
            <td class="align-middle"><input class="star_ranking rating-loading" type="text" value="<?= $ranking; ?>" data-hover-enabled="false" data-display-only="true" /></td>
            <td class="align-middle">
                <div class="d-flex">
                    <img class="border" src="/giftlist/<?= $gift_image."?d=".date("YmdHis"); ?>" width="60" height="60">
                    <div class="ml-3">
                        <?= $gift_name; ?>
                        <br>
                        <?= $str_website; ?>
                    </div>
                </div>
            </td>
            <td class="align-middle">RM <?= $price; ?></td>
            <td class="align-middle"><?= $quantity; ?></td>
            <td class="align-middle pointer" data-toggle="collapse" data-target="#gift_info<?= $gift_id; ?>"><i class="fas fa-chevron-down"></i></td>
        </tr>
        <tr class="collapse border" id="gift_info<?= $gift_id; ?>" data-parent="#accordion">
            <td colspan="5">
                <?php include 'exist_gift_form.php'; ?>
            </td>
        </tr>


        <?php 
        }//===== end while loop =====//

        ?>
    </tbody>
</table>
