<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deal extends Model
{
    use HasFactory;


    protected $fillable = [
        "id",
        "original_id",
        "name",
        "responsibleUserId",
        "groupId",
        "createdBy",
        "updatedBy" ,
        "createdAt" ,
        "updatedAt" ,
        "accountId" ,
        "pipelineId" ,
        "statusId" ,
        "closedAt" ,
        "closestTaskAt" ,
        "price" ,
        "lossReasonId" ,
        "lossReason" ,
        "isDeleted" ,
        "tags" ,
        "sourceId" ,
        "sourceExternalId",
        "score" ,
        "isPriceModifiedByRobot" ,
        "contacts" ,
        "catalogElementsLinks" ,
        "visitorUid",
        "metadata",
        "complexRequestIds",
        "isMerged",
        "requestId",
    ];
}
