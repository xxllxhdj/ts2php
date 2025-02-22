<?php
namespace test\case_ObjectLiteralExpression;
require_once(dirname(__FILE__) . '/' . "../some-utils.php");
$b = array(
    "a" => 123,
    "b" => "456"
);
$a = array(
    "a" => $b,
    "b" => $b,
    "a-b" => $b
);
$c = array_key_exists("b", $a);
$d = array(
    "\$a" => "a",
    "b" => "\$b"
);
$e = array_merge(array(), array(
    "f" => 1
), $a, array(
    "w" => 2,
    "c" => 3
));
function aaa() {
    echo "aaa";
}
$bbb = function () {
    echo "bbb";
};
$ddd = function () {
    echo "ddd";
};
$eee = $bbb;
$mmm = array(
    "aaa" => "aaa",
    "bbb" => $bbb,
    "ccc" => function () {
        echo "ccc";
    },
    "ddd" => $ddd,
    "eee" => $eee,
    "fff" => "aaa",
    "ggg" => $bbb,
    "hhh" => $ddd,
    "iii" => $eee,
    "jjj" => "\someModule\func"
);
$mmm["aaa"]();
$mmm["bbb"]();
$mmm["ccc"]();
$mmm["ddd"]();
$mmm["eee"]();
