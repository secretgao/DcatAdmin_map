<?php

namespace App\Admin\Controllers;

use App\Models\Column;
use App\Admin\Repositories\Location;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;


class LocationController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new Location(), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('location');
            $grid->column('address');
            $grid->column('column_id');
            $grid->column('created_at');
            $grid->column('updated_at')->sortable();

            $grid->filter(function (Grid\Filter $filter) {
                $filter->equal('id');

            });
        });
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     *
     * @return Show
     */
    protected function detail($id)
    {
        return Show::make($id, new Location(), function (Show $show) {
            $show->field('id');
            $show->field('location');
            $show->field('address');
            $show->field('column_id');
            $show->field('created_at');
            $show->field('updated_at');
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Form::make(new Location(), function (Form $form) {

            $form->display('id');
            $form->text('location')->addElementClass('field_location');
            $form->text('address')->addElementClass('field_address');
            $form->html(view('coordinate'), '区域选择'); // 加载自定义地图

            $options = Column::pluck('name', 'id');
            $form->select('column_id')->options($options);

            $form->display('created_at');
            $form->display('updated_at');
            $form->footer(function ($footer) {
                // 去掉`查看`checkbox
                $footer->disableViewCheck();
                // 去掉`继续编辑`checkbox
                $footer->disableEditingCheck();
                // 去掉`继续创建`checkbox
                $footer->disableCreatingCheck();
            });
        });
    }
}
