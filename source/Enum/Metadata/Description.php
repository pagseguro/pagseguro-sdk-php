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
 * Class Description
 * @package PagSeguro\Enum\Metadata
 */
class Description extends Enum
{
    const PASSENGER_CPF = 'CPF do passageiro';
    const PASSENGER_PASSPORT = ' Passaporte do passageiro';
    const ORIGIN_CITY = 'Cidade de origem';
    const DESTINATION_CITY = 'Cidade de destino';
    const ORIGIN_AIRPORT_CODE = 'Código do aeroporto de origem';
    const DESTINATION_AIRPORT_CODE = 'Código do aeroporto de destino';
    const GAME_NAME = 'Nome do jogo';
    const PLAYER_ID = 'ID do jogador';
    const TIME_IN_GAME_DAYS = 'Tempo no jogo em dias';
    const MOBILE_NUMBER = 'Celular de recarga';
    const PASSENGER_NAME = 'Nome do passageiro';
}
