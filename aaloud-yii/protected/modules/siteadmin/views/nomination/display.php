<script type="text/javascript">
function deletedata(nominationId,nominationfor,curr_genere)
    {
		//alert(nominationId);
		 var param = "nominationId=" + nominationId+"&nominationfor="+nominationfor+"&curr_genere="+curr_genere;
				//alert( param );		
			ajaxRequest = $.ajax({
                url: "<?php echo CController::createUrl("nomination/deleteData");  ?>",
                type: 'POST',
                data: param,
				error: function(){
				alert('error');
                  //error message here
                },
                success: function(data){
				 $('#datalist').html(data);
				//read return javascript variable here;
                }       
            });
	 
      }

</script>
<table>
											<tr>
											<th>GENERE</th>
											<th>NOMINATION_FOR</th>
											<th>CONTENT_ID</th>
											<th>ACTION</th>
											</tr>
											<?php
											for($i=0;$i<count($result);$i++)
											{ ?>
								<tr>
								<td><?php echo $result[$i]['GENERE']; ?></td>
								<td><?php echo $result[$i]['NOMINATION_FOR'];; ?></td>
								<td><?php echo $result[$i]['CONTENT_ID'];; ?></td>
								<td><a href="#" onClick="deletedata(<?php echo $result[$i]['NOMINATION_ID']; ?>,'<?php echo $result[$i]['NOMINATION_FOR']; ?>','<?php echo $result[$i]['GENERE']; ?>')">
										<span class="txt_fff txt_upper vote inlineb">delete</span>
										</a>
								</td>
							</tr>
							<?php 
								}
							?>
							</table>
