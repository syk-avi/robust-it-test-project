<?php

namespace App\Modules\User\Services;


class MenuService
{

    public function activeAncestor($currentRoute, $selectedRoute)
    {
        $nav_open = "";
        if ($currentRoute == $selectedRoute) {
            $nav_open = 'nav-item-expanded nav-item-open';
        }

        echo $nav_open;
    }

    public function activeMenu($currentRoute, $selectedRoute)
    {
        $active = "";
        if ($currentRoute == $selectedRoute) {
            $active = 'active';
        }

        echo $active;
    }

}
