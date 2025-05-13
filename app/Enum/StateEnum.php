<?php

namespace App\Enum;

enum StateEnum: string
{
    case GENEVE = 'ch-ge';
    case NEUCHATEL = 'ch-ne';
    case LAUSANNE = 'ch-la';
    case BERNE = 'ch-be';
    case ZURICH = 'ch-zh';
    case LUZERN = 'ch-lu';
    case BASEL = 'ch-bs';

}
