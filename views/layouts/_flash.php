<?php

$session = Core\Session::instance();

if ($session->flasCount()) {

    [$t, $msg] = $session->showFlash();
    $alert = <<<EndMsg
    <div class="alert alert-{$t} alert-dismissible fade show mt-3" role="alert">
    <strong>{$msg}</strong>
    </div>
EndMsg;
echo $alert;
}