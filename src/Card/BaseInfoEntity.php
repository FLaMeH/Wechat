<?php
namespace ISeeCoo\Wechat\Card;

class BaseInfoEntity {
    // 文本
    const CODE_TYPE_TEXT = 'CODE_TYPE_TEXT';
    
    // 一维码
    const CODE_TYPE_BARCODE = 'CODE_TYPE_BARCODE';
    
    // 二维码
    const CODE_TYPE_QRCODE = 'CODE_TYPE_QRCODE';
    
    // 二维码无code显示
    const CODE_TYPE_ONLY_QRCODE = 'CODE_TYPE_ONLY_QRCODE';
    
    // 一维码无code显示
    const CODE_TYPE_ONLY_BARCODE = 'CODE_TYPE_ONLY_BARCODE';
    
    // 不显示code和条形码类型
    const CODE_TYPE_NONE = 'CODE_TYPE_NONE';
    
    /*
     * #63b359
     */
    const COLOR010 = 'Color010';
    
    /*
     * #2c9f67
     */
    const COLOR020 = 'Color020';
    
    /*
     * #509fc9
     */
    const COLOR030 = 'Color030';
    
    /*
     * #5885cf
     */
    const COLOR040 = 'Color040';
    
    /*
     * #9062c0
     */
    const COLOR050 = 'Color050';
    
    /*
     * #d09a45
     */
    const COLOR060 = 'Color060';
    
    /*
     * #e4b138
     */
    const COLOR070 = 'Color070';
    
    /*
     * #ee903c
     */
    const COLOR080 = 'Color080';
    
    /*
     * #f08500
     */
    const COLOR081 = 'Color081';
    
    /*
     * #a9d92d
     */
    const COLOR082 = 'Color082';
    
    /*
     * #dd6549
     */
    const COLOR090 = 'Color090';
    
    /*
     * #cc463d
     */
    const COLOR100 = 'Color100';
    
    /*
     * #cf3e36
     */
    const COLOR101 = 'Color101';
    
    /*
     * #5E6671
     */
    const COLOR102 = 'Color102';
    
    // 卡卷有效期(永久)
    const DATE_TYPE_PERMANENT = 'DATE_TYPE_PERMANENT';
    
    // 固定日期区间
    const DATE_TYPE_FIX_TIME_RANGE = 'DATE_TYPE_FIX_TIME_RANGE';
    
    // 固定时长(自领取后按天计算)
    const DATE_TYPE_FIX_TERM = 'DATE_TYPE_FIX_TERM';
    
    public function setLogo($wxmedia)
    {
        $this->baseInfo['logo_url'] = $wxmedia;
    }
    
    public function setCodeType($type = self::CODE_TYPE_NONE)
    {
        $this->baseInfo['code_type'] = $type;
    }
    
    public function setBrandName($brandName)
    {
        $this->baseInfo['brand_name'] = $brandName;
    }
    
    public function setColor($color = self::COLOR010)
    {
        $this->baseInfo['color'] = $color;
    }
    
    public function setNotice($notice)
    {
        $this->baseInfo['notice'] = $notice;
    }
    
    public function setDescription($description)
    {
        $this->baseInfo['description'] = $description;
    }
    
    public function setTitle($title)
    {
        $this->baseInfo['title'] = $title;
    }
    
    public function setSkuQuantity($quantity)
    {
        $this->baseInfo['sku']['quantity'] = $quantity;
    }
    
    public function setDatePermanent(){
        $this->baseInfo['date_info']['type'] = self::DATE_TYPE_PERMANENT;
    }
    
    public function setDateFixTerm($fixTerm,$begin){
        $this->baseInfo['date_info'] = [
            'type'=>self::DATE_TYPE_FIX_TERM,
            'fixed_term'=>$fixTerm,
            'fixed_begin_term'=>$begin
        ];
    }
    
    public function setDateFixTimeRange($begin,$end){
        $this->baseInfo['date_info'] = [
            'type'=>self::DATE_TYPE_FIX_TIME_RANGE,
            'begin_timestamp'=>$begin,
            'end_timestamp'=>$end
        ];
    }
}