<?php

namespace Tests;

use PagSeguro\Library;

class Mock
{
    /**
     * Mock constructor.
     */
    public function __construct()
    {
        Bootstrap::init();
    }

    public static function DirectPreApprovalChangeStatusRequest($preApprovalCode, $status)
    {
        $request = new \PagSeguro\Domains\Requests\DirectPreApproval\Status();
        $request->setPreApprovalCode($preApprovalCode);
        $request->setStatus($status);

        return $request;
    }

    public static function DirectPreApprovalPaymentRequest($preApprovalCode)
    {
        $request = new \PagSeguro\Domains\Requests\DirectPreApproval\Payment();
        $request->setPreApprovalCode($preApprovalCode);
        $request->setReference(uniqid());
        $request->setSenderIp($_SERVER['REMOTE_ADDR']);
        $item = new \PagSeguro\Domains\DirectPreApproval\Item();
        $item->withParameters(uniqid(), Library::moduleVersion()->getName() . '-' . uniqid(), 1, 100.00);
        $request->addItems($item);

        return $request;
    }

    public static function DefaultPaymentRequest()
    {
        $request = new \PagSeguro\Domains\Requests\Payment();

        $request->addItems()->withParameters(
            '0001',
            'Notebook prata',
            2,
            130.00
        );

        $request->addItems()->withParameters(
            '0002',
            'Notebook preto',
            2,
            430.00
        );

        $request->setCurrency('BRL');

        $request->setExtraAmount(11.5);

        $request->setReference(Library::moduleVersion()->getName());

        $request->setRedirectUrl('http://www.lojamodelo.com.br');

        $request->setSender()->setName('John Doe');
        $request->setSender()->setEmail(Bootstrap::getTestSelleerEmail());
        $request->setSender()->setPhone()->instance(self::Phone());
        $request->setSender()->setDocument()->instance(self::DocumentCPF());

        $request->setShipping()->setAddress()->instance(self::Address());
        $request->setShipping()->setCost()->withParameters(20.00);
        $request->setShipping()->setType()->withParameters(\PagSeguro\Enum\Shipping\Type::SEDEX);

        $request->addMetadata()->withParameters('PASSENGER_CPF', self::DocumentCPF()->getIdentifier());
        $request->addMetadata()->withParameters('GAME_NAME', 'DOTA');
        $request->addMetadata()->withParameters('PASSENGER_PASSPORT', '23456', 1);

        $request->addParameter()->withParameters('itemId', '0003')->index(3);
        $request->addParameter()->withParameters('itemDescription', 'Notebook Amarelo')->index(3);
        $request->addParameter()->withParameters('itemQuantity', '1')->index(3);
        $request->addParameter()->withParameters('itemAmount', '200.00')->index(3);

        $request->addParameter()->withArray(['notificationURL', 'http://www.lojamodelo.com.br/nofitication']);

        $request->setRedirectUrl('http://www.lojamodelo.com.br');
        $request->setNotificationUrl('http://www.lojamodelo.com.br/nofitication');

        return $request;
    }

    public static function Phone()
    {
        return new \PagSeguro\Domains\Phone('11', '41414111');
    }

    public static function DocumentCPF()
    {
        return new \PagSeguro\Domains\Document('CPF', '12576818340');
    }

    public static function Address()
    {
        return new \PagSeguro\Domains\Address('Parque Anhangabaú',
            '1',
            null,
            'Centro',
            '01007-040',
            'São Paulo',
            'SP',
            'BRA');
    }

    public static function PreApprovalPaymentRequest()
    {
        $request = new \PagSeguro\Domains\Requests\Payment();

        $request->addItems()->withParameters(
            '0001',
            'Notebook prata',
            2,
            130.00
        );

        $request->addItems()->withParameters(
            '0002',
            'Notebook preto',
            2,
            430.00
        );

        $request->setCurrency('BRL');

        $request->setExtraAmount(11.5);

        $request->setReference(Library::moduleVersion()->getName() . '-' . uniqid());

        $request->setRedirectUrl('http://www.lojamodelo.com.br');

        $request->setSender()->setName('John Doe');
        $request->setSender()->setEmail(Bootstrap::getTestSelleerEmail());
        $request->setSender()->setPhone()->instance(self::Phone());
        $request->setSender()->setDocument()->instance(self::DocumentCPF());

        $request->setShipping()->setAddress()->instance(self::Address());
        $request->setShipping()->setCost()->withParameters(20.00);
        $request->setShipping()->setType()->withParameters(\PagSeguro\Enum\Shipping\Type::SEDEX);

        $request->addMetadata()->withParameters('PASSENGER_CPF', self::DocumentCPF()->getIdentifier());
        $request->addMetadata()->withParameters('GAME_NAME', 'DOTA');
        $request->addMetadata()->withParameters('PASSENGER_PASSPORT', '23456', 1);

        $request->addParameter()->withParameters('itemId', '0003')->index(3);
        $request->addParameter()->withParameters('itemDescription', 'Notebook Amarelo')->index(3);
        $request->addParameter()->withParameters('itemQuantity', '1')->index(3);
        $request->addParameter()->withParameters('itemAmount', '200.00')->index(3);

        $request->addParameter()->withArray(['notificationURL', 'http://www.lojamodelo.com.br/nofitication']);

        $request->setRedirectUrl('http://www.lojamodelo.com.br');
        $request->setNotificationUrl('http://www.lojamodelo.com.br/nofitication');

        $request->setPreApproval()->setCharge('manual');
        $request->setPreApproval()->setName('Seguro contra roubo do Notebook Prata');
        $request->setPreApproval()->setDetails('Todo dia 30 será cobrado o valor de R100,00 referente ao seguro contra
            roubo do Notebook Prata.');
        $request->setPreApproval()->setAmountPerPayment('100.00');
        $request->setPreApproval()->setMaxAmountPerPeriod('200.00');
        $request->setPreApproval()->setPeriod('Monthly');
        $request->setPreApproval()->setMaxTotalAmount('2400.00');
        $request->setPreApproval()->setInitialDate((new \DateTime())->format('Y-m-d\TH:i:s'));
        $request->setPreApproval()->setFinalDate((new \DateTime())->format('Y-m-d\TH:i:s'));

        $request->setRedirectUrl('http://www.lojamodelo.com.br');
        $request->setNotificationUrl('http://www.lojamodelo.com.br/nofitication');
        $request->setReviewUrl('http://www.lojateste.com.br/review');

        return $request;
    }

    public static function DirectPreApprovalPlanRequest($redirect_url, $charge, $period, $amountPerPayment)
    {
        $request = new \PagSeguro\Domains\Requests\DirectPreApproval\Plan();
        $request->setRedirectURL($redirect_url);
        $request->setReference(Library::moduleVersion()->getName() . '-' . uniqid());
        $request->setPreApproval()->setName(Library::moduleVersion()->getName() . '-' . uniqid());
        $request->setPreApproval()->setCharge($charge);
        $request->setPreApproval()->setPeriod($period);
        $request->setPreApproval()->setAmountPerPayment($amountPerPayment);
        $request->setReceiver()->withParameters(Bootstrap::getEmail());

        return $request;
    }

    public static function DirectPreApprovalPlanEditRequest($code)
    {
        $request = new \PagSeguro\Domains\Requests\DirectPreApproval\EditPlan();
        $request->setPreApprovalRequestCode($code);
        $request->setAmountPerPayment(number_format(rand(1, 1999), 2, '.', ''));
        $request->setUpdateSubscriptions(false);

        return $request;
    }

    public static function DirectPreApprovalDiscountRequest($code)
    {
        $request = new \PagSeguro\Domains\Requests\DirectPreApproval\Discount();
        $request->setPreApprovalCode($code);
        $request->setType('DISCOUNT_PERCENT');
        $request->setValue('10.00');

        return $request;
    }

    public static function AuthorizationComany()
    {
        return new \PagSeguro\Domains\Authorization\Company(
            'John Doe',
            'http://www.example.com',
            self::DocumentCPF(),
            self::PhoneBusiness(),
            self::Address(),
            self::AuthorizationPartner());
    }

    public static function PhoneBusiness()
    {
        return new \PagSeguro\Domains\Phone('11', '41414111', \PagSeguro\Enum\Authorization\PhoneEnum::BUSINESS);
    }

    public static function AuthorizationPartner()
    {
        return new \PagSeguro\Domains\Authorization\Partner(
            'John Doe',
            new \DateTime(),
            self::DocumentCPF(),
            self::PhoneHome()
        );
    }

    public static function PhoneHome()
    {
        return new \PagSeguro\Domains\Phone('11', '41414111', \PagSeguro\Enum\Authorization\PhoneEnum::HOME);
    }

    public static function AuthorizationSeller()
    {
        return new \PagSeguro\Domains\Authorization\Company(
            'John Doe',
            'http://www.example.com',
            self::DocumentCPF(),
            self::PhoneBusiness(),
            self::Address(),
            self::AuthorizationPartner());
    }

    public static function PhoneMobile()
    {
        return new \PagSeguro\Domains\Phone('11', '941414111', \PagSeguro\Enum\Authorization\PhoneEnum::MOBILE);
    }

    public static function DocumentCNPJ()
    {
        return new \PagSeguro\Domains\Document('CNPJ', '52585177000109');
    }

    public static function preApprovalRequest($charge, $amount, $maxAmountPerPeriod, $period, $maxTotalAmount)
    {
        $request = new \PagSeguro\Domains\Requests\PreApproval();

        $request->setCurrency("BRL");

        $request->setReference(Library::moduleVersion()->getName() . '-' . uniqid());

        $request->setShipping()->setType(\PagSeguro\Enum\Shipping\Type::SEDEX);
        $request->setShipping()->setAddress()->instance(self::Address());

        $request->setSender()->setName('John Doe');
        $request->setSender()->setEmail(Bootstrap::getTestSelleerEmail());
        $request->setSender()->setPhone()->instance(self::Phone());

        $request->setSender()->setAddress()->withParameters(
            '01007040',
            'Parque Anhangabaú',
            '1',
            null,
            'Centro',
            'São Paulo',
            'SP',
            'BRA'
        );

        $request->setPreApproval()->setCharge($charge);
        $request->setPreApproval()->setName(Library::moduleVersion()->getName() . uniqid());
        $request->setPreApproval()->setDetails(Library::moduleVersion()->getName() . uniqid());
        $request->setPreApproval()->setPeriod($period);
        $request->setPreApproval()->setMaxTotalAmount($maxTotalAmount);
        $request->setPreApproval()->setAmountPerPayment($amount);
        if ($charge == 'auto') {
            $request->setPreApproval()->setPeriod($period);
        }
        if ($charge !== 'auto') {
            $request->setPreApproval()->setMaxAmountPerPeriod($maxAmountPerPeriod);
            $request->setPreApproval()->setInitialDate((new \DateTime())->format('Y-m-d\TH:i:s'));
        }
        $request->setPreApproval()->setFinalDate((new \DateTime())->add(\DateInterval::createFromDateString('23 months'))->format('Y-m-d\TH:i:s'));

        $request->setRedirectUrl('http://www.lojamodelo.com.br/redirect');
        $request->setReviewUrl('http://www.lojamodelo.com.br/review');

        return $request;
    }

    public static function preApprovalChargeRequest($code)
    {
        $request = new \PagSeguro\Domains\Requests\PreApproval\Charge();
        $request->setReference(Library::moduleVersion()->getName() . '-' . uniqid());
        $request->setCode($code);
        $request->addItems()->withParameters(
            '0001',
            'Notebook prata',
            1,
            100.00
        );

        return $request;
    }
}