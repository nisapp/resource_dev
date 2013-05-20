<div class="siteHeader">
	<!-- logo -->
	<div class="logo">
		<h3><a href="<?php echo base_url(); ?>">Logo</a></h3>
	</div>
	<!-- /logo -->
	<!-- header right -->
	<div class="siteHeaderRight homeRight">
	   <form id="login" method="post" action="<?php echo base_url();?>login/verifyclientlogin"> 
		   <input type="text" class="memberLogin" value="Member’s Login" onfocus="this.value=&#39;&#39;;this.style.color=&#39;#000&#39;;this.onfocus=&#39;&#39;;" placeholder="Member’s Login" name="username" >
		   <input type="text" class="memberLogin" value="Password" onfocus="this.value=&#39;&#39;;this.style.color=&#39;#000&#39;;this.onfocus=&#39;&#39;;" placeholder="Password" name="password" >
		   <input type="submit" class="loginbtn left" value="Login" name="Login" >
	   </form>
	</div>
	<!-- /header right -->
</div>
 