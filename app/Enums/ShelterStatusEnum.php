<?php

namespace App\Enums;

enum ShelterStatusEnum: string
{
    case STABLE = 'stable';
    case OVERPOPULATION = 'overpopulation';
    case EMERGENCY = 'emergency';
    case NEED_HELP = 'need_help';
}
