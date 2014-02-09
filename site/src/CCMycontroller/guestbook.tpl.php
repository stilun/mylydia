<h2>My Guestbook</h2>
<p>Leave a message and be happy.</p>

<?=$form->GetHTML()?>

<h3>Latest messages</h3>

<?php foreach($entries as $val):?>
<div style='background-color:#f6f6f6;border:1px solid #ccc;margin-bottom:1em;padding:1em;'>
  <p>At: <?=$val['created']?></p>
<p><?=htmlent($val['entry'])?></p>
</div>
<?php endforeach;?>
