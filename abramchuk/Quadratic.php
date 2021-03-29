<?php

namespace abramchuk;

use core\EquationInterface;

class Quadratic extends Linear implements EquationInterface
{
    protected function disk($a, $b, $c)
    {
       return $x = $b * $b - 4 * $a * $c;
    }
    public function solve($a, $b, $c): array
    {
        if ($a == 0)
        {
            return parent::line_equation($b, $c);
        }
        $dis = $this->disk($a, $b, $c);
        if ($dis > 0)
        {
            MyLog::log('Это квадратное уравнение');
            $squareDis = sqrt($dis);
            return $this->x = array((-$b + $squareDis) / (2 * $a), (-$b - $squareDis) / (2 * $a));
        }
        elseif ($dis == 0)
        {
            return $this->x = -$b / (2 * $a);
        }
        elseif ($dis < 0)
        {
            throw new AbramchukException('Ошибка: Уравнение не имеет решений');
        }
        throw new AbramchukException("Ошибка: уравнение не имеет корней");
    }
}
