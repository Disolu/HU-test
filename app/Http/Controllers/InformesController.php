<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Core\Repositories\InformesRepo;

class InformesController extends Controller
{
    private $path = "informe";
    protected $informesRepo;

    public function __construct(InformesRepo $informesRepo)
    {
        $this->informesRepo = $informesRepo;
    }

    public function showInformes()
    {
        return view("{$this->path}.index");
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
