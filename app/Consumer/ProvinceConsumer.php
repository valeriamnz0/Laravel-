<?php

namespace App\Consumer;

use Illuminate\Support\Facades\Log;

class ProvinceConsumer extends BaseConsumer
{
    protected $url = 'provincias.json';
    private $result;

    public function __construct()
    {
        $this->all();
    }

    public function all()
    {
        $this->result = array_map(function ($value) {
            return ['name' => $value];
        },  ((array)$this->get()));
        return $this;
    }

    public function getResult()
    {
        if (!empty($this->result))
            $this->all();
        if (!empty($this->result))
            return $this->result;
        return [];
    }
}
