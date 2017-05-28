<?php

namespace App\Http\Controllers;

use App\Repositories\FooRepository;
use Illuminate\Http\Request;

use App\Http\Requests;


class FooController extends Controller
{
//private $repository;
//
//    /**
//     * FooController constructor.
//     * @param FooRepository $repository
//     */
//    public function __construct(FooRepository $repository)
//    {
//        $this->repository = $repository;
//    }

    /**
     * @return array
     */
    public function foo(FooRepository $repository){
        return $repository->get();
    }
}
