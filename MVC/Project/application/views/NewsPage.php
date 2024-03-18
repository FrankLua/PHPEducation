<div class='slider'>
    <img src="/application/views/images/page/Publications.jpg" alt="">
</div>


<div class="page-header">
    <h1> "<?php echo ucfirst($data->title) ?>"</h1>
</div>
<div class="page-main">
    <p><?php echo $data->content ?></p>
</div>
<div class="page-footer">
    <h3>Author: <?php echo $data->author?></h3>
    <h3>Date: <?php echo $data->date?></h3>
</div>