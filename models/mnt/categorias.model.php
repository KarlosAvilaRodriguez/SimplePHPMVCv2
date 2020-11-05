<?php
require_once "libs/dao.php";
function getAllcategorias(){
    $sqlstr = "SELECT * from categorias;";
    $resultSet = array();
    $resultSet = obtenerRegistros($sqlstr);
    return $resultSet;
}
function getcategoriaById($catecod) {
    $sqlstr = "SELECT * from categorias where catecod = %d;";
    return obtenerUnRegistro(sprintf($sqlstr, $catecod));
}

function getcategoriasActivas()
{
    $sqlstr = "SELECT * from categorias where cateest = 'ACT';";
    return obtenerRegistros($sqlstr);
}

function getcategoriasPorFiltro($filtro) {
    $ffiltro = $filtro.'%';
    $sqlstr = "SELECT * from categorias where catecod like '%s' or catenom like '%s';";
    return obtenerRegistros(sprintf($sqlstr, $ffiltro, $ffiltro));
}

function addNewcategoria($catenom, $cateest){
    $insSql = "INSERT INTO `categorias` (`catenom`, `cateest`)
VALUES ( '%s', '%s');";
    return ejecutarNonQuery(
        sprintf(
            $insSql,
            $catenom,
            $cateest
        )
    );
}
function updateCategoria ($catenom, $cateest, $catecod) {
    $updsql = "UPDATE `categorias` SET  `catenom` = '%s', `cateest` = '%s',
    WHERE `catecod` = %d; ";
    return ejecutarNonQuery(
        sprintf(
            $updsql,
            $catenom,
            $cateest,
            $catecod
        )
    );
}
function deleteCategoria($catecod) {
    return ejecutarNonQuery(sprintf("DELETE from categorias where catecod=%d;", $catecod));
}
?>
