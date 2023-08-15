<?php

class Response
{
    const PAGE_NOT_FOUND = [
        'code' => 404,
        'header' => "Page Not Found",
        'message' => "The page you're looking for does not exist.",
    ];
    const FORBIDDEN = [
        'code' => 403,
        'header' => "Access Forbidden",
        'message' => "You do not have permission to access this page.",
    ];

}