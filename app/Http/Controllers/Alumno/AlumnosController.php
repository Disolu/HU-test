<?php
namespace App\Http\Controllers\Alumno;
use App\Core\Entities\Alumno;
use App\Core\Entities\AlumnoApoderado;
use App\Core\Entities\AlumnoMatricula;
use App\Core\Entities\AlumnoDatos;

use App\Core\Repositories\Alumno\AlumnoRepo;

use Illuminate\Http\Request;
use App\Http\Requests;
use Session;
use Redirect;
use App\Http\Controllers\Controller;

class AlumnosController extends Controller
{
  protected $AlumnoRepo;
  public function __construct(AlumnoRepo $AlumnoRepo)
  {
    $this->AlumnoRepo = $AlumnoRepo;
    
  }

}
