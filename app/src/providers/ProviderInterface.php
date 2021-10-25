<?php

namespace ApiCondor\src\providers;
use ApiCondor\src\structure\ResponseProvider;

interface ProviderInterface
{
    public function fetchData($params = null);

    public function provide() :ResponseProvider;

}