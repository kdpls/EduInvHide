<?php

/*
 * Hide Education Edition items and blocks from creative inventory
 * Copyright (C) 2021 KygekDev
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 */

declare(strict_types=1);

namespace KygekDev\EduInvHide;

use pocketmine\block\ChemistryTable;
use pocketmine\block\Element;
use pocketmine\block\VanillaBlocks;
use pocketmine\inventory\CreativeInventory;
use pocketmine\plugin\PluginBase;

class EduInvHide extends PluginBase {

    protected function onEnable() : void {
        foreach (VanillaBlocks::getAll() as $item) {
            if ($item instanceof Element || $item instanceof ChemistryTable) {
                CreativeInventory::getInstance()->remove($item->asItem());
            }
        }
        // Element '???'
        CreativeInventory::getInstance()->remove(VanillaBlocks::ELEMENT_ZERO()->asItem());
    }

}