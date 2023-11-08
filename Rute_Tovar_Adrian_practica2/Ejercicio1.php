<?php
   
     
    
    
    function cambiarDivisa(int|float $dinero, String $divisaAct, String $divisaConvert):float{
        $res=0;
        if($divisaAct == "€" && $divisaConvert == "$"){
            $res=$dinero*1.06;
        }elseif($divisaAct == "€" && $divisaConvert == "yen"){
            $res=$dinero*157.56;
        }elseif($divisaAct == "$" && $divisaConvert == "€"){
            $res=$dinero*0.94;
        }elseif($divisaAct == "$" && $divisaConvert == "yen"){
            $res=$dinero*148.73;
        }elseif($divisaAct == "yen" && $divisaConvert == "€"){
            $res=$dinero*0.0063;
        }elseif($divisaAct == "yen" && $divisaConvert == "$"){
            $res=$dinero*0.0067;
        }    
        return $res;
    }
?>