<div class="siteHeader">
	<!-- logo -->
	<div class="logo">
		<h3><a href="<?php echo base_url(); ?>">Logo</a></h3>
	</div>
	<!-- /logo -->
	<!-- header right -->
	<div class="siteHeaderRight">
            <?php 
            $session_data = $this->session->userdata('client_login');
            if(empty($session_data)):
            ?>
	   <!--<form id="login" method="post" action="<?php // echo base_url();?>login"> 
		   <input type="text" class="memberLogin" value="Member's Login" onfocus="this.value=&#39;&#39;;this.style.color=&#39;#000&#39;;this.onfocus=&#39;&#39;;" placeholder="Member's Login" name="username" >
		   <input type="password" class="memberLogin" value="Password" onfocus="this.value=&#39;&#39;;this.style.color=&#39;#000&#39;;this.onfocus=&#39;&#39;;" placeholder="Password" name="password" >
		   <input type="submit" class="loginbtn left" value="Login" name="Login" >
	   </form>-->
            <?php 
            else:
                if (array_key_exists('sponser_full_name', $session_data)) {
                    $sponser=$session_data['sponser_full_name'];
                }
                else{
                    $sponser='No Sponser';
                } ?>
            <div class="sponsor">
                Your Sponsor :  <a href="#"><?php echo $sponser; ?></a>
            </div>
            <nav class="headertop">
                <div><a href="#">Welcome <b><?php echo $session_data['fullname']; ?></b></a></div>
                <ul>
                   <li><a href="<?php echo base_url()?>clientadmin/setting">Edit Profile</a></li>
                    <li><a href="<?php echo base_url()?>clientadmin/clientdashboard/logout">Logout</a></li>
                    <li><a  class="last modalbox" href="#inline">Contact Support</a></li>
                </ul>
            </nav>
            <?php endif; ?>
	</div>
	<!-- /header right -->
</div>
 