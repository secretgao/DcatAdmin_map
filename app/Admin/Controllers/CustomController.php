<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\Location;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;

class CustomController extends AdminController
{
    /**
     * 自定义地图模型
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function customMap()
    {
        return view('map');
    }
}
