<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('sms_helper'))
{
    function send_appointment_details_to_employee($appointment,$customer,$housekeepers)
    {
        $appointment = json_decode(json_encode($appointment),true);
        foreach($housekeepers as $housekeeper){
          $data = array(
              "outboundSMSMessageRequest"=> array(
                  "clientCorrelator"=>$appointment['service_cleaning_id'],
                  "senderAddress"=>GLOBE_SHORT_CODE,
                  "outboundSMSTextMessage"=> array(
                      "message"=>"[Notice] You have an appointment!"
                      ."\nService type: ".$appointment['service']['service_type_key']
                      ."\nCustomer: ".$customer->last_name.", ".$customer->first_name
                      ."\nDate: ".$appointment['date']
                      ."\nTime: ".$appointment['start_time']."~".$appointment['end_time']
                      ."\nPrice: ".$appointment['total_price']
                      ."\nPayment type: ".$appointment['payment_type']
                      ."\nLocation: ".$appointment['location']['location_street']." ".$appointment['location']['location_barangay'].", ".$appointment['location']['location_city']
                      ."\n\nAssignment code: ".$appointment['drop_code']
                  ),
                  "address"=>$housekeeper->contact_number
              )
          );
          $curl = curl_init('https://devapi.globelabs.com.ph/smsmessaging/v1/outbound/'.GLOBE_SHORT_CODE.'/requests?access_token='.$housekeeper->globe_access_token);
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

          if(!($httpResponse >= 200 && $httpResponse <= 300)){
              return false;
          }
        }
        return true;
    }

    function send_general_message($contact_number, $access_token, $message){
      $data = array(
          "outboundSMSMessageRequest"=> array(
              "senderAddress"=>GLOBE_SHORT_CODE,
              "outboundSMSTextMessage"=> array(
                  "message"=> $message
              ),
              "address"=>$contact_number
          )
      );

      $curl = curl_init('https://devapi.globelabs.com.ph/smsmessaging/v1/outbound/'.GLOBE_SHORT_CODE.'/requests?access_token='.$access_token);
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
    }
}
