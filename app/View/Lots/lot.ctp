<?php
  echo $this->Html->css('lot');
  echo $this->Html->script('lot');
?>
<?php
  $message = (isset($user)) ? 'もういちどtiqavくじをひく' : 'tiqavくじをひいてみる';
  echo $this->element('post', array('message' => $message));
?>
<div id='lot'>
  <ul id='tiqav-list'>
    <li class='tiqav'>
      <img src='http://tiqav.com/<?php echo $lot['Lot']['first']; ?>.jpg' />
    </li>
    <li class='tiqav'>
      <img src='http://tiqav.com/<?php echo $lot['Lot']['second']; ?>.jpg' />
    </li>
  </ul>
  <p class='clear'>
</div>
