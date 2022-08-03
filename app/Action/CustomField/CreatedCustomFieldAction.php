<?php

namespace App\Action\CustomField;

use App\Models\CustomField;
use App\Action\EnumItem\CreatedEnumItemAction;

class CreatedCustomFieldAction
{

    public static function execute(object $fieldList): array
    {
        $fieldIds = [];
        foreach ($fieldList as $key => $field) {
            $query = CustomField::query();
            $uniqueField = $query->where('fieldId', "=", $field->fieldId);
            if ($uniqueField->doesntExist()) {
                $newField = new CustomField();
                $newField->fieldId = $field->fieldId;
                $newField->fieldCode = $field->fieldCode;
                $newField->fieldName = $field->fieldName;
                $newField->save();
                $fieldIds[] = $newField->id;
            } else {
                $fieldIds[] = $uniqueField->first()->id;
            }
            if(!empty($field->values->toArray())) {
                $enumItemIds = CreatedEnumItemAction::execute($field->values->toArray());
                $enumItemId = $fieldIds[$key];
                CustomField::find($enumItemId)->enums()->sync($enumItemIds);
            }
        }
        return $fieldIds;
    }
}
