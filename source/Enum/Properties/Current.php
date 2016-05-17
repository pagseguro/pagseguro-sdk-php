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
 * Class Current
 * @package PagSeguro\Enum\Properties
 */
class Current
{

    /**
     * Accept Payment Method Group
     */
    const ACCEPT_PAYMENT_METHOD_GROUP = "acceptPaymentMethodGroup";

    /**
     * Accept Payment Method Name
     */
    const ACCEPT_PAYMENT_METHOD_NAME = "acceptPaymentMethodName";

    /**
     * Billing addres postal code for credit card direct payment
     */
    const BILLING_ADDRESS_POSTAL_CODE = 'billingAddressPostalCode';
    
    /**
     * Billing addres postal street for credit card direct payment
     */
    const BILLING_ADDRESS_STREET = 'billingAddressStreet';
    
    /**
     * Billing addres number for credit card direct payment
     */
    const BILLING_ADDRESS_NUMBER = 'billingAddressNumber';
    
    /**
     * Billing addres complement for credit card direct payment
     */
    const BILLING_ADDRESS_COMPLEMENT = 'billingAddressComplement';
    
    /**
     * Billing addres district for credit card direct payment
     */
    const BILLING_ADDRESS_DISTRICT = 'billingAddressDistrict';
    
    /**
     * Billing addres city for credit card direct payment
     */
    const BILLING_ADDRESS_CITY = 'billingAddressCity';
    
    /**
     * Billing addres state for credit card direct payment
     */
    const BILLING_ADDRESS_STATE = 'billingAddressState';
    
    /**
     * Billing addres country for credit card direct payment
     */
    const BILLING_ADDRESS_COUNTRY = 'billingAddressCountry';

    /**
     * Credit card holder name for credit card direct payment
     */
    const CREDIT_CARD_HOLDER_NAME = 'creditCardHolderName';
    
    /**
     * Credit card holder birth date for credit card direct payment
     */
    const CREDIT_CARD_HOLDER_BIRTH_DATE = 'creditCardHolderBirthDate';
    
    /**
     * Credit card holder cpf for credit card direct payment
     */
    const CREDIT_CARD_HOLDER_CPF = 'creditCardHolderCPF';
    
    /**
     * Credit card holder area code for credit card direct payment
     */
    const CREDIT_CARD_HOLDER_AREA_CODE = 'creditCardHolderAreaCode';
    
    /**
     * Credit card holder phone for credit card direct payment
     */
    const CREDIT_CARD_HOLDER_PHONE = 'creditCardHolderPhone';
    
    /**
     * Credit card token for credit card direct payment
     */
    const CREDIT_CARD_TOKEN = "creditCardToken";
    
    /**
     * Currency
     */
    const CURRENCY = "currency";
    
    /**
     * Currency extra amount (optional)
     */
    const CURRENCY_EXTRA_AMOUNT = "extraAmount";
    
    /**
     * Direct Payment Method
     */
    const DIRECT_PAYMENT_METHOD = "paymentMethod";

    /**
     * Direct Payment Mode
     */
    const DIRECT_PAYMENT_MODE = "paymentMode";

    /**
     * Document type
     */
    const DOCUMENT_TYPE = "documentType";

    /**
     * Document value
     */
    const DOCUMENT_VALUE = "documentValue";

    /**
     * Exclude Payment Method Group
     */
    const EXCLUDE_PAYMENT_METHOD_GROUP = "excludePaymentMethodGroup";

    /**
     * Exclude Payment Method Name
     */
    const EXCLUDE_PAYMENT_METHOD_NAME = "excludePaymentMethodName";

    /**
     * Installment amount
     */
    const INSTALLMENT_AMOUNT = "amount";

    /**
     * Installment card brand
     */
    const INSTALLMENT_CARD_BRAND = "cardBrand";
    
    /**
     * Installment quantity for credit card payment
     */
    const INSTALLMENT_QUANTITY = "installmentQuantity";
    
    /**
     * Installment value for credit card payment
     */
    const INSTALLMENT_VALUE = "installmentValue";

    /**
     * Installment max installment No interest
     */
    const INSTALLMENT_MAX_INSTALLMENT_NO_INTEREST = "maxInstallmentNoInterest";
    
    /**
     * Item identifier
     */
    const ITEM_ID = "itemId%s";

    /**
     * Item description
     */
    const ITEM_DESCRIPTION = "itemDescription%s";

    /**
     * Item quantity
     */
    const ITEM_QUANTITY = "itemQuantity%s";

    /**
     *  Item amount
     */
    const ITEM_AMOUNT = "itemAmount%s";

    /**
     * Item weight
     */
    const ITEM_WEIGHT = "itemWeight%s";

    /**
     * Item shipping cost
     */
    const ITEM_SHIPPING_COST = "itemShippingCost%s";

    /**
     * Metadata item key
     */
    const METADATA_ITEM_KEY = "metadataItemKey%s";

    /**
     * Metadata item value
     */
    const METADATA_ITEM_VALUE = "metadataItemValue%s";

    /**
     * Metadata item group
     */
    const METADATA_ITEM_GROUP = "metadataItemGroup%s";

    /**
     * Notification Url
     */
    const NOTIFICATION_URL = "notificationURL";
    
    /**
     * The bank name for online debit
     */
    const ONLINE_DEBIT_BANK_NAME = 'bankName';

    /**
     * Payment method group
     */
    const PAYMENT_METHOD_GROUP = "paymentMethodGroup%s";

    /**
     * Payment method config key
     */
    const PAYMENT_METHOD_CONFIG_KEY = "paymentMethodConfigKey%s_%s";

    /**
     * Payment method config value
     */
    const PAYMENT_METHOD_CONFIG_VALUE = "paymentMethodConfigValue%s_%s";

    /**
     * Permissions
     */
    const PERMISSIONS = "permissions";

    /**
     * Pre Approval Code
     */
    const PRE_APPROVAL_CODE = "preApprovalCode";

    /**
     * Pre Approval Charge
     */
    const PRE_APPROVAL_CHARGE = "preApprovalCharge";

    /**
     * Pre Approval Name
     */
    const PRE_APPROVAL_NAME = "preApprovalName";

    /**
     * Pre Approval Details
     */
    const PRE_APPROVAL_DETAILS = "preApprovalDetails";

    /**
     * Pre Approval Amount Per Payment
     */
    const PRE_APPROVAL_AMOUNT_PER_PAYMENT = "preApprovalAmountPerPayment";

    /**
     * Pre Approval Max Amount Per Payment
     */
    const PRE_APPROVAL_MAX_AMOUNT_PER_PAYMENT = "preApprovalMaxAmountPerPayment";

    /**
     * Pre Approval Period
     */
    const PRE_APPROVAL_PERIOD = "preApprovalPeriod";

    /**
     * Pre Approval Max Payments Per Period
     */
    const PRE_APPROVAL_MAX_PAYMENTS_PER_PERIOD = "preApprovalMaxPaymentsPerPeriod";

    /**
     * Pre Approval Max Amount Per Period
     */
    const PRE_APPROVAL_MAX_AMOUNT_PER_PERIOD = "preApprovalMaxAmountPerPeriod";

    /**
     * Pre Approval Initial Date
     */
    const PRE_APPROVAL_INITIAL_DATE = "preApprovalInitialDate";

    /**
     * Pre Approval Final Date
     */
    const PRE_APPROVAL_FINAL_DATE = "preApprovalFinalDate";

    /**
     * Pre Approval Max Total Amount
     */
    const PRE_APPROVAL_MAX_TOTAL_AMOUNT = "preApprovalMaxTotalAmount";

    /**
     * Receiver email
     */
    const RECEIVER_EMAIL = 'receiverEmail';

    /**
     * Search initial date
     */
    const SEARCH_INITIAL_DATE = "initialDate";

    /**
     * Search final date
     */
    const SEARCH_FINAL_DATE = "finalDate";

    /**
     * Search max results per page
     */
    const SEARCH_MAX_RESULTS_PER_PAGE = "maxPageResults";

    /**
     * Search page qty
     */
    const SEARCH_PAGE = "page";

    /**
     * Sender name
     */
    const SENDER_NAME = "senderName";

    /**
     * Sender email
     */
    const SENDER_EMAIL = "senderEmail";
    
    /**
     * Sender hash
     */
    const SENDER_HASH = "senderHash";
    
    /**
     * Sender ip number
     */
    const SENDER_IP = "senderIp";

    /**
     *  Sender area code
     */
    const SENDER_PHONE_AREA_CODE = "senderAreaCode";

    /**
     * Sender phone number
     */
    const SENDER_PHONE_NUMBER = "senderPhone";

    /**
     *  Sender CPF
     */
    const SENDER_DOCUMENT_CPF = "senderCPF";

    /**
     * Sender CNPJ
     */
    const SENDER_DOCUMENT_CNPJ = "senderCNPJ";

    /**
     * Shipping type
     */
    const SHIPPING_TYPE = "shippingType";

    /**
     * Shipping cost
     */
    const SHIPPING_COST = "shippingCost";

    /**
     * Shipping address street
     */
    const SHIPPING_ADDRESS_STREET = "shippingAddressStreet";

    /**
     * Shipping address number
     */
    const SHIPPING_ADDRESS_NUMBER = "shippingAddressNumber";

    /**
     * Shipping address complement
     */
    const SHIPPING_ADDRESS_COMPLEMENT = "shippingAddressComplement";

    /**
     *  Shipping address city
     */
    const SHIPPING_ADDRESS_CITY = "shippingAddressCity";

    /**
     *  Shipping address state
     */
    const SHIPPING_ADDRESS_STATE = "shippingAddressState";

    /**
     *  Shipping address district
     */
    const SHIPPING_ADDRESS_DISTRICT = "shippingAddressDistrict";

    /**
     * Shipping address postal code
     */
    const SHIPPING_ADDRESS_POSTAL_CODE = "shippingAddressPostalCode";

    /**
     *  Shipping address country
     */
    const SHIPPING_ADDRESS_COUNTRY = "shippingAddressCountry";

    /**
     * Redirect Url
     */
    const REDIRECT_URL = "redirectURL";

    /**
     * Reference
     */
    const REFERENCE = "reference";

    /**
     * Refund value
     */
    const REFUND_VALUE = "refundValue";

    /**
     * Transaction code
     */
    const TRANSACTION_CODE = "transactionCode";
}
