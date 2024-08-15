<?php

// app/Policies/AdminPolicy.php

namespace App\Policies;

use App\Models\Admin;
use Illuminate\Auth\Access\HandlesAuthorization;

class AdminPolicy
{
    use HandlesAuthorization;

    public function viewHomeAdmin(Admin $admin)
    {
        // Exemple de vérification : autoriser tous les administrateurs
        return true;
    }
}


