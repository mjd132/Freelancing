<?php

namespace App\Enums;

enum ProposalStatus: string
{
    case ACCEPTED = 'accepted';
    case DECLINED = 'declined';
    case PENDING = 'pending';

    public static function values(){
        return array_column(self::cases(),"value");
    }
}
