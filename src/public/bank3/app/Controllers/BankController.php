<?php

namespace Bank3\Controllers;

use Bank3\App;
use Bank3\FileWriter;

class BankController {

  public function index()
  {
    $data = new FileWriter('bank');    
    return App::view('bank/index', [
            'pageTitle' => 'Accounts list',
            'banks' => $data->showAll()
          ]);
  }
  
  public function create()
  {
    return App::view('bank/create', [
            'pageTitle' => 'Create account'
          ]);
  }

  public function store(array $request)
  {
    $data = new FileWriter('bank');
    $data->create($request);

    header('Location: /bank');
  }

  public function edit(int $id)
  {
    $data = new FileWriter('bank');
    $bank = $data->show($id);
    
    return App::view('bank/edit', [
            'pageTitle' => 'Edit sccount',
            'bank' => $bank
          ]);
  }
  
  public function update(int $id, array $request)
  {
    $data = new FileWriter('bank');
    $data->update($id, $request);

    header('Location: /bank');
  }

  public function delete(int $id)
  {
    $bank = (new FileWriter('bank'))->show($id);
    return App::view('bank/delete', [
            'pageTitle' => 'Confirm account delete',
            'bank' => $bank
          ]);
  }

  public function destroy(int $id)
  {
    $data = new FileWriter('bank');
    $data->delete($id);

    header('Location: /bank');
  }
}