<?php
// +----------------------------------------------------------------------
// | JuhePHP [ NO ZUO NO DIE ]
// +----------------------------------------------------------------------
// | Copyright (c) 2010-2015 http://juhe.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: Juhedata <info@juhe.cn-->
// +----------------------------------------------------------------------

//----------------------------------
// �ۺ�����ȫ��Υ�½ӿڵ�����
//----------------------------------
class Weliam_Juhewz
{
    public $appkey = false; //�����ȫ��Υ�²�ѯAPPKEY
    
    private $cityUrl = 'http://v.juhe.cn/wz/citys';
    
    private $wzUrl = 'http://v.juhe.cn/wz/query';
    
    public function __construct($appkey)
    {
        $this->appkey = $appkey;
    }
    
    /**
     * ��ȡΥ��֧�ֵĳ����б�
     * @return array
     */
    public function getCitys($province = false)
    {
        $params  = 'key=' . $this->appkey . "&format=2";
        $content = $this->juhecurl($this->cityUrl, $params);
        return $this->_returnArray($content);
    }
    
    /**
     * ��ѯ����Υ��
     * @param  string $city     [���д���]
     * @param  string $carno    [���ƺ�]
     * @param  string $engineno [��������]
     * @param  string $classno  [���ܺ�]
     * @return  array ����Υ����Ϣ
     */
    public function query($city, $carno, $engineno = '', $classno = '')
    {
        $params  = array(
            'key' => $this->appkey,
            'city' => $city,
            'hphm' => $carno,
            'engineno' => $engineno,
            'classno' => $classno
        );
        $content = $this->juhecurl($this->wzUrl, $params, 1);
        return $this->_returnArray($content);
    }
    
    /**
     * ��JSON����תΪ���ݣ�������
     * @param string $content [����]
     * @return array
     */
    public function _returnArray($content)
    {
        return json_decode($content, true);
    }
    
    /**
     * ����ӿڷ�������
     * @param  string $url [�����URL��ַ]
     * @param  string $params [����Ĳ���]
     * @param  int $ipost [�Ƿ����POST��ʽ]
     * @return  string
     */
    public function juhecurl($url, $params = false, $ispost = 0)
    {
        $httpInfo = array();
        $ch       = curl_init();
        
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        curl_setopt($ch, CURLOPT_USERAGENT, 'JuheData');
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);
        curl_setopt($ch, CURLOPT_TIMEOUT, 60);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        if ($ispost) {
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
            curl_setopt($ch, CURLOPT_URL, $url);
        } else {
            if ($params) {
                curl_setopt($ch, CURLOPT_URL, $url . '?' . $params);
            } else {
                curl_setopt($ch, CURLOPT_URL, $url);
            }
        }
        $response = curl_exec($ch);
        if ($response === FALSE) {
            //echo "cURL Error: " . curl_error($ch);
            return false;
        }
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $httpInfo = array_merge($httpInfo, curl_getinfo($ch));
        curl_close($ch);
        return $response;
    }
}
