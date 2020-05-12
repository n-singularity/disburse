<?php

namespace App\Controllers;

use App\Entities\Disburse;
use App\Services\HttpClient;
use Exception;

/**
 * Class Disburse
 * @package App\Controllers
 */
class DisburseController
{
    /**
     * @param $params
     * @throws Exception
     */
    public function storeDisburse($params)
    {
        $client   = new HttpClient();
        $response = $client->request('POST', 'https://nextar.flip.id/disburse', [
          'Authorization' => "Basic ".base64_encode(getenv('NEXTAR_SECRET_KEY').":")
        ], $params);

        $disburse = new Disburse();
        $disburse->setParameterFromArray(json_decode($response, true));
        $disburse->save();
        
        echo $disburse->toJson();
    }
    
    /**
     * @param $idTransaction
     * @throws Exception
     */
    public function showDisburse($idTransaction)
    {
        $disburse = (new Disburse())->find($idTransaction);

        if(!$disburse){
            http_response_code(404);
            echo "Not Found";
        }else{
            echo $disburse?$disburse->toJson():null;
        }
    }
    
    /**
     * @param $idTransaction
     * @throws Exception
     */
    public function refreshAndGetDisburse($idTransaction)
    {
        $disburse = (new Disburse())->find($idTransaction);
    
        if(!$disburse){
            http_response_code(404);
            echo "Not Found";
            die;
        }

        $client   = new HttpClient();
        $response = $client->request('GET', "https://nextar.flip.id/disburse/$idTransaction", [
          'Authorization' => "Basic ".base64_encode(getenv('NEXTAR_SECRET_KEY').":")
        ]);
    
        $disburse->setParameterFromArray(json_decode($response, true));
        $disburse->save();
    
        echo  $disburse->toJson();
    }
}
