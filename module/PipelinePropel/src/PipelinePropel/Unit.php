<?php

namespace PipelinePropel;

use PipelinePropel\Base\Unit as BaseUnit;

/**
 * Skeleton subclass for representing a row from the 'unit' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 */
class Unit extends BaseUnit
{

    public function isGenderPermitted($gender) {
        $rooms = $this->getRooms();
        foreach ($rooms as $room) {
            $roomAssignments = $room->getRoomAssignments();

            foreach ($roomAssignments as  $roomAssignment) {
                if ($roomAssignment->getStatus() === 'inactive') {
                    continue;
                }

                if ($roomAssignment->getStudent()->getGender() !== $gender) {
                    return false;
                }
            }   
        }
        
        return true;    
    }

}
