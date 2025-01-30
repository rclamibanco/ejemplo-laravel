<?php

namespace App\Rules;

use App\Models\Marca;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class EditarUnico implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    var $id;

    public function __construct($id) {
        $this->id = $id;
    }

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $registro = Marca::where('nombre', $value)
            ->where('id', '!=', $this->id)->get()->count();
        
        if ($registro > 0) $fail("Este $attribute ya ha sido tomado");
    }
}
