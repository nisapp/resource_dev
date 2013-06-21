<?php 
if($subview)
{
	$r=explode('/',$subview);
	$last=count($r);
	$this->data['view_name']=$r[$last-1];
}

$this->load->view('members/components/header.php',$this->data); 
if($subview)
{
	$this->load->view($subview);
}
else
{
}
?>

<?php $this->load->view('members/components/footer.php'); ?>