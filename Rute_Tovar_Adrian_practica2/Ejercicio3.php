<?php
    $animales = [
        ["Lobo ibérico", "Mamífero", 2500],
        ["Lince ibérico", "Mamífero", 1668],
        ["Quebrantahuesos", "Ave", 2000],
        ["Oso pardo", "Mamífero", 500]
    ];

    function comprobarEstado(int $nEjemplares):int{
        if($nEjemplares==0){
            echo "Extinto";
        }elseif($nEjemplares>0 && $nEjemplares<=500){
            echo "En peligro critico";
        }elseif($nEjemplares>500 && $nEjemplares<=200){
            echo "En peligro";
        }else{
            echo "Amenzado";
        }
    }
?>