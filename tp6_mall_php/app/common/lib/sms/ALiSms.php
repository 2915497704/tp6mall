<?php

//严格模式
declare(strict_types=1);
namespace app\common\lib\sms;

use AlibabaCloud\Client\AlibabaCloud;
use AlibabaCloud\Client\Exception\ClientException;
use AlibabaCloud\Client\Exception\ServerException;
use AlibabaCloud\Dysmsapi\Dysmsapi;
class ALiSms
{
    //验证码类库的封装
    public static function sendCode (string $phone , int $code) :bool{
        if(empty($phone) || empty($code)){
            return false;
        }

        AlibabaCloud::accessKeyClient('<your-access-key-id>', '<your-access-key-secret>')
// use STS Token
// AlibabaCloud::stsClient('<your-access-key-id>', '<your-access-key-secret>', '<your-sts-token>')
            ->regionId('cn-hangzhou')
            ->asDefaultClient()->options([

            ]);

        try {
            $request = Dysmsapi::v20170525()->sendSms();
            $result = $request

                ->withSignName("singwa商城")
                ->withTemplateCode("SMS_274880199")
                ->withPhoneNumbers("13425308423")
                ->withTemplateParam("{\"code\":\"1234\"}")


                ->debug(true) // Enable the debug will output detailed information

                ->request();
            print_r($result->toArray());
        } catch (ClientException $exception) {
            echo $exception->getMessage() . PHP_EOL;
        } catch (ServerException $exception) {
            echo $exception->getMessage() . PHP_EOL;
            echo $exception->getErrorCode() . PHP_EOL;
            echo $exception->getRequestId() . PHP_EOL;
            echo $exception->getErrorMessage() . PHP_EOL;
        }
    }
}