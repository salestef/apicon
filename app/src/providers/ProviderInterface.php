<?php

namespace ApiCondor\src\providers;
use ApiCondor\src\structure\ResponseProvider;

interface ProviderInterface
{
    public function fetchData();

    public function provide() :ResponseProvider;

}