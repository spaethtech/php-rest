<?php
declare(strict_types=1);

namespace rspaeth\REST\Examples;

use rspaeth\REST\Annotations\EndpointAnnotation;
use rspaeth\REST\Annotations\EndpointAnnotation as Endpoint;
use rspaeth\REST\Annotations\PostRequiredAnnotation as PostRequired;
use rspaeth\REST\Annotations\CachedAnnotation as Cached;

use rspaeth\REST\Endpoints\EndpointObject;
use rspaeth\REST\Examples\Helpers\CountryHelper;

/**
 * Class Country
 *
 * @package UCRM\REST\Endpoints
 * @author Ryan Spaeth <rspaeth@mvqn.net>
 * @final
 *
 * @Cached
 *
 * @Endpoint { "get": "/countries", "getById": "/countries/:id" }
 * @EndpointAnnotation [ "post" => "/countries" ]
 * @rspaeth\REST\Annotations\EndpointAnnotation { "patch": "/countries/:id" }
 *
 * @method string|null getName()
 * @method string|null getCode()
 */
final class Country extends EndpointObject
{
    use CountryHelper;

    // =================================================================================================================
    // PROPERTIES
    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var string
     * @PostRequired
     */
    protected $name;

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var string
     * @PostRequired `$this->name === "United States"`
     */
    protected $code;

}

