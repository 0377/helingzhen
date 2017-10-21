<?php
defined('IN_IA') or exit('Access Denied');

class Weliam_Smsnum
{
    /** 
     * �����ش��������ڡ���Ϣ���ء��л�͸���ظò������������û����Դ����Լ��¼��Ļ�ԱID������Ϣ����ʱ���û�ԱID��������ڣ��û����Ը��ݸû�ԱIDʶ������λ��Աʹ�������Ӧ��
     **/
    private $extend;
    
    /** 
     * ���Ž��պ��롣֧�ֵ��������ֻ����룬�������Ϊ11λ�ֻ����룬���ܼ�0��+86��Ⱥ�������贫�������룬��Ӣ�Ķ��ŷָ���һ�ε�����ഫ��200�����롣ʾ����18600000000,13911111111,13322222222
     **/
    private $recNum;
    
    /** 
     * ����ǩ��������Ķ���ǩ���������ڰ�����㡰��������-����ǩ�������еĿ���ǩ�����硰������㡱���ڶ���ǩ��������ͨ����ˣ���ɴ��롱������㡰������ʱȥ�����ţ���Ϊ����ǩ��������Ч��ʾ������������㡿��ӭʹ�ð���������
     **/
    private $smsFreeSignName;
    
    /** 
     * ����ģ����������ι���{"key":"value"}��key�������������ģ���еı�����һ�£��������֮���Զ��Ÿ�����ʾ�������ģ�塰��֤��${code}�������ڽ���${product}�����֤��������Ҫ���߱���Ŷ����������ʱ�贫��{"code":"1234","product":"alidayu"}
     **/
    private $smsParam;
    
    /** 
     * ����ģ��ID�������ģ��������ڰ�����㡰��������-����ģ������еĿ���ģ�塣ʾ����SMS_585014
     **/
    private $smsTemplateCode;
    
    /** 
     * �������ͣ�����ֵ����дnormal
     **/
    private $smsType;
    
    private $apiParas = array();
    
    public function setExtend($extend)
    {
        $this->extend             = $extend;
        $this->apiParas["extend"] = $extend;
    }
    
    public function getExtend()
    {
        return $this->extend;
    }
    
    public function setRecNum($recNum)
    {
        $this->recNum              = $recNum;
        $this->apiParas["rec_num"] = $recNum;
    }
    
    public function getRecNum()
    {
        return $this->recNum;
    }
    
    public function setSmsFreeSignName($smsFreeSignName)
    {
        $this->smsFreeSignName                = $smsFreeSignName;
        $this->apiParas["sms_free_sign_name"] = $smsFreeSignName;
    }
    
    public function getSmsFreeSignName()
    {
        return $this->smsFreeSignName;
    }
    
    public function setSmsParam($smsParam)
    {
        $this->smsParam              = $smsParam;
        $this->apiParas["sms_param"] = $smsParam;
    }
    
    public function getSmsParam()
    {
        return $this->smsParam;
    }
    
    public function setSmsTemplateCode($smsTemplateCode)
    {
        $this->smsTemplateCode               = $smsTemplateCode;
        $this->apiParas["sms_template_code"] = $smsTemplateCode;
    }
    
    public function getSmsTemplateCode()
    {
        return $this->smsTemplateCode;
    }
    
    public function setSmsType($smsType)
    {
        $this->smsType              = $smsType;
        $this->apiParas["sms_type"] = $smsType;
    }
    
    public function getSmsType()
    {
        return $this->smsType;
    }
    
    public function getApiMethodName()
    {
        return "alibaba.aliqin.fc.sms.num.send";
    }
    
    public function getApiParas()
    {
        return $this->apiParas;
    }
    
    public function check()
    {
        RequestCheckUtil::checkNotNull($this->recNum, "recNum");
        RequestCheckUtil::checkNotNull($this->smsFreeSignName, "smsFreeSignName");
        RequestCheckUtil::checkNotNull($this->smsTemplateCode, "smsTemplateCode");
        RequestCheckUtil::checkNotNull($this->smsType, "smsType");
    }
    
    public function putOtherTextParam($key, $value)
    {
        $this->apiParas[$key] = $value;
        $this->$key           = $value;
    }
}
class RequestCheckUtil
{
    /**
     * У���ֶ� fieldName ��ֵ$value�ǿ�
     *
     **/
    public static function checkNotNull($value, $fieldName)
    {
        if (self::checkEmpty($value)) {
            throw new Exception("client-check-error:Missing Required Arguments: " . $fieldName, 40);
        }
    }
    
    /**
     * �����ֶ�fieldName��ֵvalue �ĳ���
     *
     **/
    public static function checkMaxLength($value, $maxLength, $fieldName)
    {
        if (!self::checkEmpty($value) && mb_strlen($value, "UTF-8") > $maxLength) {
            throw new Exception("client-check-error:Invalid Arguments:the length of " . $fieldName . " can not be larger than " . $maxLength . ".", 41);
        }
    }
    
    /**
     * �����ֶ�fieldName��ֵvalue������б���
     *
     **/
    public static function checkMaxListSize($value, $maxSize, $fieldName)
    {
        if (self::checkEmpty($value))
            return;
        
        $list = preg_split("/,/", $value);
        if (count($list) > $maxSize) {
            throw new Exception("client-check-error:Invalid Arguments:the listsize(the string split by \",\") of " . $fieldName . " must be less than " . $maxSize . " .", 41);
        }
    }
    
    /**
     * �����ֶ�fieldName��ֵvalue �����ֵ
     *
     **/
    public static function checkMaxValue($value, $maxValue, $fieldName)
    {
        if (self::checkEmpty($value))
            return;
        
        self::checkNumeric($value, $fieldName);
        
        if ($value > $maxValue) {
            throw new Exception("client-check-error:Invalid Arguments:the value of " . $fieldName . " can not be larger than " . $maxValue . " .", 41);
        }
    }
    
    /**
     * �����ֶ�fieldName��ֵvalue ����Сֵ
     *
     **/
    public static function checkMinValue($value, $minValue, $fieldName)
    {
        if (self::checkEmpty($value))
            return;
        
        self::checkNumeric($value, $fieldName);
        
        if ($value < $minValue) {
            throw new Exception("client-check-error:Invalid Arguments:the value of " . $fieldName . " can not be less than " . $minValue . " .", 41);
        }
    }
    
    /**
     * �����ֶ�fieldName��ֵvalue�Ƿ���number
     *
     **/
    protected static function checkNumeric($value, $fieldName)
    {
        if (!is_numeric($value))
            throw new Exception("client-check-error:Invalid Arguments:the value of " . $fieldName . " is not number : " . $value . " .", 41);
    }
    
    /**
     * У��$value�Ƿ�ǿ�
     *  if not set ,return true;
     *	if is null , return true;
     *	
     *
     **/
    public static function checkEmpty($value)
    {
        if (!isset($value))
            return true;
        if ($value === null)
            return true;
        if (trim($value) === "")
            return true;
        
        return false;
    }
    
}
