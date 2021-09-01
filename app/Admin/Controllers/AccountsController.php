<?php

namespace App\Admin\Controllers;

use App\User;
use App\Accounts;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use Illuminate\Http\Request;
class AccountsController extends AdminController
{
    // use HasResourceActions;

    /**
     * Index interface.
     *
     * @param Content $content
     * @return Content
     */
    public function index(Content $content)
    {
        return $content
            ->header('Listado de Cuentas')
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
            ->header('Detalles de la Cuenta')
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
            ->header('Editar datos de la Cuenta')
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
            ->header('Creación de Cuenta')
            ->description('Los campos con (*) son obligatorios')
            ->body($this->form());

    }

    /**
     * Crea la lista de registros
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Accounts);
        $grid->model()->orderBy('id','DESC');

        $grid->id('ID');
        // $grid->banner_1('Banner 1')->display(function($logo)
        // {
        //     return '<img src="../uploads/'.$logo.'" heigth="150" width="150" />';
        // });
        $grid->name('Nombre');
        $grid->bank('Banco');
        $grid->number('Número');
        $grid->country('Pais');
        $grid->id_card('Número de Cedula');
        $grid->id_user('Usuario')->display(function($user_id)
        {
            $user = User::findOrFail($user_id);
            return $user['name'];
        });

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
     * Crea la vista de Visualización.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Accounts::findOrFail($id));

        $show->id('Id');
        // $show->banner_1('Banner 1');
        $show->name('Nombre');
        $show->bank('Banco');
        $show->number('Número');
        $show->country('Pais');
        $show->id_card('Número de Cedula');
        $show->id_user('Id Usuario');
        $show->created_at('Created at');
        $show->updated_at('Updated at');

        return $show;
    }

    /**
     * Crea el formulario de Creación/Edición.
     *
     * @return Form
     */
    protected function form()
    {
        $users = User::pluck('name','id');

        $form = new Form(new Accounts);
        $form->text('name','Nombre')->rules('required');
        // $form->image('banner_1','Banner Home 1')->help('Deben ser imagenes con un peso inferior a 350KB')->rules('required');
        $form->text('bank','Banco')->rules('required');
        $form->text('number','Número')->rules('required');
        $form->text('country','Pais')->rules('required');
        $form->text('id_card','Número de Cedula')->rules('required');
        // $form->text('id_user','Usuario')->rules('required');
        $form->select('id_user', 'Usuarios')->options($users)->rules('required');

        return $form;
    }
}