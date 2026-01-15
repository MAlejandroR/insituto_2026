<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AlumnoController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(int $id)
    {
      return view("alumnos.listado", [
        "id" => $id
      ]);
    }
}
