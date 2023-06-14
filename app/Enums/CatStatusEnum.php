<?php

namespace App\Enums;

enum CatStatusEnum: string
{
    case HEALTHY = 'healthy';
    case SICK = 'sick';
    case CRITICAL = 'critical';
    case ADOPTED = 'adopted';
}
