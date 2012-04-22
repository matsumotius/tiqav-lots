<?php
    echo $this->Html->css('index');
?>
<div id="latest">
  <h3>最近のくじ</h3>
  <?php echo $this->element('slide', array('lots' => $lots)); ?>
</div>
<div id="input-container">
  <form action="<?php echo HOST; ?>/lots" method="POST">
    <button class="btn post">tiqavくじをひく</button>
  </form>
</div>
