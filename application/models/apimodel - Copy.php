<?php
	Class Apimodel extends CI_Model
	{
		function __construct(){
			parent::__construct();
		}
		
		function test(){
			require_once(APPPATH.'getresponse_api/jsonRPCClient.php');
			
			$api_key = 'e442108a94df0c24e8e076b5ff70535d';

			# API 2.x URL
			$api_url = 'http://api2.getresponse.com';

			# initialize JSON-RPC client
			$client = new jsonRPCClient($api_url);

			# find campaign named 'test'
			$campaigns = $client->get_campaigns(
				$api_key,
				array (
					# find by name literally
					'name' => array ( 'EQUALS' => 'easyaccessprofits_3' )
				)
			);
			
			echo '<pre>';
			print_r($campaigns);
			echo '</pre>';
			// die();
			# because there can be only one campaign of this name
			# first key is the CAMPAIGN_ID required by next method
			# (this ID is constant and should be cached for future use)
			$CAMPAIGN_ID = array_pop(array_keys($campaigns));

			# add contact to the campaign
			$result = $client->add_contact(
				$api_key,
				array (
					# identifier of 'test' campaign
					'campaign'  => $CAMPAIGN_ID,
					
					# basic info
					'name'      => 'Test',
					'email'     => 'vipinwebguru22@hotmail.com',

					
				)
			);

			# uncomment following line to preview Response
			echo '<pre>';
			// var_dump($result);
			print_r($result);
			echo '</pre>';

			if(array_key_exists('queued', $result)){
				if($result['queued']==1){
					print("<h1><h1>Contact added\n</h1></h1>");
				}
			}else if(array_key_exists('message', $result)){
				if($result['message']=='Contact already queued for target campaign'){
					print("<h1>Contact Not added\n</h1>");
				}
			}

		}
	}
	?>