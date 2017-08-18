<?php
/**
 * 2007-2016 [PagSeguro Internet Ltda.]
 *
 * NOTICE OF LICENSE
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 *
 * @author    PagSeguro Internet Ltda.
 * @copyright 2007-2016 PagSeguro Internet Ltda.
 * @license   http://www.apache.org/licenses/LICENSE-2.0
 *
 */

namespace PagSeguro\Enum\Properties;

/**
 * Class BackwardCompatibility
 * @package PagSeguro\Enum\Properties
 */
class BackwardCompatibility
{

    /**
     *  Application ID
     */
    const APP_ID = "appId";

    /**
     *  Application Key
     */
    const APP_KEY = "appKey";

    /**
     * Shipping address street
     */
    const BILLING_ADDRESS_STREET = "billingAddress.street";

    /**
     * Shipping address number
     */
    const BILLING_ADDRESS_NUMBER = "billingAddress.number";

    /**
     * Shipping address complement
     */
    const BILLING_ADDRESS_COMPLEMENT = "billingAddress.complement";

    /**
     *  Shipping address city
     */
    const BILLING_ADDRESS_CITY = "billingAddress.city";

    /**
     *  Shipping address state
     */
    const BILLING_ADDRESS_STATE = "billingAddress.state";

    /**
     *  Shipping address district
     */
    const BILLING_ADDRESS_DISTRICT = "billingAddress.district";

    /**
     * Shipping address postal code
     */
    const BILLING_ADDRESS_POSTAL_CODE = "billingAddress.postalCode";

    /**
     *  Shipping address country
     */
    const BILLING_ADDRESS_COUNTRY = "billingAddress.country";

    /**
     *  Currency
     */
    const CURRENCY = "currency";

    /**
     *  Extra amount
     */
    const CURRENCY_EXTRA_AMOUNT = "extraAmount";

    /**
     * Credit card holder name for credit card direct payment
     */
    const CREDIT_CARD_HOLDER_NAME = 'creditCard.holder.name';

    /**
     * Credit card holder birth date for credit card direct payment
     */
    const CREDIT_CARD_HOLDER_BIRTH_DATE = 'creditCard.holder.birthDate';

    /**
     * Credit card holder cpf for credit card direct payment
     */
    const CREDIT_CARD_HOLDER_CPF = 'creditCard.holder.CPF';

    /**
     * Credit card holder area code for credit card direct payment
     */
    const CREDIT_CARD_HOLDER_AREA_CODE = 'creditCard.holder.areaCode';

    /**
     * Credit card holder phone for credit card direct payment
     */
    const CREDIT_CARD_HOLDER_PHONE = 'creditCard.holder.phone';

    /**
     * Credit card token for credit card direct payment
     */
    const CREDIT_CARD_TOKEN = "creditCard.token";

    /**
     *  Payment mode
     */
    const DIRECT_PAYMENT_MODE = "payment.mode";

    /**
     *  Payment method
     */
    const DIRECT_PAYMENT_METHOD = "payment.method";

    /**
     * Installment quantity for credit card payment
     */
    const INSTALLMENT_QUANTITY = "installment.quantity";

    /**
     * Installment value for credit card payment
     */
    const INSTALLMENT_VALUE = "installment.value";

    /**
     * Installment no interest installment quantity for credit card payment
     */
    const INSTALLMENT_NO_INTEREST_INSTALLMENT_QUANTITY = "installment.noInterestInstallmentQuantity";

    /**
     *  Item id
     */
    const ITEM_ID = "item[%s].id";

    /**
     *  Item description
     */
    const ITEM_DESCRIPTION = "item[%s].description";

    /**
     *  Item amount
     */
    const ITEM_AMOUNT = "item[%s].amount";

    /**
     *  Item quantity
     */
    const ITEM_QUANTITY = "item[%s].quantity";

    /**
     * Item weight
     */
    const ITEM_WEIGHT = "item[%s].weight";

    /**
     *  Notification URL
     */
    const NOTIFICATION_URL = "notificationURL";

    /**
     *  Bank name
     */
    const ONLINE_DEBIT_BANK_NAME = "bank.name";

    /**
     * Receiver email
     */
    const RECEIVER_EMAIL = 'receiver.email';

    /**
     *  Receiver public key
     */
    const RECEIVER_PUBLIC_KEY = "receiver[%s].publicKey";

    /**
     * Redirect Url
     */
    const REDIRECT_URL = "redirectURL";

    /**
     *  Reference
     */
    const REFERENCE = "reference";

    /**
     * Sender name
     */
    const SENDER_NAME = "sender.name";

    /**
     * Sender email
     */
    const SENDER_EMAIL = "sender.email";

    /**
     * Sender hash
     */
    const SENDER_HASH = "sender.hash";

    /**
     * Sender ip number
     */
    const SENDER_IP = "sender.ip";

    /**
     *  Sender area code
     */
    const SENDER_PHONE_AREA_CODE = "sender.areaCode";

    /**
     * Sender phone number
     */
    const SENDER_PHONE_NUMBER = "sender.phone";

    /**
     *  Sender CPF
     */
    const SENDER_DOCUMENT_CPF = "sender.CPF";

    /**
     * Sender CNPJ
     */
    const SENDER_DOCUMENT_CNPJ = "sender.CNPJ";

    /**
     * Shipping type
     */
    const SHIPPING_TYPE = "shipping.type";

    /**
     * Shipping cost
     */
    const SHIPPING_COST = "shipping.cost";

    /**
     * Shipping address street
     */
    const SHIPPING_ADDRESS_STREET = "shipping.address.street";

    /**
     * Shipping address number
     */
    const SHIPPING_ADDRESS_NUMBER = "shipping.address.number";

    /**
     * Shipping address complement
     */
    const SHIPPING_ADDRESS_COMPLEMENT = "shipping.address.complement";

    /**
     *  Shipping address city
     */
    const SHIPPING_ADDRESS_CITY = "shipping.address.city";

    /**
     *  Shipping address state
     */
    const SHIPPING_ADDRESS_STATE = "shipping.address.state";

    /**
     *  Shipping address district
     */
    const SHIPPING_ADDRESS_DISTRICT = "shipping.address.district";

    /**
     * Shipping address postal code
     */
    const SHIPPING_ADDRESS_POSTAL_CODE = "shipping.address.postalCode";

    /**
     *  Shipping address country
     */
    const SHIPPING_ADDRESS_COUNTRY = "shipping.address.country";

    /**
     *  Primary Key
     */
    const PRIMARY_RECEIVER_PUBLIC_KEY = "primaryReceiver.publicKey";
}
