<?php

/*
 * This file is part of the Qsnh/meedu.
 *
 * (c) XiaoTeng <616896861@qq.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace App\Http\Controllers\Backend\Api\V1;

use App\Meedu\Addons;

class AddonsController extends BaseController
{
    public function index(Addons $lib)
    {
        $addons = $lib->addons();
        $addons = array_map(function ($item) {
            $indexRoute = $item['index_route'] ?? '';
            $indexRoute && $item['index_url'] = route($indexRoute);
            return $item;
        }, $addons);
        return $this->successData(array_values($addons));
    }
}
