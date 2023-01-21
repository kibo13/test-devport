<?php

function generate_unique_token() : string
{
    return hash('sha256', uniqid(mt_rand(), true));
}
