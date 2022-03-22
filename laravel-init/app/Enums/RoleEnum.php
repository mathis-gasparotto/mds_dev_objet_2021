<?php

namespace App\Enums;

enum RoleEnum : string {
    case Admin = "admin";
    case Teacher = "teacher";
    case Student = "student";
}
