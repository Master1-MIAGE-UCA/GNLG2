<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class WelcomeMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $full_name;
    protected $login;
    protected $mdp;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($first_name,$last_name,$login,$mdp)
    {
        $this->full_name = $last_name.' '.$first_name;
        $this->login = $login;
        $this->mdp = $mdp;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $full_name = $this->full_name;
        $login=$this->login;
        $mdp=$this->mdp;
        $site = config('app.name');
        $url_site = config('app.url');
        return $this->markdown('emails.welcome', compact('full_name', 'site','url_site','login','mdp'));
    }
}
