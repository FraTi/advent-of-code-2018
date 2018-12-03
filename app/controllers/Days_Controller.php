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
        function string_matching($string1, $string2){

            $arr1 = str_split($string1);
            $arr2 = str_split($string2);

            $nofequ = 0;

            for($i=0;$i<count($arr1);$i++){

                if( $arr1[$i] == $arr2[$i] ){
                    $nofequ++;
                }
            }
            if($nofequ==25){
                return true;
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

        echo $noftwo.' * '.$nofthree.' = '.$noftwo*$nofthree.'<br>';

        $found = '';
        for($i=0;$i<count($data);$i++){

           for($j=0;$j<count($data);$j++){

               if( string_matching($data[$i],$data[$j]) ){
                   $found = $data[$i].'<br>'.$data[$j];
               }

           }


        }


        echo 'le stringhe sono:<br>'.$found;
    }

    public function day3(){

        $file = $this->_app->getExternalPath().'app/public/files/input3.txt';

        $data = explode(PHP_EOL, file_get_contents($file));

        var_dump(count($data));

        var_dump($data);

    }

}