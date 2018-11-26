<?php
        class Paypale {
                private $pwd ='password';
                private $signature = 'signature';
                private $user = 'email';
                private  $endpoint = 'https://api-3t.paypal.com/nvp'; 
                public $errors = array();


                function __construct($user =false, $pwd=FALSE, $signature=FALSE, $prod=FALSE) {

                        if($user){
                                $this->user=$user;
                        }
                        if($pwd){
                                $this->pwd=$pwd;
                        }
                        if($signature){
                                $this->signature=$signature;
                        }
                        if($prod)
                        {
                           //     $this->endpoint=str_replace('sandbox.', '', $this->endpoint);
                        }
                }
                /*
                 * payer
                 */
          public  function request($method, $params)
          {
                                $params = array_merge($params,array(
                                                'USER' =>$this->user,
                                                'SIGNATURE'=> $this->signature,
                                                'PWD' => $this->pwd,
                                                'VERSION'=>'123',
                                                'METHOD' =>$method ,
                                ));

                           $params = http_build_query($params);
                           $curl = curl_init();
                           curl_setopt_array($curl,array(
                           CURLOPT_URL => $this->endpoint , 
                           CURLOPT_POST=> 1,
                           CURLOPT_POSTFIELDS =>$params,
                           CURLOPT_RETURNTRANSFER =>1,
                           CURLOPT_SSL_VERIFYPEER => FALSE,
                           CURLOPT_SSL_VERIFYHOST=>FALSE,
                           CURLOPT_VERBOSE=> 1
                           ));
                           $response =curl_exec($curl);
                           $response_arry = array();
                           parse_str($response,$response_arry);

                           if(curl_error($curl))
                           {
                                $this->errors=curl_close($curl);
                                curl_close($curl);
                                return FALSE;
                           }
                           else
                           {
                              
                                        if($response_arry['ACK'] == 'Success'){
                                                curl_close($curl);
                                                return $response_arry;
                                        }
                                        else {
                                               // var_dump($response_arry);
                                                $this->errors=array('errore'=>curl_close($curl),
                                                   'code errore'=> '10002');
                                                return FALSE;
                                                
                                        }
                           }
          }
        }



?>