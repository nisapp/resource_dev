<?php 
if($subview)
{
	$r=explode('/',$subview);
	$last=count($r);
	$this->data['view_name']=$r[$last-1];
}

$this->load->view('clientadmin/components/header.php',$this->data); 
if($subview)
{
	$this->load->view($subview);
}
else
{
}
?>

<?php $this->load->view('clientadmin/components/footer.php'); ?>