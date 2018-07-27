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

namespace PagSeguro\Domains\Requests\Application\Authorization;

use PagSeguro\Domains\Authorization\AccountTrait;
use PagSeguro\Domains\Requests\Notification;
use PagSeguro\Domains\Requests\Permissions;
use PagSeguro\Domains\Requests\Reference;
use PagSeguro\Domains\Requests\Redirect;
use PagSeguro\Domains\Requests\Requests;

/**
 * Class Request
 * @package PagSeguro\Domains\Requests
 */
class Request implements Requests
{
    use Notification {
        Notification::getUrl as getNotificationUrl;
        Notification::setUrl as setNotificationUrl;
        Notification::getUrl insteadof Redirect;
        Notification::setUrl insteadof Redirect;
    }
    use Permissions;
    use Reference;
    use AccountTrait;
    use Redirect {
        Redirect::getUrl as getRedirectUrl;
        Redirect::setUrl as setRedirectUrl;
    }
}
