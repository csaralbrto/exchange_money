<?php

namespace App\Admin\Controllers;

use App\User;
use App\Models\PricingDay;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;
use Illuminate\Http\Request;

class PricingDayController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'PricingDay';

    /**
     * Index interface.
     *
     * @param Content $content
     * @return Content
     */
    public function index(Content $content)
    {
        return $content
            ->header('Listado de tasas')
            // ->description('description')
            ->body($this->grid());
    }

    /**
     * Show interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function show($id, Content $content)
    {
        return $content
            ->header('Detalles de la tasa')
            // ->description('Descripción')
            ->body($this->detail($id));
    }

    /**
     * Edit interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function edit($id, Content $content)
    {
        return $content
            ->header('Editar datos de la tasa')
            ->description('Los campos con (*) son obligatorios')
            ->body($this->form()->edit($id));
    }

    /**
     * Create interface.
     *
     * @param Content $content
     * @return Content
     */
    public function create(Content $content)
    {
        return $content
            ->header('Creación de tasa')
            ->description('Los campos con (*) son obligatorios')
            ->body($this->form());

    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new PricingDay());
        $grid->model()->orderBy('id','DESC');
        // $grid->disableCreateButton();
        $grid->actions(function ($actions) {
            $actions->disableDelete();
            $actions->disableView();
        });

        $grid->id('ID');
        $grid->dayli_rate('Tasa del dia');
        $grid->img('Imágen')->image();
        $grid->tools(function ($tools) {
            $tools->disableRefreshButton();
        });


        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(PricingDay::findOrFail($id));

        $show->id('Id');
        $show->dayli_rate('Tasa del dia');
        $show->img('Imágen de la tasa');
        $show->created_at('Created at');
        $show->updated_at('Updated at');

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new PricingDay());
        $dir = '/dayli_rate_img';
        $form->text('dayli_rate','Tasa del dia')->rules('required');
        $form->image('img','Imágen página principal')->move($dir)->rules('required')->uniqueName();

        return $form;
    }
}
