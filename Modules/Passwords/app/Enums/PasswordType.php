<?php

namespace Modules\Passwords\Enums;

enum PasswordType: int
{
    case OTHER = 1;
    case WEBSITE_PANEL = 2;
    case FTP = 3;

}
