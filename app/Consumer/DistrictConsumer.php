<?php

namespace App\Consumer;

use Illuminate\Support\Facades\Log;

class DistrictConsumer extends BaseConsumer
{
    protected $url = '/provincia/province_id/canton/canton_id/distritos.json';
    private $result;
    private $province;
    private $canton;

    public function __construct($provinceId, $cantonId, $provinces)
    {
        $this->url = str_replace('canton_id', $cantonId, str_replace('province_id', $provinceId, $this->url));
        $this->result = $provinces;
        $this->canton = $cantonId;
        $this->province = $provinceId;
        $this->all();
    }

    public function all()
    {
        $this->result[$this->province]['cantones'][$this->canton]['distritos'] = array_map(function ($value) {
            return ['name' => $value];
        }, (array)$this->get());
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
