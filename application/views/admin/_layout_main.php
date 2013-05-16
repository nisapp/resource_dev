<?php $this->load->view('admin/components/header.php'); 
if($subview)
{
	$this->load->view($subview);
}
else
{
}
?>

<?php $this->load->view('admin/components/footer.php'); ?>