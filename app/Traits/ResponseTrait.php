<?php
namespace App\Traits;
use Inertia\Inertia;
trait ResponseTrait{
  public function sendResponse($pageName,$data){
    return Inertia::render($pageName,$data); 
  }
}