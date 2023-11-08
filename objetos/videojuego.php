<?php
class Videojuego{
    public int $id_videojuego;
    public string $titulo;
    public string $pegi;
    public string $compania;

    function __construct(int $id_videojuego, string $titulo, string $pegi, string $compania){
        $this -> id_videojuego = $id_videojuego;
        $this -> titulo = $titulo;
        $this -> pegi = $pegi;
        $this -> compania = $compania;
    }
}
?>