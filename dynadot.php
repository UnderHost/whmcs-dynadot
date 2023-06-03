<?php


if (!defined("WHMCS")) {
    die("This file cannot be accessed directly");
}

require_once __DIR__ . "/includes/Dynadot.php";
require_once __DIR__ . "/includes/Http/Request.php";

use Arafatkn\WhmcsDynadot\Dynadot;

/**
 * Define module related metadata.
 *
 * @return array
 */
function dynadot_MetaData(): array
{
    return [
        'DisplayName' => 'Dynadot Domain Registrar',
        'APIVersion' => '3',
    ];
}

/**
 * Define registrar configuration options.
 *
 * @return array
 */
function dynadot_getConfigArray(): array
{
    return [
        "api_key" => [
            "FriendlyName" => "API v3 Key",
            "Type" => "text",
            "Size" => "25",
            "Description" => "Dynadot API v3 Key here."
        ]
    ];
}

/**
 * Register a domain.
 *
 * Attempt to register a domain with the domain registrar.
 *
 * @return array
 */
function dynadot_RegisterDomain(array $params): array
{
    return (new Dynadot($params))->register();
}

/**
 * Transfer a domain.
 *
 *
 * @return array
 */
function dynadot_TransferDomain(array $params): array
{
    return (new Dynadot($params))->transfer();
}

/**
 * Renew a domain.
 *
 *
 * @return array
 */
function dynadot_RenewDomain(array $params): array
{
    return (new Dynadot($params))->renew();
}

/**
 * Fetch current nameservers.
 *
 *
 * @return array
 */
function dynadot_GetNameservers($params): array
{
    return (new Dynadot($params))->getNameservers();
}

/**
 * Save nameserver changes.
 *
 * @return array
 */
function dynadot_SaveNameservers($params): array
{
    return (new Dynadot($params))->saveNameservers();
}

/**
 * Get registrar lock status.
 * @return string|array Lock status or error message
 */
function dynadot_GetRegistrarLock($params)
{
    return (new Dynadot($params))->getRegistrarLock();
}

/**
 * Set registrar lock status.
 *
 *
 * @return array
 */
function dynadot_SaveRegistrarLock($params): array
{
    return (new Dynadot($params))->saveRegistrarLock();
}

/**
 * Enable/Disable ID Protection.
 *
 * @param array $params common module parameters
 *
 * @return array
 */
function dynadot_IDProtectToggle($params): array
{
    return (new Dynadot($params))->togglePrivacyProtection();
}

/**
 * Request EEP Code.
 *
 * Supports both displaying the EPP Code directly to a user or indicating
 * that the EPP Code will be emailed to the registrant.
 *
 * @param array $params common module parameters
 *
 * @return array
 *
 */
function dynadot_GetEPPCode($params): array
{
    return (new Dynadot($params))->getEppCode();
}
