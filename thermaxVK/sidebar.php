 <div class="page-sidebar-inner slimscroll">
	<div class="sidebar-header">
	</div>
	<?php
		//session_start();	 
		//print_r($_SESSION);
		if (isset($_SESSION['username']) && ($_SESSION['username']!='') && ($_SESSION['role']=='Initiator')) {
	?>
		<ul class="menu accordion-menu">                     
			<li id="menu_edash" class="active" onClick="menuClick(this)"><a href="edashboard.php" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-dashboard"></span><p>Send Invite</p></a></li>
			<li id="menu_vapp" onClick="menuClick(this)"><a href="view-application.php" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-align-justify"></span><p>View Applications</p></a></li>
			<li id="menu_eapp" onClick="menuClick(this)"><a href="existence-application.php" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-align-justify"></span><p>View Registered Vendors</p></a></li>
			<li id="menu_set" onClick="menuClick(this)"><a href="#" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-cog"></span><p>Settings</p></a></li>                     
		</ul>
	<?php
		}
		elseif (isset($_SESSION['username']) && ($_SESSION['username']!='') && ($_SESSION['role']=='Approver')) {
	?>
		<ul class="menu accordion-menu">                     
			<li id="menu_edash" onClick="menuClick(this)"><a href="view-application.php" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-align-justify"></span><p>View Applications</p></a></li>
		</ul>
	<?php
		}
		elseif (isset($_SESSION['username']) && ($_SESSION['username']!='') && (($_SESSION['role']=='Vendor') || ($_SESSION['role']=='vendor'))) {
	?>
		<ul class="menu accordion-menu">                     
			<li id="menu_vapp" onClick="menuClick(this)"><a href="myapplications.php" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-align-justify"></span><p>View Applications</p></a></li>
			<li id="menu_edash" class="active" onClick="menuClick(this)"><a href="registration.php" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-dashboard"></span><p>Registration</p></a></li>
			<li id="menu_vapp" onClick="menuClick(this)"><a href="#" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-align-justify"></span><p>Change Request</p></a></li>
			<li id="menu_set" onClick="menuClick(this)"><a href="changepassword.php" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-cog"></span><p>Change Password</p></a></li>                     
		</ul>
	<?php
		}
		elseif (isset($_SESSION['username']) && ($_SESSION['username']!='') && ($_SESSION['role']=='superadmin')) {
	?>
		<ul class="menu accordion-menu">                     
			<li id="menu_edash" class="active" onClick="menuClick(this)"><a href="edashboard.php" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-dashboard"></span><p>Send Invite</p></a></li>
			<li id="menu_vapp" onClick="menuClick(this)"><a href="view-application.php" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-align-justify"></span><p>View Applications</p></a></li>
			<li id="menu_eapp" onClick="menuClick(this)"><a href="existence-application.php" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-align-justify"></span><p>View Registered Vendors</p></a></li>
			<li id="menu_set" onClick="menuClick(this)"><a href="#" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-cog"></span><p>Settings</p></a></li>                     
		</ul>
	<?php
		}
		else {
	?>
		<ul class="menu accordion-menu">                     
			<li id="menu_edash" class="active" onClick="menuClick(this)"><a href="edashboard.php" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-dashboard"></span><p>Send Invite</p></a></li>
			<li id="menu_vapp" onClick="menuClick(this)"><a href="view-application.php" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-align-justify"></span><p>View Applications</p></a></li>
			<li id="menu_eapp" onClick="menuClick(this)"><a href="existence-application.php" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-align-justify"></span><p>View Registered Vendors</p></a></li>
			<li id="menu_set" onClick="menuClick(this)"><a href="#" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-cog"></span><p>Settings</p></a></li>                     
		</ul>
	<?php
		}
	?>
</div><!-- Page Sidebar Inner -->
<script src="assets/plugins/jquery/jquery-2.1.3.min.js"></script>
	
<script type="text/javascript">
	$(document).ready(
		function() {
		$('.menu li').removeClass('active');
		var $id3 = localStorage.getItem("contentPanel3");
		console.log( $id3);
		var prefix = 'menu_';
		if ($id3 != null) {
			if ($id3.startsWith(prefix)) {
				$('#' + $id3).addClass('active');
			}
		}
	});

	function menuClick(obj){	
		localStorage.setItem("contentPanel3","");
		console.log("Before Click "  + localStorage.getItem("contentPanel3"));
		$('.menu li').removeClass('active');
		$('.menu li li').removeClass('active');
		var contentPanelId3="" , contentPanelId2="" , contentPanelId1="";		
		contentPanelId3=obj;
		localStorage.setItem("contentPanel3",contentPanelId3.id);
		var $id3 = localStorage.getItem("contentPanel3");
		var prefix = 'menu_';
		if ($id3 != null) {
			if ($id3.startsWith(prefix)) {
				$('#' + $id3).addClass('active');
			}
		}				
	}
</script>
