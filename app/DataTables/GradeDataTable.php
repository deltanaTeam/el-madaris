<?php

namespace App\DataTables;

use App\Models\Grade;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use App\DataTables\{DesignButton,DataTableFunc};
use App\DataTables\Lang\DataTableLang;

class GradeDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        $design = new DesignButton;

      return (new EloquentDataTable($query))
      ->addColumn('name_ar', function ($query) {
              return  $query->getTranslation('name','ar');
        })
      ->addColumn('name_en', function ($query) {
            return  $query->getTranslation('name','en');
        })
      
      ->addColumn('checkbox',  '<label class="Banzima-check-container ">
                     <input type="checkbox" name="checked[]" value="{{$id}}" class="check_row" form="delete_all_form" >
                     <span class="banzima-check-checkmark "></span>
                   </label>')
      


      ->addIndexColumn()
      ->addColumn('action', function ($query) use($design) {
            $model_delete = $design->make_modal($this->deleteRow(route("admin.grades.destroy",$query->id)),"اللون","حذف",$query->id);
            $edit = $design->make_edit(route("admin.grades.edit",$query->id));
          return '<div class="btn-group btn-group-sm px-1">'.$edit." ".$design->make_delete_modal($query->id).'</div>' .$model_delete;
        })
      ->rawColumns([
          'action','checkbox'
       ]);
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Grade $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        $local = app()->getLocale();
      $lang = new DataTableLang;
      $lang_data = $lang->get_lang();
      $design = new DesignButton;

      $form = $design->make_del_all(route("admin.grades.delete-all"));
       $parameters = [
            'dom' => 'Blfrtip',
            'buttons' => [
             'create',$form
           ],
         "language" =>$lang_data,

       ];
        return $this->builder()
                    ->setTableId('grade-table')
                    ->responsive(true)
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(1)
                    ->selectStyleSingle()
                    ->parameters($parameters);

                    
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::computed('checkbox')->title(__('lang.select_to_delete'))->addClass('font-weight-bolder h6  text-capitalize  text-nowrap text-center')->orderable(false)->searchable(false)->exportable(false)->printable(false)->width('50'),
            Column::make('DT_RowIndex')->title('S/No')->orderable(false)->searchable(false)->addClass('font-weight-bolder h6  text-capitalize text-nowrap text-center'),
            Column::make('name_ar')->title(__('lang.name_ar'))->addClass('font-weight-bolder h6  text-dark text-capitalize text-nowrap text-center'),
            Column::make('name_en')->title(__('lang.name_en'))->addClass('font-weight-bolder h6  text-dark text-capitalize text-nowrap text-center'),
            Column::computed('action')->title(__('lang.action'))->exportable(false)->printable(false)->orderable(false)->searchable(false)->width(60)->addClass('text-center font-weight-bolder h6  text-capitalize'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Grade_' . date('YmdHis');
    }

     /*
    * function delete  confirm section colunm in datatable with modal
    * @param route for delete
    * @return form
    */
    public function deleteRow($route){
      $text = ' <div class =" text-danger text-bold"> '.__("lang.Are You Sure to Delete ?").' </div>
      ';
      $design = new DesignButton;

      $form = $design->make_delete($route);
      $body =$text . $form;
      return $body;
    }
}
