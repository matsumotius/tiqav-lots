<!DOCTYPE html>
<html>
<head>
  <?php echo $this->Html->charset(); ?>
  <title>tiqavくじ</title>
  <?php
    echo $this->Html->css('bootstrap');
    echo $this->Html->css('generic');
    echo $this->Html->script('jquery-1.7.2.min.js');
    echo $this->Html->script('generic');

    echo $this->fetch('meta');
    echo $this->fetch('css');
    echo $this->fetch('script');
  ?>
</head>
<body>
  <div id="wrapper">
    <header>
      <div class="title">
        <a href="<?php echo HOST; ?>"><h1>tiqavくじ</h1></a>
        <div id="about_this">話が噛み合ったら1万点</div>
      </div>
      <?php echo $this->element('socialbutton'); ?>
    </header>
    <div id="content">
      <?php echo $this->fetch('content'); ?>
    </div>
    <footer>
      <div class="contact">
        <span id="twitter">@myatsumoto</div>
      </div>
    </footer>
  </body>
</html>
