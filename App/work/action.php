<?php

if(isset($_POST['action']))
{
    if($_POST['action']=='insert')
    {
        $form_data = array(
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'poste' => $_POST['poste'],
        );
        $api_url = "http://localhost/employe_project/App/api/test_api.php?action=insert";
        $client = curl_init($api_url);
        curl_setopt($client,CURLOPT_POST,true);
        curl_setopt($client,CURLOPT_POSTFIELDS,$form_data);
        curl_setopt($client,CURLOPT_RETURNTRANSFER,true);
        $response = curl_exec($client);
        curl_close($client);
        $result = json_decode($response,true);
        foreach($result as $keys => $values)
        {
            if($result[$keys]["success"]=='1')
            {
                echo 'insert';
            }else
            {
                echo "error";
            }
        }

    }
}