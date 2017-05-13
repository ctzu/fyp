<?php

function setSelected($val, $otherVal)
{
    if ($val == $otherVal) {
        return 'selected';
    }

    return null;
}