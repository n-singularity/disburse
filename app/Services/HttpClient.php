<?php


namespace App\Services;


class HttpClient
{
    /**
     * @param $method
     * @param $url
     * @param $headers
     * @param array $body
     * @return bool|string
     */
    public function request($method, $url, $headers, $body = [])
    {
        $httpHeaders = [];
        
        foreach ($headers as $key => $value) {
            $httpHeaders[] = $key . ': ' . $value;
        }
        
        $curl = curl_init();
        
        curl_setopt_array($curl, array(
          CURLOPT_URL            => $url,
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING       => "",
          CURLOPT_MAXREDIRS      => 10,
          CURLOPT_TIMEOUT        => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST  => $method,
          CURLOPT_POSTFIELDS     => $body,
          CURLOPT_HTTPHEADER     => $httpHeaders,
        ));
        
        $response = curl_exec($curl);
        $info     = curl_getinfo($curl);
        
        if ($info['http_code'] > 299) {
            http_response_code($info['http_code']);
            echo $response;
            exit();
        }
        
        curl_close($curl);
        return $response;
    }
}