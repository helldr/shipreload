<?php

namespace App\Controllers;

use App\Classes\Request;

class IndexController extends BaseController
{
    public function index()
    {
        return view('home');
    }

    /**
     * Exibe o resultado na view
     *
     * @return View
     */
    public function showResult() {
        
        if(Request::has('post')){
            
            $request = Request::get('post');

            $reloads = $this->calculateReloads($request->distance);

            return view('showresult',compact('reloads','request'));
        }
        return view('home');
    }

    /**
     * Busca todas as naves, inclusive roda na paginação
     *
     * @return Array
     */
    private function getShips() {
        // busca todas as naves, inclusive paginação
        $getShips = $this->callSwapi();

        // lista das naves
        $shipsList = $getShips['results'];
        // próxima página da paginação
        $nextPage = $getShips['next'];
        // executa enquanto houver próxima página e mescla o novo resultado na lista de naves
        while(!is_null($nextPage)) {
            $getMore = $this->callSwapi($nextPage);

            $shipsList = array_merge($shipsList,$getMore['results']);

            $nextPage = $getMore['next'];
        }
        return $shipsList;
    }

    /**
     * Calcula as paradas e organiza em um array
     *
     * @param  $distance
     * @return Array
     */
    private function calculateReloads($distance) {
        $ships = $this->getShips();
        $calculations = [];

        // iterar no array para calcular as paradas
        foreach($ships as $ship) {
            $stops = ($ship['MGLT'] == 'unknown')?0:($distance/($this->convertConsumables($ship['consumables'])*$ship['MGLT']));

            $calculations[] = ['shipname'=>$ship['name'],'stops'=>floor($stops)]; 
        }
        return $calculations;
    }

    /**
     * Executa o CURL para buscar as naves em SWAPI.DEV
     *
     * @param  $url
     * @return Array
     */
    private function callSwapi($url = 'https://swapi.dev/api/starships') {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
        ));

        $response = json_decode( curl_exec($curl),true );
        curl_close($curl);
        return $response;
    }

    /**
     * Converte consumables para horas, independente do período de entrada [anos, meses, semanas, dias]
     *
     * @param  $consumables
     * @return int
     */
    private function convertConsumables($consumables) {
        $separate = sscanf($consumables,"%d %s", $intpart, $unity);

        switch ($unity) {
            case 'year':
            case 'years':
                    $period = $intpart * 365 * 24;
                break;
            
            case 'month':
            case 'months':
                    $period = $intpart * 30 * 24;
                break;
            
            case 'week':
            case 'weeks':
                    $period = $intpart * 7 * 24;
                break;
            
            case 'day':
            case 'days':
                    $period = $intpart * 24;
                break;
            
            default:
                $period = $intpart;
                break;
        }
        return $period;
    }

    /**
     * Exibe o resultado na view
     *
     * @return View
     */
    public function restapi($distance) {
        
        $reloads = $this->calculateReloads($distance['distance']);

        header('Content-Type: application/json');
        header('HTTP/1.1 200 Success', true, 200);
        echo json_encode($reloads);
        exit;
    }
}