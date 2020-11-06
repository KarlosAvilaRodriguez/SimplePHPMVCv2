<?php 
require_once "libs/dao.php";
function getAllClientes(){
    $sqlstr = "SELECT * from clients;";
    $resultSet = array();
    $resultSet = obtenerRegistros($sqlstr);
    return $resultSet;
}

function getClienteById($clientid) {
    $sqlstr = "SELECT * from clients where clientid = %d;";
    return obtenerUnRegistro(sprintf($sqlstr, $clientid));
}

function getClientesPorFiltro($filtro) {
    $ffiltro = $filtro.'%';
    $sqlstr = "SELECT * from clients where clientIdNumber like '%s' or clientname like '%s';";
    return obtenerRegistros(sprintf($sqlstr, $ffiltro, $ffiltro));
}

function addNewClient($clientname, $clientgender, $clientphone1, $clientphone2, $clientemail, $clientIdNumber, $clientbio, $clientstatus, $catecod){
    $insSql = "INSERT INTO `clients` (`clientname`, `clientgender`, `clientphone1`, `clientphone2`,
`clientemail`, `clientIdNumber`, `clientbio`, `clientstatus`, `clientdatecri`, `clientusercreates`, `catecod`)
VALUES ( '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', now(), 0, %d);";

    return ejecutarNonQuery(
        sprintf(
            $insSql,
            $clientname,
            $clientgender,
            $clientphone1,
            $clientphone2,
            $clientemail,
            $clientIdNumber,
            $clientbio,
            $clientstatus,
            $catecod
        )
    );
}

function updateCliente ($clientname, $clientgender, $clientphone1, $clientphone2, $clientemail, $clientIdNumber, $clientbio, $clientstatus, $catecod, $clientid) {
    $updsql = "UPDATE `clients` SET  `clientname` = '%s', `clientgender` = '%s',
`clientphone1` = '%s', `clientphone2` = '%s', `clientemail` = '%s',`clientIdNumber` = '%s', `clientbio` = '%s',
 `clientstatus` = '%s',`catecod` = %d
WHERE `clientid` = %d; ";

    return ejecutarNonQuery(
        sprintf(
            $updsql,
            $clientname,
            $clientgender,
            $clientphone1,
            $clientphone2,
            $clientemail,
            $clientIdNumber,
            $clientbio,
            $clientstatus,
            $catecod,
            $clientid
        )
    );
}

function deleteCliente($clientid) {
    return ejecutarNonQuery(sprintf("DELETE from clients where clientid=%d;", $clientid));
}

?>
