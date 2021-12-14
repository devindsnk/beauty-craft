<?php
class Toast
{
    public static function setToast($state, $title, $subtitle)
    {
        Session::setBundle(
            'toast',
            [
                'toastState' => $state,
                'toastTitle' => $title,
                'toastSubtitle' => $subtitle
            ]
        );
    }
}
