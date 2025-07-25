<?php

namespace App\Models;

use Illuminate\Support\Arr;

/**
* Classe que representa a lista de empregos
*/
class Job
{
    /**
    * Retorna a lista de todos os empregos
    * @return array[]
    */
    public static function all(): array
    {
        $retorno = [
            [
                "id"        => 220930,
                "title"     => __("Director"),
                "salary"    => 50000.00
            ],
            [
                "id"        => 744254,
                "title"     => __("Programmer"),
                "salary"    => 10230.86
            ],
            [
                "id"        => 391579,
                "title"     => __("Teacher"),
                "salary"    => 3542.23
            ]
        ];

        return $retorno;
    }

    /**
     * Retorna um emprego específico da lista de empregos com base no id
     * @param int $id ID do emprego a ser procurado
     * @return array Um vetor com as informações do emprego atual
     */
    public static function find(int $id): array
    {
        $retorno = Arr::first(static::all(), fn($job) => $job["id"] == $id);

        //Caso não consiga encontrar estoura o erro na tela de não encontrado(404, erro visível)
        if(empty($retorno))
            abort(404, __("Not Found"));

        return $retorno;
    }
}
?>
