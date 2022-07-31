php<div style="display: inline">

</div>
<form method="post" action="open_activity.php">

<span style="display: inline">
    <span ><select name="product" class="primary"  style=" margin:25px;width: 50%;height:40px;background-color:#cfefef ;padding-right: 25px" >
        <?php

        foreach ($products as $product){
            ?>
            <option   value="<?=$product['id'] ?>"  style="height:40px;padding-right: 25px" ><?=$product['name'] ?></option>

        <?php } ?>

    </select></span>
    <span >    <input value="  انتخاب محصول" class="btn btn-success" type="submit">
    </span>

</span>
</form>

