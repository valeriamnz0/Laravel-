<?php

namespace App\Consumer;

use Illuminate\Support\Facades\Log;

class CantonConsumer extends BaseConsumer
{
    protected $url = '/provincia/province_id/cantones.json';
    private $result;
    private $province;

    public function __construct($id, $provinces)
    {
        $this->url = str_replace('province_id', $id, $this->url);
        $this->result = $provinces;
        $this->province = $id;
        $this->all();
    }

    public function all()
    {
        $this->result[$this->province]['cantones'] = array_map(function ($value) {
            return ['name' => $value];
        }, ((array)$this->get()));
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
