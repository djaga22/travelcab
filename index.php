<?php

 


//echo $_GET['ref'];
//$base = mysql_connect('localhost', 'illicodriver_usr', 'ew#W8134dt'); 
//mysql_select_db ('illicodriver_db', $base) ;

$base = mysql_connect ('trouversbase_1.mysql.db', 'trouversbase_1', '18juin1984N');  
mysql_select_db ('trouversbase_1', $base) ;



/*if(!empty($_GET['ref'])){
$sql="SELECT * FROM `passengers_log` WHERE passengers_log_id = $_GET[ref]";


$req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());  
$data = mysql_fetch_array($req);
 
 echo $data['current_location'].'<br />';

   echo $data['pickup_time'];  
  
  
  
  $current_location = $data['current_location'] ;
  $pickup_time = $data['pickup_time'];   
  
  
envoiEmail($current_location,$pickup_time);

}
else*/
envoiEmailCommentaire($_GET['champ']);
  
  
  
/*function envoiEmail($depart,$Heure)
	{
	
      

   $pieces = explode(",", $depart);

$sql = "SELECT DISTINCT email, name, people.id 
FROM  `people`,`driver` 
WHERE user_type =  'D'
AND company_id =  '1'
AND driver.update_date >  '2016-06-01' and driver.driver_id=people.id";
 
	
	      
	
		                     
		$req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());  
$data = mysql_fetch_array($req);
			
			while ($data = mysql_fetch_array($req)) {
     
             
    	sendElasticEmail($data['email'], "Course MTLCAB", "Un client au depart de ".$pieces[count($pieces)-2]." recherche une voiture ".$Heure, "", "mtl93600@gmail.com", "MTLCAB");
	
    			
    			echo  $data['email'].'<br />' ;
			}
			
			
			
			
			
			
			
				
	}	
	
*/	
	
	
	function envoiEmailCommentaire($commentaire)
	{
	
	
	
	
	require('smsenvoi.php');
$smsenvoi=new smsenvoi();
$smsenvoi->debug=true;

// récupération de la ville


 	
	
	
	
	
	
      
echo $commentaire;


    

/*$sql = "SELECT DISTINCT email, name, people.id 
FROM  `people`,`driver` 
WHERE user_type =  'D'
AND company_id =  '1'
AND driver.update_date >  '2016-06-01' and driver.driver_id=people.id";
 
	*/
	      
	      
	   //   $sql="select * from people where created_date >  '2016-10-01' and user_type='D' and account_balance <=0 and account_balance != -1 order by account_balance desc";
	
	
	//$sql="SELECT * FROM  `people` WHERE user_type =  'D' AND created_date >=  '2016-01-01' AND created_date <  '2016-06-01'   ";
	
	//$sql="select * from people where created_date >  '2016-10-01' and user_type='D' and account_balance = 0 ";
	
	//$sql="select * from people where  created_date >  '2016-06-01' and created_date <  '2016-10-01' and user_type='D' and account_balance = 0 ";

    
    $sql="select * from people where  user_type='D' and account_balance < 1000 and  account_balance != '-1'  and name != 'mourad'";

  // $sql="select * from people where created_date >  '2016-11-01' and user_type='D' and account_balance = 0 ";
  
  //$sql="select * from people where created_date >  '2016-08-01' and created_date <  '2016-10-01' and user_type='D' and account_balance = 0 ";

 
 /*
 $sql="select name,account_balance,list.latitude as lat,list.longitude as lon,list.status as driverStatus,phone from (SELECT * , (
(TIME_TO_SEC( TIMEDIFF( NOW( ) , driver.update_date ) ) +3200)
) AS updatetime_difference
FROM driver
)  AS list,people
WHERE  people.id = list.driver_id and updatetime_difference >=  '15'  and list.shift_status='IN' and list.status='F' and ( 3959 * acos( cos( radians('48.866667') ) * cos( radians( list.latitude ) ) * cos( radians( list.longitude ) - radians('2.333333') ) + sin( radians('48.866667') ) * sin( radians( list.latitude ) ) ) ) <= 60  order by updatetime_difference asc limit 0 , 20 
";
*/
 
 
 
 //$sql="select * from people where created_date >  '2016-11-01' and user_type='D' order by account_balance desc";
 
// $sql="select * from people where created_date >  '2016-11-01' and people.email not in (select email from tbl_user)    and user_type='D' order by account_balance desc";


//$sql="select * from people where user_type='D' and name !='jojo' and name !='Bobe' and name != 'Mourad' and name!='Stephane' and name!='ZAYE' and name != 'ZIVY' and name!='Philippe'  and account_balance  >=0";

/*$sql= " select name,account_balance,address,list.latitude as lat,list.longitude as lon,list.status as driverStatus,phone from (SELECT * , (
(TIME_TO_SEC( TIMEDIFF( NOW( ) , driver.update_date ) ) )
) AS updatetime_difference
FROM driver
)  AS list,people
WHERE  people.id = list.driver_id   and  ( 3959 * acos( cos( radians('43.604652') ) * cos( radians( list.latitude ) ) * cos( radians( list.longitude ) - radians('1.444209') ) + sin( radians('43.604652') ) * sin( radians( list.latitude ) ) ) ) < 13  order by updatetime_difference  ";
 */

 /*$sql= "select email,name,account_balance,address,list.latitude as lat,list.longitude as lon,list.status as driverStatus,phone, list.update_date as dateconnect from (SELECT * , (
(TIME_TO_SEC( TIMEDIFF( NOW( ) , driver.update_date ) ) )
) AS updatetime_difference
FROM driver
)  AS list,people
WHERE  people.id = list.driver_id and updatetime_difference >= '15'  and name !='Xavier' and name != 'jojo' and ( 3959 * acos( cos( radians('48.856614') ) * cos( radians( list.latitude ) ) * cos( radians( list.longitude ) - radians('2.352222') ) + sin( radians('48.856614') ) * sin( radians( list.latitude ) ) ) ) < 60  order by updatetime_difference limit 0,20"; 
  */

$sql = "select email,name,account_balance,address,list.latitude as lat,list.longitude as lon,list.status as driverStatus,phone, list.update_date as dateconnect from (SELECT * , (
(TIME_TO_SEC( TIMEDIFF( NOW( ) , driver.update_date ) ) )
) AS updatetime_difference
FROM driver
)  AS list,people

WHERE  people.id = list.driver_id and updatetime_difference >= '15' and name != 'jojo' and name != 'DAOUD' and ( 3959 * acos( cos( radians('48.856614') ) * cos( radians( list.latitude ) ) * cos( radians( list.longitude ) - radians('2.352222') ) + sin( radians('48.856614') ) * sin( radians( list.latitude ) ) ) ) < 60 and account_balance <20 and people.status ='A'  order by dateconnect desc limit 0,80";  
  

//WHERE  people.id = list.driver_id and updatetime_difference >= '15' and status !='D'  and name != 'jojo' and name != 'DAOUD' and ( 3959 * acos( cos( radians('48.856614') ) * cos( radians( list.latitude ) ) * cos( radians( list.longitude ) - radians('2.352222') ) + sin( radians('48.856614') ) * sin( radians( list.latitude ) ) ) ) < 60  order by dateconnect desc limit 0,200";  
   

//WHERE  people.id = list.driver_id and updatetime_difference >= '15'  and name != 'jojo' and name != 'DAOUD' and ( 3959 * acos( cos( radians('48.856614') ) * cos( radians( list.latitude ) ) * cos( radians( list.longitude ) - radians('2.352222') ) + sin( radians('48.856614') ) * sin( radians( list.latitude ) ) ) ) < 60 and  list.update_date >'2017-06-16'  and  list.update_date >='2017-06-17'  order by dateconnect desc";  


//WHERE  people.id = list.driver_id and updatetime_difference >= '15'  and name != 'jojo' and name != 'DAOUD' and ( 3959 * acos( cos( radians('48.856614') ) * cos( radians( list.latitude ) ) * cos( radians( list.longitude ) - radians('2.352222') ) + sin( radians('48.856614') ) * sin( radians( list.latitude ) ) ) ) < 60 and dateconnect >'2017-06-16' and dateconnect <='2017-06-18' and order by dateconnect desc limit 0,80";  
   
//IIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIICCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCIIIIIIIIIIIIIIIIIIIII

//$sql = "SELECT * FROM `people`,driver WHERE people.id = driver.driver_id and  ( 3959 * acos( cos( radians('48.866667') ) * cos( radians( driver.latitude ) ) * cos( radians( driver.longitude ) - radians('2.333333') ) + sin( radians('48.866667') ) * sin( radians( driver.latitude ) ) ) ) < 60 and account_balance = 0 order by created_date desc limit 1,80";
  
   //  $sql="SELECT * FROM  `people` WHERE account_balance >20 AND account_balance <30";

 //$sql="SELECT * FROM  `people` WHERE  account_balance <20 LIMIT 20";

//$sql="SELECT * FROM  `people` where user_type='D' and email != 'eboagalle@gmail.com' and name !='CHAALI' order by created_date DESC LIMIT 100";

$sql="SELECT * FROM  `people` WHERE  account_balance <20  and email != 'rachedch2@yahoo.fr' and user_type ='D' and status ='A'";

//$sql="SELECT * FROM  `people` WHERE   email != 'rachedch2@yahoo.fr' and user_type ='D' and status ='A'";

//$sql="SELECT * FROM  `people` WHERE  name ='jojo' ";
    // $sql="SELECT phone,address FROM  `people` ";
	     




//tous les zeros en iles de  france rangés par date

//$sql = "SELECT * FROM `people`,driver WHERE people.id = driver.driver_id and  ( 3959 * acos( cos( radians('48.866667') ) * cos( radians( driver.latitude ) ) * cos( radians( driver.longitude ) - radians('2.333333') ) + sin( radians('48.866667') ) * sin( radians( driver.latitude ) ) ) ) > 60     and email != 'rachedch2@yahoo.fr'  order by account_balance desc";
//$sql = "SELECT * FROM `people`,driver WHERE people.id = driver.driver_id and  ( 3959 * acos( cos( radians('48.866667') ) * cos( radians( driver.latitude ) ) * cos( radians( driver.longitude ) - radians('2.333333') ) + sin( radians('48.866667') ) * sin( radians( driver.latitude ) ) ) ) < 60  and account_balance >18 and account_balance <=30   and email != 'rachedch2@yahoo.fr'  order by name";
//$sql = "SELECT  name,account_balance,phone,driver.update_date as dateconnect FROM `people`,driver WHERE people.id = driver.driver_id and  ( 3959 * acos( cos( radians('48.866667') ) * cos( radians( driver.latitude ) ) * cos( radians( driver.longitude ) - radians('2.333333') ) + sin( radians('48.866667') ) * sin( radians( driver.latitude ) ) ) ) < 60  and account_balance <20 and created_date >='2017-09-03'   and email != 'rachedch2@yahoo.fr'  order by created_date DESC";
//$sql = "SELECT  name,address,account_balance,phone,created_date,driver.update_date as dateconnect FROM `people`,driver WHERE people.id = driver.driver_id and  ( 3959 * acos( cos( radians('48.866667') ) * cos( radians( driver.latitude ) ) * cos( radians( driver.longitude ) - radians('2.333333') ) + sin( radians('48.866667') ) * sin( radians( driver.latitude ) ) ) ) < 60  and account_balance >=20 and email != 'rachedch2@yahoo.fr' and people.status ='A' and created_date >'2018-03-25'  order by created_date DESC LIMIT 100";
//$sql = "SELECT  name,address,account_balance,phone,created_date,driver.update_date as dateconnect FROM `people`,driver WHERE people.id = driver.driver_id and  ( 3959 * acos( cos( radians('48.866667') ) * cos( radians( driver.latitude ) ) * cos( radians( driver.longitude ) - radians('2.333333') ) + sin( radians('48.866667') ) * sin( radians( driver.latitude ) ) ) ) < 60  and  email != 'rachedch2@yahoo.fr'  order by created_date DESC limit 0,100";


//Lyon
//$sql = "SELECT * FROM `people`,driver WHERE people.id = driver.driver_id and  ( 3959 * acos( cos( radians('45.764043') ) * cos( radians( driver.latitude ) ) * cos( radians( driver.longitude ) - radians('4.835659') ) + sin( radians('45.764043') ) * sin( radians( driver.latitude ) ) ) ) < 60     and email != 'rachedch2@yahoo.fr'  order by account_balance desc";

//Toulouse
//$sql = "SELECT * FROM `people`,driver WHERE people.id = driver.driver_id and  ( 3959 * acos( cos( radians('43.604652') ) * cos( radians( driver.latitude ) ) * cos( radians( driver.longitude ) - radians('1.444209') ) + sin( radians('43.604652') ) * sin( radians( driver.latitude ) ) ) ) < 60     and email != 'rachedch2@yahoo.fr'  order by account_balance desc";

//Limoges ou autres
//$sql = "SELECT * FROM `people`,driver WHERE people.id = driver.driver_id and  ( 3959 * acos( cos( radians('45.764043') ) * cos( radians( driver.latitude ) ) * cos( radians( driver.longitude ) - radians('4.835659') ) + sin( radians('45.764043') ) * sin( radians( driver.latitude ) ) ) ) < 60     and email != 'rachedch2@yahoo.fr'  order by account_balance desc";

		                     
		$req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());  
//$data = mysql_fetch_array($req);

//sendElasticEmail("transport93600@gmail.com", "Course VTCAB", $commentaire, "", "cabillico@gmail.com", "VTCAB");


//$smsenvoi->sendSMS('+33781976055', 'Depart : '.$_GET['pick_address'].' ; Arrivee : '.$_GET['dest_address'].' ;  Heure : '.$_GET['horaire'].'; Tarif :'.$_GET['montant']);

//$smsenvoi->sendSMS('+33754181641',$commentaire);      
// $credits=$smsenvoi->checkCredits();



			$i=0;
			$j=0;
   $position ='paris';







         











			while ($data = mysql_fetch_array($req)) {
     
             
    	 
    	
    	
    //	sendElasticEmail($data['email'], "Course VTCAB", $commentaire, "", "cabillico@gmail.com", "VTCAB");
    	
    	
   /* if($data['name'] !='jojo'){
    $smsenvoi->sendSMS($data['phone'],$commentaire);  
 $credits=$smsenvoi->checkCredits();  
 } */
	$Message = "VTCAB course Velizy  direction Sceaux   depart dans 15 min tarif 36 euros connecte toi !   contact : cabillico@gmail.com";
	$telephone = $data['phone'];
	//$telephone = "0754181641";
    			


                        //*************************sms partner *******

          /* Prepare data for POST request
        $fields = array(
            'apiKey'=> 'a81e6d6d0d95e6df6a3bb93844d0761411ba8ae4',
            'phoneNumbers'=>$data['phone'],
            'message'=>$commentaire,
            'sender' => 'VTCAB'
        );
 
 
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL,'https://api.smspartner.fr/v1/send');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_TIMEOUT, 10);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS,json_encode($fields));
 
        $result = curl_exec($curl);
        curl_close($curl);
 
         Process your response here
        echo $result;
         */








            
              //*************************Spot Hit *******

         /*  Prepare data for POST request */
     /* $fields = array(
            'key'=> 'cae803540453bffb22d060c65329ce8d',
             'type'=>'premium',
            'destinataires'=>$data['phone'],
            'message'=>$commentaire,
            'expediteur' => 'VTCAB'
        );




                  


       

    $ch = curl_init('https://www.spot-hit.fr/api/envoyer/sms');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);

 
$response = curl_exec($ch);


curl_close($ch);


var_dump($response);
*/







 
 
        //echo file_get_contents("https://www.spot-hit.fr/api/envoyer/sms?key=cae803540453bffb22d060c65329ce8d&type=premium&message=bonjour&destinataires=0656674396");

    //  echo file_get_contents('https://www.spot-hit.fr/api/envoyer/sms?key=cae803540453bffb22d060c65329ce8d&type=premium&message='.$commentaire.'&destinataires=0656674396');

     //echo file_get_contents('https://www.spot-hit.fr/api/envoyer/sms?key=cae803540453bffb22d060c65329ce8d&type=premium&message='.$commentaire.'&destinataires='.$data['phone']);


 






          



  
    			//echo  $data['name'].' '.$data['account_balance'].' <a href="http://www.smsenvoi.com/getapi/sendsms/?email=djaga_d@yahoo.fr&apikey=69TZP92N3M8UTPWD33M3&message[type]=sms&message[subtype]=PREMIUM&message[senderlabel]=VTCAB&message[content]='.$Message.'&message[recipients]='.$telephone.'" target="_blank">'.$data['phone'].'</a><br />' ;
			
                        //echo  $data['name'].' '.$data['account_balance'].' '.$data['dateconnect'].' <a href="http://www.smsenvoi.com/getapi/sendsms/?email=djaga_d@yahoo.fr&apikey=69TZP92N3M8UTPWD33M3&message[type]=sms&message[subtype]=PREMIUM&message[senderlabel]=VTCAB&message[content]='.$commentaire.'&message[recipients]='.$telephone.'" target="_blank">'.$data['phone'].'</a>'.$data['address'].'<br />' ;

                // echo  $data['name'].' '.$data['account_balance'].' '.$data['dateconnect'].' '.$data['phone'].' '.$data['address'].'<br />' ; // WAAAAAAAAAAANNNNN

                      $adress = explode( ',', $data['address'] ) ;
                     // echo $adress[4].'<br />'; 
					  //echo strpos($adress[4],'9');
					  //echo substr($adress[4], 0, 1);
					  
					  //echo substr($adress[4], 0, -3);
					  
					  if(substr($adress[4], 0, -3) == '59') echo $data['phone'].'<br />' ;


                    
                   // echo  $data['name'].' '.$data['account_balance'].'<br />' ;


                 // echo  $data['name'].' '.$data['phone'].'<br />' ;

                //   echo  $data['name'].' '.$data['account_balance'].' '.$data['phone'].' '.$data['created_date'].'<br />' ; //IIIIIIIIIIIIIIICOIIIII



                      // echo  $data['email'].'<br />' ;
                    
                    
                    
                    
                    
                /*     $ville_nom_simple = str_replace(" ", "+", $data['address']);   //ICIIIIII
                        
                        $data1 = file_get_contents("https://maps.googleapis.com/maps/api/distancematrix/json?origins=".$ville_nom_simple."&destinations=".$position."&key=AIzaSyChSjioCj9Y7y2oLcYwziEXeJ4rRR0R7LA");

      $data1 = json_decode($data1, TRUE);
 

           // echo  "https://maps.googleapis.com/maps/api/distancematrix/json?origins=".$ville_nom_simple."&destinations=".$position."&key=AIzaSyChSjioCj9Y7y2oLcYwziEXeJ4rRR0R7LA";
                        
              //  echo  $data1['rows'][0]['elements'][0]['duration']['value'].'<br />';
        
                        
                         if($data1['rows'][0]['elements'][0]['duration']['value']<=900){
              // echo  "taxi ".$data['ville_nom_simple'].' '.$positionText.' '.$data1['rows'][0]['elements'][0]['duration']['text'].'<br />';
                         
                         
             //  echo  "taxi ".$data['ville_nom_simple'].'<br />';
              
               echo  $data['name'].' '.$data['account_balance'].' '.$data['dateconnect'].' '.$data['phone'].' '.$data['address'].'<br />' ;
                    
                   

                         $j++;

                               sleep(0.05);
                         
                       }*/
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
 
                    //   echo  $data['name'].' '.$data['account_balance'].' <a href="test'.$i.'.php" target="_blank">'.$data['phone'].'</a><br />' ;

      $i++;


}
			
			
	echo $i;		
			
			
			
			
				
	}	
	
	
	
	function sendElasticEmail($to, $subject, $body_text, $body_html, $from, $fromName){
	
    $res = "";

    $data = "username=".urlencode("djaga_d@yahoo.fr");
   // $data .= "&api_key=".urlencode("55ff6dcf-ff0f-4ee4-99d7-649b62b23808");

$data .= "&api_key=".urlencode("242fb833-e885-4475-a0e6-7189c224895c");
 
    $data .= "&from=".urlencode($from);
    $data .= "&from_name=".urlencode($fromName);
    $data .= "&to=".urlencode($to);
    $data .= "&subject=".urlencode($subject);
    if($body_html)
      $data .= "&body_html=".urlencode($body_html);
    if($body_text)
      $data .= "&body_text=".urlencode($body_text);

    $header = "POST /mailer/send HTTP/1.0\r\n";
    $header .= "Content-Type: application/x-www-form-urlencoded\r\n";
    $header .= "Content-Length: " . strlen($data) . "\r\n\r\n";
    $fp = fsockopen('ssl://api.elasticemail.com', 443, $errno, $errstr, 30);

    if(!$fp)
      return "ERROR. Could not open connection";
    else {
      fputs ($fp, $header.$data);
      while (!feof($fp)) {
        $res .= fread ($fp, 1024);
      }
      fclose($fp);
    }
    return $res;                  
 }
	


?>
