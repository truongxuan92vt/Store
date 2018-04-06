<?php

namespace App\Http\Repositories;

use App\Models\FunctionRole;
use App\Models\Functions;
use Illuminate\Support\Facades\DB;

class FunctionRoleRepository extends BaseRepository
{
    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return FunctionRole::class;
    }

    public function getFunctionRoleByRoleId($roleId)
    {
        $res = $this->model->select('function_id')->where('role_id', $roleId)->where("status", ENABLE)->get();
        return $res;
    }

    public function updateFunctionRole($roleId, $functionId, $status)
    {
        try {
            DB::beginTransaction();
            $children = Functions::where('parent_id', $functionId)->where('status', 'EN')->get();
            if (count($children) > 0) {
                foreach ($children as $item) {
                    $childrenL2 = Functions::where('parent_id', $item->id)->where('status', 'EN')->get();
                    if (count($childrenL2) > 0) {
                        foreach ($childrenL2 as $childL2) {
                            $isExistPermission = $this->model->where('function_id', $childL2->id)->where('role_id', $roleId)->first();
                            if ($isExistPermission) {
                                $this->model->where('function_id', $childL2->id)->where('role_id', $roleId)->update(['status' => $status]);
                            } else {
                                $this->model->insert(['role_id' => $roleId, 'function_id' => $childL2->id, 'status' => $status]);
                            }
                        }
                    }
                    $isExistPermission = $this->model->where('function_id', $item->id)->where('role_id', $roleId)->first();
                    if ($isExistPermission) {
                        $this->model->where('function_id', $item->id)->where('role_id', $roleId)->update(['status' => $status]);
                    } else {
                        $this->model->insert(['role_id' => $roleId, 'function_id' => $item->id, 'status' => $status]);
                    }

                }

            }
            $isExistPermission = $this->model->where('function_id', $functionId)->where('role_id', $roleId)->first();
            if ($isExistPermission) {
                $this->model->where('function_id', $functionId)->where('role_id', $roleId)->update(['status' => $status]);
            } else {
                $this->model->insert(['role_id' => $roleId, 'function_id' => $functionId, 'status' => $status]);
            }
            //Check parent
            $functionDB = Functions::where('id', $functionId)->where('status', 'EN')->first();
            if ($functionDB) {
                $parent = Functions::where('id', $functionDB->parent_id)->where('status', 'EN')->first();
                if ($parent) {
                    //Check parent of Parent
                    $parentL1 = Functions::where('id', $parent->parent_id)->where('status', 'EN')->first();
                    if ($parentL1) {
                        $isExistPermission = $this->model->where('function_id', $parentL1->id)->where('role_id', $roleId)->first();
                        if ($isExistPermission) {
                            $this->model->where('function_id', $parentL1->id)->where('role_id', $roleId)->update(['status' => $status]);
                        } else {
                            $this->model->insert(['role_id' => $roleId, 'function_id' => $parentL1->id, 'status' => $status]);
                        }
                    }

                    $isExistPermission = $this->model->where('function_id', $parent->id)->where('role_id', $roleId)->first();
                    if ($isExistPermission) {
                        $this->model->where('function_id', $parent->id)->where('role_id', $roleId)->update(['status' => $status]);
                    } else {
                        $this->model->insert(['role_id' => $roleId, 'function_id' => $parent->id, 'status' => $status]);
                    }
                }
            }
            DB::commit();
            return ['status' => true, 'message' => 'Permission was updated success'];
        } catch (\Exception $e) {
            DB::rollBack();
            return ['status' => false, 'message' => 'System Error', 'data' => $e->getMessage()];
        }
    }

}