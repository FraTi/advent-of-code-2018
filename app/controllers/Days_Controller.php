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

        function positionAndSize($string){

            $atspace = explode(' ', $string);
            $ID = $atspace[0];
            $position= explode(',', substr($atspace[2], 0, -1) );
            $size = explode('x', $atspace[3] );

            return array( 'ID'=>$ID, 'position'=>$position, 'size'=>$size );
        }

        $file = $this->_app->getExternalPath().'app/public/files/input3.txt';

        $data = explode(PHP_EOL, file_get_contents($file));
        $dopo = [];
        foreach ($data as $riga){
            $pands = positionAndSize($riga);
            $dopo[$pands['ID']] = $pands;
        }

        $stoffa = [];

        for($i=0;$i<1000;$i++){
            $stoffa[$i] = [];
            for($j=0;$j<1000;$j++){
                array_push($stoffa[$i], $j) ;
            }
        }
        $inches = 0;
        $IDnottouched = [];

        foreach ($data as $riga){
            $touched = false;
            $pands = positionAndSize($riga);

            $i_inizio = $pands['position'][1];
            $j_inizio = $pands['position'][0];

            $i_fine = $i_inizio+$pands['size'][1];
            $j_fine = $j_inizio+$pands['size'][0];

            for($i=$i_inizio;$i<$i_fine;$i++){

                for($j=$j_inizio;$j<$j_fine;$j++){


                    if( $stoffa[$i][$j] == 'O' ){
                        $stoffa[$i][$j] = 'X';
                        $inches++;
                        $touched = true;
                        continue;
                    }else if( $stoffa[$i][$j] == 'X' ){
                        continue;
                    }

                    $stoffa[$i][$j] = 'O';

                }
            }

            if(!$touched){
                array_push( $IDnottouched, $pands['ID']);
            }
        }


        $idpure = [];
        foreach ($IDnottouched as $riga){
            $pure = true;
            $pands = $dopo[$riga];

            $i_inizio = $pands['position'][1];
            $j_inizio = $pands['position'][0];

            $i_fine = $i_inizio+$pands['size'][1];
            $j_fine = $j_inizio+$pands['size'][0];

            for($i=$i_inizio;$i<$i_fine;$i++){

                for($j=$j_inizio;$j<$j_fine;$j++){

                    if( $stoffa[$i][$j] == 'X' ){
                        $pure = false;
                    }

                }
            }


            if($pure){
                array_push($idpure, $pands['ID']);
            }

        }


        var_dump(count($data));

        var_dump($inches);

        var_dump($idpure);



    }

}