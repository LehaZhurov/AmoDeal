<?php

namespace App\Action\Company;

use App\Models\Company;

class CreatedCompanyAction
{

    public static function execute(array $companyData): int
    {
        $query = Company::where('original_id',$companyData['id']);
        if(!$query->exists()){
            $company = new Company();
            $company->original_id = $companyData['id'];
            $company->name = $companyData['name'];
            $company->responsibleUserId = $companyData['responsible_user_id'];
            $company->groupId = $companyData['group_id'];
            $company->createdBy = $companyData['created_by'];
            $company->updatedBy = $companyData['updated_by'];
            $company->createdAt = $companyData['created_at'];
            $company->updatedAt = $companyData['updated_at'];
            $company->closestTaskAt = $companyData['closest_task_at'];
            $company->accountId = $companyData['account_id'];
            $company->save();
            return $company->id;
        }
        return $query->first()->id;
    }
}
