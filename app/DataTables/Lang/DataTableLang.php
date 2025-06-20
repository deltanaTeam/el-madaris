<?php
namespace App\DataTables\Lang;
use App\DataTables\Lang\{DataArabic,DataEnglish};

/**
 *
 */
class DataTableLang
{
  protected  $data_lang;
  function __construct()
  {
      // $local = app()->getLocale();
      // if($local == 'ar'){
      //    $data= new DataArabic ;
      // }
      // else{
      //    $data = new DataEnglish ;
      // }
      ///// arabic only
       $data= new DataArabic ;

       $this->data_lang = $data->get_datatable_lang();
  }
  public function get_lang(){
      return $this->data_lang;
  }
}
