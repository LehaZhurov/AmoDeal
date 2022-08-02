<?php

namespace App\Action\Deal;

use App\Models\Deal;
use AmoCRM\Client\AmoCRMApiClient;

class CreatedDealAction
{

    public static function execute(AmoCRMApiClient $api): void
    {
        $leadModels = $api->leads()->get();
        $createdItem = [];
        foreach ($leadModels as $key => $lead) {
            $uniqueName = Deal::where('name', $lead->name)->exists();
            if (!$uniqueName) {
                $deal = new Deal();
                $deal->original_id = $lead->id;
                $deal->name = $lead->name;
                $deal->responsibleUserId = $lead->responsibleUserId;
                $deal->groupId = $lead->groupId;
                $deal->createdBy = $lead->createdBy;
                $deal->updatedBy = $lead->updatedBy;
                $deal->createdAt = $lead->createdAt;
                $deal->updatedAt = $lead->updatedAt;
                $deal->accountId = $lead->accountId;
                $deal->pipelineId = $lead->pipelineId;
                $deal->statusId = $lead->statusId;
                $deal->closedAt = $lead->closedAt;
                $deal->closestTaskAt = $lead->closestTaskAt;
                $deal->price = $lead->price;
                $deal->lossReasonId = $lead->lossReasonId;
                $deal->lossReason = $lead->lossReason;
                $deal->isDeleted = $lead->isDeleted;
                $deal->tags = $lead->tags;
                $deal->sourceId = $lead->sourceId;
                $deal->sourceExternalId = $lead->sourceExternalId;
                $deal->score = $lead->score;
                $deal->isPriceModifiedByRobot = $lead->isPriceModifiedByRobot;
                $deal->contacts = $lead->contacts;
                $deal->catalogElementsLinks = $lead->catalogElementsLinks;
                $deal->visitorUid = $lead->visitorUid;
                $deal->metadata = $lead->metadata;
                $deal->complexRequestIds = $lead->complexRequestIds;
                $deal->isMerged = $lead->isMerged;
                $deal->requestId = $lead->requestId;
                $deal->save();
            }
        }
    }
}
