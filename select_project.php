<div style="display: inline">

</div>
<form method="get" action="">

<span style="display: inline">
    <span ><select name="project" class="primary"  style=" margin:25px;width: 50%;height:40px;background-color:#cfefef ;padding-right: 25px" >
        <?php

        foreach (get_projects() as $project){
            ?>
            <option   value="<?=$project['id'] ?>"  style="height:40px;padding-right: 25px" ><?=$project['name'] ?></option>

        <?php } ?>

    </select></span>
    <span >    <input value=" انتخاب پروژه" class="btn btn-success" type="submit">
    </span>

</span>
</form>
