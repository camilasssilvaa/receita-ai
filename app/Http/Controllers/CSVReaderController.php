<?php

namespace App\Http\Controllers;

// use Excel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;

class CSVReaderController extends Controller
{
    public function iniciar()
    {
        $path = storage_path('app/public/database/dispensacoes-1000.csv');

        //dd(Excel::load($path));

        // ::load($path)->each(function(Collection $collection) {
        //     dd($collection);
        // });

        if ($fh = fopen($path, 'r')) {
            while (!feof($fh)) {
                $line = fgets($fh);
                // $line = trim(str_replace(['"', '"', "'", "'"], '', $line));
                $array = explode(';', $line);
                
                // 01/01/2018 06:35:06
                //2019-05-01 00:00:00

                $final = [];

                preg_match('/\".*\"/', $array[0], $match);
                $final[] = $match[0];

                preg_match('/\".*\"/', $array[1], $match);
                $final[] = $match[0];
                
                preg_match('/\".*\"/', $array[2], $match);
                $final[] = $match[0];

                preg_match('/\".*\"/', $array[3], $match);
                $final[] = $match[0];

                preg_match('/\".*\"/', $array[4], $match);
                $final[] = $match[0];

                preg_match('/\".*\"/', $array[5], $match);
                $final[] = $match[0];

                preg_match('/\".*\"/', $array[6], $match);
                $final[] = $match[0];

                preg_match('/\".*\"/', $array[7], $match);
                $final[] = $match[0];

                preg_match('/\".*\"/', $array[8], $match);
                $final[] = $match[0];

                dump($final);

                //dump(trim($array[5]));

                // if ( isset($array[2]) ) {
                //     $date = Carbon::createFromFormat('d/m/Y H:i:s', $array[2]);
                //     $date_formated = $date->format('Y-m-d H:i:s');
                // } else {
                //     $date_formated = '';
                // }

                // var_dump($array[5]);
                // dump($date->format('Y-m-d H:i:s'));
                
                // DB::table('dispencacoes')->insert([
                //     'cnes'                  => $array[0] ?? '',
                //     'farmacia'              => $array[1] ?? '',
                //     //'data_hora_dispencacao' => $date_formated,
                //     'num_receita'           => $array[3] ?? '',
                //     'catmat'                => $array[4] ?? '',
                //     'desc_medicamento'      => $array[5] ?? '',
                //     'quantidade'            => $array[6] ?? '',
                //     'num_cidadao'           => $array[7] ?? '',
                //     'origem_receita'        => $array[8] ?? '',
                // ]);

                // dump(Carbon::createFromFormat(''));

            }
            fclose($fh);
        }
    }
}
