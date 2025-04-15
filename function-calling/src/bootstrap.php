<?php

use Symfony\Component\HttpClient\HttpClient;

require_once __DIR__ . '/../vendor/autoload.php';

$http_client = HttpClient::create();

/**
$system_prompt = <<<EOQ
You are an expert in function calling.
You are given a question and a set of possible tools.
You must decide if a tool should be invoked.
Format tool calls strictly as: [tool_name(param=value, param2=value2)]
If no tool is relevant or required parameters are missing, please respond that the request can't be fulfilled.
EOQ;
*/
