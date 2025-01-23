<?php

namespace App\Enums;

enum RequestState: string
{
    case Queued = 'queued';
    case Pending = 'pending';
    case Succeeded = 'succeeded';
    case Failed = 'failed';

}
