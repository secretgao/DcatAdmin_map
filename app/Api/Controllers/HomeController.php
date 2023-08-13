<?php

namespace App\Api\Controllers;

use App\Api\Metrics\Examples;
use App\Http\Controllers\Controller;
use App\Models\Location;
use App\Models\Column;
use Dcat\Admin\Http\Controllers\Dashboard;
use Dcat\Admin\Layout\Content;
use Dcat\Admin\Layout\Row;
use Dcat\Admin\Http\JsonResponse;
class HomeController extends Controller
{
    public function index(Content $content)
    {


    }

    public function test(\Illuminate\Http\Request $request){

        //分页参数
        $page = $request->input('page',1);
        $pageSize = $request->input('page_size',10);
        $offset = ($page - 1) * $pageSize;
        //总条数
        $total = Location::query()->count();
        //查询数据
        $select = ['address as column_address','location as column_location','column_id'];
        $data = Location::query()->select($select)->limit($pageSize)->offset($offset)->get()->toArray();
        $columnIdArr = array_column($data,'column_id');
        $columnArr = Column::query()->whereIn('id',$columnIdArr)->pluck('name','id');
        foreach ($data as $key=>$item){
            $data[$key]['column_name'] = isset($columnArr[$item['column_id']]) ? $columnArr[$item['column_id']] : '';
        }

        //返回结果
        $result['data'] = $data;
        $result['meta']['page'] = $page;
        $result['meta']['page_size'] = $pageSize;
        $result['meta']['total'] = $total;
        $result['meta']['total_page'] = ceil($total / $pageSize);

        return JsonResponse::make()->data(['result'=>$result])->success('成功！');
    }
}
