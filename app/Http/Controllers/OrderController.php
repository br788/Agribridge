<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    return view('dashboard.orders');
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view('dashboard.orders.create');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    // Logique de stockage
  }

  /**
   * Display the specified resource.
   */
  public function show(string $id)
  {
    return view('dashboard.orders.show', ['id' => $id]);
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(string $id)
  {
    return view('dashboard.orders.edit', ['id' => $id]);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, string $id)
  {
    // Logique de mise à jour
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    // Logique de suppression
  }
}
