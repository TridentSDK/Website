<?php

namespace TridentSDK\Enums;

class ApiError extends Enum {

	/**
	 * 000 Block related to system
	 */
    const INVALID_SECURITY_TOKEN = array("success" => false, "error" => 1, "message" => "Incorrect API Token");

	/**
	 * 100 Block related to forum
	 */
    const POST_ID_NOT_PROVIDED = array("success" => false, "error" => 101, "message" => "No post ID provided");
    const POST_NOT_FOUND = array("success" => false, "error" => 102, "message" => "Post not found");
    const POST_NOT_LIKED = array("success" => false, "error" => 103, "message" => "You have not liked this post");
    const POST_ALREADY_LIKED = array("success" => false, "error" => 104, "message" => "You have already liked this post");

	/**
	 * 200 Block related to plugins
	 */
	const SPACE_NOT_PROVIDED = array("success" => false, "error" => 201, "message" => "No space provided");
	const SPACE_NOT_FOUND = array("success" => false, "error" => 202, "message" => "Space not found");
	const PLUGIN_NOT_PROVIDED = array("success" => false, "error" => 203, "message" => "No plugin provided");
	const PLUGIN_NOT_FOUND = array("success" => false, "error" => 204, "message" => "Plugin not found");

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