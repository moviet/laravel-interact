<?php

namespace App\Scopes;

use App\Models\Network\Approved as ApprovedScope;

class Approved
{
    public static function findFriendByApprove($bridge, $id)
    {
        return ApprovedScope::where('bridge', $bridge)->where('id', $id)->limit(1)->get();
    }

    public static function findFriendByWait($id, $bridge)
    {
        return ApprovedScope::where('id', $id)->where('bridge', $bridge)->limit(1)->get();
    }

    public static function getApproved($bridge)
    {
        return ApprovedScope::where('bridge', $bridge)->limit(12)->get();
    }

    public static function getWait($id)
    {
        return ApprovedScope::where('id', $id)->limit(12)->get();
    }
}