<?php

namespace App\Library\Services;

use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Mail;

class MailHelperTools
{

    public function sendCreationUserMail($first_name,$last_name,$login,$mdp,$email){
        Mail::to($email)->send(new WelcomeMail($first_name,$last_name,$login,$mdp));
        return 1;
    }

}
