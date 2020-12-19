<?php

    /**
     * @param $price
     * @return string
     */
    function formatPrice($price): string
    {
        return "$ " . number_format($price / 1);
    }
