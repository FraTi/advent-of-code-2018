<?php
/**
 * Created by PhpStorm.
 * User: francesco
 * Date: 03/12/18
 * Time: 10.05
 */

namespace pff\controllers;


use pff\Abs\AController;

class Days_Controller extends AController {

    public function index(){

    }

    public function day1(){

        $file = $this->_app->getExternalPath().'app/public/files/input1.txt';

        $data = explode(PHP_EOL, file_get_contents($file));

        $somma = 0;

        $valori_visti = [0=>$somma];

        /*foreach($data as $riga){

            if(in_array($somma, $valori_visti)){
                echo "trovato; ".(string)$somma;
                break;
            }else{
                array_push($valori_visti, $somma);
            }

        }*/
        $counter = 0;

        while(!in_array($somma += (int)$data[$counter], $valori_visti)){
            $counter++;

            array_push($valori_visti, $somma);

            if($counter==count($data)){
                $counter=0;
                continue;
            }



        }
        echo "trovato; ".(string)$somma;
//        var_dump( $somma );

        var_dump( $valori_visti );


    }


    public function day2(){

        function has_two($string){

            $arr = str_split($string);

            $arr_freq = array_count_values($arr);

            foreach ($arr_freq as $ricorrenze){
                if($ricorrenze == 2){
                    return true;
                }
            }

            return false;
        }
        function has_three($string){

            $arr = str_split($string);

            $arr_freq = array_count_values($arr);

            foreach ($arr_freq as $ricorrenze){
                if($ricorrenze == 3){
                    return true;
                }
            }

            return false;
        }

        $file = $this->_app->getExternalPath().'app/public/files/input2.txt';

        $data = explode(PHP_EOL, file_get_contents($file));

        $noftwo = 0;
        $nofthree = 0;

        foreach ($data as $riga){
            if( has_two($riga) ){
                $noftwo++;
            }
            if( has_three($riga) ){
                $nofthree++;
            }
        }

        echo $noftwo.' * '.$nofthree.' = '.$noftwo*$nofthree;

       // var_dump( $data );


    }

}