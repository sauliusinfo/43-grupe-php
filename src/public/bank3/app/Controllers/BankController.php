<?php

namespace Bank3\Controllers;

use Bank3\App;
// use Bank3\FileWriter;
use Bank3\Messages;
use Bank3\OldData;

class BankController {

  public function index()
  {
    //$data = new FileWriter('bank');

    $data = App::get('bank');

    return App::view('bank/index', [
            'pageTitle' => 'Accounts list',
            'banks' => $data->showAll()
          ]);
  }
  
  public function create()
  {
    $old = OldData::getFlashData();
    return App::view('bank/create', [
            'pageTitle' => 'Create account',
            'old' => $old
          ]);
  }

  public function store(array $request)
  {
    // $data = new FileWriter('bank');

    $data = App::get('bank');

    if (strlen($request['name']) <= 3)
    {
      Messages::addMessage('danger', 'Account name must be more than 3 characters');
      OldData::flashData($request);
      header('Location: /bank/create');
      
    } elseif (strlen($request['surname']) <= 3) {
        Messages::addMessage('danger', 'Account surname must be more than 3 characters');
        OldData::flashData($request);
        header('Location: /bank/create');
        
    } elseif (strlen($request['card-id']) < 11) {
        Messages::addMessage('danger', 'Account card-id is not correct');
        OldData::flashData($request);
        header('Location: /bank/create');
        
    } else {
        $data->create($request);
        Messages::addMessage('success', 'Account created successfully');
        header('Location: /bank');
    }
  }

  public function edit(int $id)
  {
    // $data = new FileWriter('bank');

    $data = App::get('bank');

    $bank = $data->show($id);
    
    return App::view('bank/edit', [
            'pageTitle' => 'Edit sccount',
            'bank' => $bank
          ]);
  }
  
  public function update(int $id, array $request)
  {
    // $data = new FileWriter('bank');

    $data = App::get('bank');

    if (strlen($request['name']) <= 3)
    {
      Messages::addMessage('danger', 'Account name must be more than 3 characters');
      header('Location: /bank/edit/'.$id);
      
    } elseif (strlen($request['surname']) <= 3) {
        Messages::addMessage('danger', 'Account surname must be more than 3 characters');
        header('Location: /bank/edit/'.$id);
        
    } elseif (strlen($request['card-id']) < 11) {
        Messages::addMessage('danger', 'Account card-id is not correct');
        header('Location: /bank/edit/'.$id);
        
    } elseif ($request['amount'] < 0) {
        Messages::addMessage('danger', "Amount can't be negative");
        header('Location: /bank/edit/'.$id);
    } else {
        $data->update($id, $request);
        header('Location: /bank');
    }
  }

  public function delete(int $id)
  {
    // $bank = (new FileWriter('bank'))->show($id);

    $bank = (App::get('bank'))->show($id);

    return App::view('bank/delete', [
            'pageTitle' => 'Confirm account delete',
            'bank' => $bank
          ]);
  }

  public function destroy(int $id)
  {
    // $data = new FileWriter('bank');

    $data = App::get('bank');

    $data->delete($id);

    Messages::addMessage('success', 'Account with id__'.$id.' deleted successfully');
    header('Location: /bank');
  }
}