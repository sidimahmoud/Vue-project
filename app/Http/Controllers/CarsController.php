<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Cars\CarRepository;
use App\Repositories\Cars\Car;

class CarsController extends Controller
{
  /**
   * @var CarRepository
   */
  private $repository;
  /**
   * CarsController constructor.
   */
  public function __construct(CarRepository $repository)
  {
      $this->repository = $repository;
  }
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
      if (request()->has('all')) {
            $data = $this->repository->get();
      } else {
            $data = $this->repository->paginate();
      }
      return response()->json($data);
  }
  /**
   * Store a newly created resource in storage.
   *
   * @param  Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
      $this->repository->create($request->all());
  }
  /**
   * Display the specified resource.
   *
   * @param int $id
   * @return \Illuminate\Http\Response
   */
  public function show(int $id)
  {
      $data=$this->repository->getById($id);
      return response()->json($data);
  }
  /**
   * Update the specified resource in storage.
   *
   * @param Request $request
   * @param int $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, int $id)
  {
    $data=$this->repository->update($id,$request->all());
    return response()->json($data);
  }
  /**
   * Display the specified resource.
   *
   * @param int $id
   * @return \Illuminate\Http\Response
   */
  public function destroy(int $id)
  {
    $this->repository->delete($id);
  }
}
