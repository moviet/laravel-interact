<?php

namespace App\Scopes;

use App\Models\Network\Group as GroupScopes;

class Groups
{
    /*
    public function findById($groupId, int $id)
    {
        return GroupScopes::where($groupId, $id)->get();
    }
    */

    public function findFriendByGroup($id, $bridge)
    {
        return GroupScopes::whereNotIn('id', [$id])->orWhereNotIn('bridge', [$bridge])
                ->limit(12)
                ->get();
    }

    public function findStatusByGroup($id, $bridge)
    {
        return GroupScopes::where('id', $id)->orWhere('bridge', $bridge)
                ->groupBy('token','bridge')
                ->limit(30)
                ->get();
    }

    public function findFriendByGroupId($id)
    {
        return GroupScopes::where('id', $id)->limit(6)->get();
    }

    public function findFriendByGroupBridge($bridge)
    {
        return GroupScopes::where('bridge', $bridge)->limit(6)->get();
    }

    public function findFriendById($id, $bridge)
    {
        return GroupScopes::where('id', $id)->where('bridge', $bridge)->limit(1)->get();
    }

    public function findFriendByGates($bridge, $id)
    {
        return GroupScopes::where('bridge', $bridge)->where('id', $id)->limit(10)->get();
    }

    public function findFriendByApprove()
    {
        return GroupScopes::groupBy('status')->limit(12)->get();
    }

    public function findByAll()
    {
        return GroupScopes::select('*')->orderBy('created_at','DESC')->limit(50)->get();
    }
}