<style>
    .header {
        text-align: center;
    }
    .container {
        text-align: center;
        font-size: 30px;
    }
    .item {
        padding: 10px;
    }
</style>

<div>
    <div class="header">
        <h1>Welcome Peasants</h1>
        <div>
            <h3>Who are you??</h3>
        </div>
    </div>

    <div class="container">
        <div class="item">
            <a href="<?php echo url('/lists') ?>">Admin</a>
        </div>
        <div class="item">
            <a href="<?php echo url('/staff') ?>">Staff</a>
        </div>
    </div>

</div>