<?php

namespace TridentSDK\Enums;

class ApiError extends Enum {

    const INVALID_SECURITY_TOKEN = array("success" => false, "error" => 1, "message" => "Incorrect API Token");

    const POST_ID_NOT_PROVIDED = array("success" => false, "error" => 101, "message" => "No post ID provided");
    const POST_NOT_FOUND = array("success" => false, "error" => 102, "message" => "Post not found");
    const POST_NOT_LIKED = array("success" => false, "error" => 103, "message" => "You have not liked this post");
    const POST_ALREADY_LIKED = array("success" => false, "error" => 104, "message" => "You have already liked this post");

    /**
     * @var boolean $success Whether successful
     */
    protected $success;

    /**
     * @var int $error The error ID
     */
    protected $error;

    /**
     * @var string $message The error message
     */
    protected $message;


}