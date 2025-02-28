<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class calculatorModel extends Model
{
    use HasFactory;
    protected $fillable = ['num1', 'num2', 'operator', 'result'];
}
