<?php

namespace App\Admin\Controllers;

use App\User;
use App\Administrator;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;
use Illuminate\Http\Request;

class AdministratorController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Administrator';

     /**
     * Index interface.
     *
     * @param Content $content
     * @return Content
     */
    public function index(Content $content)
    {
        return $content
            ->header('Datos Casa de cambio')
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
            ->header('Detalles de la Casa de cambio')
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
            ->header('Editar datos de la Casa de cambio')
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
            ->header('Creación de los datos')
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
        $grid = new Grid(new Administrator());
        
        $grid->model()->orderBy('id','DESC');

        $grid->id('ID');
        $grid->name('Nombre de la casa de cambio');
        $grid->email('Correo electronico');
        $grid->phone('Teléfono');
        $grid->logo('Logo')->image();

        $grid->tools(function ($tools) {
            $tools->disableRefreshButton();
        });
        // $grid->disableCreateButton();
        /* Habilitar o deshabilitar Botones */
        $grid->actions(function ($actions) {
            $actions->disableDelete();
            // $actions->disableView();
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
        $show = new Show(Administrator::findOrFail($id));

        $show->id('Id');
        $show->name('Nombre de la casa de cambio');
        $show->email('Correo electronico');
        $show->phone('Teléfono');
        $show->logo('Logo');
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
        $form = new Form(new Administrator());
        
        $dir = '/logo';
        $form->text('name','Nombre')->rules('required');
        $form->text('email','Correo electronico')->rules('required');
        $form->text('phone','Teléfono')->rules('required');
        $form->image('logo','Logo')->move($dir)->rules('required')->uniqueName();

        return $form;
    }
}
