<?php

namespace App;

enum Experience :int
{
    case less_than_1 = 1;
    case Between1_2 = 2;
    case Between2_3 = 3;
    case Between3_4 = 4;
     case Between4_5 = 5;
     case MoreThan5 =6 ;

    public function label():string
    {
        return match($this){
            self::less_than_1 =>'Less than year' ,
            self::Between1_2 => 'Between 1 and 2 years',
            self::Between2_3 => 'Between 2 and 3 years',
            self::Between3_4 => 'Between 3 and 4 years',
            self::Between4_5 => 'Between 4 and 5 years',
            self::MoreThan5 => 'More than 5 years',
        };
    }

}
