<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CatalogController extends Controller
{
  public function Catalog(){
    return "Hola desde CatalogController";
  }
  public function Show($id){
    return "Hola desde CatalogController 'Catalog $id'";
  }
  public function Create(){
    return "Hola desde CatalogController 'Create'";
  }
  public function Edit($id){
    return "Hola desde CatalogController 'edit $id'";
  }
}
