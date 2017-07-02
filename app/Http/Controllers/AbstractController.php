<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Creitive\Breadcrumbs\Breadcrumbs;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class AbstractController extends Controller
{

    protected $request;
    protected $model;

    public function __construct(Request $request, Model $model)
    {
        $this->request = $request;
        $this->model = $model;
    }



}
