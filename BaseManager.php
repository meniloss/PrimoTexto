<?php
namespace Meniloss\PrimoTextoBundle\Service;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of BaseManager
 *
 * @author olivi
 */
class BaseManager {
    protected static $baseURL = 'https://api.primotexto.com/v2/';
    
    protected static $CURLOPT_SSL_VERIFYPEER = 'false';
    
    protected static $CURLOPT_PROXY = '';
    
    private static $apiKey;

    public function __construct($apiKey) {
        self::$apiKey = $apiKey;
    }

    private static function getCurlWithApiKey($url) {
        $curl = curl_init($url);
        
        if (isSet(self::$CURLOPT_PROXY)) {
            curl_setopt($curl, CURLOPT_PROXY, self::$CURLOPT_PROXY);
        }
        
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, self::$CURLOPT_SSL_VERIFYPEER);
        
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'X-Primotexto-ApiKey: '.self::$apiKey,
        ));
        
        return $curl;
    }
    
    protected static function getPutCurl($url, $post_fields) {
        $curl = self::getCurlWithApiKey($url);
        
        if (isSet(self::$CURLOPT_PROXY)) {
            curl_setopt($curl, CURLOPT_PROXY, self::$CURLOPT_PROXY);
        }
        
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, self::$CURLOPT_SSL_VERIFYPEER);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'PUT');
        curl_setopt($curl, CURLOPT_POSTFIELDS, $post_fields);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        
        return $curl;
    }
    
    protected static function getPostCurl($url, $post_fields) {
        $curl = self::getCurlWithApiKey($url);
        
        if (isSet(self::$CURLOPT_PROXY)) {
            curl_setopt($curl, CURLOPT_PROXY, self::$CURLOPT_PROXY);
        }
        
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, self::$CURLOPT_SSL_VERIFYPEER);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($curl, CURLOPT_POSTFIELDS, $post_fields);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        
        return $curl;
    }
    
    public static function getGetCurl($url) {
        $curl = self::getCurlWithApiKey($url);
        
        if (isSet(self::$CURLOPT_PROXY)) {
            curl_setopt($curl, CURLOPT_PROXY, self::$CURLOPT_PROXY);
        }
        
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, self::$CURLOPT_SSL_VERIFYPEER);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        
        return $curl;
    }
    
    protected static function getDeleteCurl($url) {
        $curl = self::getCurlWithApiKey($url);
        
        if (isSet(self::$CURLOPT_PROXY)) {
            curl_setopt($curl, CURLOPT_PROXY, self::$CURLOPT_PROXY);
        }
        
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, self::$CURLOPT_SSL_VERIFYPEER);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'DELETE');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        
        return $curl;
    }
}
