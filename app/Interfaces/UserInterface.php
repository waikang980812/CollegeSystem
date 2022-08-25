<?php

namespace App\Interfaces;

interface UserInterface
{
	public function find($id);
	public function findAll();
}