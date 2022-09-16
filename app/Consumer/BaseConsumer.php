<?php

namespace App\Consumer;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

abstract class BaseConsumer
{
    protected $url;

    protected function getClient()
    {
        return new Client(['base_uri' => config('fidelitas.base_url')]);
    }

    protected function request($method, $id = '', array $options = [])
    {
        $response = self::getClient()->request($method, $this->url . $id, $options);
        return json_decode($response->getBody(), true);
    }

    protected function get($route = '')
    {
        try {
            return self::request('GET', "/$route");
        } catch (\Exception $exception) {
            dd($exception,config('fidelitas.base_url'));
            Log::error($exception);
            return [];
        }
    }

    protected function post(array $post)
    {
        Log::info(json_encode($post));
        try {
            return self::request('POST', '', [//Post example doesn't need id
                'json' => $post
            ]);
        } catch (\Exception $exception) {
            Log::error($exception);
            return null;
        }
    }

    protected function put($id, $post)
    {
        try {
            return self::request('PUT', "/($id)", [
                'json' => $post
            ]);
        } catch (\Exception $exception) {
            Log::error($exception);
            return null;
        }
    }

    protected function patch($id, $post)
    {
        try {
            return self::request('PATCH', "/($id)", [
                'json' => $post
            ]);
        } catch (\Exception $exception) {
            Log::error($exception);
            return null;
        }
    }

    protected function delete($id)
    {
        try {
            return self::request('DELETE', "/$id");
        } catch (\Exception $exception) {
            Log::error($exception);
            return null;
        }
    }
}
