<?php

namespace App\Services;
use Illuminate\Http\Request;

class HelperService
{
    /**
     * Set a flash message for the session.
     *
     * @param \Illuminate\Http\Request $request
     * @param string $message
     * @param string $type
     */
    public function setFlashMessage(Request $request, $message, $type)
    {
        $request->session()->flash('message', $message);
        $request->session()->flash('alert-type', $type);
    }
}
