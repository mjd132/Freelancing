<?php

namespace App\Enums;

enum ProjectStatus :string
{
    case CREATED = 'created';
    case PUBLISHED = 'published';
    case ACCEPTED = 'accepted';
    case DONE = 'done';
    case DOING = 'doing';
    case CANCELED = 'canceled';
    case ABANDONED = 'abandoned';
    public static function values(){
        return array_column(self::cases(),"value");
    }
}
