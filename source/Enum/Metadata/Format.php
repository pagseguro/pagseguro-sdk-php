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

namespace PagSeguro\Enum\Metadata;

use PagSeguro\Enum\Enum;

/**
 * Class Format
 *
 * Describes each format expected by each parameter of the metadata
 *
 * @package PagSeguro\Enum\Metadata
 */
class Format extends Enum
{
    const PASSENGER_CPF = '[0-9]{11}';
    const PASSENGER_PASSPORT = '.+';
    const ORIGIN_CITY = '.+';
    const DESTINATION_CITY = '.+';
    const ORIGIN_AIRPORT_CODE = '.+';
    const DESTINATION_AIRPORT_CODE = '.+';
    const GAME_NAME = '.+';
    const PLAYER_ID = '.+';
    const TIME_IN_GAME_DAYS = '[0-9]+';
    const MOBILE_NUMBER = '([0-9]{2})?([0-9]{2})([0-9]{4,5}[0-9]{4})';
    const PASSENGER_NAME = '.+';
}
