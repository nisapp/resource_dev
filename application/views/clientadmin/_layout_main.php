<?php $this->load->view('clientadmin/components/header.php'); 
if($subview)
{
	$this->load->view($subview);
}
else
{
}
?>

<?php $this->load->view('clientadmin/components/footer.php'); ?>