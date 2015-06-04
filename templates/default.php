Servers:<br /><br />
<table class="table">
<?php
foreach($this->_['servers'] as $server) {
    ?>
    <tr><td><?php echo $server['name']; ?></td><td><?php echo $server['address'].':'.$server['port']; ?></td>
        <td><?php echo $server['status']; ?></td><td><?php echo $server['connections']; ?></td></tr>
<?php
}
?>
</table>