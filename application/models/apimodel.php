<?php
	Class Apimodel extends CI_Model
	{
            private $api_key;
            private $compain_name;
            private $api_url;
		function __construct(){
                    $this->api_key = 'e442108a94df0c24e8e076b5ff70535d';
                    $this->compain_name = 'etest_123';
                    $this->api_url = 'http://api2.getresponse.com';
                    
			parent::__construct();
		}
		function add_client($email){
                    require_once(APPPATH.'getresponse_api/jsonRPCClient.php');
                    $client = new jsonRPCClient($this->api_url);
                    $campaign = $client->get_campaigns(
                            $this->api_key,
                            array (
                                'name' => array ( 'EQUALS' => $this->compain_name )
                                )
                            );
                    $CAMPAIGN_ID = array_pop(array_keys($campaign));
                    $result = $client->add_contact(
                            $this->api_key,
                            array (
                                'campaign'  => $CAMPAIGN_ID,
                                'name'      => $email,
                                'email'     => $email
                                )
                            );
                    if(array_key_exists('queued', $result)){
                        if($result['queued']==1){
                            return "Successfully subscribed.";
                        }
                    }
                    elseif(array_key_exists('message', $result)){
                        if($result['message']=='Contact already queued for target campaign'){
                            return "Already subscribed.";
                        }
                    }
                    else{
                        return "Cann't subscribe!";
                    }
                }
		function test(){
			require_once(APPPATH.'getresponse_api/jsonRPCClient.php');
			
			

			# API 2.x URL

			# initialize JSON-RPC client
			$client = new jsonRPCClient($this->api_url);

			# find campaign named 'test'
			$campaign1 = $client->get_campaigns(
				$this->api_key,
				array (
					# find by name literally
					'name' => array ( 'EQUALS' => $this->compain_name )
				)
			);
			$campaign2 = $client->get_campaigns(
				$this->api_key,
				array (
					# find by name literally
					'name' => array ( 'EQUALS' => 'easyaccessprofits_4' )
				)
			);
			
			echo '<pre>';
			print_r($campaign1);
			echo '</pre>';
			echo '<pre>';
			print_r($campaign2);
			echo '</pre>';
			// die();
			# because there can be only one campaign of this name
			# first key is the CAMPAIGN_ID required by next method
			# (this ID is constant and should be cached for future use)
                        
			$CAMPAIGN1_ID = array_pop(array_keys($campaign1));
                        $CAMPAIGN2_ID = array_pop(array_keys($campaign2));
                        echo $CAMPAIGN1_ID."<br>";
                        echo $CAMPAIGN2_ID."<br>";
                        
			# add contact to the campaign
			$result1 = $client->add_contact(
				$this->api_key,
				array (
					# identifier of 'test' campaign
					'campaign'  => $CAMPAIGN1_ID,
					
					# basic info
					'name'      => 'Test',
					'email'     => 'vipinwebguru@yahoo.in',

					
				)
			);
			$result2 = $client->add_contact(
				$this->api_key,
				array (
					# identifier of 'test' campaign
					'campaign'  => $CAMPAIGN2_ID,
					
					# basic info
					'name'      => 'Test',
					'email'     => 'vipinwebguru@gmail.com',

					
				)
			);
                        

			# uncomment following line to preview Response
			echo '<pre>';
			// var_dump($result);
			print_r($result1);
			echo '</pre>';
			echo '<pre>';
			// var_dump($result);
			print_r($result2);
			echo '</pre>';
                        /*

			if(array_key_exists('queued', $result)){
				if($result['queued']==1){
					print("<h1><h1>Contact added\n</h1></h1>");
				}
			}else if(array_key_exists('message', $result)){
				if($result['message']=='Contact already queued for target campaign'){
					print("<h1>Contact Not added\n</h1>");
				}
			}
                        //*/

		}
	}
	?>