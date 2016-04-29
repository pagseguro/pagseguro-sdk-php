<?php
/**
 * Created by PhpStorm.
 * User: esilva
 * Date: 18/04/16
 * Time: 19:28
 */

namespace PagSeguro\Enum;

/**
 * Class Notification
 * @package PagSeguro\Enum
 */
class Notification extends Enum
{

    /**
     *
     */
    const TRANSACTION = "transaction";
    /**
     *
     */
    const APPLICATION_AUTHORIZATION = "applicationAuthorization";
    /**
     *
     */
    const PRE_APPROVAL = "preApproval";
}
