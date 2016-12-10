

<tr>
<td><?php echo $data->CONTAINER_LOCATION; ?></td>
<td><?php echo $data->CONTAINER_NAME; ?></td>
<td align="center"><?php echo CHtml::link('Manage', CController::createUrl('TblContainerMaster/updatecont?id='.$data->CONTAINER_ID), array('class'=>'report')); ?></td>
</tr>
               