<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('sms_helper'))
{
    function send_appointment_details_to_employee($appointment,$customer)
    {
        $appointment = json_decode(json_encode($appointment),true);
        $data = array(
            "outboundSMSMessageRequest"=> array(
                "clientCorrelator"=>$appointment['service_cleaning_id'],
                "senderAddress"=>GLOBE_SHORT_CODE,
                "outboundSMSTextMessage"=> array(
                    "message"=>"[GreenKlean Automated Message]"
                    ."\n\n[Notice] You have an appointment!\nService type: "
                    .$appointment['service']['service_type_key']
                    ."\nCustomer: ".$customer->last_name.", ".$customer->first_name
                    ."\nDate: ".$appointment['date']
                    ."\nTime: ".$appointment['start_time']."~".$appointment['end_time']
                    ."\nPrice: ".$appointment['service']['service_price']
                    ."\nLocation: ".$appointment['location']['street_address']." ".$appointment['location']['barangay'].", ".$appointment['location']['city_address']
                ),
                "address"=>$appointment['housekeeper']['contact_number']
            )
        );
        $curl = curl_init('https://devapi.globelabs.com.ph/smsmessaging/v1/outbound/'.GLOBE_SHORT_CODE.'/requests?access_token='.$appointment['housekeeper']['globe_access_token']);
        curl_setopt($curl, CURLOPT_POST,1);
        curl_setopt($curl, CURLOPT_POSTFIELDS,json_encode($data));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($curl, CURLOPT_HTTPHEADER,array(
            'Content-Type: application/json'
        ));

        $result = curl_exec($curl);
        $httpResponse = curl_getinfo($curl,CURLINFO_HTTP_CODE);
        $arr = json_decode($result,true);
        curl_close($curl);

        if($httpResponse >= 200 && $httpResponse <= 300){
            return true;
        }
        else{
            return false;
        }
    }   
}