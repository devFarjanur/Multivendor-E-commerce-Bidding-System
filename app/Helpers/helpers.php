<?php

use Illuminate\Http\Request;

if (!function_exists('setFlashMessage')) {
    /**
     * Set a flash message for the session.
     *
     * @param \Illuminate\Http\Request $request
     * @param string $message
     * @param string $type
     */
    function setFlashMessage(Request $request, $message, $type)
    {
        $request->session()->flash('message', $message);
        $request->session()->flash('alert-type', $type);
    }
}
