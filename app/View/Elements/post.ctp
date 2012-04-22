<?php 
    $message = (isset($message)) ? $message : 'tiqavくじをひく';
?>
<form action='<?php echo HOST; ?>/lots' method='POST'>
  <button class="btn post"><?php echo $message; ?></button>
</form>
