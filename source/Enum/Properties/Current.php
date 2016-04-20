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
     * Currency
     */
    const CURRENCY = "currency";

    /**
     * Document type
     */
    const DOCUMENT_TYPE = "documentType";

    /**
     * Document value
     */
    const DOCUMENT_VALUE = "documentValue";

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
     * Sender name
     */
    const SENDER_NAME = "senderName";

    /**
     * Sender email
     */
    const SENDER_EMAIL = "senderEmail";

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
     *  Sender IP
     */
    const SENDER_IP = "ip";

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
