<?php

namespace Zimbra\Voice\Tests\Request;

use Zimbra\Voice\Tests\ZimbraVoiceApiTestCase;
use Zimbra\Voice\Request\ResetVoiceFeatures;
use Zimbra\Voice\Struct\StorePrincipalSpec;
use Zimbra\Voice\Struct\ResetPhoneVoiceFeaturesSpec;
use Zimbra\Voice\Struct\AnonCallRejectionReq;
use Zimbra\Voice\Struct\CallerIdBlockingReq;
use Zimbra\Voice\Struct\CallForwardReq;
use Zimbra\Voice\Struct\CallForwardBusyLineReq;
use Zimbra\Voice\Struct\CallForwardNoAnswerReq;
use Zimbra\Voice\Struct\CallWaitingReq;
use Zimbra\Voice\Struct\SelectiveCallForwardReq;
use Zimbra\Voice\Struct\SelectiveCallAcceptanceReq;
use Zimbra\Voice\Struct\SelectiveCallRejectionReq;

/**
 * Testcase class for ResetVoiceFeatures.
 */
class ResetVoiceFeaturesTest extends ZimbraVoiceApiTestCase
{
    public function testResetVoiceFeaturesRequest()
    {
        $id = $this->faker->word;
        $name = $this->faker->word;
        $accountNumber = $this->faker->word;
        $storeprincipal = new StorePrincipalSpec(
            $id, $name, $accountNumber
        );

        $anoncallrejection = new AnonCallRejectionReq();
        $calleridblocking = new CallerIdBlockingReq();
        $callforward = new CallForwardReq();
        $callforwardbusyline = new CallForwardBusyLineReq();
        $callforwardnoanswer = new CallForwardNoAnswerReq();
        $callwaiting = new CallWaitingReq();
        $selectivecallforward = new SelectiveCallForwardReq();
        $selectivecallacceptance = new SelectiveCallAcceptanceReq();
        $selectivecallrejection = new SelectiveCallRejectionReq();

        $callFeatures = [
            $anoncallrejection,
            $calleridblocking,
            $callforward,
            $callforwardbusyline,
            $callforwardnoanswer,
            $callwaiting,
            $selectivecallforward,
            $selectivecallacceptance,
            $selectivecallrejection,
        ];
        $phone = new ResetPhoneVoiceFeaturesSpec(
            $name, $callFeatures
        );

        $req = new ResetVoiceFeatures(
            $storeprincipal, $phone
        );
        $this->assertInstanceOf('Zimbra\Voice\Request\Base', $req);
        $this->assertSame($storeprincipal, $req->getStorePrincipal());
        $this->assertSame($phone, $req->getPhone());
        $req->setStorePrincipal($storeprincipal)
            ->setPhone($phone);
        $this->assertSame($storeprincipal, $req->getStorePrincipal());
        $this->assertSame($phone, $req->getPhone());

        $xml = '<?xml version="1.0"?>'."\n"
            .'<ResetVoiceFeaturesRequest>'
                .'<storeprincipal id="' . $id . '" name="' . $name . '" accountNumber="' . $accountNumber . '" />'
                .'<phone name="' . $name . '">'
                    .'<anoncallrejection />'
                    .'<calleridblocking />'
                    .'<callforward />'
                    .'<callforwardbusyline />'
                    .'<callforwardnoanswer />'
                    .'<callwaiting />'
                    .'<selectivecallforward />'
                    .'<selectivecallacceptance />'
                    .'<selectivecallrejection />'
                .'</phone>'
            .'</ResetVoiceFeaturesRequest>';
        $this->assertXmlStringEqualsXmlString($xml, (string) $req);

        $array = [
            'ResetVoiceFeaturesRequest' => [
                '_jsns' => 'urn:zimbraVoice',
                'storeprincipal' => [
                    'id' => $id,
                    'name' => $name,
                    'accountNumber' => $accountNumber,
                ],
                'phone' => [
                    'name' => $name,
                    'anoncallrejection' => [],
                    'calleridblocking' => [],
                    'callforward' => [],
                    'callforwardbusyline' => [],
                    'callforwardnoanswer' => [],
                    'callwaiting' => [],
                    'selectivecallforward' => [],
                    'selectivecallacceptance' => [],
                    'selectivecallrejection' => [],
                ],
            ],
        ];
        $this->assertEquals($array, $req->toArray());
    }

    public function testResetVoiceFeaturesApi()
    {
        $id = $this->faker->word;
        $name = $this->faker->word;
        $accountNumber = $this->faker->word;
        $storeprincipal = new StorePrincipalSpec(
            $id, $name, $accountNumber
        );

        $anoncallrejection = new AnonCallRejectionReq();
        $calleridblocking = new CallerIdBlockingReq();
        $callforward = new CallForwardReq();
        $callforwardbusyline = new CallForwardBusyLineReq();
        $callforwardnoanswer = new CallForwardNoAnswerReq();
        $callwaiting = new CallWaitingReq();
        $selectivecallforward = new SelectiveCallForwardReq();
        $selectivecallacceptance = new SelectiveCallAcceptanceReq();
        $selectivecallrejection = new SelectiveCallRejectionReq();

        $callFeatures = [
            $anoncallrejection,
            $calleridblocking,
            $callforward,
            $callforwardbusyline,
            $callforwardnoanswer,
            $callwaiting,
            $selectivecallforward,
            $selectivecallacceptance,
            $selectivecallrejection,
        ];
        $phone = new ResetPhoneVoiceFeaturesSpec(
            $name, $callFeatures
        );

        $this->api->resetVoiceFeatures(
            $storeprincipal, $phone
        );

        $client = $this->api->getClient();
        $req = $client->lastRequest();
        $xml = '<?xml version="1.0"?>'."\n"
            .'<env:Envelope xmlns:env="http://www.w3.org/2003/05/soap-envelope" xmlns:urn="urn:zimbra" xmlns:urn1="urn:zimbraVoice">'
                .'<env:Body>'
                    .'<urn1:ResetVoiceFeaturesRequest>'
                        .'<urn1:storeprincipal id="' . $id . '" name="' . $name . '" accountNumber="' . $accountNumber . '" />'
                        .'<urn1:phone name="' . $name . '">'
                            .'<urn1:anoncallrejection />'
                            .'<urn1:calleridblocking />'
                            .'<urn1:callforward />'
                            .'<urn1:callforwardbusyline />'
                            .'<urn1:callforwardnoanswer />'
                            .'<urn1:callwaiting />'
                            .'<urn1:selectivecallforward />'
                            .'<urn1:selectivecallacceptance />'
                            .'<urn1:selectivecallrejection />'
                        .'</urn1:phone>'
                    .'</urn1:ResetVoiceFeaturesRequest>'
                .'</env:Body>'
            .'</env:Envelope>';
        $this->assertXmlStringEqualsXmlString($xml, (string) $req);
    }
}
