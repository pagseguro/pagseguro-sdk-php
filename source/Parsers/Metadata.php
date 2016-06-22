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

namespace PagSeguro\Parsers;

use PagSeguro\Domains\Requests\Requests;
use PagSeguro\Helpers\StringFormat;
use PagSeguro\Enum\Metadata\Description;

/**
 * Parser for the Metadata
 *
 */
trait Metadata
{

    /**
     * @param Requests $request
     * @param $properties
     * @return array
     */
    public static function getData(Requests $request, $properties)
    {
        $data = [];

        if ($request->metadataLenght() > 0) {
            $metadata = $request->getMetadata();
            $count = 0;

            foreach ($metadata as $key => $value) {
                $count++;
                if (!is_null($metadata[$key]->getKey())) {
                    $data[sprintf($properties::METADATA_ITEM_KEY, $count)] = $metadata[$key]->getKey();
                }
                if (!is_null($metadata[$key]->getValue())) {
                    $data[sprintf($properties::METADATA_ITEM_VALUE, $count)] = self::formatKeyValue(
                        $metadata[$key]->getKey(),
                        $metadata[$key]->getValue()
                    );
                }
                if (!is_null($metadata[$key]->getGroup())) {
                    $data[sprintf($properties::METADATA_ITEM_GROUP, $count)] = $metadata[$key]->getGroup();
                }
            }
        }
        return $data;
    }
    
    /**
     * Format the $value to fit the limit of 100 characters and according
     *  with the $key value, if it needs an special format
     * @param string $key
     * @param string $value
     * @return string
     */
    private static function formatKeyValue($key, $value)
    {
        $value = StringFormat::formatString($value, 100, '');

        switch ($key) {
            case self::getKeyByDescription('CPF do passageiro'):
                return StringFormat::getOnlyNumbers($value);
                break;
            case self::getKeyByDescription('Tempo no jogo em dias'):
                return StringFormat::getOnlyNumbers($value);
                break;
            case self::getKeyByDescription('Celular de recarga'):
                return StringFormat::getOnlyNumbers($value);
                break;
            default:
                return $value;
        }
    }
    
    /***
     * Gets item key type by description
     * @param string $itemDescription
     * @return string
     */
    public static function getKeyByDescription($itemDescription)
    {
        return array_search(strtolower($itemDescription), array_map('strtolower', Description::getList()));
    }
}
