<?php require_once 'nav.php'; ?>
<div class="container">
    <select class="form-control form-control-sm" id="service_body_id" name="service_body_id">
        <option value="-1">-= Select A Service Body =-</option>
        <option value="0">All</option>
        <?php
        $serviceBodies = getServiceBodyDetailForUser();
        sort_on_field($serviceBodies, 'name');
        foreach ($serviceBodies as $item) {?>
            <option value="<?php echo $item->id ?>"><?php echo $item->name ?></option>
            <?php
        }?>
    </select>
    <div id="reports"></div>
</div>
<script type="text/javascript" src="vendor/moment/min/moment.min.js"></script>
<script type="text/javascript" src="vendor/plotly.js-dist/plotly.js"></script>
<?php require_once 'footer.php'; ?>
<script type="text/javascript">$(function(){reportsPage()})</script>
