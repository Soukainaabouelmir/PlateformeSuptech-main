<?php

// app/Notifications/ExamNotification.php
namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\Models\Programme_Evaluation;

class ExamNotification extends Notification
{
    use Queueable;

    protected $programmeEvaluation;

    public function __construct(Programme_Evaluation $programmeEvaluation)
    {
        $this->programmeEvaluation = $programmeEvaluation;
    }

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toArray($notifiable)
    {
        return [
            'num_element' => $this->programmeEvaluation->num_element,
            'id_filiere' => $this->programmeEvaluation->id_filiere,
            'date_exam' => $this->programmeEvaluation->date_exam,
            'heure_exam' => $this->programmeEvaluation->heure_exam,
        ];
    }
}
