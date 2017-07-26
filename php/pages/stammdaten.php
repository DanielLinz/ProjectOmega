<?php

//stammdaten.php
//Kopfdatei für stammdaten_komponenten.php

include("../database/stammdaten_sql.php");
include("stammdaten.elements.php");
include("stammdaten_modal.php");

$dbElements = dbElements();

$type = "";

/**
 * @dbAlias: Enthält die Tabellennamen für SQL-Operationen, keys für dbElements und translator und
 *           um den Type auf Richtigkeit zu prüfen.
 */

function getColumnNames($type, $includeId)
{
    return getColumn($type, false, $includeId);
}

function getColumnText($type, $includeId)
{
    return getColumn($type, true, $includeId);
}

function getColumn($type, $value, $includeId)
{
    global $dbElements;
    $element = $dbElements[$type];
    unset($element['NAME']);
    unset($element['NAME_PLURAL']);
    unset($element['NAME_COLUMN']);
    unset($element['TABLE_NAME']);
    if (!$includeId) {
        $idColumn = $element["ID_COLUMN"];
        unset($element[$idColumn]);
    }
    if ($value) {
        return array_keys($element);
    } else {
        return array_values($element);
    }
}

function tableExist($type)
{
    global $dbElements;
    $element = $dbElements[$type];
    if (isset($element['TABLE_NAME'])) {
        return true;
    }
    return false;
}

function getTypeName($type, $plural)
{
    global $dbElements;
    $element = $dbElements[$type];
    $returnVal = $element['NAME'];
    if ($plural) {
        $returnVal = $element['NAME_PLURAL'];
    }
    return $returnVal;
}

function getIDColumn($type)
{
    global $dbElements;
    $element = $dbElements[$type];
    return $element['ID_COLUMN'];
}

function getNameColumn($type)
{
    global $dbElements;
    $element = $dbElements[$type];
    return $element['NAME_COLUMN'];
}

getType();

/**
 * @getType: Prüft ob der GET-Parameter 'type' gesetzt wurde.
 * Mittels Type wird bestimmt welche Datenbank angesprochen werden soll.
 * Diese Funktion prüft ob ein legaler Type vorliegt, falls nicht wird die Ausführung verweigert.
 * Falls kein Type gesetzt wurde, wird auf den Type 'raeume' weitergeleitet.
 * Achtung: Muss in der PHP-Datei aufgerufen werden!
 */
function getType()
{
    if (isset($_GET["type"])) {
        $type = $_GET["type"];
        if (!tableExist($type)) {
            die();
        }
    } else {
        header("Location: " . $_SERVER['PHP_SELF'] . "?type=raeume");
        die();
    }
}

?>