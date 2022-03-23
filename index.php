<?php 
session_start(); 
include_once("config/config.php");
include_once("lang/{$lang}.php");
include_once('config/dateTime.php');
include_once('config/database.php');
include 'method/post.php';
include('header.php');
//DataTable language
    //select language
        //https://github.com/DataTables/Plugins/tree/master/i18n
        if( $lang['lang'] == 'ar' ){
          $dataTable_language = 'https://raw.githubusercontent.com/DataTables/Plugins/master/i18n/ar.json';
        }else{
            $dataTable_language = 'https://raw.githubusercontent.com/DataTables/Plugins/master/i18n/Ganda.json';
        }
      
if( isset($_GET['page']) AND $_GET['page'] ):
  include_once("page/{$_GET['page']}.php");
else:
  include_once("page/home.php");
endif;

include('footer.php');
