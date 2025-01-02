<?php

namespace App\Repositories\User;

interface UserRepositoryInterface
{
    public function index();

    public function store($validatedData);

    public function show($id);

    public function update($validatedData, $id);

    public function destroy($id);
}
