<?php

$api_url="http://localhost/Employe_project/App/api/test_api.php?action=fetch_all";

$client = curl_init($api_url);
curl_setopt($client,CURLOPT_RETURNTRANSFER,true);
$response=curl_exec($client);
$result = json_decode($response);
var_dump($result);
//var_dump($response);

$output='';
if(count($result)>0)
{
    foreach($result as $row)
    {
        $output.="
                <tr>
                    <td>
                        $row->id
                    </td>
                    <td>
                        $row->name
                    </td>
                    <td>
                    $row->email
                    </td>
                    <td>
                    $row->poste
                    </td>
                    <td>
                    <button type=\"button\" class=\"btn btn-warning\" id=\"$row->id\">Edit</button>
                    <button type=\"button\" class=\"btn btn-danger\" id=\"$row->id\">Delete</button>
                    </td>
                </tr>
               ";
    }

}else{
    $output .= "
                 <tr>
                    <td colspan='4' class='text-center'>No data found </td>
                 </tr>
            
             ";
}
echo $output;