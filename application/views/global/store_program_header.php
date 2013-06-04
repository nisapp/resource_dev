<?php 
$session_data = $this->session->userdata('client_login');
?>
<div class="siteHeader">
	<!-- logo -->
	<div class="logo">
		<h3><a href="<?php echo base_url(); ?>">Logo</a></h3>
	</div>
	<!-- /logo -->
	<!-- header right -->
	<div class="siteHeaderRight homeRight">
            <div class="sponsor">
                Your Sponsor :  <a href="#"> Sponsor Name</a>
            </div>
            <nav class="headertop">
                <ul>
                    <li><a href="#">Welcome <b><?php echo $session_data['fullname']; ?></b></a></li>
                    <li><a href="<?php echo base_url()?>clientadmin/setting">Edit Profile</a></li>
                    <li><a class="last" href="<?php echo base_url()?>clientadmin/clientdashboard/logout">Logout</a></li>
                </ul>
            </nav>
	</div>
	<!-- /header right -->
</div>
 