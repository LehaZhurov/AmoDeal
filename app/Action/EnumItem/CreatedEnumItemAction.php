<?php

namespace App\Action\EnumItem;

use App\Models\EnumItem;

class CreatedEnumItemAction
{

    public static function execute(array $enumList): array
    {
        $enumItemIds = [];
        foreach ($enumList as $key => $item) {
            $enumQuery = EnumItem::query();
            $uniqueEnumItem = $enumQuery->select('id')->where('value', '=', $item['value']);
            if (!$uniqueEnumItem->exists()) {
                $enumItem = new EnumItem();
                $enumItem->value = $item['value'];
                if (array_key_exists('enum_code', $item)) {
                    $enumItem->enumCode  = $item['enum_code'];
                }
                if (array_key_exists('enum_id', $item)) {
                    $enumItem->enumId  = $item['enum_id'];
                }
                $enumItem->save();
                $enumItemIds[] = $enumItem->id;
            } else {
                $enumItemIds[] = $uniqueEnumItem->first()->id;
            }
        }
        return $enumItemIds;
    }
}
